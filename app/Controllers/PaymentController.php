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
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);
        
        $data = [
            'title' => 'Beli Kredit Tes - Analisis Jurusan',
            'user' => $user
        ];
        
        return view('payment/index', $data);
    }
    
    public function processPayment()
    {
        $userId = session()->get('user_id');
        $paymentMethod = $this->request->getPost('payment_method');
        $amount = (int)$this->request->getPost('amount');
        
        // In a real application, you would integrate with a payment gateway here
        // For now, we'll just simulate a successful payment
        
        // Add credits to user account
        $this->userModel->addTestCredits($userId, $amount);
        
        // Redirect back to dashboard with success message
        return redirect()->to('/dashboard')->with('success', "Berhasil membeli $amount kredit tes baru!");
    }
    
    // This is a temporary method for demonstration purposes
    // In a real application, you would integrate with a payment gateway
    public function simulatePayment()
    {
        $userId = session()->get('user_id');
        
        // Add 1 credit to user account
        $this->userModel->addTestCredits($userId, 1);
        
        // Redirect back to dashboard with success message
        return redirect()->to('/dashboard')->with('success', "Berhasil membeli 1 kredit tes baru!");
    }
} 