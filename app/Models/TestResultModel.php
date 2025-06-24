<?php

namespace App\Models;

use CodeIgniter\Model;

class TestResultModel extends Model
{
    protected $table            = 'test_results';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'session_id', 'user_id', 'personality_type', 'personality_name',
        'personality_description', 'strengths', 'development_areas',
        'recommended_majors'
    ];

    protected bool $allowEmptyInserts = false;
    protected $useTimestamps = false;

    public function saveResult($data)
    {
        // Handle JSON encoding
        if (isset($data['recommended_majors']) && is_array($data['recommended_majors'])) {
            $data['recommended_majors'] = json_encode($data['recommended_majors']);
        }
        if (isset($data['strengths']) && is_array($data['strengths'])) {
            $data['strengths'] = json_encode($data['strengths']);
        }
        if (isset($data['development_areas']) && is_array($data['development_areas'])) {
            $data['development_areas'] = json_encode($data['development_areas']);
        }
        
        return $this->insert($data);
    }

    public function getResultBySession($sessionId)
    {
        $result = $this->where('session_id', $sessionId)->first();
        
        if ($result) {
            // Decode JSON fields
            if (isset($result['recommended_majors']) && is_string($result['recommended_majors'])) {
                $result['recommended_majors'] = json_decode($result['recommended_majors'], true) ?: [];
            }
            if (isset($result['strengths']) && is_string($result['strengths'])) {
                $result['strengths'] = json_decode($result['strengths'], true) ?: [];
            }
            if (isset($result['development_areas']) && is_string($result['development_areas'])) {
                $result['development_areas'] = json_decode($result['development_areas'], true) ?: [];
            }
        }
        
        return $result;
    }

    public function getUserResults($userId, $limit = 10)
    {
        $results = $this->where('user_id', $userId)
                       ->orderBy('created_at', 'DESC')
                       ->limit($limit)
                       ->findAll();

        foreach ($results as &$result) {
            // Decode JSON fields
            if (isset($result['recommended_majors']) && is_string($result['recommended_majors'])) {
                $result['recommended_majors'] = json_decode($result['recommended_majors'], true) ?: [];
            }
            if (isset($result['strengths']) && is_string($result['strengths'])) {
                $result['strengths'] = json_decode($result['strengths'], true) ?: [];
            }
            if (isset($result['development_areas']) && is_string($result['development_areas'])) {
                $result['development_areas'] = json_decode($result['development_areas'], true) ?: [];
            }
        }

        return $results;
    }

    public function getResultById($id)
    {
        $result = $this->find($id);
        
        if ($result) {
            // Decode JSON fields
            if (isset($result['recommended_majors']) && is_string($result['recommended_majors'])) {
                $result['recommended_majors'] = json_decode($result['recommended_majors'], true) ?: [];
            }
            if (isset($result['strengths']) && is_string($result['strengths'])) {
                $result['strengths'] = json_decode($result['strengths'], true) ?: [];
            }
            if (isset($result['development_areas']) && is_string($result['development_areas'])) {
                $result['development_areas'] = json_decode($result['development_areas'], true) ?: [];
            }
        }
        
        return $result;
    }
}