<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username', 'email', 'password', 'full_name', 
        'profile_picture', 'is_active', 'last_login_at',
        'phone_number', 'birth_date'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'username'     => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
        'email'        => 'required|valid_email|is_unique[users.email]',
        'password'     => 'required|min_length[6]',
        'full_name'    => 'required|min_length[2]|max_length[100]',
        'phone_number' => 'permit_empty|min_length[10]|max_length[20]',
        'birth_date'   => 'permit_empty|valid_date'
    ];

    protected $validationMessages = [
        'username' => [
            'required'    => 'Username harus diisi',
            'min_length'  => 'Username minimal 3 karakter',
            'max_length'  => 'Username maksimal 50 karakter',
            'is_unique'   => 'Username sudah digunakan'
        ],
        'email' => [
            'required'    => 'Email harus diisi',
            'valid_email' => 'Format email tidak valid',
            'is_unique'   => 'Email sudah terdaftar'
        ],
        'password' => [
            'required'    => 'Password harus diisi',
            'min_length'  => 'Password minimal 6 karakter'
        ],
        'full_name' => [
            'required'    => 'Nama lengkap harus diisi',
            'min_length'  => 'Nama lengkap minimal 2 karakter',
            'max_length'  => 'Nama lengkap maksimal 100 karakter'
        ],
        'phone_number' => [
            'min_length'  => 'Nomor telepon minimal 10 digit',
            'max_length'  => 'Nomor telepon maksimal 20 digit'
        ],
        'birth_date' => [
            'valid_date'  => 'Format tanggal lahir tidak valid'
        ]
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $beforeUpdate   = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $plainPassword = $data['data']['password'];
            $data['data']['password'] = password_hash($plainPassword, PASSWORD_DEFAULT);
            
            // Debug log
            log_message('debug', 'Password hashed in UserModel::hashPassword');
            
            // Verify the hash works immediately
            $newHash = $data['data']['password'];
            if (!password_verify($plainPassword, $newHash)) {
                log_message('error', 'Password hash verification failed in UserModel::hashPassword');
            } else {
                log_message('debug', 'Password hash verified in UserModel::hashPassword');
            }
        }
        return $data;
    }

    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function findByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function verifyPassword($password, $hash)
    {
        $result = password_verify($password, $hash);
        log_message('debug', 'Password verification result: ' . ($result ? 'success' : 'failed'));
        return $result;
    }

    public function updateLastLogin($userId)
    {
        return $this->update($userId, ['last_login_at' => date('Y-m-d H:i:s')]);
    }
}