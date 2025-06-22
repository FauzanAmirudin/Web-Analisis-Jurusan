<?php

namespace App\Controllers;

use App\Models\TestSessionModel;
use App\Models\QuestionModel;
use App\Models\TestAnswerModel;
use App\Models\TestResultModel;
use App\Models\MajorModel;
use App\Libraries\PersonalityAnalyzer;
use App\Models\UserModel;

class AssessmentController extends BaseController
{
    protected $testSessionModel;
    protected $questionModel;
    protected $testAnswerModel;
    protected $testResultModel;
    protected $majorModel;
    protected $personalityAnalyzer;
    protected $userModel;

    public function __construct()
    {
        $this->testSessionModel = new TestSessionModel();
        $this->questionModel = new QuestionModel();
        $this->testAnswerModel = new TestAnswerModel();
        $this->testResultModel = new TestResultModel();
        $this->majorModel = new MajorModel();
        $this->personalityAnalyzer = new PersonalityAnalyzer();
        $this->userModel = new UserModel();
    }

    public function start()
    {
        $userId = session()->get('user_id');
        
        // Check for existing incomplete session
        $incompleteSessions = $this->testSessionModel->where('user_id', $userId)
                                                   ->where('status', 'in_progress')
                                                   ->findAll();

        if (!empty($incompleteSessions)) {
            $session = $incompleteSessions[0];
            return redirect()->to("/test/{$session['session_token']}");
        }
        
        // Check if user has test credits
        if (!$this->userModel->hasTestCredits($userId)) {
            return redirect()->to('/dashboard')->with('error', 'Anda tidak memiliki kredit tes tersisa. Silakan beli kredit tes tambahan untuk melanjutkan.');
        }

        // Create new session and deduct test credit
        $sessionToken = $this->testSessionModel->createSession($userId);
        $this->userModel->useTestCredit($userId);
        
        return redirect()->to("/test/$sessionToken");
    }

    public function test($sessionToken)
    {
        $session = $this->testSessionModel->getSessionByToken($sessionToken);
        
        if (!$session || $session['user_id'] != session()->get('user_id')) {
            return redirect()->to('/dashboard')->with('error', 'Sesi tes tidak valid');
        }

        if ($session['status'] === 'completed') {
            return redirect()->to("/test/result/$sessionToken");
        }

        $currentStep = $session['current_step'];
        $totalSteps = 11; // 6 RIASEC + 2 MBTI + 3 additional steps for better UX

        // Determine question type and range
        if ($currentStep <= 6) {
            // RIASEC questions (6 per page)
            $type = 'riasec';
            $questionsPerPage = 6;
            $startNumber = ($currentStep - 1) * 6 + 1;
            $endNumber = $currentStep * 6;
        } else {
            // MBTI questions (8 per page)
            $type = 'mbti';
            $questionsPerPage = 8;
            $startNumber = 36 + (($currentStep - 7) * 8) + 1;
            $endNumber = 36 + (($currentStep - 6) * 8);
        }

        $questions = $this->questionModel->where('type', $type)
                                        ->where('order_number >=', $startNumber)
                                        ->where('order_number <=', $endNumber)
                                        ->where('is_active', 1)
                                        ->orderBy('order_number', 'ASC')
                                        ->findAll();
        
        if (empty($questions)) {
            return redirect()->to('/dashboard')->with('error', 'Pertanyaan tidak ditemukan');
        }

        // Get existing answers
        $existingAnswers = $this->testAnswerModel->getSessionAnswers($session['id']);
        $answersMap = [];
        foreach ($existingAnswers as $answer) {
            $answersMap[$answer['question_id']] = $answer['answer'];
        }

        $data = [
            'title' => 'Tes Analisis Kepribadian - Analisis Jurusan',
            'session' => $session,
            'questions' => $questions,
            'current_step' => $currentStep,
            'total_steps' => $totalSteps,
            'progress_percentage' => ($currentStep / $totalSteps) * 100,
            'existing_answers' => $answersMap,
            'question_type' => $type,
            'page_title' => $this->getPageTitle($type, $currentStep)
        ];

        return view('assessment/test', $data);
    }

    private function getPageTitle($type, $step)
    {
        if ($type === 'riasec') {
            $titles = [
                1 => 'Aktivitas Praktis & Teknis',
                2 => 'Penelitian & Analisis',
                3 => 'Kreativitas & Seni',
                4 => 'Interaksi Sosial & Komunikasi',
                5 => 'Kepemimpinan & Bisnis',
                6 => 'Organisasi & Administrasi'
            ];
        } else {
            $titles = [
                7 => 'Gaya Interaksi & Memproses Informasi',
                8 => 'Pengambilan Keputusan & Gaya Hidup'
            ];
        }

        return $titles[$step] ?? 'Tes Kepribadian';
    }

