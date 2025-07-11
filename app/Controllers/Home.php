<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        $isLoggedIn = session()->get('isLoggedIn');
        $userData = [];
        
        // Get user data if logged in
        if ($isLoggedIn) {
            $userId = session()->get('user_id');
            if ($userId) {
                $userModel = new UserModel();
                $userData = $userModel->find($userId);
                
                // Add session data
                $userData['profile_picture'] = session()->get('profile_picture');
                $userData['full_name'] = session()->get('full_name');
            }
        }
        
        $data = [
            'title' => 'Analisis Jurusan - Temukan Jurusan yang Tepat Untukmu',
            'meta_description' => 'Temukan jurusan kuliah yang tepat dengan tes analisis kepribadian komprehensif. Dapatkan rekomendasi jurusan berdasarkan minat dan bakat Anda.',
            'is_logged_in' => $isLoggedIn,
            'user' => $userData
        ];

        return view('landing/index', $data);
    }
}