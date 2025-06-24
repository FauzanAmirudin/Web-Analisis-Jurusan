<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUpdatedAtToPersonalityTypes extends Migration
{
    public function up()
    {
        $this->forge->addColumn('personality_types', [
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'created_at'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('personality_types', 'updated_at');
    }
} 