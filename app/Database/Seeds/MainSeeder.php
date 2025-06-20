<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $this->call('PersonalityTypeSeeder');
        $this->call('MajorSeeder');
        $this->call('QuestionSeeder'); // Update questions
    }
}