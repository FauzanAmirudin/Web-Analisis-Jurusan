<?php

namespace App\Controllers;

use App\Models\TestSessionModel;
use App\Models\TestResultModel;
use App\Models\UserModel;
use App\Models\TestAnswerModel;

class DashboardController extends BaseController
{
    protected $testSessionModel;
    protected $testResultModel;
    protected $userModel;
    protected $testAnswerModel;

    public function __construct()
    {
        $this->testSessionModel = new TestSessionModel();
        $this->testResultModel = new TestResultModel();
        $this->userModel = new UserModel();
        $this->testAnswerModel = new TestAnswerModel();
    }

    public function index()
    {
        $userId = session()->get('user_id');
        
        // Get all user sessions
        $userSessions = $this->testSessionModel->getUserSessions($userId, 100); // Increased limit to get all sessions
        
        // Count sessions by status
        $totalTests = count($userSessions);
        $completedTests = 0;
        $inProgressTests = 0;
        
        foreach ($userSessions as $session) {
            if ($session['status'] === 'completed') {
                $completedTests++;
            } elseif ($session['status'] === 'in_progress') {
                $inProgressTests++;
            }
            // Any other status will not be counted in either category
        }
        
        $recentSessions = array_slice($userSessions, 0, 5); // Get only the 5 most recent sessions
        
        // Get latest test result
        $latestResult = null;
        if ($completedTests > 0) {
            $results = $this->testResultModel->getUserResults($userId, 1);
            $latestResult = !empty($results) ? $results[0] : null;
        }

        // Check for incomplete test
        $incompleteTest = null;
        foreach ($recentSessions as $session) {
            if ($session['status'] === 'in_progress') {
                $incompleteTest = $session;
                break;
            }
        }

        $data = [
            'title' => 'Dashboard - Analisis Jurusan',
            'user' => [
                'name' => session()->get('full_name'),
                'email' => session()->get('email'),
                'profile_picture' => session()->get('profile_picture')
            ],
            'stats' => [
                'total_tests' => $totalTests,
                'completed_tests' => $completedTests,
                'in_progress_tests' => $inProgressTests
            ],
            'latest_result' => $latestResult,
            'recent_sessions' => $recentSessions,
            'incomplete_test' => $incompleteTest
        ];

        return view('dashboard/index', $data);
    }

    public function history()
    {
        $userId = session()->get('user_id');
        
        // Get all completed sessions with results
        $completedSessions = $this->testSessionModel->getCompletedSessions($userId);
        $results = $this->testResultModel->getUserResults($userId, 50);

        // Merge session data with results
        $history = [];
        foreach ($completedSessions as $session) {
            foreach ($results as $result) {
                if ($result['session_id'] == $session['id']) {
                    $history[] = array_merge($session, $result);
                    break;
                }
            }
        }

        $data = [
            'title' => 'Riwayat Tes - Analisis Jurusan',
            'history' => $history
        ];

        return view('dashboard/history', $data);
    }

    public function viewResult($resultId)
    {
        $userId = session()->get('user_id');
        $result = $this->testResultModel->getResultById($resultId);

        if (!$result || $result['user_id'] != $userId) {
            return redirect()->to('/dashboard/history')->with('error', 'Hasil tes tidak ditemukan');
        }

        $data = [
            'title' => 'Hasil Tes - Analisis Jurusan',
            'result' => $result
        ];

        return view('dashboard/result_detail', $data);
    }

    public function profile()
    {
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);

        $data = [
            'title' => 'Profil - Analisis Jurusan',
            'user' => $user
        ];

        return view('dashboard/profile', $data);
    }

    public function updateProfile()
    {
        $userId = session()->get('user_id');
        
        $rules = [
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email' => "required|valid_email|is_unique[users.email,id,$userId]"
        ];

        // Tambah validasi jika ingin ganti password
        if ($this->request->getPost('current_password')) {
            $rules['current_password'] = 'required';
            $rules['new_password'] = 'required|min_length[6]';
            $rules['confirm_password'] = 'required|matches[new_password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email')
        ];

        // Proses ganti password jika diisi
        if ($this->request->getPost('current_password')) {
            $user = $this->userModel->find($userId);
            if (!$this->userModel->verifyPassword($this->request->getPost('current_password'), $user['password'])) {
                return redirect()->back()->withInput()->with('error', 'Password saat ini tidak sesuai');
            }
            $data['password'] = $this->request->getPost('new_password');
        }

        // Handle profile picture upload
        $profilePicture = $this->request->getFile('profile_picture');
        if ($profilePicture && $profilePicture->isValid() && !$profilePicture->hasMoved()) {
            $newName = $profilePicture->getRandomName();
            if ($profilePicture->move(WRITEPATH . 'uploads/profiles', $newName)) {
                $data['profile_picture'] = $newName;
            }
        }

        if ($this->userModel->update($userId, $data)) {
            // Update session data
            session()->set([
                'full_name' => $data['full_name'],
                'email' => $data['email']
            ]);

            if (isset($data['profile_picture'])) {
                session()->set('profile_picture', $data['profile_picture']);
            }

            return redirect()->back()->with('success', 'Profil berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui profil');
        }
    }

    public function downloadPDF($resultId)
    {
        $userId = session()->get('user_id');
        $result = $this->testResultModel->getResultById($resultId);

        if (!$result || $result['user_id'] != $userId) {
            return redirect()->to('/dashboard/history')->with('error', 'Hasil tes tidak ditemukan');
        }

        // Get user data
        $user = $this->userModel->find($userId);
        
        // Encode logo untuk ditampilkan di PDF
        $logoPath = FCPATH . 'assets/images/logo.png'; // Sesuaikan dengan path logo Anda
        if (file_exists($logoPath)) {
            $imageData = base64_encode(file_get_contents($logoPath));
            $logoImage = 'data:image/png;base64,' . $imageData;
        } else {
            $logoImage = '';
        }

        // Prepare data for PDF
        $data = [
            'result' => $result,
            'user' => $user,
            'download_date' => date('d F Y'),
            'logo_image' => $logoImage
        ];

        // Generate PDF
        $pdfGenerator = new \App\Libraries\PdfGenerator();
        $filename = 'Hasil_Tes_Analisis_Jurusan_' . date('Ymd_His') . '.pdf';
        
        $pdfGenerator->generateFromView('pdf/test_result', $data, $filename);
    }

    public function deleteTestHistory($resultId)
    {
        $userId = session()->get('user_id');
        $result = $this->testResultModel->getResultById($resultId);
        
        // Check if result exists and belongs to the current user
        if (!$result || $result['user_id'] != $userId) {
            return redirect()->to('/dashboard/history')->with('error', 'Hasil tes tidak ditemukan atau Anda tidak memiliki izin untuk menghapusnya');
        }
        
        // Get the session ID to delete both the result and session
        $sessionId = $result['session_id'];
        
        // Begin transaction to ensure both deletions succeed or fail together
        $db = \Config\Database::connect();
        $db->transBegin();
        
        try {
            // Delete the test result
            $this->testResultModel->delete($resultId);
            
            // Delete the test session
            $this->testSessionModel->delete($sessionId);
            
            // Delete related test answers
            $this->testAnswerModel->where('session_id', $sessionId)->delete();
            
            $db->transCommit();
            return redirect()->to('/dashboard/history')->with('success', 'Riwayat tes berhasil dihapus');
        } catch (\Exception $e) {
            $db->transRollback();
            return redirect()->to('/dashboard/history')->with('error', 'Gagal menghapus riwayat tes: ' . $e->getMessage());
        }
    }
}