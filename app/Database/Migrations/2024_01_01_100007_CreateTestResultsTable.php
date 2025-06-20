<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTestResultsTable extends Migration
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
            'session_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'personality_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
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
            'recommended_majors' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('test_results');
    }

    public function down()
    {
        $this->forge->dropTable('test_results');
    }
}