<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserActivityModel;

class AuthController extends BaseController
{
    protected $userModel;
    protected $activityModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->activityModel = new UserActivityModel();
    }

    public function login()
    {
        if (session()->get('user_id')) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Login - Analisis Jurusan'
        ];

        return view('auth/login', $data);
    }

    public function processLogin()
    {
        $rules = [
            'login' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('remember');

        // Debug login attempt
        log_message('debug', 'Login attempt for: ' . $login);

        // Check if login is email or username
        $user = filter_var($login, FILTER_VALIDATE_EMAIL) 
            ? $this->userModel->findByEmail($login)
            : $this->userModel->findByUsername($login);

        if (!$user) {
            log_message('debug', 'Login failed: User not found');
            return redirect()->back()->withInput()->with('error', 'Email/Username atau password salah');
        }

        // Debug password verification
        log_message('debug', 'Verifying password for user ID: ' . $user['id']);
        
        if (!$this->userModel->verifyPassword($password, $user['password'])) {
            log_message('debug', 'Login failed: Password verification failed');
            return redirect()->back()->withInput()->with('error', 'Email/Username atau password salah');
        }

        if (!$user['is_active']) {
            log_message('debug', 'Login failed: Account not active');
            return redirect()->back()->withInput()->with('error', 'Akun Anda tidak aktif');
        }

        // Set session
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'full_name' => $user['full_name'],
            'profile_picture' => $user['profile_picture'],
            'phone_number' => $user['phone_number'],
            'birth_date' => $user['birth_date'],
            'role' => $user['role'] ?? 'user',
            'isLoggedIn' => true
        ]);

        log_message('debug', 'Login successful for user ID: ' . $user['id']);

        // Set remember me cookie
        if ($remember) {
            $token = bin2hex(random_bytes(32));
            // In production, save this token to database
            setcookie('remember_token', $token, time() + (86400 * 30), '/'); // 30 days
        }

        // Log activity
        $this->logActivity($user['id'], 'login', 'User logged in');

        // Update last login
        $this->userModel->updateLastLogin($user['id']);

        return redirect()->to('/dashboard')->with('success', 'Selamat datang, ' . $user['full_name']);
    }

    public function register()
    {
        if (session()->get('user_id')) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Daftar - Analisis Jurusan'
        ];

        return view('auth/register', $data);
    }

    public function processRegister()
    {
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]',
            'full_name' => 'required|min_length[2]|max_length[100]',
            'phone_number' => 'required|min_length[10]|max_length[20]',
            'birth_date' => 'required|valid_date'
        ];

        // Clear any previous error messages
        session()->remove('errors');
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()
                             ->with('error', 'Terdapat kesalahan pada data yang dimasukkan')
                             ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'full_name' => $this->request->getPost('full_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'birth_date' => $this->request->getPost('birth_date')
        ];

        try {
            if ($this->userModel->insert($data)) {
                return redirect()->to('/auth/login')
                                ->with('success', 'Registrasi berhasil! Silakan login.');
            } else {
                return redirect()->back()->withInput()
                                ->with('error', 'Registrasi gagal. Silakan coba lagi.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Registration error: ' . $e->getMessage());
            return redirect()->back()->withInput()
                            ->with('error', 'Terjadi kesalahan. Silakan coba lagi atau hubungi administrator.');
        }
    }

    public function logout()
    {
        $userId = session()->get('user_id');
        
        if ($userId) {
            $this->logActivity($userId, 'logout', 'User logged out');
        }

        session()->destroy();
        setcookie('remember_token', '', time() - 3600, '/');

        return redirect()->to('/')->with('success', 'Anda telah berhasil logout');
    }

    public function forgotPassword()
    {
        $data = [
            'title' => 'Lupa Password - Analisis Jurusan'
        ];

        return view('auth/forgot_password', $data);
    }

    public function processForgotPassword()
    {
        $rules = [
            'email' => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $user = $this->userModel->findByEmail($email);

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }

        // Generate reset token
        $token = bin2hex(random_bytes(32));
        
        // Save to password_reset table (implement this)
        // Send email with reset link (implement this)

        return redirect()->back()->with('success', 'Link reset password telah dikirim ke email Anda');
    }

    private function logActivity($userId, $type, $description)
    {
        try {
            $this->activityModel->insert([
                'user_id' => $userId,
                'activity_type' => $type,
                'activity_description' => $description,
                'ip_address' => $this->request->getIPAddress(),
                'user_agent' => $this->request->getUserAgent()->getAgentString()
            ]);
        } catch (\Exception $e) {
            // Log error but don't break the flow
            log_message('error', 'Failed to log user activity: ' . $e->getMessage());
        }
    }
}