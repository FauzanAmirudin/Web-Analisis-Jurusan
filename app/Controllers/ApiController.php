<?php

namespace App\Controllers;

use App\Models\TestSessionModel;
use App\Models\TestAnswerModel;

class ApiController extends BaseController
{
    protected $testSessionModel;
    protected $testAnswerModel;

    public function __construct()
    {
        $this->testSessionModel = new TestSessionModel();
        $this->testAnswerModel = new TestAnswerModel();
    }

    public function saveProgress()
    {
        $sessionToken = $this->request->getPost('session_token');
        $answers = $this->request->getPost('answers');

        $session = $this->testSessionModel->getSessionByToken($sessionToken);
        
        if (!$session || $session['user_id'] != session()->get('user_id')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Sesi tidak valid']);
        }

        // Auto-save answers
        if ($answers) {
            foreach ($answers as $questionId => $answer) {
                $this->testAnswerModel->saveAnswer($session['id'], $questionId, $answer);
            }
        }

        return $this->response->setJSON(['success' => true, 'message' => 'Progress tersimpan']);
    }

    public function getProgress($sessionToken)
    {
        $session = $this->testSessionModel->getSessionByToken($sessionToken);
        
        if (!$session || $session['user_id'] != session()->get('user_id')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Sesi tidak valid']);
        }

        $answers = $this->testAnswerModel->getSessionAnswers($session['id']);
        
        return $this->response->setJSON([
            'success' => true,
            'session' => $session,
            'answers' => $answers
        ]);
    }
}