<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMatchPercentageToMapping extends Migration
{
    public function up()
    {
        // Tambahkan kolom match_percentage ke tabel personality_major_mapping
        $this->forge->addColumn('personality_major_mapping', [
            'match_percentage' => [
                'type'       => 'INT',
                'constraint' => 3,
                'unsigned'   => true,
                'default'    => 0,
                'after'      => 'major_id'
            ]
        ]);
    }

    public function down()
    {
        // Hapus kolom match_percentage dari tabel personality_major_mapping
        $this->forge->dropColumn('personality_major_mapping', 'match_percentage');
    }
} 