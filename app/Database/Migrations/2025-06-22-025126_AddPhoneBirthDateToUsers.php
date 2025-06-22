<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhoneBirthDateToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'phone_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
                'after'      => 'profile_picture'
            ],
            'birth_date' => [
                'type'       => 'DATE',
                'null'       => true,
                'after'      => 'phone_number'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'phone_number');
        $this->forge->dropColumn('users', 'birth_date');
    }
}