    public function saveAnswers()
    {
        $sessionToken = $this->request->getPost('session_token');
        $answers = $this->request->getPost('answers');
        $currentStep = (int) $this->request->getPost('current_step');

        $session = $this->testSessionModel->getSessionByToken($sessionToken);
        
        if (!$session || $session['user_id'] != session()->get('user_id')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Sesi tidak valid']);
        }

        // Save answers
        if ($answers) {
            foreach ($answers as $questionId => $answer) {
                $this->testAnswerModel->saveAnswer($session['id'], $questionId, $answer);
            }
        }

        $nextStep = $currentStep + 1;
        $totalSteps = 8;

        if ($nextStep > $totalSteps) {
            // Complete the test
            $this->completeTest($session['id']);
            return $this->response->setJSON([
                'success' => true,
                'completed' => true,
                'redirect' => "/test/result/$sessionToken"
            ]);
        } else {
            // Update progress
            $this->testSessionModel->updateProgress($session['id'], $nextStep);
            return $this->response->setJSON([
                'success' => true,
                'completed' => false,
                'redirect' => "/test/$sessionToken"
            ]);
        }
    }

    private function completeTest($sessionId)
    {
        // Calculate scores
        $scores = $this->testAnswerModel->calculateScores($sessionId);
        
        // Determine personality type
        $personalityType = $this->personalityAnalyzer->determinePersonalityType($scores);
        
        // Get personality profile
        $profile = $this->personalityAnalyzer->getPersonalityProfile($personalityType);
        
        // Get major recommendations
        $recommendedMajors = $this->majorModel->getRecommendedMajors($personalityType);

        // Save results
        $resultData = [
            'session_id' => $sessionId,
            'user_id' => session()->get('user_id'),
            'personality_type' => $personalityType,
            'personality_name' => $profile['name'],
            'personality_description' => $profile['description'],
            'strengths' => json_encode($profile['strengths']),
            'development_areas' => json_encode($profile['development_areas']),
            'recommended_majors' => $recommendedMajors
        ];

        $this->testResultModel->saveResult($resultData);

        // Update session status
        $this->testSessionModel->completeSession($sessionId, $personalityType);
    }

    public function result($sessionToken)
    {
        $session = $this->testSessionModel->getSessionByToken($sessionToken);
        
        if (!$session || $session['user_id'] != session()->get('user_id')) {
            return redirect()->to('/dashboard')->with('error', 'Sesi tes tidak valid');
        }

        $result = $this->testResultModel->getResultBySession($session['id']);
        
        if (!$result) {
            if ($session['status'] === 'in_progress') {
                // If we have a session but no results, the test is incomplete
                return redirect()->to("/test/$sessionToken")->with('warning', 'Tes belum selesai. Silakan lanjutkan tes Anda.');
            }
            
            return redirect()->to('/dashboard')->with('error', 'Hasil tes tidak ditemukan');
        }

        // If we have results but the session is not marked as completed,
        // update session status to completed (fixes status inconsistency issue)
        if ($session['status'] !== 'completed') {
            $this->testSessionModel->completeSession(
                $session['id'], 
                $result['personality_type']
            );
            // Refresh session data
            $session = $this->testSessionModel->getSessionByToken($sessionToken);
        }

        // Decode JSON fields
        $result['strengths'] = json_decode($result['strengths'], true);
        $result['development_areas'] = json_decode($result['development_areas'], true);

        $data = [
            'title' => 'Hasil Tes - Analisis Jurusan',
            'result' => $result,
            'session' => $session
        ];

        return view('assessment/result', $data);
    }

    public function previousStep()
    {
        $sessionToken = $this->request->getPost('session_token');
        $currentStep = (int) $this->request->getPost('current_step');
        
        $session = $this->testSessionModel->getSessionByToken($sessionToken);
        
        if (!$session || $session['user_id'] != session()->get('user_id')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Sesi tidak valid']);
        }
        
        $previousStep = $currentStep - 1;
        
        // Ensure we don't go below step 1
        if ($previousStep < 1) {
            $previousStep = 1;
        }
        
        // Update session to previous step
        $this->testSessionModel->updateProgress($session['id'], $previousStep);
        
        return $this->response->setJSON([
            'success' => true,
            'redirect' => "/test/$sessionToken"
        ]);
    }

    public function majorDetail($majorId)
    {
        $major = $this->majorModel->getMajorById($majorId);
        
        if (!$major) {
            return redirect()->back()->with('error', 'Jurusan tidak ditemukan');
        }

        $data = [
            'title' => $major['name'] . ' - Detail Jurusan',
            'major' => $major
        ];

        return view('assessment/major_detail', $data);
    }
}