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
        
        // Get user data including test credits
        $userData = $this->userModel->find($userId);
        
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
                'profile_picture' => session()->get('profile_picture'),
                'test_credits' => $userData['test_credits'] ?? 0
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
        
        // Decode JSON fields if needed
        if (isset($result['strengths']) && is_string($result['strengths'])) {
            $result['strengths'] = json_decode($result['strengths'], true);
        }
        
        if (isset($result['development_areas']) && is_string($result['development_areas'])) {
            $result['development_areas'] = json_decode($result['development_areas'], true);
        }
        
        if (isset($result['recommended_majors']) && is_string($result['recommended_majors'])) {
            $result['recommended_majors'] = json_decode($result['recommended_majors'], true);
        }
        
        $data = [
            'title' => 'Detail Hasil Tes - Analisis Jurusan',
            'result' => $result
        ];
        
        // Check if this is a PDF request (for html2canvas)
        if ($this->request->getGet('pdf') === 'true') {
            // Return just the content for PDF generation
            return view('dashboard/result_detail_pdf', $data);
        }
        
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
        helper(['form']);
        $userId = session()->get('user_id');
        
        // Debug output
        log_message('debug', '================ START UPDATE PROFILE ================');
        log_message('debug', 'POST data: ' . json_encode($this->request->getPost()));
        log_message('debug', 'FILES data: ' . json_encode($this->request->getFiles()));
        
        // Handle profile picture upload first (separate from other profile updates)
        $profilePicture = $this->request->getFile('profile_picture');
        if ($profilePicture && $profilePicture->isValid() && !$profilePicture->hasMoved()) {
            log_message('debug', 'Processing profile picture upload');
            
            // Create directory if it doesn't exist
            $uploadPath = FCPATH . 'uploads/profiles';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            $newName = $profilePicture->getRandomName();
            if ($profilePicture->move($uploadPath, $newName)) {
                // Update only the profile picture
                $this->userModel->update($userId, ['profile_picture' => $newName]);
                session()->set('profile_picture', $newName);
                log_message('debug', 'Profile picture updated successfully: ' . $newName);
                return redirect()->back()->with('success', 'Foto profil berhasil diperbarui');
            } else {
                log_message('error', 'Failed to move uploaded file');
                return redirect()->back()->with('error', 'Gagal mengupload foto profil');
            }
        }
        
        // Check if this is a regular form submission (not file upload)
        if (!$this->request->getPost('is_profile_update')) {
            log_message('debug', 'No profile update form data submitted');
            return redirect()->back();
        }
        
        // If we get here, this is a regular form submission, not a file upload
        log_message('debug', 'Processing profile data update');
        
        // Get current user data to compare with submitted data
        $currentUser = $this->userModel->find($userId);
        
        // Prepare data and rules arrays
        $data = [];
        $rules = [];
        
        // Check which fields have been changed and add them to data and rules
        $fullName = $this->request->getPost('full_name');
        if ($fullName !== $currentUser['full_name']) {
            $data['full_name'] = $fullName;
            $rules['full_name'] = 'required|min_length[2]|max_length[100]';
            log_message('debug', 'Full name changed: ' . $fullName);
        }
        
        $email = $this->request->getPost('email');
        if ($email !== $currentUser['email']) {
            $data['email'] = $email;
            $rules['email'] = "required|valid_email|is_unique[users.email,id,$userId]";
            log_message('debug', 'Email changed: ' . $email);
        }
        
        $phoneNumber = $this->request->getPost('phone_number');
        if ($phoneNumber !== $currentUser['phone_number']) {
            $data['phone_number'] = $phoneNumber;
            $rules['phone_number'] = 'permit_empty|min_length[10]|max_length[20]';
            log_message('debug', 'Phone number changed: ' . $phoneNumber);
        }
        
        $birthDate = $this->request->getPost('birth_date');
        if ($birthDate !== $currentUser['birth_date']) {
            $data['birth_date'] = $birthDate ?: null;
            $rules['birth_date'] = 'permit_empty|valid_date';
            log_message('debug', 'Birth date changed: ' . $birthDate);
        }

        // Handle password change if requested
        if ($this->request->getPost('current_password')) {
            $rules['current_password'] = 'required';
            $rules['new_password'] = 'required|min_length[6]';
            $rules['confirm_password'] = 'required|matches[new_password]';
            log_message('debug', 'Password change requested');
        }

        // If no data to update, redirect back with message
        if (empty($data) && !$this->request->getPost('current_password')) {
            log_message('debug', 'No data changed, nothing to update');
            return redirect()->back()->with('info', 'Tidak ada perubahan yang dilakukan');
        }

        // Validate only the fields that have changed
        if (!empty($rules) && !$this->validate($rules)) {
            log_message('debug', 'Validation failed: ' . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Process password change if requested
        if ($this->request->getPost('current_password')) {
            $user = $this->userModel->find($userId);
            if (!$this->userModel->verifyPassword($this->request->getPost('current_password'), $user['password'])) {
                log_message('debug', 'Current password verification failed');
                return redirect()->back()->withInput()->with('error', 'Password saat ini tidak sesuai');
            }
            
            // Get the new password
            $newPassword = $this->request->getPost('new_password');
            
            // Hash the password manually (don't rely on model callbacks for updates)
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            log_message('debug', 'Password hashed for update: ' . substr($hashedPassword, 0, 10) . '...');
            
            // Add to data array - use direct DB update to bypass model callbacks
            $db = \Config\Database::connect();
            try {
                // Update password directly in the database
                $result = $db->table('users')
                    ->where('id', $userId)
                    ->update(['password' => $hashedPassword]);
                
                if ($result) {
                    log_message('debug', 'Password updated successfully via direct DB update');
                    return redirect()->back()->with('success', 'Password berhasil diperbarui');
                } else {
                    log_message('error', 'Failed to update password via direct DB update');
                    return redirect()->back()->with('error', 'Gagal memperbarui password');
                }
            } catch (\Exception $e) {
                log_message('error', 'Exception during direct password update: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui password: ' . $e->getMessage());
            }
        }

        try {
            // Only update if there's data to update
            if (!empty($data)) {
                log_message('debug', 'Updating user with ID: ' . $userId . ' with data: ' . json_encode($data));
                
                // Special handling for password updates
                if (isset($data['password'])) {
                    log_message('debug', 'Password update detected, ensuring it is properly handled');
                    
                    // Double check the password is properly hashed
                    if (strlen($data['password']) < 60 || !str_starts_with($data['password'], '$2y$')) {
                        log_message('error', 'Password appears to be unhashed or improperly hashed');
                        return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses password');
                    }
                }

                if ($this->userModel->update($userId, $data)) {
                    // Update session data for changed fields
                    foreach ($data as $key => $value) {
                        if ($key !== 'password') {
                            session()->set($key, $value);
                        }
                    }
                    
                    // If password was updated, show specific message
                    if (isset($data['password'])) {
                        log_message('debug', 'Password updated successfully');
                        return redirect()->back()->with('success', 'Password berhasil diperbarui');
                    }
                    
                    log_message('debug', 'Profile updated successfully');
                    return redirect()->back()->with('success', 'Profil berhasil diperbarui');
                } else {
                    log_message('error', 'Failed to update profile: ' . json_encode($this->userModel->errors()));
                    return redirect()->back()->with('error', 'Gagal memperbarui profil: ' . implode(', ', $this->userModel->errors()));
                }
            } else {
                // If only password was changed (this should not happen anymore)
                log_message('debug', 'No data to update but password change was requested');
                return redirect()->back()->with('info', 'Tidak ada perubahan yang dilakukan');
            }
        } catch (\Exception $e) {
            log_message('error', 'Exception during profile update: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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