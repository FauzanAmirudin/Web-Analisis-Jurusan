<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePersonalityMajorMapping extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'personality_type_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'major_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'match_percentage' => [
                'type'       => 'INT',
                'constraint' => 3,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('personality_type_id', 'personality_types', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('major_id', 'majors', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('personality_major_mapping');
    }

    public function down()
    {
        $this->forge->dropTable('personality_major_mapping');
    }
} 