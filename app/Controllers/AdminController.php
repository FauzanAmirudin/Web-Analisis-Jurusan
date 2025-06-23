<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserActivityModel;

class AdminController extends BaseController
{
    protected $userModel;
    protected $activityModel;
    protected $db;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->activityModel = new UserActivityModel();
        $this->db = \Config\Database::connect();
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
} 