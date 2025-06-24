<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddUpdatedAtToMajors extends Migration
{
    public function up()
    {
        $this->forge->addColumn('majors', [
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);

        // Update existing rows to have updated_at value same as created_at
        $this->db->query('UPDATE majors SET updated_at = created_at');
    }

    public function down()
    {
        $this->forge->dropColumn('majors', 'updated_at');
    }
}
