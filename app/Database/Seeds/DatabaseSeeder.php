<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('QuestionSeeder');
        $this->call('PersonalityTypeSeeder');
        $this->call('MajorSeeder');
    }
}