<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreatePersonalityTypesTable extends Migration
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
            'riasec_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 1,
            ],
            'mbti_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 4,
            ],
            'personality_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'personality_description' => [
                'type' => 'TEXT',
            ],
            'strengths' => [
                'type' => 'TEXT',
            ],
            'development_areas' => [
                'type' => 'TEXT',
            ],
            'introvert_extrovert' => [
                'type'       => 'ENUM',
                'constraint' => ['Introvert', 'Ekstrovert'],
            ],
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('personality_types');
    }

    public function down()
    {
        $this->forge->dropTable('personality_types');
    }
}