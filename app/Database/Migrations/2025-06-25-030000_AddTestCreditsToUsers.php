<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTestCreditsToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'test_credits' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1, // Give one free test credit to start
                'after'      => 'is_active'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'test_credits');
    }
} 