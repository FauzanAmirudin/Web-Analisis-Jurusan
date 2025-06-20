<?php

namespace App\Models;

use CodeIgniter\Model;

class MajorModel extends Model
{
    protected $table            = 'majors';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'personality_type_id', 'name', 'description', 'full_description', 'core_subjects',
        'degree_types', 'study_duration', 'career_prospects',
        'industry_sectors', 'future_trends', 'compatibility_reason', 'riasec_match',
        'mbti_match', 'is_active'
    ];

    protected bool $allowEmptyInserts = false;
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getRecommendedMajors($personalityType)
    {
        $parts = explode('-', $personalityType);
        $riasecCode = $parts[0];
        $mbtiCode = $parts[1] ?? '';

        // Get exact matches first
        $exactMatches = $this->where('riasec_match', $riasecCode)
                            ->where('mbti_match', $mbtiCode)
                            ->where('is_active', 1)
                            ->findAll();

        if (!empty($exactMatches)) {
            foreach ($exactMatches as &$major) {
                $major['compatibility'] = 10;
                $major['compatibility_level'] = 'Sangat Cocok';
            }
            return array_slice($exactMatches, 0, 5);
        }

        // Fallback to RIASEC matches
        $riasecMatches = $this->where('riasec_match', $riasecCode)
                             ->where('is_active', 1)
                             ->findAll();

        foreach ($riasecMatches as &$major) {
            $major['compatibility'] = 7;
            $major['compatibility_level'] = 'Cocok';
        }

        return array_slice($riasecMatches, 0, 5);
    }

    public function getMajorById($id)
    {
        return $this->where('id', $id)
                   ->where('is_active', 1)
                   ->first();
    }

    public function getAllActiveMajors()
    {
        return $this->where('is_active', 1)
                   ->orderBy('name', 'ASC')
                   ->findAll();
    }
}