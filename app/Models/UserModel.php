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
        'profile_picture', 'is_active', 'last_login_at'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'username'  => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
        'email'     => 'required|valid_email|is_unique[users.email]',
        'password'  => 'required|min_length[6]',
        'full_name' => 'required|min_length[2]|max_length[100]'
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
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
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
        return password_verify($password, $hash);
    }

    public function updateLastLogin($userId)
    {
        return $this->update($userId, ['last_login_at' => date('Y-m-d H:i:s')]);
    }
}