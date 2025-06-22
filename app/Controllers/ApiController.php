<?php

namespace App\Controllers;

use App\Models\TestSessionModel;
use App\Models\TestAnswerModel;
use App\Models\TestResultModel;
use App\Models\UserModel;

class ApiController extends BaseController
{
    protected $testSessionModel;
    protected $testAnswerModel;
    protected $testResultModel;
    protected $userModel;

    public function __construct()
    {
        $this->testSessionModel = new TestSessionModel();
        $this->testAnswerModel = new TestAnswerModel();
        $this->testResultModel = new TestResultModel();
        $this->userModel = new UserModel();
    }

    public function saveProgress()
    {
        $sessionToken = $this->request->getPost('session_token');
        $answers = $this->request->getPost('answers');

        if (!$sessionToken) {
            return $this->response->setJSON([
                'success' => false, 
                'message' => 'Sesi tidak valid'
            ]);
        }

        $session = $this->testSessionModel->getSessionByToken($sessionToken);
        
        if (!$session || $session['user_id'] != session()->get('user_id')) {
            return $this->response->setJSON([
                'success' => false, 
                'message' => 'Sesi tidak valid'
            ]);
        }

        // Save answers
        if ($answers) {
            foreach ($answers as $questionId => $answer) {
                $this->testAnswerModel->saveAnswer($session['id'], $questionId, $answer);
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Progress tersimpan'
        ]);
    }

    public function getProgress($sessionToken)
    {
        $session = $this->testSessionModel->getSessionByToken($sessionToken);
        
        if (!$session || $session['user_id'] != session()->get('user_id')) {
            return $this->response->setJSON([
                'success' => false, 
                'message' => 'Sesi tidak valid'
            ]);
        }

        $data = [
            'success' => true,
            'session' => $session,
            'answers' => $this->testAnswerModel->getSessionAnswers($session['id'])
        ];

        return $this->response->setJSON($data);
    }
    
    public function getTestResult($resultId)
    {
        $userId = session()->get('user_id');
        
        if (!$userId) {
            return $this->response->setJSON([
                'success' => false, 
                'message' => 'Anda harus login untuk mengakses data ini'
            ]);
        }
        
        $result = $this->testResultModel->getResultById($resultId);
        
        if (!$result || $result['user_id'] != $userId) {
            return $this->response->setJSON([
                'success' => false, 
                'message' => 'Hasil tes tidak ditemukan'
            ]);
        }
        
        // Get user data
        $user = $this->userModel->find($userId);
        
        // Remove sensitive information
        if (isset($user['password'])) {
            unset($user['password']);
        }
        
        return $this->response->setJSON([
            'success' => true,
            'result' => $result,
            'user' => $user
        ]);
    }
}