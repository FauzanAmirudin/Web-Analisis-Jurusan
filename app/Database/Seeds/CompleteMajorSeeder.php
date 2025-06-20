<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CompleteMajorSeeder extends Seeder
{
    public function run()
    {
        // Clear existing majors
        $this->db->table('majors')->truncate();

        $majors = [
            // Realistic + ISTP (personality_type_id = 1)
            [
                'personality_type_id' => 1,
                'name' => 'Teknik Mesin',
                'description' => 'Mempelajari prinsip-prinsip fisika dan matematika untuk desain, analisis, manufaktur, dan pemeliharaan sistem mekanis.',
                'full_description' => 'Mempelajari prinsip-prinsip fisika dan matematika untuk desain, analisis, manufaktur, dan pemeliharaan sistem mekanis. Jurusan ini mencakup berbagai aspek mulai dari termodinamika, mekanika fluida, perpindahan panas, hingga perancangan komponen mesin, robotika, dan sistem energi. Mahasiswa akan dilatih untuk menerapkan ilmu pengetahuan dan keterampilan praktis dalam menciptakan, menguji, dan mengoptimalkan berbagai jenis mesin dan sistem, mulai dari yang sederhana hingga yang kompleks dan berskala industri.',
                'core_subjects' => 'Termodinamika, Mekanika Fluida, Strength of Materials, Manufacturing Processes, Machine Design, Heat Transfer, Control Systems, CAD/CAM',
                'degree_types' => 'S.T (Sarjana Teknik)',
                'study_duration' => '4 tahun (S1)',
                'career_prospects' => 'Insinyur Mesin, Desainer Produk, Mekanik Industri, Teknisi Manufaktur, Manajer Produksi, Konsultan Teknik',
                'industry_sectors' => 'Otomotif, Aerospace, Manufacturing, Energy, Oil & Gas, Machinery',
                'future_trends' => 'Industry 4.0, green technology, automation, additive manufacturing',
                'compatibility_reason' => 'Sangat cocok untuk ISTP Realistis karena kamu adalah individu yang logis, praktis, suka memecahkan masalah dengan tangan, dan mandiri. Sangat cocok dengan tipe Realistis yang menghargai pekerjaan konkret dan membutuhkan keterampilan fisik. Dimana, kamu bisa fokus pada aplikasi praktis, pemecahan masalah konkret, dan penggunaan keterampilan fisik dalam perancangan dan perbaikan mesin. Memungkinkan eksplorasi dan inovasi dalam sistem mekanik.',
                'riasec_match' => 'R',
                'mbti_match' => 'ISTP'
            ],
            [
                'personality_type_id' => 1,
                'name' => 'Teknik Sipil',
                'description' => 'Merancang, membangun, dan memelihara infrastruktur seperti gedung, jalan, jembatan, dan sistem air.',
                'full_description' => 'Teknik Sipil mencakup perencanaan, desain, konstruksi, dan pemeliharaan infrastruktur seperti jalan, jembatan, gedung, dan sistem air. Mahasiswa akan mempelajari mekanika tanah, struktur beton, struktur baja, hidraulika, transportasi, manajemen konstruksi, geoteknik, dan surveying. Program ini mempersiapkan lulusan untuk berkontribusi dalam pembangunan infrastruktur yang aman, efisien, dan berkelanjutan.',
                'core_subjects' => 'Mekanika Tanah, Struktur Beton, Struktur Baja, Hidraulika, Transportasi, Manajemen Konstruksi, Geoteknik, Surveying',
                'degree_types' => 'S.T (Sarjana Teknik)',
                'study_duration' => '4 tahun (S1)',
                'career_prospects' => 'Civil Engineer, Structural Engineer, Construction Manager, Project Manager, Site Engineer, Infrastructure Planner',
                'industry_sectors' => 'Konstruksi, Konsultansi, Pemerintahan, Real Estate, Infrastructure Development',
                'future_trends' => 'Smart cities, sustainable construction, green building, disaster resilience',
                'compatibility_reason' => 'Membutuhkan pendekatan yang terstruktur, praktis, dan seringkali melibatkan pekerjaan lapangan. Sesuai dengan preferensi Realistis untuk pekerjaan konkret dan ketelitian dalam detail struktural.',
                'riasec_match' => 'R',
                'mbti_match' => 'ISTP'
            ],
            [
                'personality_type_id' => 1,
                'name' => 'Teknik Geologi',
                'description' => 'Mempelajari struktur bumi, mineral, dan aplikasinya dalam eksplorasi sumber daya alam.',
                'full_description' => 'Teknik Geologi menggabungkan ilmu geologi dengan teknik untuk eksplorasi dan eksploitasi sumber daya alam seperti minyak, gas, mineral, dan air tanah. Mahasiswa mempelajari struktur geologi, mineralogi, petrologi, geofisika, dan teknik penambangan. Program ini juga mencakup aspek lingkungan dan keberlanjutan dalam eksploitasi sumber daya alam.',
                'core_subjects' => 'Mineralogi, Petrologi, Stratigrafi, Geofisika, Geokimia, Teknik Penambangan, Geologi Struktur, Hidrogeologi',
                'degree_types' => 'S.T (Sarjana Teknik)',
                'study_duration' => '4 tahun (S1)',
                'career_prospects' => 'Geological Engineer, Mining Engineer, Petroleum Geologist, Environmental Geologist, Geotechnical Engineer',
                'industry_sectors' => 'Mining, Oil & Gas, Environmental Consulting, Construction, Government',
                'future_trends' => 'Renewable energy exploration, environmental geology, sustainable mining practices',
                'compatibility_reason' => 'Cocok untuk yang suka bekerja di lapangan, menganalisis data geologi, dan memecahkan masalah praktis terkait sumber daya alam.',
                'riasec_match' => 'R',
                'mbti_match' => 'ISTP'
            ],

            // Realistic + ISFP (personality_type_id = 2)
            [
                'personality_type_id' => 2,
                'name' => 'Tata Boga / Seni Kuliner',
                'description' => 'Mempelajari seni memasak, manajemen dapur, dan kreasi kuliner, dari teknik dasar hingga inovasi hidangan.',
                'full_description' => 'Tata Boga adalah program studi yang menggabungkan seni, sains, dan bisnis dalam dunia kuliner. Mahasiswa mempelajari teknik memasak, food safety, nutrisi, menu planning, food presentation, kitchen management, baking & pastry, dan food cost control. Program ini juga mengembangkan kreativitas dalam menciptakan hidangan yang tidak hanya lezat tetapi juga estetis dan bernilai komersial.',
                'core_subjects' => 'Culinary Arts, Food Safety, Nutrition, Menu Planning, Food Presentation, Kitchen Management, Baking & Pastry, Food Cost Control',
                'degree_types' => 'S.Gz (Sarjana Gizi) / Diploma Kuliner',
                'study_duration' => '3-4 tahun',
                'career_prospects' => 'Koki Profesional, Pastry Chef, Konsultan Kuliner, Pengusaha Restoran, Food Stylist, Pengembang Resep',
                'industry_sectors' => 'Restaurant & Hospitality, Food Production, Catering, Food Media, Culinary Education',
                'future_trends' => 'Plant-based cuisine, molecular gastronomy, sustainable cooking, food technology integration',
                'compatibility_reason' => 'Dengan tipe kepribadian yang kamu miliki kamu bisa mengekspresikan kreativitas (Artistik) melalui medium yang konkret dan membutuhkan keterampilan fisik (Realistis), menghasilkan produk yang bisa dirasakan dan dinikmati.',
                'riasec_match' => 'R',
                'mbti_match' => 'ISFP'
            ],
            [
                'personality_type_id' => 2,
                'name' => 'Fashion Design / Tata Busana',
                'description' => 'Mempelajari perancangan, pembuatan pola, dan produksi pakaian serta aksesoris.',
                'full_description' => 'Fashion Design menggabungkan kreativitas artistik dengan keterampilan teknis dalam merancang dan memproduksi busana. Mahasiswa mempelajari ilustrasi mode, teknik menjahit, tekstil, draping, pengembangan koleksi, sejarah mode, pemasaran produk fashion, dan pemanfaatan teknologi dalam industri pakaian. Program ini mempersiapkan lulusan untuk berkarir di industri fashion yang dinamis dan kompetitif.',
                'core_subjects' => 'Fashion Illustration, Pattern Making, Textile Science, Draping, Fashion History, Garment Construction, Fashion Marketing, CAD for Fashion',
                'degree_types' => 'S.Ds (Sarjana Desain)',
                'study_duration' => '4 tahun (S1)',
                'career_prospects' => 'Desainer Busana, Stylist, Merchandiser, Penata Kostum, Pengusaha Butik, Fashion Illustrator',
                'industry_sectors' => 'Fashion Industry, Entertainment, Retail, Textile Manufacturing, Fashion Media',
                'future_trends' => 'Sustainable fashion, digital fashion, smart textiles, customization technology',
                'compatibility_reason' => 'Sangat cocok untuk kamu yang ingin mengekspresikan kreativitas dan kepekaan estetika mereka melalui media konkret (bahan) dan membutuhkan keterampilan manual. Kamu dapat menciptakan karya yang personal dan orisinal.',
                'riasec_match' => 'R',
                'mbti_match' => 'ISFP'
            ],

            // Investigative + INTP (personality_type_id = 5)
            [
                'personality_type_id' => 5,
                'name' => 'Teknik Informatika',
                'description' => 'Mempelajari prinsip-prinsip komputasi, pengembangan perangkat lunak, sistem informasi, dan jaringan komputer.',
                'full_description' => 'Teknik Informatika adalah bidang studi yang menggabungkan ilmu komputer dengan teknik untuk mengembangkan sistem perangkat lunak, aplikasi, dan solusi teknologi informasi. Mahasiswa akan mempelajari berbagai bahasa pemrograman, algoritma, struktur data, basis data, jaringan komputer, dan pengembangan aplikasi web dan mobile. Program ini juga mencakup kecerdasan buatan, keamanan siber, serta teknologi cloud dan big data.',
                'core_subjects' => 'Algoritma dan Pemrograman, Struktur Data, Basis Data, Jaringan Komputer, Rekayasa Perangkat Lunak, Sistem Operasi, Kecerdasan Buatan, Keamanan Siber',
                'degree_types' => 'S.Kom (Sarjana Komputer)',
                'study_duration' => '4 tahun (S1)',
                'career_prospects' => 'Software Developer, System Analyst, Database Administrator, Network Administrator, Cybersecurity Specialist, Data Scientist, Mobile App Developer, Web Developer',
                'industry_sectors' => 'Teknologi Informasi, Perbankan, E-commerce, Startup, Konsultan IT, Gaming Industry',
                'future_trends' => 'Pertumbuhan pesat di bidang AI, Machine Learning, IoT, dan Cloud Computing',
                'compatibility_reason' => 'Sangat cocok karena membutuhkan pemikiran logis, analitis, kemampuan pemecahan masalah yang kompleks, dan minat pada inovasi teknologi. Lingkungan kerja seringkali memungkinkan eksplorasi mendalam dan fokus pada tugas-tugas teknis.',
                'riasec_match' => 'I',
                'mbti_match' => 'INTP'
            ],
            [
                'personality_type_id' => 5,
                'name' => 'Data Science',
                'description' => 'Mempelajari analisis data, machine learning, dan pengambilan keputusan berbasis data.',
                'full_description' => 'Data Science menggabungkan statistika, matematika, dan teknologi untuk mengekstrak insights dari data besar. Program studi ini mencakup machine learning, data mining, visualisasi data, predictive analytics, dan business intelligence. Mahasiswa dilatih untuk mengolah data kompleks menjadi informasi yang berguna untuk pengambilan keputusan bisnis dan penelitian.',
                'core_subjects' => 'Statistika, Machine Learning, Python Programming, R Programming, Big Data Analytics, Data Visualization, Database Management, Business Intelligence',
                'degree_types' => 'S.Kom (Sarjana Komputer)',
                'study_duration' => '4 tahun (S1)',
                'career_prospects' => 'Data Scientist, Data Analyst, Machine Learning Engineer, Business Intelligence Analyst, Data Engineer, Research Scientist',
                'industry_sectors' => 'Teknologi, Perbankan, E-commerce, Healthcare, Konsultansi, Pemerintahan',
                'future_trends' => 'Ekspansi AI dan automation, demand tinggi untuk data-driven decision making',
                'compatibility_reason' => 'Ideal untuk yang menyukai analisis mendalam, pemecahan masalah kompleks dengan pendekatan logis, dan eksplorasi pola dalam data.',
                'riasec_match' => 'I',
                'mbti_match' => 'INTP'
            ],

            // Artistic + INFP (personality_type_id = 9)
            [
                'personality_type_id' => 9,
                'name' => 'Desain Komunikasi Visual',
                'description' => 'Mempelajari perancangan media komunikasi visual seperti grafis, ilustrasi, branding, poster, dan multimedia.',
                'full_description' => 'Desain Komunikasi Visual menggabungkan elemen seni, teknologi, dan strategi komunikasi untuk menyampaikan pesan secara efektif melalui visual. Mahasiswa dibekali dengan keterampilan dalam tipografi, fotografi, desain interaktif, animasi, dan desain UI/UX. DKV menekankan kreativitas dan pemahaman audiens dalam menciptakan karya visual yang informatif, estetis, dan fungsional di berbagai platform media.',
                'core_subjects' => 'Dasar Desain, Tipografi, Ilustrasi, Fotografi, Branding, Advertising Design, Web Design, Motion Graphics',
                'degree_types' => 'S.Ds (Sarjana Desain)',
                'study_duration' => '4 tahun (S1)',
                'career_prospects' => 'Desainer Grafis, Illustrator, Animator, Art Director, Desainer UI/UX, Content Creator',
                'industry_sectors' => 'Advertising, Media, Publishing, Digital Agency, Entertainment, E-commerce',
                'future_trends' => 'Pertumbuhan digital marketing, AR/VR design, sustainable design practices',
                'compatibility_reason' => 'Memberi ruang untuk berekspresi secara visual, menciptakan pesan yang bermakna, dan bekerja dengan kebebasan kreatif. Mereka dapat menuangkan idealisme dan emosi ke dalam karya visual.',
                'riasec_match' => 'A',
                'mbti_match' => 'INFP'
            ],

            // Social + ENFJ (personality_type_id = 16)
            [
                'personality_type_id' => 16,
                'name' => 'Psikologi',
                'description' => 'Mempelajari perilaku dan proses mental manusia, termasuk emosi, pikiran, dan interaksi sosial.',
                'full_description' => 'Psikologi adalah ilmu yang mempelajari perilaku dan proses mental manusia. Program studi ini mencakup berbagai area seperti psikologi klinis, sosial, perkembangan, dan industri. Mahasiswa akan belajar tentang teori-teori psikologi, metodologi penelitian, dan aplikasi praktis dalam memahami dan membantu manusia. Fokus pada pengembangan kemampuan asesmen, konseling, dan intervensi psikologis.',
                'core_subjects' => 'Psikologi Umum, Psikologi Perkembangan, Psikologi Sosial, Psikologi Klinis, Metodologi Penelitian, Statistik Psikologi, Psikologi Industri, Tes dan Pengukuran',
                'degree_types' => 'S.Psi (Sarjana Psikologi)',
                'study_duration' => '4 tahun (S1)',
                'career_prospects' => 'Psikolog Klinis, Konselor, HR Specialist, Psikolog Pendidikan, Peneliti, Trainer, Psikolog Forensik, Terapis',
                'industry_sectors' => 'Kesehatan Mental, Pendidikan, Human Resources, Konsultansi, Rumah Sakit, Klinik',
                'future_trends' => 'Meningkatnya kesadaran kesehatan mental dan wellbeing di masyarakat',
                'compatibility_reason' => 'Sangat cocok karena memungkinkan eksplorasi mendalam tentang diri sendiri dan orang lain (Investigatif), sambil tetap menjunjung tinggi empati dan nilai-nilai (Feeling).',
                'riasec_match' => 'S',
                'mbti_match' => 'ENFJ'
            ],

            // Enterprising + ENTJ (personality_type_id = 17)
            [
                'personality_type_id' => 17,
                'name' => 'Manajemen Bisnis',
                'description' => 'Mempelajari perencanaan, pengorganisasian, pengarahan, dan pengendalian sumber daya untuk mencapai tujuan organisasi.',
                'full_description' => 'Manajemen Bisnis adalah program studi yang mempersiapkan mahasiswa untuk menjadi pemimpin dan manajer yang efektif. Kurikulum mencakup berbagai aspek pengelolaan bisnis seperti manajemen strategis, pemasaran, keuangan, operasional, dan sumber daya manusia. Mahasiswa akan belajar menganalisis pasar, membuat keputusan bisnis, dan memimpin tim menuju kesuksesan.',
                'core_subjects' => 'Manajemen Strategis, Pemasaran, Manajemen Keuangan, Manajemen SDM, Manajemen Operasional, Kewirausahaan, Etika Bisnis, Manajemen Proyek',
                'degree_types' => 'S.M (Sarjana Manajemen)',
                'study_duration' => '4 tahun (S1)',
                'career_prospects' => 'Manager, Business Analyst, Marketing Manager, Project Manager, Entrepreneur, Business Consultant, Operations Manager, HR Manager',
                'industry_sectors' => 'Korporasi, Startup, Konsultansi, Perbankan, Retail, Manufacturing',
                'future_trends' => 'Digital transformation, sustainable business, remote management',
                'compatibility_reason' => 'Sangat cocok untuk tipe kepribadian yang memiliki kemampuan kepemimpinan, pemikiran strategis, dan keinginan untuk mengelola serta mengembangkan organisasi. Mampu membuat keputusan cepat dan efektif.',
                'riasec_match' => 'E',
                'mbti_match' => 'ENTJ'
            ],

            // Conventional + ISTJ (personality_type_id = 21)
            [
                'personality_type_id' => 21,
                'name' => 'Akuntansi',
                'description' => 'Mempelajari pencatatan, pengukuran, dan pelaporan keuangan.',
                'full_description' => 'Akuntansi adalah sistem informasi yang mengukur aktivitas bisnis, memproses informasi menjadi laporan, dan mengkomunikasikan hasilnya kepada pengambil keputusan. Program studi ini mencakup akuntansi keuangan, manajemen, auditing, perpajakan, dan sistem informasi akuntansi. Mahasiswa dilatih untuk menghasilkan informasi keuangan yang akurat dan relevan untuk pengambilan keputusan bisnis.',
                'core_subjects' => 'Pengantar Akuntansi, Akuntansi Keuangan, Akuntansi Manajemen, Auditing, Perpajakan, Sistem Informasi Akuntansi, Akuntansi Sektor Publik',
                'degree_types' => 'S.Ak (Sarjana Akuntansi)',
                'study_duration' => '4 tahun (S1)',
                'career_prospects' => 'Akuntan, Auditor, Tax Consultant, Financial Analyst, Controller, Internal Auditor, Public Accountant',
                'industry_sectors' => 'Accounting Firms, Perbankan, Korporasi, Pemerintahan, Konsultansi Keuangan',
                'future_trends' => 'Digital accounting, automation, sustainability reporting, forensic accounting',
                'compatibility_reason' => 'Sangat cocok untuk tipe pribadi yang menyukai data, detail, aturan, dan struktur. Akan nyaman dengan pekerjaan yang membutuhkan akurasi, presisi, dan kepatuhan pada standar yang ditetapkan.',
                'riasec_match' => 'C',
                'mbti_match' => 'ISTJ'
            ]
        ];

        foreach ($majors as $major) {
            $this->db->table('majors')->insert($major);
        }
    }
}