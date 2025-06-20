<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateMajorsTable extends Migration
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
                'null'       => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'full_description' => [
                'type' => 'TEXT',
            ],
            'core_subjects' => [
                'type' => 'TEXT',
            ],
            'degree_types' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'study_duration' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'career_prospects' => [
                'type' => 'TEXT',
            ],
            'industry_sectors' => [
                'type' => 'TEXT',
            ],
            'future_trends' => [
                'type' => 'TEXT',
            ],
            'compatibility_reason' => [
                'type' => 'TEXT',
            ],
            'riasec_match' => [
                'type'       => 'VARCHAR',
                'constraint' => 1,
            ],
            'mbti_match' => [
                'type'       => 'VARCHAR',
                'constraint' => 4,
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
        $this->forge->createTable('majors');
    }

    public function down()
    {
        $this->forge->dropTable('majors');
    }
}