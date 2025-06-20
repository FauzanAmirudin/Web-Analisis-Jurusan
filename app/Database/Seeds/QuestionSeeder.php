<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Clear existing questions
        $this->db->table('questions')->truncate();

        $questions = [
            // RIASEC Questions (36 questions)
            // Realistic (R) - 6 questions
            ['question_text' => 'Saya suka memperbaiki mesin atau kendaraan', 'category' => 'R', 'type' => 'riasec', 'order_number' => 1],
            ['question_text' => 'Saya tertarik bekerja di luar ruangan', 'category' => 'R', 'type' => 'riasec', 'order_number' => 2],
            ['question_text' => 'Saya suka menggunakan alat atau mesin', 'category' => 'R', 'type' => 'riasec', 'order_number' => 3],
            ['question_text' => 'Saya nyaman melakukan aktivitas fisik', 'category' => 'R', 'type' => 'riasec', 'order_number' => 4],
            ['question_text' => 'Saya lebih suka praktik daripada teori', 'category' => 'R', 'type' => 'riasec', 'order_number' => 5],
            ['question_text' => 'Saya suka bekerja dengan tangan', 'category' => 'R', 'type' => 'riasec', 'order_number' => 6],

            // Investigative (I) - 6 questions
            ['question_text' => 'Saya tertarik pada sains dan eksperimen', 'category' => 'I', 'type' => 'riasec', 'order_number' => 7],
            ['question_text' => 'Saya suka memecahkan masalah logis', 'category' => 'I', 'type' => 'riasec', 'order_number' => 8],
            ['question_text' => 'Saya menikmati membaca buku pengetahuan', 'category' => 'I', 'type' => 'riasec', 'order_number' => 9],
            ['question_text' => 'Saya tertarik pada penelitian', 'category' => 'I', 'type' => 'riasec', 'order_number' => 10],
            ['question_text' => 'Saya suka menganalisis data', 'category' => 'I', 'type' => 'riasec', 'order_number' => 11],
            ['question_text' => 'Saya ingin tahu cara kerja sesuatu', 'category' => 'I', 'type' => 'riasec', 'order_number' => 12],

            // Artistic (A) - 6 questions
            ['question_text' => 'Saya suka menggambar, melukis, atau mendesain', 'category' => 'A', 'type' => 'riasec', 'order_number' => 13],
            ['question_text' => 'Saya menikmati musik, teater, atau menulis', 'category' => 'A', 'type' => 'riasec', 'order_number' => 14],
            ['question_text' => 'Saya lebih suka kebebasan ekspresi daripada aturan', 'category' => 'A', 'type' => 'riasec', 'order_number' => 15],
            ['question_text' => 'Saya punya ide-ide kreatif', 'category' => 'A', 'type' => 'riasec', 'order_number' => 16],
            ['question_text' => 'Saya tertarik dengan dunia seni dan budaya', 'category' => 'A', 'type' => 'riasec', 'order_number' => 17],
            ['question_text' => 'Saya suka menciptakan sesuatu yang unik', 'category' => 'A', 'type' => 'riasec', 'order_number' => 18],

            // Social (S) - 6 questions
            ['question_text' => 'Saya suka membantu orang lain', 'category' => 'S', 'type' => 'riasec', 'order_number' => 19],
            ['question_text' => 'Saya tertarik jadi guru, konselor, atau tenaga medis', 'category' => 'S', 'type' => 'riasec', 'order_number' => 20],
            ['question_text' => 'Saya nyaman bekerja dalam tim', 'category' => 'S', 'type' => 'riasec', 'order_number' => 21],
            ['question_text' => 'Saya senang memberi nasihat', 'category' => 'S', 'type' => 'riasec', 'order_number' => 22],
            ['question_text' => 'Saya ingin membuat perubahan sosial', 'category' => 'S', 'type' => 'riasec', 'order_number' => 23],
            ['question_text' => 'Saya mudah berempati pada orang lain', 'category' => 'S', 'type' => 'riasec', 'order_number' => 24],

            // Enterprising (E) - 6 questions
            ['question_text' => 'Saya suka memimpin sebuah tim atau proyek', 'category' => 'E', 'type' => 'riasec', 'order_number' => 25],
            ['question_text' => 'Saya nyaman berbicara di depan umum', 'category' => 'E', 'type' => 'riasec', 'order_number' => 26],
            ['question_text' => 'Saya tertarik dengan dunia bisnis', 'category' => 'E', 'type' => 'riasec', 'order_number' => 27],
            ['question_text' => 'Saya senang mengambil risiko', 'category' => 'E', 'type' => 'riasec', 'order_number' => 28],
            ['question_text' => 'Saya suka mempengaruhi atau meyakinkan orang', 'category' => 'E', 'type' => 'riasec', 'order_number' => 29],
            ['question_text' => 'Saya suka mengatur dan mengelola orang', 'category' => 'E', 'type' => 'riasec', 'order_number' => 30],

            // Conventional (C) - 6 questions
            ['question_text' => 'Saya suka bekerja dengan angka atau data', 'category' => 'C', 'type' => 'riasec', 'order_number' => 31],
            ['question_text' => 'Saya menikmati membuat laporan atau arsip', 'category' => 'C', 'type' => 'riasec', 'order_number' => 32],
            ['question_text' => 'Saya suka pekerjaan yang terorganisir', 'category' => 'C', 'type' => 'riasec', 'order_number' => 33],
            ['question_text' => 'Saya patuh pada aturan dan struktur', 'category' => 'C', 'type' => 'riasec', 'order_number' => 34],
            ['question_text' => 'Saya nyaman mengisi spreadsheet dan dokumen', 'category' => 'C', 'type' => 'riasec', 'order_number' => 35],
            ['question_text' => 'Saya tertarik pada sistem dan prosedur kerja', 'category' => 'C', 'type' => 'riasec', 'order_number' => 36],

            // MBTI Questions (16 questions)
            // Extraversion vs Introversion
            ['question_text' => 'Saya merasa bersemangat saat berada di keramaian atau banyak orang', 'category' => 'EI', 'type' => 'mbti', 'order_number' => 37, 'mbti_direction' => 'E'],
            ['question_text' => 'Saya lebih nyaman saat sendirian atau dalam kelompok kecil', 'category' => 'EI', 'type' => 'mbti', 'order_number' => 38, 'mbti_direction' => 'I'],
            ['question_text' => 'Saya cenderung berpikir keras setelah berbicara dengan banyak orang', 'category' => 'EI', 'type' => 'mbti', 'order_number' => 39, 'mbti_direction' => 'I'],
            ['question_text' => 'Saya mendapatkan energi dari interaksi sosial', 'category' => 'EI', 'type' => 'mbti', 'order_number' => 40, 'mbti_direction' => 'E'],

            // Sensing vs Intuition
            ['question_text' => 'Saya lebih suka fakta dan detail konkret daripada teori', 'category' => 'SN', 'type' => 'mbti', 'order_number' => 41, 'mbti_direction' => 'S'],
            ['question_text' => 'Saya lebih tertarik pada ide, konsep, dan kemungkinan baru', 'category' => 'SN', 'type' => 'mbti', 'order_number' => 42, 'mbti_direction' => 'N'],
            ['question_text' => 'Saya mengandalkan pengalaman nyata daripada intuisi', 'category' => 'SN', 'type' => 'mbti', 'order_number' => 43, 'mbti_direction' => 'S'],
            ['question_text' => 'Saya suka membayangkan masa depan dan kemungkinan yang belum ada', 'category' => 'SN', 'type' => 'mbti', 'order_number' => 44, 'mbti_direction' => 'N'],

            // Thinking vs Feeling
            ['question_text' => 'Saya membuat keputusan berdasarkan logika dan objektivitas', 'category' => 'TF', 'type' => 'mbti', 'order_number' => 45, 'mbti_direction' => 'T'],
            ['question_text' => 'Saya mempertimbangkan perasaan orang lain dalam pengambilan keputusan', 'category' => 'TF', 'type' => 'mbti', 'order_number' => 46, 'mbti_direction' => 'F'],
            ['question_text' => 'Saya lebih suka keadilan daripada belas kasihan', 'category' => 'TF', 'type' => 'mbti', 'order_number' => 47, 'mbti_direction' => 'T'],
            ['question_text' => 'Saya percaya pentingnya empati dalam hubungan', 'category' => 'TF', 'type' => 'mbti', 'order_number' => 48, 'mbti_direction' => 'F'],

            // Judging vs Perceiving
            ['question_text' => 'Saya suka perencanaan dan memiliki jadwal tetap', 'category' => 'JP', 'type' => 'mbti', 'order_number' => 49, 'mbti_direction' => 'J'],
            ['question_text' => 'Saya lebih suka fleksibilitas dan spontanitas', 'category' => 'JP', 'type' => 'mbti', 'order_number' => 50, 'mbti_direction' => 'P'],
            ['question_text' => 'Saya merasa nyaman saat semuanya terorganisir', 'category' => 'JP', 'type' => 'mbti', 'order_number' => 51, 'mbti_direction' => 'J'],
            ['question_text' => 'Saya sering menunda keputusan agar bisa menyesuaikan keadaan', 'category' => 'JP', 'type' => 'mbti', 'order_number' => 52, 'mbti_direction' => 'P']
        ];

        foreach ($questions as $question) {
            $this->db->table('questions')->insert($question);
        }
    }
}