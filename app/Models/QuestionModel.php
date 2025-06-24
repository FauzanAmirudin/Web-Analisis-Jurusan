<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table            = 'questions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'question_text', 'category', 'type', 'order_number', 'mbti_direction', 'is_active'
    ];

    protected bool $allowEmptyInserts = false;
    protected $useTimestamps = false;

    public function getRiasecQuestions()
    {
        return $this->where('type', 'riasec')
                   ->where('is_active', 1)
                   ->orderBy('order_number', 'ASC')
                   ->findAll();
    }

    public function getMbtiQuestions()
    {
        return $this->where('type', 'mbti')
                   ->where('is_active', 1)
                   ->orderBy('order_number', 'ASC')
                   ->findAll();
    }

    public function getQuestionsByRange($type, $startOrder, $endOrder)
    {
        return $this->where('type', $type)
                   ->where('order_number >=', $startOrder)
                   ->where('order_number <=', $endOrder)
                   ->where('is_active', 1)
                   ->orderBy('order_number', 'ASC')
                   ->findAll();
    }

    public function getTotalQuestions($type)
    {
        return $this->where('type', $type)
                   ->where('is_active', 1)
                   ->countAllResults();
    }
}