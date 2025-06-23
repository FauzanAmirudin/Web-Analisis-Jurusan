<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'user', // Default role is 'user', admin will be 'admin'
                'after'      => 'is_active'
            ],
        ]);
        
        // Create an admin user
        $db = \Config\Database::connect();
        $db->table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'full_name' => 'Administrator',
            'is_active' => 1,
            'role' => 'admin',
            'test_credits' => 999, // Give admin unlimited test credits
        ]);
    }

    public function down()
    {
        // Remove admin user first
        $db = \Config\Database::connect();
        $db->table('users')->where('username', 'admin')->delete();
        
        // Then drop the column
        $this->forge->dropColumn('users', 'role');
    }
} 