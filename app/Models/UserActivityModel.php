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
    protected $useTimestamps = false;

    public function insert($data = null, bool $returnID = true)
    {
        if (is_array($data) && !isset($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }
        
        if (is_array($data)) {
            if (!isset($data['ip_address']) && function_exists('service')) {
                $request = service('request');
                if ($request) {
                    $data['ip_address'] = $request->getIPAddress();
                    $data['user_agent'] = $request->getUserAgent()->__toString();
                }
            }
        }
        
        return parent::insert($data, $returnID);
    }

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