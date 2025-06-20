<?php

namespace App\Models;

use CodeIgniter\Model;

class TestSessionModel extends Model
{
    protected $table            = 'test_sessions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 'session_token', 'status', 'current_step',
        'riasec_scores', 'mbti_scores', 'personality_type', 'completed_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function createSession($userId)
    {
        $sessionToken = bin2hex(random_bytes(32));
        
        $data = [
            'user_id' => $userId,
            'session_token' => $sessionToken,
            'status' => 'in_progress',
            'current_step' => 1
        ];

        $this->insert($data);
        return $sessionToken;
    }

    public function getSessionByToken($token)
    {
        return $this->where('session_token', $token)->first();
    }

    public function updateProgress($sessionId, $step, $scores = null)
    {
        $data = ['current_step' => $step];
        
        if ($scores) {
            if (isset($scores['riasec'])) {
                $data['riasec_scores'] = json_encode($scores['riasec']);
            }
            if (isset($scores['mbti'])) {
                $data['mbti_scores'] = json_encode($scores['mbti']);
            }
        }

        return $this->update($sessionId, $data);
    }

    public function completeSession($sessionId, $personalityType)
    {
        return $this->update($sessionId, [
            'status' => 'completed',
            'personality_type' => $personalityType,
            'completed_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function getUserSessions($userId, $limit = 10)
    {
        return $this->where('user_id', $userId)
                   ->orderBy('created_at', 'DESC')
                   ->limit($limit)
                   ->findAll();
    }

    public function getCompletedSessions($userId)
    {
        return $this->where('user_id', $userId)
                   ->where('status', 'completed')
                   ->orderBy('completed_at', 'DESC')
                   ->findAll();
    }

    // Helper methods untuk decode JSON
    public function getRiasecScores($session)
    {
        if (isset($session['riasec_scores']) && is_string($session['riasec_scores'])) {
            return json_decode($session['riasec_scores'], true) ?: [];
        }
        return $session['riasec_scores'] ?: [];
    }

    public function getMbtiScores($session)
    {
        if (isset($session['mbti_scores']) && is_string($session['mbti_scores'])) {
            return json_decode($session['mbti_scores'], true) ?: [];
        }
        return $session['mbti_scores'] ?: [];
    }
}