<?php

namespace App\Models;

use CodeIgniter\Model;

class UserActivityModel extends Model
{
    protected $table            = 'user_activities';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 'activity_type', 'activity_description',
        'ip_address', 'user_agent'
    ];

    protected bool $allowEmptyInserts = false;
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUserActivities($userId, $limit = 50)
    {
        return $this->where('user_id', $userId)
                   ->orderBy('created_at', 'DESC')
                   ->limit($limit)
                   ->findAll();
    }

    public function getRecentLogins($userId, $days = 30)
    {
        $date = date('Y-m-d H:i:s', strtotime("-$days days"));
        
        return $this->where('user_id', $userId)
                   ->where('activity_type', 'login')
                   ->where('created_at >=', $date)
                   ->orderBy('created_at', 'DESC')
                   ->findAll();
    }
}