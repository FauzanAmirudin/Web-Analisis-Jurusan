<?php

namespace App\Models;

use CodeIgniter\Model;

class TestAnswerModel extends Model
{
    protected $table            = 'test_answers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'session_id', 'question_id', 'answer'
    ];

    protected bool $allowEmptyInserts = false;
    protected $useTimestamps = false;

    public function saveAnswer($sessionId, $questionId, $answer)
    {
        $existingAnswer = $this->where('session_id', $sessionId)
                              ->where('question_id', $questionId)
                              ->first();

        $data = [
            'session_id' => $sessionId,
            'question_id' => $questionId,
            'answer' => $answer
        ];

        if ($existingAnswer) {
            return $this->update($existingAnswer['id'], $data);
        } else {
            return $this->insert($data);
        }
    }

    public function getSessionAnswers($sessionId)
    {
        return $this->select('test_answers.*, questions.category, questions.type, questions.mbti_direction')
                   ->join('questions', 'questions.id = test_answers.question_id')
                   ->where('session_id', $sessionId)
                   ->findAll();
    }

    public function calculateScores($sessionId)
    {
        $answers = $this->getSessionAnswers($sessionId);
        
        $riasecScores = ['R' => 0, 'I' => 0, 'A' => 0, 'S' => 0, 'E' => 0, 'C' => 0];
        $mbtiScores = ['E' => 0, 'I' => 0, 'S' => 0, 'N' => 0, 'T' => 0, 'F' => 0, 'J' => 0, 'P' => 0];

        foreach ($answers as $answer) {
            if ($answer['type'] == 'riasec' && $answer['answer'] == 1) {
                $riasecScores[$answer['category']]++;
            } elseif ($answer['type'] == 'mbti' && isset($answer['mbti_direction'])) {
                if ($answer['answer'] == 1) {
                    // Setuju dengan pernyataan
                    $mbtiScores[$answer['mbti_direction']]++;
                } else {
                    // Tidak setuju dengan pernyataan
                    $opposite = $this->getOppositeDirection($answer['mbti_direction']);
                    $mbtiScores[$opposite]++;
                }
            }
        }

        return [
            'riasec' => $riasecScores,
            'mbti' => $mbtiScores
        ];
    }

    private function getOppositeDirection($direction)
    {
        $opposites = [
            'E' => 'I', 'I' => 'E',
            'S' => 'N', 'N' => 'S',
            'T' => 'F', 'F' => 'T',
            'J' => 'P', 'P' => 'J'
        ];
        
        return $opposites[$direction] ?? $direction;
    }
}