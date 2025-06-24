<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserActivityModel;
use App\Models\QuestionModel;
use App\Models\TestAnswerModel;
use App\Models\PersonalityTypeModel;
use App\Models\MajorModel;
use App\Models\PersonalityMajorMappingModel;

class AdminController extends BaseController
{
    protected $userModel;
    protected $activityModel;
    protected $db;
    protected $questionModel;
    protected $answerModel;
    protected $personalityModel;
    protected $majorModel;
    protected $mappingModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->activityModel = new UserActivityModel();
        $this->db = \Config\Database::connect();
        $this->questionModel = new QuestionModel();
        $this->answerModel = new TestAnswerModel();
        $this->personalityModel = new PersonalityTypeModel();
        $this->majorModel = new MajorModel();
        $this->mappingModel = new PersonalityMajorMappingModel();
    }
    
    // Middleware to check if user is admin
    private function checkAdminAccess()
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        return true;
    }
    
    // Admin dashboard
    public function index()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        // Get summary data for dashboard
        $data = [
            'title' => 'Admin Dashboard',
            'page_title' => 'Admin Dashboard',
            'total_users' => $this->userModel->countAllResults(),
            'active_users' => $this->userModel->where('is_active', 1)->countAllResults(),
            'new_users_today' => $this->userModel->where('created_at >=', date('Y-m-d 00:00:00'))->countAllResults(),
        ];
        
        return view('admin/index', $data);
    }
    
    // User management - List all users
    public function users()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');
        $dateFrom = $this->request->getGet('date_from');
        $dateTo = $this->request->getGet('date_to');
        $page = $this->request->getGet('page') ?? 1;
        
        $builder = $this->userModel->builder();
        
        // Apply filters
        if (!empty($search)) {
            $builder->groupStart()
                ->like('full_name', $search)
                ->orLike('email', $search)
                ->orLike('username', $search)
                ->orLike('phone_number', $search)
                ->groupEnd();
        }
        
        if ($status !== null && $status !== '') {
            $builder->where('is_active', $status);
        }
        
        if (!empty($dateFrom)) {
            $builder->where('created_at >=', $dateFrom . ' 00:00:00');
        }
        
        if (!empty($dateTo)) {
            $builder->where('created_at <=', $dateTo . ' 23:59:59');
        }
        
        // Pagination
        $perPage = 10;
        $totalUsers = $builder->countAllResults(false);
        $users = $builder->orderBy('created_at', 'DESC')
            ->limit($perPage, ($page - 1) * $perPage)
            ->get()->getResultArray();
        
        $pager = \Config\Services::pager();
        $pager_links = $pager->makeLinks($page, $perPage, $totalUsers, 'default_full');
        
        $data = [
            'title' => 'Manajemen Pengguna',
            'page_title' => 'Manajemen Pengguna',
            'users' => $users,
            'pager' => $pager_links,
            'total' => $totalUsers,
            'search' => $search,
            'status' => $status,
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
            'current_page' => $page,
        ];
        
        return view('admin/users/index', $data);
    }
    
    // Create new user form
    public function createUser()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $data = [
            'title' => 'Tambah Pengguna Baru',
            'page_title' => 'Tambah Pengguna Baru',
            'validation' => \Config\Services::validation(),
        ];
        
        return view('admin/users/create', $data);
    }
    
    // Store new user
    public function storeUser()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        // Validate input
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'full_name' => 'required|min_length[2]|max_length[100]',
            'phone_number' => 'permit_empty|min_length[10]|max_length[20]',
            'birth_date' => 'permit_empty|valid_date',
            'role' => 'required|in_list[user,admin]',
            'is_active' => 'required|in_list[0,1]',
            'test_credits' => 'required|integer|greater_than_equal_to[0]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Handle profile picture upload
        $profilePicture = null;
        $file = $this->request->getFile('profile_picture');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/profiles/', $newName);
            $profilePicture = $newName;
        }
        
        // Prepare user data
        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'full_name' => $this->request->getPost('full_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'role' => $this->request->getPost('role'),
            'is_active' => $this->request->getPost('is_active'),
            'test_credits' => $this->request->getPost('test_credits'),
        ];
        
        // Tangani tanggal lahir - pastikan format valid sebelum menyimpan
        $birthDate = $this->request->getPost('birth_date');
        if (!empty($birthDate)) {
            // Coba format tanggal untuk memastikan sesuai format Y-m-d
            try {
                $date = new \DateTime($birthDate);
                $userData['birth_date'] = $date->format('Y-m-d');
                log_message('debug', 'Birth date formatted: ' . $userData['birth_date']);
            } catch (\Exception $e) {
                log_message('error', 'Invalid birth date format: ' . $birthDate . '. Error: ' . $e->getMessage());
                // Kosongkan tanggal jika format tidak valid
                $userData['birth_date'] = null;
            }
        } else {
            $userData['birth_date'] = null;
        }
        
        if ($profilePicture) {
            $userData['profile_picture'] = $profilePicture;
        }
        
        // Insert user
        if ($this->userModel->insert($userData)) {
            return redirect()->to('/admin/users')->with('success', 'Pengguna baru berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan pengguna. Silakan coba lagi.');
        }
    }
    
    // Edit user form
    public function editUser($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Pengguna tidak ditemukan');
        }
        
        $data = [
            'title' => 'Edit Pengguna',
            'page_title' => 'Edit Pengguna',
            'user' => $user,
            'validation' => \Config\Services::validation(),
        ];
        
        return view('admin/users/edit', $data);
    }
    
    // Update user
    public function updateUser($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Pengguna tidak ditemukan');
        }
        
        // Validate input
        $rules = [
            'username' => "required|min_length[3]|max_length[50]|is_unique[users.username,id,$id]",
            'email' => "required|valid_email|is_unique[users.email,id,$id]",
            'full_name' => 'required|min_length[2]|max_length[100]',
            'phone_number' => 'permit_empty|min_length[10]|max_length[20]',
            'birth_date' => 'permit_empty|valid_date',
            'role' => 'required|in_list[user,admin]',
            'is_active' => 'required|in_list[0,1]',
            'test_credits' => 'required|integer|greater_than_equal_to[0]',
        ];
        
        // If password is being updated, validate it
        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[6]';
        }
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Handle profile picture upload
        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'full_name' => $this->request->getPost('full_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'role' => $this->request->getPost('role'),
            'is_active' => $this->request->getPost('is_active'),
            'test_credits' => $this->request->getPost('test_credits'),
        ];
        
        // Tangani tanggal lahir - pastikan format valid sebelum menyimpan
        $birthDate = $this->request->getPost('birth_date');
        if (!empty($birthDate)) {
            // Coba format tanggal untuk memastikan sesuai format Y-m-d
            try {
                $date = new \DateTime($birthDate);
                $userData['birth_date'] = $date->format('Y-m-d');
                log_message('debug', 'Birth date formatted: ' . $userData['birth_date']);
            } catch (\Exception $e) {
                log_message('error', 'Invalid birth date format: ' . $birthDate . '. Error: ' . $e->getMessage());
                // Kosongkan tanggal jika format tidak valid
                $userData['birth_date'] = null;
            }
        } else {
            $userData['birth_date'] = null;
        }
        
        // Only update password if provided
        if ($this->request->getPost('password')) {
            $password = $this->request->getPost('password');
            if (!empty($password)) {
                $userData['password'] = $password;
            }
        }
        
        // Handle profile picture update
        $file = $this->request->getFile('profile_picture');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old profile picture if exists
            if (!empty($user['profile_picture']) && file_exists(ROOTPATH . 'public/uploads/profiles/' . $user['profile_picture'])) {
                unlink(ROOTPATH . 'public/uploads/profiles/' . $user['profile_picture']);
            }
            
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/profiles/', $newName);
            $userData['profile_picture'] = $newName;
        }
        
        // Log data untuk debugging
        log_message('debug', 'Updating user #' . $id . ' with data: ' . json_encode($userData));
        
        // Set validation untuk dilewati karena sudah divalidasi manual
        $this->userModel->skipValidation(true);
        
        // Update user dengan mencoba metode lain jika gagal
        try {
            if ($this->userModel->update($id, $userData)) {
                log_message('info', 'User #' . $id . ' updated successfully');
                return redirect()->to('/admin/users')->with('success', 'Data pengguna berhasil diperbarui');
            } else {
                // Log error dari model
                log_message('error', 'Failed to update user #' . $id . '. Errors: ' . json_encode($this->userModel->errors()));
                
                // Coba update dengan metode lain
                $builder = $this->db->table('users');
                $builder->where('id', $id);
                $updateResult = $builder->update($userData);
                
                if ($updateResult) {
                    log_message('info', 'User #' . $id . ' updated successfully using query builder');
                    return redirect()->to('/admin/users')->with('success', 'Data pengguna berhasil diperbarui');
                }
                
                log_message('error', 'All update methods failed for user #' . $id . '. DB Error: ' . json_encode($this->db->error()));
                return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data pengguna. Silakan coba lagi.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Exception updating user #' . $id . ': ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    // User activities
    public function userActivities($userId)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $user = $this->userModel->find($userId);
        
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Pengguna tidak ditemukan');
        }
        
        $activities = $this->activityModel->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
            
        $data = [
            'title' => 'Aktivitas Pengguna',
            'page_title' => 'Aktivitas Pengguna: ' . $user['full_name'],
            'user' => $user,
            'activities' => $activities,
            'pager' => $this->activityModel->pager,
        ];
        
        return view('admin/users/activities', $data);
    }
    
    // Delete user (soft delete or permanent)
    public function deleteUser($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Pengguna tidak ditemukan');
        }
        
        // Prevent deleting your own account
        if ($id == session('user_id')) {
            return redirect()->to('/admin/users')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri');
        }
        
        $deletionType = $this->request->getPost('deletion_type');
        
        if ($deletionType === 'permanent') {
            // Check if user has test results and other related data
            $hasTestResults = $this->db->table('test_results')->where('user_id', $id)->countAllResults() > 0;
            
            if ($hasTestResults) {
                return redirect()->to('/admin/users')->with('error', 'Tidak dapat menghapus secara permanen karena pengguna memiliki data hasil tes');
            }
            
            // Delete profile picture if exists
            if (!empty($user['profile_picture']) && file_exists(ROOTPATH . 'public/uploads/profiles/' . $user['profile_picture'])) {
                unlink(ROOTPATH . 'public/uploads/profiles/' . $user['profile_picture']);
            }
            
            // Delete user permanently
            $this->userModel->delete($id, true);
            return redirect()->to('/admin/users')->with('success', 'Pengguna berhasil dihapus secara permanen');
        } else {
            // Soft delete - just deactivate the account
            $this->userModel->update($id, ['is_active' => 0]);
            return redirect()->to('/admin/users')->with('success', 'Akun pengguna berhasil dinonaktifkan');
        }
    }
    
    // Adjust test credits
    public function adjustCredits($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Pengguna tidak ditemukan');
        }
        
        $action = $this->request->getPost('action');
        $amount = (int)$this->request->getPost('amount');
        
        if ($amount <= 0) {
            return redirect()->back()->with('error', 'Jumlah kredit harus lebih dari 0');
        }
        
        $currentCredits = (int)$user['test_credits'];
        $newCredits = $currentCredits;
        
        if ($action === 'add') {
            $newCredits = $currentCredits + $amount;
        } elseif ($action === 'subtract') {
            if ($currentCredits < $amount) {
                return redirect()->back()->with('error', 'Kredit tidak cukup untuk dikurangi');
            }
            $newCredits = $currentCredits - $amount;
        } elseif ($action === 'set') {
            $newCredits = $amount;
        }
        
        if ($this->userModel->update($id, ['test_credits' => $newCredits])) {
            // Log this activity
            $this->activityModel->insert([
                'user_id' => $id,
                'activity_type' => 'credit_adjustment',
                'activity_description' => "Test credits $action by admin: from $currentCredits to $newCredits",
            ]);
            
            return redirect()->to('/admin/users')->with('success', "Kredit tes berhasil diperbarui: $newCredits");
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui kredit tes');
        }
    }
    
    // Toggle user status (activate/deactivate)
    public function toggleStatus($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Pengguna tidak ditemukan');
        }
        
        // Prevent deactivating your own account
        if ($id == session('user_id')) {
            return redirect()->to('/admin/users')->with('error', 'Anda tidak dapat menonaktifkan akun Anda sendiri');
        }
        
        $newStatus = $user['is_active'] ? 0 : 1;
        $statusText = $newStatus ? 'diaktifkan' : 'dinonaktifkan';
        
        if ($this->userModel->update($id, ['is_active' => $newStatus])) {
            return redirect()->to('/admin/users')->with('success', "Akun pengguna berhasil $statusText");
        } else {
            return redirect()->back()->with('error', 'Gagal mengubah status akun');
        }
    }
    
    // Reset user password
    public function resetPassword($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $user = $this->userModel->find($id);
        
        if (!$user) {
            return redirect()->to('/admin/users')->with('error', 'Pengguna tidak ditemukan');
        }
        
        $newPassword = $this->request->getPost('new_password');
        
        if (empty($newPassword) || strlen($newPassword) < 6) {
            return redirect()->back()->with('error', 'Password baru harus memiliki minimal 6 karakter');
        }
        
        if ($this->userModel->update($id, ['password' => $newPassword])) {
            // Log this activity
            $this->activityModel->insert([
                'user_id' => $id,
                'activity_type' => 'password_reset',
                'activity_description' => "Password reset by admin",
            ]);
            
            return redirect()->to('/admin/users')->with('success', 'Password pengguna berhasil direset');
        } else {
            return redirect()->back()->with('error', 'Gagal mereset password');
        }
    }
    
    // Get CSRF token for AJAX calls
    public function getCsrfToken()
    {
        // Hanya izinkan jika ini adalah request AJAX
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403)->setBody('Direct access not allowed');
        }
        
        return $this->response->setJSON([
            'token_name' => csrf_token(),
            'token_hash' => csrf_hash()
        ]);
    }
    
    // ======= QUESTION MANAGEMENT =======
    
    // List all questions
    public function questions()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $type = $this->request->getGet('type') ?? 'all';
        $category = $this->request->getGet('category') ?? '';
        $search = $this->request->getGet('search') ?? '';
        $status = $this->request->getGet('status') ?? 'all';
        
        $questionModel = new \App\Models\QuestionModel();
        
        // Apply filters
        if ($type !== 'all') {
            $questionModel->where('type', $type);
        }
        
        if (!empty($category)) {
            $questionModel->where('category', $category);
        }
        
        if ($status !== 'all') {
            $questionModel->where('is_active', $status === 'active' ? 1 : 0);
        }
        
        if (!empty($search)) {
            $questionModel->like('question_text', $search);
        }
        
        $questions = $questionModel->orderBy('type', 'ASC')
                           ->orderBy('category', 'ASC')
                           ->orderBy('order_number', 'ASC')
                           ->paginate(20);
        
        // Check if questions are used in answers
        $usedQuestions = [];
        if (!empty($questions)) {
            $questionIds = array_column($questions, 'id');
            
            $answerModel = new \App\Models\TestAnswerModel();
            $usedQuestionsData = $answerModel->select('question_id')
                                           ->whereIn('question_id', $questionIds)
                                           ->groupBy('question_id')
                                           ->findAll();
            
            $usedQuestions = array_column($usedQuestionsData, 'question_id');
        }
        
        $data = [
            'title' => 'Manajemen Pertanyaan',
            'page_title' => 'Manajemen Pertanyaan',
            'questions' => $questions,
            'pager' => $questionModel->pager,
            'usedQuestions' => $usedQuestions,
            'filters' => [
                'type' => $type,
                'category' => $category,
                'search' => $search,
                'status' => $status
            ]
        ];
        
        return view('admin/questions/index', $data);
    }
    
    // Create new question form
    public function createQuestion()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $data = [
            'title' => 'Tambah Pertanyaan Baru',
            'page_title' => 'Tambah Pertanyaan Baru',
            'validation' => \Config\Services::validation()
        ];
        
        return view('admin/questions/create', $data);
    }
    
    // Store new question
    public function storeQuestion()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        // Validate input
        $rules = [
            'question_text' => 'required|min_length[5]',
            'type' => 'required|in_list[riasec,mbti]',
            'category' => 'required',
            'order_number' => 'required|integer|greater_than[0]',
        ];
        
        // MBTI questions need direction
        if ($this->request->getPost('type') === 'mbti') {
            $rules['mbti_direction'] = 'required|in_list[E,I,S,N,T,F,J,P]';
        }
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Check for duplicate question order
        $questionModel = new \App\Models\QuestionModel();
        $existingQuestion = $questionModel->where('type', $this->request->getPost('type'))
                                        ->where('order_number', $this->request->getPost('order_number'))
                                        ->first();
        
        if ($existingQuestion) {
            return redirect()->back()->withInput()->with('error', 'Pertanyaan dengan urutan tersebut sudah ada');
        }
        
        // Prepare question data
        $questionData = [
            'question_text' => $this->request->getPost('question_text'),
            'type' => $this->request->getPost('type'),
            'category' => $this->request->getPost('category'),
            'order_number' => $this->request->getPost('order_number'),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ];
        
        // Add MBTI direction if needed
        if ($this->request->getPost('type') === 'mbti') {
            $questionData['mbti_direction'] = $this->request->getPost('mbti_direction');
        }
        
        // Insert question
        if ($questionModel->insert($questionData)) {
            return redirect()->to('/admin/questions')->with('success', 'Pertanyaan baru berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan pertanyaan. Silakan coba lagi.');
        }
    }
    
    // Edit question form
    public function editQuestion($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $questionModel = new \App\Models\QuestionModel();
        $question = $questionModel->find($id);
        
        if (!$question) {
            return redirect()->to('/admin/questions')->with('error', 'Pertanyaan tidak ditemukan');
        }
        
        $data = [
            'title' => 'Edit Pertanyaan',
            'page_title' => 'Edit Pertanyaan',
            'question' => $question,
            'validation' => \Config\Services::validation()
        ];
        
        return view('admin/questions/edit', $data);
    }
    
    // Update question
    public function updateQuestion($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $questionModel = new \App\Models\QuestionModel();
        $question = $questionModel->find($id);
        
        if (!$question) {
            return redirect()->to('/admin/questions')->with('error', 'Pertanyaan tidak ditemukan');
        }
        
        // Validate input
        $rules = [
            'question_text' => 'required|min_length[5]',
            'category' => 'required',
            'order_number' => 'required|integer|greater_than[0]',
        ];
        
        // MBTI questions need direction
        if ($question['type'] === 'mbti') {
            $rules['mbti_direction'] = 'required|in_list[E,I,S,N,T,F,J,P]';
        }
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Check for duplicate question order (excluding this question)
        $existingQuestion = $questionModel->where('type', $question['type'])
                                        ->where('order_number', $this->request->getPost('order_number'))
                                        ->where('id !=', $id)
                                        ->first();
        
        if ($existingQuestion) {
            return redirect()->back()->withInput()->with('error', 'Pertanyaan dengan urutan tersebut sudah ada');
        }
        
        // Prepare question data
        $questionData = [
            'question_text' => $this->request->getPost('question_text'),
            'category' => $this->request->getPost('category'),
            'order_number' => $this->request->getPost('order_number'),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ];
        
        // Add MBTI direction if needed
        if ($question['type'] === 'mbti') {
            $questionData['mbti_direction'] = $this->request->getPost('mbti_direction');
        }
        
        // Update question
        if ($questionModel->update($id, $questionData)) {
            return redirect()->to('/admin/questions')->with('success', 'Pertanyaan berhasil diperbarui');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui pertanyaan. Silakan coba lagi.');
        }
    }
    
    // Delete question
    public function deleteQuestion($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $questionModel = new \App\Models\QuestionModel();
        $question = $questionModel->find($id);
        
        if (!$question) {
            return redirect()->to('/admin/questions')->with('error', 'Pertanyaan tidak ditemukan');
        }
        
        // Check if question is used in any answers
        $answerModel = new \App\Models\TestAnswerModel();
        $usedInAnswers = $answerModel->where('question_id', $id)->countAllResults() > 0;
        
        if ($usedInAnswers) {
            return redirect()->to('/admin/questions')->with('error', 'Pertanyaan tidak dapat dihapus karena sudah digunakan dalam jawaban tes');
        }
        
        // Delete question
        if ($questionModel->delete($id)) {
            return redirect()->to('/admin/questions')->with('success', 'Pertanyaan berhasil dihapus');
        } else {
            return redirect()->to('/admin/questions')->with('error', 'Gagal menghapus pertanyaan');
        }
    }
    
    // Preview questions
    public function previewQuestions()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $type = $this->request->getGet('type') ?? 'riasec';
        
        $questionModel = new \App\Models\QuestionModel();
        $questions = $questionModel->where('type', $type)
                                 ->where('is_active', 1)
                                 ->orderBy('order_number', 'ASC')
                                 ->findAll();
        
        $data = [
            'title' => 'Preview Pertanyaan',
            'page_title' => 'Preview Pertanyaan ' . strtoupper($type),
            'questions' => $questions,
            'type' => $type
        ];
        
        return view('admin/questions/preview', $data);
    }
    
    // Toggle question status
    public function toggleQuestionStatus($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $questionModel = new \App\Models\QuestionModel();
        $question = $questionModel->find($id);
        
        if (!$question) {
            return redirect()->to('/admin/questions')->with('error', 'Pertanyaan tidak ditemukan');
        }
        
        $newStatus = $question['is_active'] ? 0 : 1;
        $statusText = $newStatus ? 'diaktifkan' : 'dinonaktifkan';
        
        if ($questionModel->update($id, ['is_active' => $newStatus])) {
            return redirect()->to('/admin/questions')->with('success', "Pertanyaan berhasil $statusText");
        } else {
            return redirect()->to('/admin/questions')->with('error', 'Gagal mengubah status pertanyaan');
        }
    }

    // PERSONALITY TYPE MANAGEMENT

    // List all personality types
    public function personalityTypes()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');
        $page = $this->request->getGet('page') ?? 1;
        
        $builder = $this->personalityModel->builder();
        
        // Apply filters
        if (!empty($search)) {
            $builder->groupStart()
                ->like('personality_name', $search)
                ->orLike('riasec_code', $search)
                ->orLike('mbti_code', $search)
                ->groupEnd();
        }
        
        if ($status !== null && $status !== '') {
            $builder->where('is_active', $status);
        }
        
        // Pagination
        $perPage = 10;
        $totalTypes = $builder->countAllResults(false);
        $types = $builder->orderBy('riasec_code', 'ASC')
            ->orderBy('mbti_code', 'ASC')
            ->limit($perPage, ($page - 1) * $perPage)
            ->get()->getResultArray();
        
        $pager = \Config\Services::pager();
        $pager_links = $pager->makeLinks($page, $perPage, $totalTypes, 'default_full');
        
        // Get usage statistics (count of test results per personality type)
        // Tabel test_results menggunakan kolom personality_type, bukan personality_type_id
        $usageStats = [];
        
        foreach ($types as $type) {
            // Hitung berapa kali tipe kepribadian ini muncul di test_results
            $combinedCode = $type['riasec_code'] . $type['mbti_code']; // Format yang digunakan di test_results
            $count = $this->db->table('test_results')
                ->where('personality_type', $combinedCode)
                ->countAllResults();
                
            $usageStats[$type['id']] = $count;
        }
        
        $data = [
            'title' => 'Manajemen Tipe Kepribadian',
            'page_title' => 'Manajemen Tipe Kepribadian',
            'types' => $types,
            'pager' => $pager_links,
            'total' => $totalTypes,
            'search' => $search,
            'status' => $status,
            'current_page' => $page,
            'usage_stats' => $usageStats,
        ];
        
        return view('admin/personality_types/index', $data);
    }

    // Create new personality type form
    public function createPersonalityType()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        // Get majors for recommendation mapping
        $majors = $this->majorModel->findAll();
        
        $data = [
            'title' => 'Tambah Tipe Kepribadian Baru',
            'page_title' => 'Tambah Tipe Kepribadian Baru',
            'validation' => \Config\Services::validation(),
            'majors' => $majors,
        ];
        
        return view('admin/personality_types/create', $data);
    }

    // Store new personality type
    public function storePersonalityType()
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        // Validate input
        $rules = [
            'riasec_code' => 'required|min_length[1]|max_length[10]',
            'mbti_code' => 'required|min_length[1]|max_length[10]',
            'personality_name' => 'required|min_length[3]|max_length[100]',
            'personality_description' => 'required',
            'introvert_extrovert' => 'required|in_list[I,E]',
            'is_active' => 'required|in_list[0,1]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Prepare strengths and development areas as arrays
        $strengths = $this->request->getPost('strengths') ? explode("\n", $this->request->getPost('strengths')) : [];
        $strengths = array_map('trim', $strengths);
        $strengths = array_filter($strengths, function($value) { return $value !== ''; });
        
        $development_areas = $this->request->getPost('development_areas') ? explode("\n", $this->request->getPost('development_areas')) : [];
        $development_areas = array_map('trim', $development_areas);
        $development_areas = array_filter($development_areas, function($value) { return $value !== ''; });
        
        // Prepare personality type data
        $typeData = [
            'riasec_code' => $this->request->getPost('riasec_code'),
            'mbti_code' => $this->request->getPost('mbti_code'),
            'personality_name' => $this->request->getPost('personality_name'),
            'personality_description' => $this->request->getPost('personality_description'),
            'strengths' => $strengths,
            'development_areas' => $development_areas,
            'introvert_extrovert' => $this->request->getPost('introvert_extrovert'),
            'is_active' => $this->request->getPost('is_active'),
        ];
        
        // Insert personality type
        $typeId = $this->personalityModel->insert($typeData);
        
        if ($typeId) {
            // Handle major recommendations
            $majorRecommendations = $this->request->getPost('major_recommendations');
            if (!empty($majorRecommendations)) {
                // Proses penyimpanan rekomendasi jurusan menggunakan model
                foreach ($majorRecommendations as $majorId) {
                    $this->mappingModel->insert([
                        'personality_type_id' => $typeId,
                        'major_id' => $majorId
                    ]);
                }
            }
            
            return redirect()->to('/admin/personality-types')->with('success', 'Tipe kepribadian baru berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan tipe kepribadian. Silakan coba lagi.');
        }
    }

    // Show personality type details
    public function showPersonalityType($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $type = $this->personalityModel->find($id);
        
        if (!$type) {
            return redirect()->to('/admin/personality-types')->with('error', 'Tipe kepribadian tidak ditemukan');
        }
        
        // Get statistics
        // Tabel test_results menggunakan kolom personality_type, bukan personality_type_id
        $combinedCode = $type['riasec_code'] . $type['mbti_code']; // Format yang digunakan di test_results
        $testCount = $this->db->table('test_results')
            ->where('personality_type', $combinedCode)
            ->countAllResults();
        
        // Get recommended majors for this personality type
        $recommendedMajors = $this->db->table('personality_major_mapping pm')
            ->select('m.id, m.name, m.description')
            ->join('majors m', 'pm.major_id = m.id')
            ->where('pm.personality_type_id', $id)
            ->get()->getResultArray();
        
        $data = [
            'title' => 'Detail Tipe Kepribadian',
            'page_title' => 'Detail Tipe Kepribadian',
            'type' => $type,
            'test_count' => $testCount,
            'recommended_majors' => $recommendedMajors,
        ];
        
        return view('admin/personality_types/show', $data);
    }

    // Edit personality type form
    public function editPersonalityType($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $type = $this->personalityModel->find($id);
        
        if (!$type) {
            return redirect()->to('/admin/personality-types')->with('error', 'Tipe kepribadian tidak ditemukan');
        }
        
        // Get all majors
        $majors = $this->majorModel->findAll();
        
        // Get currently recommended majors for this personality type
        $recommendedMajorIds = $this->mappingModel
            ->select('major_id')
            ->where('personality_type_id', $id)
            ->findAll();
        
        $selectedMajors = array_column($recommendedMajorIds, 'major_id');
        
        // Process strengths and development areas from JSON to string format for form
        $strengths = $this->personalityModel->getStrengthsArray($type);
        $developmentAreas = $this->personalityModel->getDevelopmentAreasArray($type);
        
        $strengthsText = implode("\n", $strengths);
        $developmentAreasText = implode("\n", $developmentAreas);
        
        $data = [
            'title' => 'Edit Tipe Kepribadian',
            'page_title' => 'Edit Tipe Kepribadian',
            'type' => $type,
            'strengths_text' => $strengthsText,
            'development_areas_text' => $developmentAreasText,
            'majors' => $majors,
            'selected_majors' => $selectedMajors,
            'validation' => \Config\Services::validation(),
        ];
        
        return view('admin/personality_types/edit', $data);
    }

    // Update personality type
    public function updatePersonalityType($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $type = $this->personalityModel->find($id);
        
        if (!$type) {
            return redirect()->to('/admin/personality-types')->with('error', 'Tipe kepribadian tidak ditemukan');
        }
        
        // Validate input
        $rules = [
            'riasec_code' => 'required|min_length[1]|max_length[10]',
            'mbti_code' => 'required|min_length[1]|max_length[10]',
            'personality_name' => 'required|min_length[3]|max_length[100]',
            'personality_description' => 'required',
            'introvert_extrovert' => 'required|in_list[I,E]',
            'is_active' => 'required|in_list[0,1]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Prepare strengths and development areas as arrays
        $strengths = $this->request->getPost('strengths') ? explode("\n", $this->request->getPost('strengths')) : [];
        $strengths = array_map('trim', $strengths);
        $strengths = array_filter($strengths, function($value) { return $value !== ''; });
        
        $development_areas = $this->request->getPost('development_areas') ? explode("\n", $this->request->getPost('development_areas')) : [];
        $development_areas = array_map('trim', $development_areas);
        $development_areas = array_filter($development_areas, function($value) { return $value !== ''; });
        
        // Prepare personality type data
        $typeData = [
            'riasec_code' => $this->request->getPost('riasec_code'),
            'mbti_code' => $this->request->getPost('mbti_code'),
            'personality_name' => $this->request->getPost('personality_name'),
            'personality_description' => $this->request->getPost('personality_description'),
            'strengths' => $strengths,
            'development_areas' => $development_areas,
            'introvert_extrovert' => $this->request->getPost('introvert_extrovert'),
            'is_active' => $this->request->getPost('is_active'),
        ];
        
        // Update personality type
        if ($this->personalityModel->update($id, $typeData)) {
            // Update major recommendations
            // First, delete existing mappings
            $this->mappingModel->where('personality_type_id', $id)->delete();
            
            // Then insert new mappings
            $majorRecommendations = $this->request->getPost('major_recommendations');
            if (!empty($majorRecommendations)) {
                foreach ($majorRecommendations as $majorId) {
                    $this->mappingModel->insert([
                        'personality_type_id' => $id,
                        'major_id' => $majorId
                    ]);
                }
            }
            
            return redirect()->to('/admin/personality-types')->with('success', 'Tipe kepribadian berhasil diperbarui');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui tipe kepribadian. Silakan coba lagi.');
        }
    }

    // Delete personality type
    public function deletePersonalityType($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        // Check if the personality type has dependencies (test results)
        // Get the personality type data first
        $type = $this->personalityModel->find($id);
        if (!$type) {
            return redirect()->to('/admin/personality-types')->with('error', 'Tipe kepribadian tidak ditemukan.');
        }
        
        $combinedCode = $type['riasec_code'] . $type['mbti_code']; // Format yang digunakan di test_results
        $testResultCount = $this->db->table('test_results')
            ->where('personality_type', $combinedCode)
            ->countAllResults();
        
        if ($testResultCount > 0) {
            return redirect()->to('/admin/personality-types')->with('error', 'Tidak dapat menghapus tipe kepribadian karena masih digunakan dalam hasil tes.');
        }
        
        // Delete major mappings first
        $this->mappingModel->where('personality_type_id', $id)->delete();
        
        // Then delete the personality type
        if ($this->personalityModel->delete($id)) {
            return redirect()->to('/admin/personality-types')->with('success', 'Tipe kepribadian berhasil dihapus');
        } else {
            return redirect()->to('/admin/personality-types')->with('error', 'Gagal menghapus tipe kepribadian');
        }
    }

    // Toggle personality type status (active/inactive)
    public function togglePersonalityTypeStatus($id)
    {
        if ($this->checkAdminAccess() !== true) return $this->checkAdminAccess();
        
        $type = $this->personalityModel->find($id);
        
        if (!$type) {
            return $this->response->setJSON(['success' => false, 'message' => 'Tipe kepribadian tidak ditemukan']);
        }
        
        $currentStatus = $type['is_active'];
        $newStatus = $currentStatus ? 0 : 1;
        
        if ($this->personalityModel->update($id, ['is_active' => $newStatus])) {
            $statusText = $newStatus ? 'diaktifkan' : 'dinonaktifkan';
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Tipe kepribadian berhasil ' . $statusText,
                'new_status' => $newStatus
            ]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal mengubah status tipe kepribadian']);
        }
    }
} 