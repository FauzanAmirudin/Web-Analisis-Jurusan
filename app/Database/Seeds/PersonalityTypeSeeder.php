<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PersonalityTypeSeeder extends Seeder
{
    public function run()
    {
        $personalityTypes = [
            // Realistic combinations
            [
                'riasec_code' => 'R',
                'mbti_code' => 'ISTP',
                'personality_name' => 'Realistis Praktis',
                'personality_description' => 'ISTP adalah individu yang logis, praktis, suka memecahkan masalah dengan tangan, dan mandiri. Mereka sangat cocok dengan tipe Realistis yang menghargai pekerjaan konkret dan membutuhkan keterampilan fisik. Kombinasi ini menghasilkan seseorang yang cekatan, efisien, dan senang bereksperimen dengan objek atau sistem fisik. Cenderung belajar dengan melakukan (hands-on) dan mencari solusi yang paling efektif.',
                'strengths' => json_encode([
                    'Pemecahan masalah praktis yang excellent',
                    'Keterampilan teknis yang kuat',
                    'Kemampuan bekerja mandiri',
                    'Efisiensi dalam eksekusi',
                    'Adaptabilitas tinggi'
                ]),
                'development_areas' => json_encode([
                    'Komunikasi interpersonal',
                    'Perencanaan jangka panjang',
                    'Presentasi dan networking'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],
            [
                'riasec_code' => 'R',
                'mbti_code' => 'ISFP',
                'personality_name' => 'Realistis Kreatif',
                'personality_description' => 'ISFP adalah Individu yang peka, artistik, praktis, dan suka kebebasan berekspresi. Ketika dipadukan dengan Realistis, mereka cenderung mengekspresikan kreativitas melalui media fisik atau pekerjaan yang menghasilkan sesuatu yang tangible. Suka kebebasan dalam pekerjaan dan menghargai lingkungan yang estetis.',
                'strengths' => json_encode([
                    'Kreativitas dalam medium konkret',
                    'Kepekaan estetika tinggi',
                    'Keterampilan manual yang baik',
                    'Kemampuan menciptakan produk unik',
                    'Fleksibilitas dalam bekerja'
                ]),
                'development_areas' => json_encode([
                    'Manajemen waktu',
                    'Komunikasi dalam tim',
                    'Orientasi bisnis'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],
            [
                'riasec_code' => 'R',
                'mbti_code' => 'ESTP',
                'personality_name' => 'Realistis Dinamis',
                'personality_description' => 'ESTP adalah pribadi yang energik, spontan, suka bertindak, dan berorientasi pada hasil. Pribadi praktis, berani mengambil risiko, dan menikmati tantangan fisik. Kombinasi ini sangat kuat untuk pekerjaan yang membutuhkan interaksi langsung dengan lingkungan fisik dan pemecahan masalah cepat di lapangan.',
                'strengths' => json_encode([
                    'Energi tinggi dan dinamis',
                    'Kemampuan beradaptasi cepat',
                    'Pemecahan masalah di lapangan',
                    'Kepemimpinan operasional',
                    'Orientasi hasil yang kuat'
                ]),
                'development_areas' => json_encode([
                    'Perencanaan strategis',
                    'Kesabaran dalam detail',
                    'Konsistensi jangka panjang'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ],
            [
                'riasec_code' => 'R',
                'mbti_code' => 'ESTJ',
                'personality_name' => 'Realistis Terstruktur',
                'personality_description' => 'ESTJ adalah pribadi yang teratur, logis, efisien, dan berorientasi pada implementasi. suka memimpin dan memastikan segala sesuatu berjalan sesuai aturan dan prosedur. Individu yang sangat efektif dalam mengelola proyek-proyek praktis yang membutuhkan struktur dan ketepatan.',
                'strengths' => json_encode([
                    'Kepemimpinan proyek yang kuat',
                    'Organisasi dan struktur excellent',
                    'Implementasi yang efisien',
                    'Orientasi pada standar kualitas',
                    'Manajemen tim yang efektif'
                ]),
                'development_areas' => json_encode([
                    'Fleksibilitas dalam perubahan',
                    'Kreativitas dan inovasi',
                    'Empati interpersonal'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ],

            // Investigative combinations
            [
                'riasec_code' => 'I',
                'mbti_code' => 'INTP',
                'personality_name' => 'Pemikir Analitis',
                'personality_description' => 'Individu yang cenderung introvert, logis, analitis, inovatif, dan senang dengan ide-ide abstrak. Pemikir yang mandiri dan berorientasi pada pemecahan masalah. Sangat cocok dengan sifat Investigatif yang menghargai pekerjaan intelektual dan ilmiah. Pemikir yang mendalam, seringkali lebih suka bekerja secara mandiri atau dalam lingkungan yang memungkinkan mereka menjelajahi teori dan konsep.',
                'strengths' => json_encode([
                    'Pemikiran analitis yang mendalam',
                    'Kemampuan problem solving kompleks',
                    'Inovasi dan kreativitas konseptual',
                    'Kemandirian dalam penelitian',
                    'Logika dan reasoning yang kuat'
                ]),
                'development_areas' => json_encode([
                    'Komunikasi interpersonal',
                    'Manajemen waktu dan deadline',
                    'Networking dan kolaborasi'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],
            [
                'riasec_code' => 'I',
                'mbti_code' => 'INTJ',
                'personality_name' => 'Arsitek Sistem',
                'personality_description' => 'Pemikir strategis, visioner, logis, dan sangat mandiri. Memiliki kemampuan merancang sistem yang kompleks dan fokus pada pencapaian tujuan jangka panjang. Sangat ideal untuk penelitian dan pengembangan yang membutuhkan perencanaan matang dan analisis mendalam.',
                'strengths' => json_encode([
                    'Visi strategis jangka panjang',
                    'Perencanaan sistematis',
                    'Kemampuan teknis tinggi',
                    'Fokus pada efisiensi',
                    'Inovasi berkelanjutan'
                ]),
                'development_areas' => json_encode([
                    'Fleksibilitas dalam pendekatan',
                    'Kolaborasi tim',
                    'Komunikasi emosional'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],
            [
                'riasec_code' => 'I',
                'mbti_code' => 'ISTJ',
                'personality_name' => 'Peneliti Sistematis',
                'personality_description' => 'ISTJ adalah pribadi yang teratur, logis, teliti, dan bertanggung jawab. Sangat mengandalkan fakta dan detail. Juga individu yang cermat dalam pengumpulan dan analisis data, serta sangat cocok untuk penelitian yang membutuhkan ketepatan dan kepatuhan pada metodologi.',
                'strengths' => json_encode([
                    'Ketelitian dalam analisis data',
                    'Metodologi penelitian yang kuat',
                    'Konsistensi dan keandalan',
                    'Organisasi data yang excellent',
                    'Kepatuhan pada standar ilmiah'
                ]),
                'development_areas' => json_encode([
                    'Fleksibilitas metodologi',
                    'Inovasi pendekatan',
                    'Komunikasi hasil penelitian'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],
            [
                'riasec_code' => 'I',
                'mbti_code' => 'INFP',
                'personality_name' => 'Peneliti Humanis',
                'personality_description' => 'Individu yang idealis, kreatif, berempati, dan mencari makna. Ketika digabungkan dengan Investigatif, mungkin tertarik pada penelitian di bidang humaniora atau ilmu sosial yang memungkinkan mereka memahami kompleksitas manusia atau isu-isu sosial secara mendalam.',
                'strengths' => json_encode([
                    'Empati dan insight mendalam',
                    'Pendekatan holistik dalam penelitian',
                    'Kreativitas dalam metodologi',
                    'Kepedulian pada isu sosial',
                    'Kemampuan sintesis informasi'
                ]),
                'development_areas' => json_encode([
                    'Objektivitas dalam analisis',
                    'Manajemen proyek penelitian',
                    'Komunikasi hasil secara teknis'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],

            // Artistic combinations
            [
                'riasec_code' => 'A',
                'mbti_code' => 'INFP',
                'personality_name' => 'Kreator Idealis',
                'personality_description' => 'Kreatif, idealis, peka, dan suka berekspresi melalui seni, mencari makna. Memiliki jiwa kreatif dengan nilai-nilai yang kuat dan kemampuan ekspresi yang mendalam.',
                'strengths' => json_encode([
                    'Kreativitas dan originalitas tinggi',
                    'Ekspresi autentik dan mendalam',
                    'Nilai-nilai yang kuat dalam karya',
                    'Empati dan sensitivitas',
                    'Kemampuan storytelling'
                ]),
                'development_areas' => json_encode([
                    'Manajemen waktu dan deadline',
                    'Aspek komersial seni',
                    'Networking dalam industri kreatif'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],
            [
                'riasec_code' => 'A',
                'mbti_code' => 'ENFP',
                'personality_name' => 'Inspirator Kreatif',
                'personality_description' => 'Ekstrovert yang antusias, imajinatif, kreatif, dan sangat peduli terhadap orang lain. Suka menjalin koneksi dan menginspirasi. Individu yang sangat ekspresif, inovatif, dan mampu mengkomunikasikan ide-ide artistik mereka dengan semangat.',
                'strengths' => json_encode([
                    'Kemampuan inspirasi dan motivasi',
                    'Networking dan kolaborasi kreatif',
                    'Inovasi dalam ekspresi seni',
                    'Energi dan antusiasme tinggi',
                    'Kemampuan storytelling yang kuat'
                ]),
                'development_areas' => json_encode([
                    'Fokus dan konsistensi',
                    'Manajemen proyek kreatif',
                    'Detail eksekusi'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ],
            [
                'riasec_code' => 'A',
                'mbti_code' => 'ISFP',
                'personality_name' => 'Seniman Sensitif',
                'personality_description' => 'Individu yang peka, artistik, praktis, dan suka kebebasan berekspresi. Sangat selaras dengan lingkungan fisik dan memiliki apresiasi estetika yang kuat. Tipe kepribadian ini cocok untuk bidang seni yang membutuhkan keterampilan manual dan ekspresi visual.',
                'strengths' => json_encode([
                    'Kepekaan estetika yang tinggi',
                    'Keterampilan manual dalam seni',
                    'Ekspresi visual yang kuat',
                    'Fleksibilitas kreatif',
                    'Kemampuan menciptakan karya personal'
                ]),
                'development_areas' => json_encode([
                    'Promosi diri dan karya',
                    'Aspek bisnis seni',
                    'Komunikasi dengan klien'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],
            [
                'riasec_code' => 'A',
                'mbti_code' => 'ENFJ',
                'personality_name' => 'Pendidik Kreatif',
                'personality_description' => 'Pribadi yang karismatik, inspiratif, berempati, dan suka memotivasi orang lain. Komunikator yang hebat dan pemimpin alami yang berorientasi pada nilai. Tipe kepribadian ini cocok untuk peran artistik yang melibatkan pengajaran, kepemimpinan tim kreatif, atau menginspirasi audiens.',
                'strengths' => json_encode([
                    'Kepemimpinan dalam tim kreatif',
                    'Kemampuan mengajar dan menginspirasi',
                    'Komunikasi yang excellent',
                    'Empati dan motivasi',
                    'Visi kreatif yang kuat'
                ]),
                'development_areas' => json_encode([
                    'Manajemen stress',
                    'Delegasi tugas kreatif',
                    'Work-life balance'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ],

            // Social combinations
            [
                'riasec_code' => 'S',
                'mbti_code' => 'INFJ',
                'personality_name' => 'Konselor Visioner',
                'personality_description' => 'Individu yang idealis, visioner, berempati, dan memiliki keinginan kuat untuk membantu orang lain serta membuat perbedaan. seringkali memiliki pemahaman mendalam tentang manusia dan masyarakat. Tipe kepribadian ini sangat cocok untuk pekerjaan yang melibatkan bimbingan, konseling, atau advokasi untuk perubahan sosial.',
                'strengths' => json_encode([
                    'Empati dan insight mendalam',
                    'Visi untuk perubahan sosial',
                    'Kemampuan konseling yang kuat',
                    'Pemahaman kompleksitas manusia',
                    'Inspirasi dan motivasi'
                ]),
                'development_areas' => json_encode([
                    'Self-care dan boundaries',
                    'Manajemen beban emosional',
                    'Praktikalitas dalam implementasi'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],
            [
                'riasec_code' => 'S',
                'mbti_code' => 'ISFJ',
                'personality_name' => 'Perawat Dedikasi',
                'personality_description' => 'Pribadi yang teliti, bertanggung jawab, setia, dan sangat peduli terhadap kebutuhan orang lain. Pendukung yang hebat dan suka membantu secara praktis. Tipe kepribadian ini sangat sesuai untuk peran pelayanan yang membutuhkan perhatian terhadap detail dan kepedulian tulus terhadap individu.',
                'strengths' => json_encode([
                    'Dedikasi dan loyalitas tinggi',
                    'Perhatian detail dalam pelayanan',
                    'Kepedulian tulus pada orang lain',
                    'Keandalan dan konsistensi',
                    'Kemampuan menciptakan lingkungan aman'
                ]),
                'development_areas' => json_encode([
                    'Assertiveness dan komunikasi',
                    'Manajemen stress',
                    'Pengembangan karier'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],
            [
                'riasec_code' => 'S',
                'mbti_code' => 'ESFJ',
                'personality_name' => 'Pelayan Masyarakat',
                'personality_description' => 'Ekstrovert, hangat, praktis, kooperatif, dan berorientasi melayani orang lain. Suka berinteraksi dengan komunitas dan melihat dampak nyata dari pekerjaan mereka dalam meningkatkan kesejahteraan sosial.',
                'strengths' => json_encode([
                    'Kemampuan berinteraksi sosial',
                    'Orientasi pelayanan yang kuat',
                    'Koordinasi dan organisasi',
                    'Empati dan kehangatan',
                    'Kemampuan membangun harmoni'
                ]),
                'development_areas' => json_encode([
                    'Manajemen konflik',
                    'Pengambilan keputusan tegas',
                    'Fokus pada prioritas'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ],
            [
                'riasec_code' => 'S',
                'mbti_code' => 'ENFJ',
                'personality_name' => 'Pemimpin Sosial',
                'personality_description' => 'Pribadi yang karismatik, inspiratif, berempati, dan suka memotivasi orang lain. Memiliki kemampuan komunikasi yang luar biasa, empati, dan keinginan untuk membangun koneksi serta mempengaruhi orang lain secara positif.',
                'strengths' => json_encode([
                    'Kepemimpinan yang inspiratif',
                    'Komunikasi yang excellent',
                    'Kemampuan memotivasi tim',
                    'Visi untuk perubahan positif',
                    'Networking dan relationship building'
                ]),
                'development_areas' => json_encode([
                    'Delegasi dan trust',
                    'Manajemen ekspektasi',
                    'Personal boundaries'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ],

            // Enterprising combinations
            [
                'riasec_code' => 'E',
                'mbti_code' => 'ENTJ',
                'personality_name' => 'Eksekutif Strategis',
                'personality_description' => 'Pribadi yang ekstrovert, visioner, strategis, tegas, dan lahir sebagai pemimpin. Memiliki kemampuan kepemimpinan, pemikiran strategis, dan keinginan untuk mengelola serta mengembangkan organisasi. Mampu membuat keputusan cepat dan efektif.',
                'strengths' => json_encode([
                    'Kepemimpinan strategis yang kuat',
                    'Visi bisnis yang jelas',
                    'Pengambilan keputusan yang cepat',
                    'Orientasi hasil yang tinggi',
                    'Kemampuan mengelola kompleksitas'
                ]),
                'development_areas' => json_encode([
                    'Kesabaran dengan proses',
                    'Empati interpersonal',
                    'Work-life balance'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ],
            [
                'riasec_code' => 'E',
                'mbti_code' => 'ESTP',
                'personality_name' => 'Networker Energik',
                'personality_description' => 'Individu yang energik, spontan, suka bertindak, dan berorientasi pada hasil. Praktis, berani mengambil risiko, dan menikmati tantangan. Tipe kepribadian ini sangat dinamis untuk peran yang membutuhkan aksi cepat dan interaksi persuasif.',
                'strengths' => json_encode([
                    'Energi dan dinamisme tinggi',
                    'Kemampuan persuasi yang kuat',
                    'Adaptabilitas dalam situasi cepat',
                    'Networking yang excellent',
                    'Orientasi pada hasil penjualan'
                ]),
                'development_areas' => json_encode([
                    'Perencanaan jangka panjang',
                    'Konsistensi dalam follow-up',
                    'Detail administratif'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ],
            [
                'riasec_code' => 'E',
                'mbti_code' => 'ENTP',
                'personality_name' => 'Inovator Bisnis',
                'personality_description' => 'Pribadi yang inovatif, cerdas, berdebat, dan suka menantang status quo. Pemikir strategis yang visioner dan senang mengeksplorasi berbagai kemungkinan. Tipe kepribadian ini menghasilkan individu yang berani mengambil inisiatif dalam proyek-proyek inovatif dan bisnis baru.',
                'strengths' => json_encode([
                    'Inovasi dan kreativitas bisnis',
                    'Kemampuan melihat peluang',
                    'Pemikiran strategis',
                    'Adaptabilitas tinggi',
                    'Kemampuan memecahkan masalah kreatif'
                ]),
                'development_areas' => json_encode([
                    'Fokus dan konsistensi eksekusi',
                    'Manajemen detail operasional',
                    'Follow-through proyek'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ],
            [
                'riasec_code' => 'E',
                'mbti_code' => 'ESFP',
                'personality_name' => 'Entertainer Bisnis',
                'personality_description' => 'Individu yang energik, spontan, suka bersenang-senang, dan berorientasi pada interaksi sosial. Sangat baik dalam menarik perhatian dan menikmati kegiatan yang berpusat pada orang. Tipe kepribadian ini sangat cocok untuk bidang yang membutuhkan karisma, presentasi, dan pengelolaan event.',
                'strengths' => json_encode([
                    'Karisma dan daya tarik personal',
                    'Kemampuan entertainment',
                    'Interaksi sosial yang excellent',
                    'Kreativitas dalam presentasi',
                    'Energi positif yang menular'
                ]),
                'development_areas' => json_encode([
                    'Perencanaan strategis',
                    'Manajemen keuangan',
                    'Konsistensi jangka panjang'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ],

            // Conventional combinations
            [
                'riasec_code' => 'C',
                'mbti_code' => 'ISTJ',
                'personality_name' => 'Administrator Handal',
                'personality_description' => 'Pribadi yang introvert, teratur, logis, teliti, dan bertanggung jawab. Sangat cocok untuk pekerjaan yang detail dan terstruktur. Memiliki kemampuan organisasi yang excellent dengan perhatian detail yang tinggi.',
                'strengths' => json_encode([
                    'Organisasi dan struktur excellent',
                    'Perhatian detail yang tinggi',
                    'Keandalan dan konsistensi',
                    'Kepatuhan pada prosedur',
                    'Manajemen data yang akurat'
                ]),
                'development_areas' => json_encode([
                    'Fleksibilitas dalam perubahan',
                    'Inovasi dan kreativitas',
                    'Komunikasi interpersonal'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],
            [
                'riasec_code' => 'C',
                'mbti_code' => 'ISFJ',
                'personality_name' => 'Organizer Peduli',
                'personality_description' => 'Pribadi yang teliti, bertanggung jawab, setia, dan peduli terhadap kebutuhan orang lain. Suka menciptakan keteraturan dan memberikan dukungan. Tipe kepribadian ini sangat sesuai untuk peran yang membutuhkan perhatian detail dalam pelayanan dan administrasi.',
                'strengths' => json_encode([
                    'Kombinasi organisasi dan empati',
                    'Pelayanan yang detail dan peduli',
                    'Menciptakan lingkungan harmonis',
                    'Keandalan dalam support',
                    'Perhatian pada kebutuhan individual'
                ]),
                'development_areas' => json_encode([
                    'Assertiveness dalam komunikasi',
                    'Manajemen beban kerja',
                    'Pengembangan karier personal'
                ]),
                'introvert_extrovert' => 'Introvert'
            ],
            [
                'riasec_code' => 'C',
                'mbti_code' => 'ESTJ',
                'personality_name' => 'Manajer Efisien',
                'personality_description' => 'Pribadi yang Ekstrovert, teratur, logis, efisien, dan berorientasi pada implementasi serta kepemimpinan yang terstruktur. Pemimpin yang efisien dengan kemampuan mengelola sistem dan prosedur.',
                'strengths' => json_encode([
                    'Kepemimpinan operasional yang kuat',
                    'Efisiensi dalam sistem',
                    'Implementasi prosedur yang excellent',
                    'Manajemen tim yang terstruktur',
                    'Orientasi pada hasil dan kualitas'
                ]),
                'development_areas' => json_encode([
                    'Fleksibilitas dalam pendekatan',
                    'Inovasi dalam proses',
                    'Empati dalam kepemimpinan'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ],
            [
                'riasec_code' => 'C',
                'mbti_code' => 'ESFJ',
                'personality_name' => 'Koordinator Harmonis',
                'personality_description' => 'Individu yang hangat, kooperatif, praktis, dan peduli terhadap orang lain. suka menciptakan harmoni dan mengikuti aturan. Tipe kepribadian ini sangat cocok untuk peran administrasi atau pelayanan yang membutuhkan interaksi positif dan ketelitian.',
                'strengths' => json_encode([
                    'Koordinasi tim yang harmonis',
                    'Pelayanan yang hangat dan terstruktur',
                    'Kemampuan menciptakan lingkungan positif',
                    'Komunikasi yang supportif',
                    'Manajemen relasi yang excellent'
                ]),
                'development_areas' => json_encode([
                    'Pengambilan keputusan yang tegas',
                    'Manajemen konflik',
                    'Fokus pada efisiensi vs harmoni'
                ]),
                'introvert_extrovert' => 'Ekstrovert'
            ]
        ];

        foreach ($personalityTypes as $type) {
            $this->db->table('personality_types')->insert($type);
        }
    }
}