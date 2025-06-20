<?php

namespace App\Libraries;

use App\Models\PersonalityTypeModel;

class PersonalityAnalyzer
{
    protected $personalityTypeModel;

    public function __construct()
    {
        $this->personalityTypeModel = new PersonalityTypeModel();
    }

    public function determinePersonalityType($scores)
    {
        // Get top RIASEC score
        $riasecScores = $scores['riasec'];
        arsort($riasecScores);
        $topRiasec = array_keys($riasecScores)[0];

        // Determine MBTI type
        $mbtiScores = $scores['mbti'];
        $mbtiType = '';
        
        $mbtiType .= $mbtiScores['E'] > $mbtiScores['I'] ? 'E' : 'I';
        $mbtiType .= $mbtiScores['S'] > $mbtiScores['N'] ? 'S' : 'N';
        $mbtiType .= $mbtiScores['T'] > $mbtiScores['F'] ? 'T' : 'F';
        $mbtiType .= $mbtiScores['J'] > $mbtiScores['P'] ? 'J' : 'P';

        return $topRiasec . '-' . $mbtiType;
    }

    public function getPersonalityProfile($personalityType)
    {
        $parts = explode('-', $personalityType);
        $riasecCode = $parts[0];
        $mbtiCode = $parts[1] ?? '';

        // Get from database
        $profile = $this->personalityTypeModel->getByRiasecMbti($riasecCode, $mbtiCode);
        
        if ($profile) {
            return [
                'name' => $profile['personality_name'],
                'description' => $profile['personality_description'],
                'strengths' => $profile['strengths'],
                'development_areas' => $profile['development_areas'],
                'introvert_extrovert' => $profile['introvert_extrovert']
            ];
        }

        // Fallback
        return [
            'name' => 'Kepribadian Unik',
            'description' => 'Anda memiliki kombinasi kepribadian yang unik dengan berbagai minat dan kemampuan.',
            'strengths' => ['Fleksibilitas dalam berbagai situasi', 'Kemampuan adaptasi yang baik'],
            'development_areas' => ['Fokus pada area spesialisasi', 'Pengembangan skill spesifik'],
            'introvert_extrovert' => 'Seimbang'
        ];
    }
}