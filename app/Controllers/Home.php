<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Analisis Jurusan - Temukan Jurusan yang Tepat Untukmu',
            'meta_description' => 'Temukan jurusan kuliah yang tepat dengan tes analisis kepribadian komprehensif. Dapatkan rekomendasi jurusan berdasarkan minat dan bakat Anda.'
        ];

        return view('landing/index', $data);
    }
}