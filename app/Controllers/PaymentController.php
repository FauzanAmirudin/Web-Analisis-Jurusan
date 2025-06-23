<?php

namespace App\Controllers;

use App\Models\UserModel;

class PaymentController extends BaseController
{
    protected $userModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    public function index()
    {
        // Get current user data
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);
        
        $data = [
            'title' => 'Beli Kredit Tes',
            'user' => $user
        ];
        
        return view('payment/index', $data);
    }
    
    public function processPayment()
    {
        // This would typically handle real payment processing
        // For now, redirect to simulate method
        return redirect()->to('payment/simulate');
    }
    
    public function simulatePayment()
    {
        // Get current user data
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);
        
        if ($user) {
            // Add 1 credit to the user's account
            $this->userModel->update($userId, [
                'test_credits' => $user['test_credits'] + 1
            ]);
            
            // Set success message
            session()->setFlashdata('success', 'Berhasil menambahkan 1 kredit tes.');
        }
        
        return redirect()->to('/dashboard');
    }
} 