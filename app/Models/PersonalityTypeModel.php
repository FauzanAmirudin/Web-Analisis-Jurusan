<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonalityTypeModel extends Model
{
    protected $table            = 'personality_types';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'riasec_code', 'mbti_code', 'personality_name', 'personality_description',
        'strengths', 'development_areas', 'introvert_extrovert', 'is_active'
    ];

    protected bool $allowEmptyInserts = false;
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Hapus $casts karena kita akan handle JSON secara manual
    // atau gunakan TEXT field di database

    public function getByRiasecMbti($riasecCode, $mbtiCode)
    {
        return $this->where('riasec_code', $riasecCode)
                   ->where('mbti_code', $mbtiCode)
                   ->where('is_active', 1)
                   ->first();
    }

    public function getAllActiveTypes()
    {
        return $this->where('is_active', 1)
                   ->orderBy('riasec_code', 'ASC')
                   ->orderBy('mbti_code', 'ASC')
                   ->findAll();
    }

    // Helper methods untuk handle JSON data
    public function getStrengthsArray($data)
    {
        if (is_string($data['strengths'])) {
            return json_decode($data['strengths'], true) ?: [];
        }
        return $data['strengths'] ?: [];
    }

    public function getDevelopmentAreasArray($data)
    {
        if (is_string($data['development_areas'])) {
            return json_decode($data['development_areas'], true) ?: [];
        }
        return $data['development_areas'] ?: [];
    }

    // Override insert method untuk handle JSON
    public function insert($data = null, bool $returnID = true)
    {
        if (isset($data['strengths']) && is_array($data['strengths'])) {
            $data['strengths'] = json_encode($data['strengths']);
        }
        if (isset($data['development_areas']) && is_array($data['development_areas'])) {
            $data['development_areas'] = json_encode($data['development_areas']);
        }
        
        return parent::insert($data, $returnID);
    }

    // Override update method untuk handle JSON
    public function update($id = null, $data = null): bool
    {
        if (isset($data['strengths']) && is_array($data['strengths'])) {
            $data['strengths'] = json_encode($data['strengths']);
        }
        if (isset($data['development_areas']) && is_array($data['development_areas'])) {
            $data['development_areas'] = json_encode($data['development_areas']);
        }
        
        return parent::update($id, $data);
    }
}