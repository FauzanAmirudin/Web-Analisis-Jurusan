<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MajorSeeder extends Seeder
{
    public function run()
    {
        $majors = [
                        // Tambahkan data ini ke array $majors di MajorSeeder.php
// R (Realistis) + ISTP majors (personality_type_id = 1)
[
    'personality_type_id' => 1, // R-ISTP
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
    'personality_type_id' => 1, // R-ISTP
    'name' => 'Teknik Otomotif',
    'description' => 'Berfokus pada desain, pengembangan, manufaktur, pengoperasian, dan perawatan kendaraan bermotor.',
    'full_description' => 'Berfokus pada desain, pengembangan, manufaktur, pengoperasian, dan perawatan kendaraan bermotor. Jurusan ini tidak hanya mempelajari tentang mesin dan sistem mekanis kendaraan, tetapi juga mencakup aspek elektronik, sistem kontrol, aerodinamika, material, dan bahkan efisiensi energi serta keberlanjutan. Mahasiswa akan mendalami bagaimana teknologi terkini diaplikasikan pada kendaraan, baik konvensional maupun listrik, serta bagaimana mengoptimalkan performa, keamanan, dan emisi kendaraan.',
    'core_subjects' => 'Engine Systems, Automotive Electronics, Vehicle Dynamics, Automotive Materials, Emission Control, Electric Vehicle Technology, Automotive Design',
    'degree_types' => 'S.T (Sarjana Teknik)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Insinyur Otomotif, Teknisi Otomotif, Desainer Kendaraan, Pengelola Bengkel, Peneliti Otomotif',
    'industry_sectors' => 'Otomotif, Transportasi, Manufacturing, Research & Development',
    'future_trends' => 'Electric vehicles, autonomous driving, smart mobility, sustainable transportation',
    'compatibility_reason' => 'Mirip dengan Teknik Mesin, namun lebih spesifik pada kendaraan. Cocok untuk Realistis yang suka bekerja dengan alat dan mesin, juga suka menganalisis masalah teknis dan mencari solusi praktis.',
    'riasec_match' => 'R',
    'mbti_match' => 'ISTP'
],
[
    'personality_type_id' => 1, // R-ISTP
    'name' => 'Kesehatan dan Keselamatan Kerja (K3)',
    'description' => 'Mempelajari identifikasi, evaluasi, dan pengendalian risiko di lingkungan kerja untuk mencegah kecelakaan dan penyakit akibat kerja.',
    'full_description' => 'Mempelajari identifikasi, evaluasi, dan pengendalian risiko di lingkungan kerja untuk mencegah kecelakaan dan penyakit akibat kerja. Jurusan ini mencakup berbagai disiplin ilmu seperti teknik, kesehatan masyarakat, hukum, dan manajemen untuk menciptakan lingkungan kerja yang aman, sehat, dan produktif. Mahasiswa akan diajarkan tentang regulasi K3, ergonomi, toksikologi industri, manajemen risiko, investigasi kecelakaan, serta promosi kesehatan di tempat kerja, sehingga mampu merancang dan mengimplementasikan program K3 yang efektif.',
    'core_subjects' => 'Occupational Safety, Industrial Hygiene, Risk Management, Ergonomics, Safety Regulations, Accident Investigation, Emergency Response',
    'degree_types' => 'S.K3 (Sarjana Keselamatan dan Kesehatan Kerja)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Ahli K3, Safety Officer, Manajer HSE (Health, Safety, and Environment), Auditor K3, Konsultan Keselamatan',
    'industry_sectors' => 'Manufacturing, Construction, Oil & Gas, Mining, Healthcare, Government',
    'future_trends' => 'Digital safety monitoring, AI in risk prediction, mental health focus, sustainable safety practices',
    'compatibility_reason' => 'Cocok untuk Realistis yang berorientasi pada keselamatan fisik dan yang suka menganalisis masalah, menerapkan standar, dan menemukan solusi praktis untuk lingkungan kerja yang aman.',
    'riasec_match' => 'R',
    'mbti_match' => 'ISTP'
],

// R (Realistis) + ISFP majors (personality_type_id = 2)
[
    'personality_type_id' => 2, // R-ISFP
    'name' => 'Tata Boga / Seni Kuliner',
    'description' => 'Mempelajari seni memasak, manajemen dapur, dan kreasi kuliner, dari teknik dasar hingga inovasi hidangan.',
    'full_description' => 'Mempelajari seni memasak, manajemen dapur, dan kreasi kuliner, dari teknik dasar hingga inovasi hidangan. Jurusan ini juga mencakup pengetahuan tentang gizi, keamanan pangan, pengolahan bahan makanan, penyajian makanan yang estetis, hingga kewirausahaan dalam bidang kuliner. Siswa dilatih untuk menjadi profesional di dunia kuliner melalui praktik langsung dan pengembangan kreativitas dalam merancang menu yang menarik dan bernilai jual tinggi.',
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
    'personality_type_id' => 2, // R-ISFP
    'name' => 'Seni Kriya (Keramik, Tekstil, Logam, Kayu)',
    'description' => 'Mempelajari pembuatan objek seni fungsional atau non-fungsional menggunakan tangan dan berbagai material.',
    'full_description' => 'Mempelajari pembuatan objek seni fungsional atau non-fungsional menggunakan tangan dan berbagai material seperti keramik, tekstil, logam, dan kayu. Jurusan ini mengembangkan keterampilan teknis dan estetika dalam menciptakan karya kriya yang bernilai seni dan ekonomi. Siswa juga belajar tentang desain produk, teknik produksi, sejarah seni kriya, serta penerapan teknologi dalam proses pembuatan karya untuk kebutuhan industri kreatif dan budaya.',
    'core_subjects' => 'Ceramic Arts, Textile Design, Metalworking, Woodworking, Design Principles, Art History, Product Development, Traditional Crafts',
    'degree_types' => 'S.Sn (Sarjana Seni)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Seniman Kriya, Desainer Kerajinan, Pengrajin, Edukator Seni, Pemilik Galeri Seni',
    'industry_sectors' => 'Creative Industry, Art & Culture, Handicraft Export, Interior Design, Art Education',
    'future_trends' => 'Digital craft techniques, sustainable materials, cultural preservation, artisan entrepreneurship',
    'compatibility_reason' => 'berdasarkan tipr kepribadian kamu, jurusan ini sangat ideal jika kamu suka bekerja dengan tangan, menciptakan sesuatu yang tangible, dan mengekspresikan sisi artistik mereka melalui keahlian fisik.',
    'riasec_match' => 'R',
    'mbti_match' => 'ISFP'
],
[
    'personality_type_id' => 2, // R-ISFP
    'name' => 'Agroteknologi / Pertanian',
    'description' => 'Mempelajari ilmu dan teknologi terkait pertanian.',
    'full_description' => 'Mempelajari ilmu dan teknologi terkait pertanian, termasuk budidaya tanaman, pengelolaan lahan, dan peningkatan kualitas hasil pertanian. Jurusan ini membekali siswa dengan pengetahuan tentang ekologi pertanian, teknik irigasi, pemupukan, perlindungan tanaman, serta penggunaan alat dan mesin pertanian. Siswa juga diajarkan prinsip keberlanjutan, inovasi teknologi tepat guna, dan strategi pengelolaan pertanian modern dalam menghadapi tantangan pangan dan lingkungan.',
    'core_subjects' => 'Plant Science, Soil Science, Agricultural Technology, Crop Protection, Irrigation Systems, Agricultural Economics, Sustainable Agriculture',
    'degree_types' => 'S.P (Sarjana Pertanian)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Agronom, Pengelola Pertanian Modern, Konsultan Pertanian, Peneliti Tanaman, Pengusaha Pertanian',
    'industry_sectors' => 'Agriculture, Agribusiness, Research Institutions, Government Agriculture, Food Production',
    'future_trends' => 'Precision agriculture, vertical farming, organic farming, climate-smart agriculture',
    'compatibility_reason' => 'kamu dapat menggabungkan elemen Realistis (bekerja dengan alam, fisik) dengan potensi yang kamu miliki dalam menciptakan lingkungan yang harmonis atau mengembangkan produk dari alam dengan sentuhan inovatif.',
    'riasec_match' => 'R',
    'mbti_match' => 'ISFP'
],

// R (Realistis) + ESTP majors (personality_type_id = 3)
[
    'personality_type_id' => 3, // R-ESTP
    'name' => 'Manajemen Perhotelan (Operasional)',
    'description' => 'Mempelajari manajemen operasional dan pelayanan di industri perhotelan.',
    'full_description' => 'Mempelajari manajemen operasional dan pelayanan di industri perhotelan, termasuk front office, housekeeping, dan food & beverage. Jurusan ini menekankan pengembangan keterampilan praktis dan etika profesional dalam memberikan layanan kepada tamu, pengelolaan fasilitas hotel, serta koordinasi antar departemen. Selain itu, siswa juga diajarkan konsep hospitality, komunikasi layanan, penanganan keluhan, dan penggunaan sistem informasi hotel untuk mendukung operasional yang efisien dan berkualitas.',
    'core_subjects' => 'Front Office Management, Housekeeping Operations, Food & Beverage Service, Hotel Accounting, Customer Service, Event Management, Tourism Management',
    'degree_types' => 'S.Par (Sarjana Pariwisata)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Manajer Hotel, Manajer Restoran, Event Manager, Revenue Manager, Supervisor Operasional Hotel',
    'industry_sectors' => 'Hospitality, Tourism, Event Management, Food & Beverage, Resort Management',
    'future_trends' => 'Digital hospitality, sustainable tourism, experience-based services, smart hotel technology',
    'compatibility_reason' => 'berdasarkan tipe kepribadian kamu, kamu sangat kuat untuk pekerjaan yang membutuhkan interaksi langsung dengan lingkungan fisik dan pemecahan masalah cepat di lapangan. Itu cocok untuk manajemen perhotelan karena kamu akan menikmati lingkungan yang dinamis, interaksi langsung dengan pelanggan (Ekstrovert), dan pemecahan masalah praktis yang sering muncul di operasional hotel.',
    'riasec_match' => 'R',
    'mbti_match' => 'ESTP'
],
[
    'personality_type_id' => 3, // R-ESTP
    'name' => 'Transportasi & Logistik',
    'description' => 'Mempelajari perencanaan, implementasi, dan pengendalian aliran barang dari titik asal hingga konsumsi.',
    'full_description' => 'Mempelajari perencanaan, implementasi, dan pengendalian aliran barang dari titik asal hingga konsumsi. Jurusan ini mencakup manajemen rantai pasok, sistem distribusi, pergudangan, pengiriman, serta pemanfaatan teknologi informasi dalam proses logistik. Siswa juga dibekali dengan pemahaman tentang regulasi transportasi, efisiensi biaya, perencanaan rute, serta strategi optimalisasi waktu dan sumber daya dalam pengelolaan logistik modern.',
    'core_subjects' => 'Supply Chain Management, Warehouse Management, Transportation Planning, Logistics Technology, Inventory Management, Distribution Systems',
    'degree_types' => 'S.T (Sarjana Teknik) / S.E (Sarjana Ekonomi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Manajer Logistik, Spesialis Rantai Pasok, Freight Manager, Warehouse Manager, Konsultan Logistik',
    'industry_sectors' => 'Logistics, Transportation, Manufacturing, E-commerce, Supply Chain',
    'future_trends' => 'Digital logistics, autonomous vehicles, drone delivery, green logistics',
    'compatibility_reason' => 'Cocok karena melibatkan sistem fisik (Realistis), pemecahan masalah cepat, dan seringkali membutuhkan kepemimpinan serta interaksi dengan tim di lapangan (Ekstrovert).',
    'riasec_match' => 'R',
    'mbti_match' => 'ESTP'
],
[
    'personality_type_id' => 3, // R-ESTP
    'name' => 'Pendidikan Jasmani & Olahraga',
    'description' => 'Mempelajari teori dan praktik olahraga, melatih kemampuan fisik, serta mengembangkan program kebugaran.',
    'full_description' => 'Mempelajari teori dan praktik olahraga, melatih kemampuan fisik, serta mengembangkan program kebugaran. Jurusan ini mencakup pengajaran teknik dasar berbagai cabang olahraga, fisiologi dan anatomi tubuh, psikologi olahraga, serta prinsip pelatihan fisik dan kesehatan. Siswa juga dilatih untuk menjadi instruktur atau pendidik olahraga yang mampu merancang aktivitas fisik yang aman, menyenangkan, dan mendukung gaya hidup sehat.',
    'core_subjects' => 'Exercise Physiology, Sports Psychology, Coaching Methods, Biomechanics, Sports Nutrition, Fitness Training, Sports Management',
    'degree_types' => 'S.Pd (Sarjana Pendidikan)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Guru Olahraga, Pelatih Fisik, Atlet Profesional, Pengelola Fasilitas Olahraga, Sport Event Manager',
    'industry_sectors' => 'Education, Sports, Fitness, Recreation, Health & Wellness',
    'future_trends' => 'Sports technology, virtual fitness, wellness coaching, adaptive sports',
    'compatibility_reason' => 'Ideal yang energik, menyukai aktivitas fisik, kompetisi, dan dapat berinteraksi serta memotivasi orang lain dalam konteks olahraga.',
    'riasec_match' => 'R',
    'mbti_match' => 'ESTP'
],

// R (Realistis) + ESTJ majors (personality_type_id = 4)
[
    'personality_type_id' => 4, // R-ESTJ
    'name' => 'Teknik Sipil',
    'description' => 'Merancang, membangun, dan memelihara infrastruktur seperti gedung, jalan, jembatan, dan sistem air.',
    'full_description' => 'Merancang, membangun, dan memelihara infrastruktur seperti gedung, jalan, jembatan, dan sistem air. Jurusan ini membekali siswa dengan pengetahuan tentang struktur bangunan, mekanika tanah, material konstruksi, manajemen proyek, serta perencanaan wilayah dan transportasi. Siswa juga mempelajari penggunaan perangkat lunak teknik, standar keselamatan konstruksi, serta prinsip keberlanjutan dalam pembangunan infrastruktur yang tahan lama dan efisien.',
    'core_subjects' => 'Structural Engineering, Geotechnical Engineering, Construction Management, Transportation Engineering, Hydraulic Engineering, Building Materials',
    'degree_types' => 'S.T (Sarjana Teknik)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Insinyur Sipil, Manajer Konstruksi, Konsultan Infrastruktur, Pengawas Proyek, Kontraktor',
    'industry_sectors' => 'Construction, Infrastructure, Government, Consulting, Real Estate',
    'future_trends' => 'Smart infrastructure, sustainable construction, BIM technology, green building',
    'compatibility_reason' => 'Membutuhkan pendekatan yang terstruktur, praktis, dan seringkali melibatkan pekerjaan lapangan. Sesuai dengan preferensi Realistis untuk pekerjaan konkret dan ketelitian dalam detail struktural serta kepemimpinan proyek.',
    'riasec_match' => 'R',
    'mbti_match' => 'ESTJ'
],
[
    'personality_type_id' => 4, // R-ESTJ
    'name' => 'Teknik Perminyakan / Pertambangan',
    'description' => 'Mempelajari eksplorasi, produksi, dan pengelolaan sumber daya minyak, gas, atau mineral.',
    'full_description' => 'Mempelajari eksplorasi, produksi, dan pengelolaan sumber daya minyak, gas, atau mineral. Jurusan ini mencakup teknik pengeboran, pemrosesan hasil tambang, manajemen reservoir, keselamatan kerja, dan pelestarian lingkungan tambang. Siswa dibekali dengan keterampilan penggunaan alat berat, analisis geologi, serta pemahaman teknologi terkini dalam ekstraksi sumber daya alam secara efisien dan bertanggung jawab.',
    'core_subjects' => 'Petroleum Geology, Drilling Engineering, Reservoir Engineering, Mining Operations, Safety Engineering, Environmental Management',
    'degree_types' => 'S.T (Sarjana Teknik)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Insinyur Perminyakan, Geologis Pertambangan, Manajer Proyek Eksplorasi, Ahli Lingkungan Industri',
    'industry_sectors' => 'Oil & Gas, Mining, Energy, Consulting, Government',
    'future_trends' => 'Renewable energy transition, digital mining, environmental sustainability, carbon capture',
    'compatibility_reason' => 'Cocok dengan tipe kepribadian mu, tetapi untuk yang suka bekerja di lingkungan yang menantang, membutuhkan ketelitian dalam prosedur teknis, dan kemampuan memimpin tim di lapangan.',
    'riasec_match' => 'R',
    'mbti_match' => 'ESTJ'
],
[
    'personality_type_id' => 4, // R-ESTJ
    'name' => 'Manajemen Proyek (khususnya Konstruksi/Manufaktur)',
    'description' => 'Mempelajari perencanaan, pelaksanaan, dan pengendalian proyek.',
    'full_description' => 'Mempelajari perencanaan, pelaksanaan, dan pengendalian proyek untuk mencapai tujuan dalam batasan waktu, biaya, dan kualitas. Jurusan ini menekankan pada keterampilan menyusun jadwal proyek, mengelola sumber daya, mengendalikan risiko, serta berkoordinasi dengan berbagai pihak dalam proses konstruksi atau produksi manufaktur. Siswa juga dilatih menggunakan perangkat lunak manajemen proyek dan memahami standar serta regulasi industri untuk menjamin efisiensi dan keberhasilan proyek.',
    'core_subjects' => 'Project Planning, Risk Management, Quality Control, Resource Management, Construction Law, Project Software, Cost Estimation',
    'degree_types' => 'S.T (Sarjana Teknik) / S.M (Sarjana Manajemen)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Manajer Proyek, Project Coordinator, Quality Control Manager, Manajer Konstruksi',
    'industry_sectors' => 'Construction, Manufacturing, Engineering, Consulting, Infrastructure',
    'future_trends' => 'Digital project management, AI in project planning, sustainable project delivery, agile methodologies',
    'compatibility_reason' => 'Ideal untuk yang suka mengatur, memimpin, dan memastikan proyek fisik berjalan sesuai rencana, dengan fokus pada efisiensi dan hasil yang konkret.',
    'riasec_match' => 'R',
    'mbti_match' => 'ESTJ'
], 

// Lanjutan untuk array $majors di MajorSeeder.php

// I (Investigatif) + INTP majors (personality_type_id = 5)
[
    'personality_type_id' => 5, // I-INTP
    'name' => 'Teknik Informatika / Ilmu Komputer',
    'description' => 'Mempelajari prinsip-prinsip komputasi, pengembangan perangkat lunak, sistem informasi, dan jaringan komputer.',
    'full_description' => 'Mempelajari prinsip-prinsip komputasi, pengembangan perangkat lunak, sistem informasi, dan jaringan komputer. Fokus pada logika, algoritma, dan pemecahan masalah menggunakan teknologi. Jurusan ini juga membahas pemrograman, rekayasa perangkat lunak, kecerdasan buatan, keamanan siber, serta teknologi cloud dan data besar (big data). Siswa dibekali dengan keterampilan teknis dan analitis untuk merancang solusi digital yang efisien, inovatif, dan relevan dengan kebutuhan industri masa kini.',
    'core_subjects' => 'Algoritma dan Pemrograman, Struktur Data, Basis Data, Jaringan Komputer, Rekayasa Perangkat Lunak, Sistem Operasi, Kecerdasan Buatan, Keamanan Siber',
    'degree_types' => 'S.Kom (Sarjana Komputer)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Pengembang Perangkat Lunak/Software Developer, Data Scientist, System Analyst, Ahli Keamanan Siber, Peneliti AI/Machine Learning, Arsitek Sistem',
    'industry_sectors' => 'Teknologi Informasi, Perbankan, E-commerce, Startup, Konsultan IT, Gaming Industry',
    'future_trends' => 'Pertumbuhan pesat di bidang AI, Machine Learning, IoT, dan Cloud Computing',
    'compatibility_reason' => 'Sangat cocok karena membutuhkan pemikiran logis, analitis, kemampuan pemecahan masalah yang kompleks, dan minat pada inovasi teknologi. Lingkungan kerja seringkali memungkinkan eksplorasi mendalam dan fokus pada tugas-tugas teknis.',
    'riasec_match' => 'I',
    'mbti_match' => 'INTP'
],
[
    'personality_type_id' => 5, // I-INTP
    'name' => 'Fisika / Fisika Teori',
    'description' => 'Mempelajari hukum dasar alam semesta melalui model matematika dan konsep abstrak.',
    'full_description' => 'Mempelajari hukum dasar alam semesta melalui model matematika dan konsep abstrak. Fokus pada penelitian dan pemahaman fundamental tentang fenomena fisika, seperti gerak, energi, gaya, medan, dan partikel. Jurusan ini menekankan analisis teoretis, formulasi persamaan fisika, serta penggunaan simulasi dan pemodelan matematis untuk menjelaskan fenomena kompleks. Siswa dipersiapkan untuk berkontribusi dalam pengembangan ilmu pengetahuan murni maupun teknologi terapan melalui riset dan inovasi.',
    'core_subjects' => 'Mekanika Klasik, Elektromagnetisme, Termodinamika, Mekanika Kuantum, Relativitas, Fisika Statistik, Fisika Matematika, Fisika Komputasi',
    'degree_types' => 'S.Si (Sarjana Sains)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Peneliti Fisika, Dosen/Akademisi, Ilmuwan Data, Analis Kuantitatif (Quant Analyst), Spesialis Riset & Pengembangan di Industri Teknologi/Energi',
    'industry_sectors' => 'Research Institutions, Universities, Technology Companies, Energy Sector, Financial Services',
    'future_trends' => 'Quantum computing, renewable energy research, space exploration, advanced materials',
    'compatibility_reason' => 'Ideal untuk yang memiliki rasa ingin tahu tinggi, menikmati tantangan intelektual, dan suka memecahkan masalah kompleks yang bersifat abstrak. Memungkinkan eksplorasi ide-ide baru dan kontribusi pada pengetahuan ilmiah.',
    'riasec_match' => 'I',
    'mbti_match' => 'INTP'
],
[
    'personality_type_id' => 5, // I-INTP
    'name' => 'Matematika / Matematika Aktuaria',
    'description' => 'Berfokus pada penalaran logis, pola, struktur abstrak, dan pemecahan masalah melalui model matematika.',
    'full_description' => 'Berfokus pada penalaran logis, pola, struktur abstrak, dan pemecahan masalah melalui model matematika. Jurusan ini mencakup teori bilangan, aljabar, kalkulus, statistika, dan analisis numerik. Untuk peminatan aktuaria, materi lebih diarahkan pada analisis risiko finansial, perhitungan asuransi, pensiun, dan investasi menggunakan metode probabilistik dan statistik. Siswa dilatih berpikir kritis dan sistematis untuk menyelesaikan masalah kompleks di berbagai bidang, seperti keuangan, teknologi, dan industri.',
    'core_subjects' => 'Kalkulus, Aljabar Linear, Analisis Real, Probabilitas, Statistika, Matematika Diskrit, Analisis Numerik, Aktuaria',
    'degree_types' => 'S.Si (Sarjana Sains)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Matematikawan, Aktuaris, Analis Keuangan Kuantitatif, Peneliti Operasi, Data Scientist',
    'industry_sectors' => 'Financial Services, Insurance, Banking, Research, Technology, Consulting',
    'future_trends' => 'Big data analytics, financial technology, risk modeling, algorithmic trading',
    'compatibility_reason' => 'Sangat cocok untuk yang menyukai abstraksi, logika murni, dan pemecahan masalah yang membutuhkan pemikiran analitis mendalam.',
    'riasec_match' => 'I',
    'mbti_match' => 'INTP'
],

// I (Investigatif) + INTJ majors (personality_type_id = 6)
[
    'personality_type_id' => 6, // I-INTJ
    'name' => 'Teknik Elektro / Teknik Elektronika',
    'description' => 'Mempelajari desain, pengembangan, dan penerapan sistem listrik, elektronik, dan elektromagnetik.',
    'full_description' => 'Mempelajari desain, pengembangan, dan penerapan sistem listrik, elektronik, dan elektromagnetik. Jurusan ini mencakup pembangkit dan distribusi listrik, sistem kontrol, rangkaian elektronik, sinyal digital dan analog, serta perangkat cerdas. Siswa juga mempelajari penggunaan mikrokontroler, instrumentasi, dan teknologi komunikasi. Fokus utama jurusan ini adalah menciptakan solusi teknologi yang efisien dan andal untuk kebutuhan industri, transportasi, energi, dan otomasi.',
    'core_subjects' => 'Circuit Analysis, Digital Electronics, Power Systems, Control Systems, Signal Processing, Microprocessors, Communication Systems',
    'degree_types' => 'S.T (Sarjana Teknik)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Insinyur Elektro, Desainer Elektronik, Spesialis Otomasi, Peneliti, Konsultan Teknik',
    'industry_sectors' => 'Electronics, Power Generation, Telecommunications, Automation, Research & Development',
    'future_trends' => 'IoT systems, renewable energy integration, smart grids, AI in electronics',
    'compatibility_reason' => 'Cocok karena melibatkan pemecahan masalah teknis yang kompleks, perancangan sistem yang terstruktur, dan inovasi yang membutuhkan pemikiran logis dan analitis.',
    'riasec_match' => 'I',
    'mbti_match' => 'INTJ'
],
[
    'personality_type_id' => 6, // I-INTJ
    'name' => 'Teknik Biomedis',
    'description' => 'Mengaplikasikan prinsip teknik pada biologi dan kedokteran untuk merancang dan mengembangkan teknologi medis.',
    'full_description' => 'Mengaplikasikan prinsip teknik pada biologi dan kedokteran untuk merancang dan mengembangkan teknologi medis. Jurusan ini mencakup pemodelan sistem biologis, pengembangan alat kesehatan seperti prostetik, implan, dan perangkat diagnostik, serta rekayasa jaringan dan sistem pencitraan medis. Siswa dibekali dengan pemahaman multidisiplin yang menggabungkan ilmu teknik, biologi, dan medis untuk menciptakan inovasi yang meningkatkan diagnosis, terapi, dan kualitas layanan kesehatan.',
    'core_subjects' => 'Biomedical Instrumentation, Medical Imaging, Biomaterials, Biomedical Signal Processing, Medical Device Design, Tissue Engineering',
    'degree_types' => 'S.T (Sarjana Teknik)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Insinyur Biomedis, Peneliti Medis, Spesialis Alat Kesehatan, Konsultan Teknologi Kesehatan',
    'industry_sectors' => 'Medical Devices, Healthcare, Pharmaceuticals, Research Institutions, Hospitals',
    'future_trends' => 'Wearable health tech, telemedicine devices, AI in medical diagnosis, personalized medicine',
    'compatibility_reason' => 'Menarik bagi yang ingin menggabungkan minat pada ilmu pengetahuan (Biologi/Kedokteran) dengan kemampuan merancang sistem (Teknik) untuk tujuan praktis dan inovatif.',
    'riasec_match' => 'I',
    'mbti_match' => 'INTJ'
],
[
    'personality_type_id' => 6, // I-INTJ
    'name' => 'Manajemen Teknologi / Inovasi',
    'description' => 'Menggabungkan aspek teknik dengan manajemen bisnis untuk mengelola inovasi dan penerapan teknologi dalam organisasi.',
    'full_description' => 'Menggabungkan aspek teknik dengan manajemen bisnis untuk mengelola inovasi dan penerapan teknologi dalam organisasi. Jurusan ini membahas strategi pengembangan produk, manajemen proyek teknologi, analisis pasar teknologi, serta pengelolaan sumber daya inovatif dalam perusahaan. Siswa dilatih untuk menjembatani dunia teknik dan bisnis melalui pengambilan keputusan berbasis data, pengembangan solusi berkelanjutan, dan penerapan teknologi guna meningkatkan daya saing organisasi.',
    'core_subjects' => 'Innovation Management, Technology Strategy, R&D Management, Product Development, Technology Transfer, Digital Transformation',
    'degree_types' => 'S.T (Sarjana Teknik) / S.M (Sarjana Manajemen)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Manajer Proyek Teknologi, Konsultan IT, Manajer Inovasi, CTO (Chief Technology Officer), Analis Strategi Teknologi',
    'industry_sectors' => 'Technology, Consulting, Manufacturing, Startups, Research & Development',
    'future_trends' => 'Digital transformation, emerging technologies, innovation ecosystems, tech entrepreneurship',
    'compatibility_reason' => 'Menarik bagi tipe kepribadian seperti kamu, tetapi yang ingin menerapkan kemampuan analitis dan strategis mereka dalam konteks bisnis dan inovasi teknologi, memimpin proyek-proyek kompleks.',
    'riasec_match' => 'I',
    'mbti_match' => 'INTJ'
],

// I (Investigatif) + ISTJ majors (personality_type_id = 7)
[
    'personality_type_id' => 7, // I-ISTJ
    'name' => 'Statistika',
    'description' => 'Mempelajari pengumpulan, analisis, interpretasi, presentasi, dan organisasi data.',
    'full_description' => 'Mempelajari pengumpulan, analisis, interpretasi, presentasi, dan organisasi data. Jurusan ini membekali siswa dengan kemampuan mengolah data kuantitatif dan kualitatif untuk menghasilkan informasi yang akurat dalam pengambilan keputusan. Materi mencakup probabilitas, inferensi statistik, regresi, desain eksperimen, dan analisis multivariat. Statistika diterapkan di berbagai bidang seperti ekonomi, kesehatan, industri, teknologi, dan riset sosial untuk memecahkan masalah berbasis data.',
    'core_subjects' => 'Probability Theory, Statistical Inference, Regression Analysis, Experimental Design, Multivariate Analysis, Statistical Computing',
    'degree_types' => 'S.Si (Sarjana Sains)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Statistisi, Analis Data, Aktuaris, Peneliti Pasar, Konsultan Statistik, Ahli Biostatistik',
    'industry_sectors' => 'Research, Healthcare, Finance, Government, Technology, Market Research',
    'future_trends' => 'Big data analytics, machine learning, predictive modeling, data visualization',
    'compatibility_reason' => 'Ideal untuk tipe kepribadian seperti kamu karena sangat berfokus pada data, logika, dan metode yang terstruktur untuk mengungkap pola dan membuat kesimpulan.',
    'riasec_match' => 'I',
    'mbti_match' => 'ISTJ'
],
[
    'personality_type_id' => 7, // I-ISTJ
    'name' => 'Kimia / Biokimia',
    'description' => 'Mempelajari komposisi, struktur, sifat, dan reaksi materi (Kimia) atau proses kimia dalam organisme hidup (Biokimia).',
    'full_description' => 'Mempelajari komposisi, struktur, sifat, dan reaksi materi (Kimia) serta proses kimia dalam organisme hidup (Biokimia). Jurusan Kimia fokus pada reaksi zat, sintesis senyawa, dan analisis laboratorium, sedangkan Biokimia menekankan interaksi molekul biologis seperti protein, enzim, dan DNA dalam sistem kehidupan. Siswa dilatih dalam teknik laboratorium, pemodelan molekul, dan pemahaman mekanisme reaksi untuk diaplikasikan dalam bidang farmasi, pangan, lingkungan, dan kesehatan.',
    'core_subjects' => 'Organic Chemistry, Inorganic Chemistry, Physical Chemistry, Analytical Chemistry, Biochemistry, Molecular Biology, Laboratory Techniques',
    'degree_types' => 'S.Si (Sarjana Sains)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Peneliti Kimia/Biokimia, Quality Control Analyst, Laboran, Pengembang Produk (farmasi, kosmetik, pangan)',
    'industry_sectors' => 'Pharmaceuticals, Food & Beverage, Cosmetics, Research Institutions, Chemical Industry',
    'future_trends' => 'Green chemistry, nanotechnology, personalized medicine, sustainable materials',
    'compatibility_reason' => 'Cocok untuk tipe kepribadian yang teliti dalam eksperimen, analisis data, dan memahami sistem yang kompleks dengan dasar fakta dan observasi.',
    'riasec_match' => 'I',
    'mbti_match' => 'ISTJ'
],
[
    'personality_type_id' => 7, // I-ISTJ
    'name' => 'Teknik Lingkungan',
    'description' => 'Mempelajari solusi rekayasa untuk masalah lingkungan, seperti pengelolaan limbah, polusi udara, dan sumber daya air.',
    'full_description' => 'Mempelajari solusi rekayasa untuk masalah lingkungan, seperti pengelolaan limbah, polusi udara, dan sumber daya air. Jurusan ini membekali siswa dengan pengetahuan tentang teknik pengolahan air bersih dan air limbah, manajemen limbah padat, pengendalian pencemaran, serta rekayasa lingkungan berkelanjutan. Siswa juga mempelajari analisis dampak lingkungan, teknologi ramah lingkungan, dan kebijakan lingkungan guna menciptakan sistem yang mendukung kesehatan manusia dan keseimbangan ekosistem.',
    'core_subjects' => 'Water Treatment, Air Pollution Control, Solid Waste Management, Environmental Chemistry, Environmental Impact Assessment, Sustainability Engineering',
    'degree_types' => 'S.T (Sarjana Teknik)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Insinyur Lingkungan, Konsultan Lingkungan, Analis Dampak Lingkungan, Spesialis Pengelolaan Limbah',
    'industry_sectors' => 'Environmental Consulting, Government, Manufacturing, Water Treatment, Waste Management',
    'future_trends' => 'Climate change mitigation, circular economy, renewable energy, smart environmental monitoring',
    'compatibility_reason' => 'Menarik bagi tipe kepribadian yang suka memecahkan masalah dengan pendekatan sistematis, menganalisis data lingkungan, dan menerapkan standar teknis untuk keberlanjutan.',
    'riasec_match' => 'I',
    'mbti_match' => 'ISTJ'
],

// I (Investigatif) + INFP majors (personality_type_id = 8)
[
    'personality_type_id' => 8, // I-INFP
    'name' => 'Psikologi (terutama Klinis, Perkembangan, Sosial)',
    'description' => 'Mempelajari perilaku dan proses mental manusia, termasuk emosi, pikiran, dan interaksi sosial.',
    'full_description' => 'Mempelajari perilaku dan proses mental manusia, termasuk emosi, pikiran, dan interaksi sosial. Jurusan ini mencakup pemahaman mendalam tentang fungsi kognitif, motivasi, kepribadian, dan dinamika hubungan antarindividu. Psikologi klinis fokus pada asesmen dan penanganan gangguan mental, psikologi perkembangan meneliti perubahan perilaku sepanjang rentang kehidupan, sedangkan psikologi sosial membahas bagaimana individu dipengaruhi oleh lingkungan sosial. Siswa juga dilatih dalam metode observasi, wawancara, eksperimen, dan analisis data psikologis.',
    'core_subjects' => 'Cognitive Psychology, Developmental Psychology, Social Psychology, Abnormal Psychology, Research Methods, Psychological Assessment, Counseling Techniques',
    'degree_types' => 'S.Psi (Sarjana Psikologi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Psikolog Klinis (dengan pendidikan lanjutan), Konselor, Psikolog Pendidikan, Peneliti Psikologi, Terapis',
    'industry_sectors' => 'Healthcare, Education, Research, Human Resources, Mental Health Services',
    'future_trends' => 'Digital therapy, mental health awareness, positive psychology, neuropsychology',
    'compatibility_reason' => 'Sangat cocok karena memungkinkan eksplorasi mendalam tentang diri sendiri dan orang lain (Investigatif), sambil tetap menjunjung tinggi empati dan nilai-nilai (Feeling).',
    'riasec_match' => 'I',
    'mbti_match' => 'INFP'
],
[
    'personality_type_id' => 8, // I-INFP
    'name' => 'Sosiologi / Antropologi',
    'description' => 'Mempelajari struktur sosial, interaksi manusia dalam masyarakat (Sosiologi), serta budaya dan evolusi manusia (Antropologi).',
    'full_description' => 'Mempelajari struktur sosial, interaksi manusia dalam masyarakat (Sosiologi), serta budaya dan evolusi manusia (Antropologi). Jurusan ini mengeksplorasi pola perilaku sosial, institusi, nilai, dan norma yang membentuk kehidupan bermasyarakat. Dalam antropologi, fokus diarahkan pada aspek budaya, bahasa, arkeologi, dan biologi manusia. Siswa dilatih menggunakan pendekatan kualitatif dan kuantitatif untuk meneliti isu-isu sosial, identitas, perubahan budaya, dan dinamika komunitas secara kritis dan kontekstual.',
    'core_subjects' => 'Social Theory, Cultural Anthropology, Research Methods, Social Problems, Community Studies, Ethnography, Social Change',
    'degree_types' => 'S.Sos (Sarjana Sosial)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Peneliti Sosial, Pekerja Sosial, Konsultan Lintas Budaya, Analis Kebijakan Sosial, Kurator Museum (Antropologi)',
    'industry_sectors' => 'Research, Social Services, Government, NGOs, Cultural Institutions',
    'future_trends' => 'Digital sociology, cultural preservation, social impact measurement, community development',
    'compatibility_reason' => 'Menarik bagi yang ingin memahami keragaman manusia dan budaya (Investigatif) dengan pendekatan yang holistik, seringkali melibatkan empati, dan mencari makna di balik fenomena sosial.',
    'riasec_match' => 'I',
    'mbti_match' => 'INFP'
],
[
    'personality_type_id' => 8, // I-INFP
    'name' => 'Ilmu Lingkungan / Ekologi',
    'description' => 'Mempelajari interaksi antara manusia dan lingkungan, serta masalah-masalah lingkungan dan solusinya.',
    'full_description' => 'Mempelajari interaksi antara manusia dan lingkungan, serta masalah-masalah lingkungan dan solusinya. Ekologi lebih fokus pada hubungan antara organisme dengan lingkungannya, termasuk rantai makanan, siklus ekosistem, dan keseimbangan hayati. Jurusan ini membekali siswa dengan pemahaman multidisiplin tentang perubahan iklim, konservasi alam, pencemaran, dan pengelolaan sumber daya alam. Siswa juga dilatih dalam riset lingkungan, analisis dampak ekologis, serta perancangan strategi keberlanjutan untuk menjaga kelestarian bumi.',
    'core_subjects' => 'Ecology, Environmental Chemistry, Conservation Biology, Climate Science, Environmental Policy, Ecosystem Management, Sustainability Studies',
    'degree_types' => 'S.Si (Sarjana Sains)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Ilmuwan Lingkungan, Konservasionis, Peneliti Ekologi, Analis Kebijakan Lingkungan, Aktivis Lingkungan',
    'industry_sectors' => 'Environmental Consulting, Conservation Organizations, Government, Research Institutions, NGOs',
    'future_trends' => 'Climate change research, biodiversity conservation, sustainable development, environmental monitoring',
    'compatibility_reason' => 'Jurusan ini cocok untuk yang memiliki kepedulian terhadap alam dan ingin memahami sistem kompleks di dalamnya, serta mencari solusi yang selaras dengan nilai-nilai etis.',
    'riasec_match' => 'I',
    'mbti_match' => 'INFP'
],
// Lanjutan untuk array $majors di MajorSeeder.php

// A (Artistik) + INFP majors (personality_type_id = 9)
[
    'personality_type_id' => 9, // A-INFP
    'name' => 'Desain Komunikasi Visual (DKV)',
    'description' => 'Mempelajari perancangan media komunikasi visual seperti grafis, ilustrasi, branding, poster, dan multimedia.',
    'full_description' => 'Mempelajari perancangan media komunikasi visual seperti grafis, ilustrasi, branding, poster, dan multimedia. Jurusan ini menggabungkan elemen seni, teknologi, dan strategi komunikasi untuk menyampaikan pesan secara efektif melalui visual. Siswa dibekali dengan keterampilan dalam tipografi, fotografi, desain interaktif, animasi, dan desain UI/UX. DKV menekankan kreativitas dan pemahaman audiens dalam menciptakan karya visual yang informatif, estetis, dan fungsional di berbagai platform media.',
    'core_subjects' => 'Typography, Graphic Design, Brand Identity, Digital Design, Photography, Illustration, UI/UX Design, Animation',
    'degree_types' => 'S.Ds (Sarjana Desain)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Desainer Grafis, Illustrator, Animator, Art Director, Desainer UI/UX, Content Creator',
    'industry_sectors' => 'Advertising, Digital Media, Publishing, Entertainment, Technology',
    'future_trends' => 'Motion graphics, interactive design, AR/VR design, digital branding',
    'compatibility_reason' => 'Memberi ruang untuk berekspresi secara visual, menciptakan pesan yang bermakna, dan bekerja dengan kebebasan kreatif. Mereka dapat menuangkan idealisme dan emosi ke dalam karya visual.',
    'riasec_match' => 'A',
    'mbti_match' => 'INFP'
],
[
    'personality_type_id' => 9, // A-INFP
    'name' => 'Sastra Indonesia / Sastra Inggris',
    'description' => 'Mempelajari karya sastra, menganalisis teks, serta mengembangkan keterampilan menulis kreatif dan kritis.',
    'full_description' => 'Mempelajari karya sastra, menganalisis teks, serta mengembangkan keterampilan menulis kreatif dan kritis. Jurusan ini mengeksplorasi puisi, prosa, drama, serta teori sastra dalam konteks budaya dan sejarah. Sastra Indonesia fokus pada karya dalam bahasa Indonesia dan kajian budaya lokal, sedangkan Sastra Inggris mempelajari sastra dari dunia berbahasa Inggris serta keterampilan berbahasa asing. Siswa dilatih untuk berpikir reflektif, memahami makna mendalam suatu teks, dan menciptakan karya tulis yang ekspresif dan argumentatif.',
    'core_subjects' => 'Literary Analysis, Creative Writing, Linguistics, Cultural Studies, Literary Theory, Poetry, Prose, Drama',
    'degree_types' => 'S.S (Sarjana Sastra)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Penulis/Editor, Jurnalis, Content Writer, Penerjemah, Guru/Dosen Sastra, Penulis Skenario',
    'industry_sectors' => 'Publishing, Media, Education, Translation Services, Creative Writing',
    'future_trends' => 'Digital storytelling, multimedia content, cross-cultural literature, AI-assisted writing',
    'compatibility_reason' => 'Sangat cocok untuk yang memiliki imajinasi kuat, sensitivitas terhadap bahasa dan cerita, serta keinginan untuk berekspresi melalui tulisan. Kamu dapat mengeksplorasi tema-tema filosofis dan emosional dalam karya mereka.',
    'riasec_match' => 'A',
    'mbti_match' => 'INFP'
],
[
    'personality_type_id' => 9, // A-INFP
    'name' => 'Seni Rupa Murni (Lukis, Patung, Grafis)',
    'description' => 'Berfokus pada ekspresi visual dan konseptual melalui berbagai media seni tradisional dan kontemporer.',
    'full_description' => 'Berfokus pada ekspresi visual dan konseptual melalui berbagai media seni tradisional dan kontemporer. Jurusan ini mencakup penguasaan teknik seni seperti melukis, membuat patung, cetak grafis, serta eksplorasi media campuran. Siswa didorong untuk mengembangkan gaya personal, sensitivitas estetis, dan pemahaman terhadap sejarah serta teori seni. Melalui proses studio dan kritik karya, mahasiswa dilatih untuk menuangkan ide, emosi, dan gagasan sosial ke dalam bentuk visual yang orisinal dan bermakna.',
    'core_subjects' => 'Drawing, Painting, Sculpture, Printmaking, Art History, Art Theory, Studio Practice, Mixed Media',
    'degree_types' => 'S.Sn (Sarjana Seni)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Seniman Profesional, Kurator Seni, Penulis Kritik Seni, Pengelola Galeri, Edukator Seni',
    'industry_sectors' => 'Fine Arts, Galleries, Museums, Art Education, Cultural Institutions',
    'future_trends' => 'Digital art, NFT art market, interactive installations, sustainable art practices',
    'compatibility_reason' => 'Ideal untuk tipe kepribadian kamu yang mencari kebebasan penuh dalam berekspresi, mengeksplorasi ide-ide pribadi, dan menciptakan karya yang mendalam dan bermakna tanpa batasan komersial.',
    'riasec_match' => 'A',
    'mbti_match' => 'INFP'
],

// A (Artistik) + ENFP majors (personality_type_id = 10)
[
    'personality_type_id' => 10, // A-ENFP
    'name' => 'Seni Pertunjukan (Teater, Musik, Tari)',
    'description' => 'Mempelajari dan mempraktikkan berbagai bentuk seni pertunjukan, termasuk akting, penyutradaraan, musik, dan tari.',
    'full_description' => 'Mempelajari dan mempraktikkan berbagai bentuk seni pertunjukan, termasuk akting, penyutradaraan, musik, dan tari. Jurusan ini membekali siswa dengan teknik ekspresi artistik, komposisi pertunjukan, koreografi, vokal, instrumen, serta pemahaman estetika dan budaya. Proses pembelajarannya mencakup latihan intensif, kerja kolaboratif, dan pertunjukan langsung. Siswa juga mempelajari teori seni, kritik pertunjukan, dan manajemen produksi untuk mengembangkan karya yang kreatif, komunikatif, dan bermakna secara sosial maupun budaya.',
    'core_subjects' => 'Acting, Directing, Music Theory, Dance Choreography, Voice Training, Stage Management, Performance Studies, Cultural Arts',
    'degree_types' => 'S.Sn (Sarjana Seni)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Aktor/Aktris, Sutradara, Musisi, Penari, Koreografer, Pengelola Panggung, Guru Seni Pertunjukan',
    'industry_sectors' => 'Entertainment, Theater, Music Industry, Dance Companies, Cultural Arts, Education',
    'future_trends' => 'Digital performances, virtual reality theater, streaming platforms, immersive experiences',
    'compatibility_reason' => 'Sangat ideal untuk yang ingin mengekspresikan diri secara dinamis di depan publik (Ekstrovert) dan menggunakan imajinasi serta emosi mereka dalam karya seni seperti tipe kepribadian kamu. Kamu dapat menginspirasi dan menghibur audiens.',
    'riasec_match' => 'A',
    'mbti_match' => 'ENFP'
],
[
    'personality_type_id' => 10, // A-ENFP
    'name' => 'Film & Televisi / Produksi Media',
    'description' => 'Mempelajari seluruh proses produksi konten visual dan audio untuk film, televisi, dan platform digital, termasuk penulisan skenario, penyutradaraan, sinematografi, dan editing.',
    'full_description' => 'Mempelajari seluruh proses produksi konten visual dan audio untuk film, televisi, dan platform digital, termasuk penulisan skenario, penyutradaraan, sinematografi, dan editing. Jurusan ini mengajarkan teknik storytelling visual, tata kamera, pencahayaan, suara, hingga pascaproduksi. Siswa juga mempelajari estetika media, kritik film, serta manajemen produksi. Fokus utamanya adalah membentuk kreator yang mampu menghasilkan karya orisinal, komunikatif, dan relevan dengan perkembangan teknologi serta kebutuhan industri media saat ini.',
    'core_subjects' => 'Screenwriting, Cinematography, Film Directing, Video Editing, Sound Design, Production Management, Media Studies, Digital Content Creation',
    'degree_types' => 'S.Sn (Sarjana Seni) / S.IKom (Sarjana Ilmu Komunikasi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Sutradara Film/TV, Penulis Skenario, Produser, Sinematografer, Editor Video, Content Creator, Youtuber/Influencer',
    'industry_sectors' => 'Film Industry, Television, Digital Media, Streaming Platforms, Advertising, Content Creation',
    'future_trends' => 'Streaming content, virtual production, AI in filmmaking, interactive storytelling',
    'compatibility_reason' => 'Memberi kesempatan untuk menggabungkan kreativitas, storytelling, dan kemampuan berinteraksi untuk menciptakan karya yang berpengaruh dan menjangkau audiens luas.',
    'riasec_match' => 'A',
    'mbti_match' => 'ENFP'
],
[
    'personality_type_id' => 10, // A-ENFP
    'name' => 'Jurnalisme (Fokus Kreatif & Human Interest)',
    'description' => 'Mempelajari pengumpulan, penulisan, dan penyampaian berita serta cerita kepada publik, dengan fokus pada aspek naratif dan kemanusiaan.',
    'full_description' => 'Mempelajari pengumpulan, penulisan, dan penyampaian berita serta cerita kepada publik, dengan fokus pada aspek naratif dan kemanusiaan. Jurusan ini membekali siswa dengan keterampilan riset lapangan, wawancara mendalam, penulisan feature, dan teknik storytelling yang menggugah emosi. Mahasiswa diajak memahami etika jurnalistik, analisis isu sosial, serta penggunaan media digital untuk menyampaikan cerita yang bermakna dan berdampak. Fokus human interest menempatkan pengalaman manusia sebagai inti dari setiap narasi yang disampaikan.',
    'core_subjects' => 'News Writing, Feature Writing, Investigative Journalism, Media Ethics, Digital Journalism, Interview Techniques, Multimedia Reporting',
    'degree_types' => 'S.IKom (Sarjana Ilmu Komunikasi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Jurnalis Investigatif, Penulis Feature, Editor Majalah, Reporter Lapangan, Content Writer, Podcaster',
    'industry_sectors' => 'Media, Publishing, Digital News, Broadcasting, Online Platforms, Magazine Industry',
    'future_trends' => 'Digital journalism, data journalism, podcast journalism, citizen journalism',
    'compatibility_reason' => 'Menarik bagi kamu yang suka bercerita, berinteraksi dengan orang lain (Ekstrovert), dan menemukan cara-cara kreatif untuk menyajikan informasi yang menginspirasi atau menyentuh emosi.',
    'riasec_match' => 'A',
    'mbti_match' => 'ENFP'
],

// A (Artistik) + ISFP majors (personality_type_id = 11)
[
    'personality_type_id' => 11, // A-ISFP
    'name' => 'Fashion Design / Tata Busana',
    'description' => 'Mempelajari perancangan, pembuatan pola, dan produksi pakaian serta aksesoris.',
    'full_description' => 'Mempelajari perancangan, pembuatan pola, dan produksi pakaian serta aksesoris. Jurusan ini menggabungkan kreativitas dan keterampilan teknis dalam menciptakan desain busana yang fungsional, estetis, dan sesuai tren. Materi mencakup ilustrasi mode, teknik menjahit, tekstil, draping, hingga pengembangan koleksi. Siswa juga diajarkan tentang sejarah mode, pemasaran produk fashion, dan pemanfaatan teknologi dalam industri pakaian, sehingga siap berkontribusi di dunia desain dan bisnis mode.',
    'core_subjects' => 'Fashion Illustration, Pattern Making, Textile Design, Garment Construction, Fashion History, Fashion Marketing, Draping, Collection Development',
    'degree_types' => 'S.Ds (Sarjana Desain)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Desainer Busana, Stylist, Merchandiser, Penata Kostum, Pengusaha Butik',
    'industry_sectors' => 'Fashion Industry, Retail, Entertainment, Textile, E-commerce Fashion',
    'future_trends' => 'Sustainable fashion, digital fashion design, 3D fashion modeling, personalized clothing',
    'compatibility_reason' => 'Sangat cocok untuk kamu yang ingin mengekspresikan kreativitas dan kepekaan estetika mereka melalui media konkret (bahan) dan membutuhkan keterampilan manual. Kamu dapat menciptakan karya yang personal dan orisinal.',
    'riasec_match' => 'A',
    'mbti_match' => 'ISFP'
],
[
    'personality_type_id' => 11, // A-ISFP
    'name' => 'Desain Interior',
    'description' => 'Merancang dan menata ruang interior yang fungsional dan estetis, memperhatikan suasana dan kenyamanan.',
    'full_description' => 'Merancang dan menata ruang interior yang fungsional dan estetis, memperhatikan suasana dan kenyamanan. Jurusan ini memadukan elemen seni, arsitektur, dan psikologi ruang untuk menciptakan lingkungan yang mendukung aktivitas manusia. Siswa mempelajari tata ruang, pencahayaan, warna, material, furnitur, serta perangkat lunak desain 2D/3D. Selain estetika, aspek ergonomi, keberlanjutan, dan efisiensi ruang juga menjadi fokus agar hasil rancangan interior memenuhi kebutuhan fisik dan emosional pengguna.',
    'core_subjects' => 'Space Planning, Color Theory, Lighting Design, Furniture Design, Material Studies, 3D Modeling, Sustainable Design, Project Management',
    'degree_types' => 'S.Ds (Sarjana Desain)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Desainer Interior, Konsultan Desain Ruang, Penata Pameran, Kontraktor Interior, Pengembang Properti (aspek desain)',
    'industry_sectors' => 'Interior Design, Architecture, Real Estate, Hospitality, Retail Design',
    'future_trends' => 'Smart home design, biophilic design, virtual reality in design, sustainable interiors',
    'compatibility_reason' => 'Memungkinkan kamu untuk menggabungkan apresiasi estetika, perhatian pada detail fisik, dan kemampuan untuk menciptakan lingkungan yang harmonis dan nyaman.',
    'riasec_match' => 'A',
    'mbti_match' => 'ISFP'
],
[
    'personality_type_id' => 11, // A-ISFP
    'name' => 'Fotografi',
    'description' => 'Mempelajari teknik dan seni pengambilan gambar, termasuk komposisi, pencahayaan, dan editing, untuk tujuan artistik atau komersial.',
    'full_description' => 'Mempelajari teknik dan seni pengambilan gambar, termasuk komposisi, pencahayaan, dan editing, untuk tujuan artistik atau komersial. Jurusan ini membekali siswa dengan pemahaman estetika visual, narasi melalui gambar, serta penggunaan peralatan kamera dan perangkat lunak pascaproduksi. Bidang kajiannya mencakup fotografi jurnalistik, fashion, produk, dokumenter, dan eksperimental. Selain keterampilan teknis, mahasiswa juga dilatih dalam membangun portofolio, konsep kreatif, dan sensitivitas visual dalam menyampaikan pesan melalui foto.',
    'core_subjects' => 'Photography Techniques, Digital Imaging, Photo Editing, Studio Lighting, Portrait Photography, Documentary Photography, Commercial Photography',
    'degree_types' => 'S.Sn (Sarjana Seni) / S.Ds (Sarjana Desain)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Fotografer Profesional (Fashion, Komersial, Jurnalistik, Seni), Editor Foto, Videografer, Kurator Foto',
    'industry_sectors' => 'Photography, Media, Advertising, Wedding Industry, Fine Arts, Fashion',
    'future_trends' => 'Drone photography, AI-enhanced editing, virtual reality photography, social media photography',
    'compatibility_reason' => 'Ideal untuk kamu yang memiliki mata yang tajam untuk detail visual, suka berekspresi melalui medium non-verbal, dan dapat bekerja secara mandiri dalam menangkap momen atau menciptakan komposisi.',
    'riasec_match' => 'A',
    'mbti_match' => 'ISFP'
],

// A (Artistik) + ENFJ majors (personality_type_id = 12)
[
    'personality_type_id' => 12, // A-ENFJ
    'name' => 'Pendidikan Seni (Musik/Rupa/Tari)',
    'description' => 'Mempersiapkan individu untuk menjadi pengajar seni di berbagai jenjang pendidikan, mengembangkan kurikulum dan metode pengajaran kreatif.',
    'full_description' => 'Mempersiapkan individu untuk menjadi pengajar seni di berbagai jenjang pendidikan, mengembangkan kurikulum dan metode pengajaran kreatif. Jurusan ini memadukan keterampilan artistik dengan pedagogi, mencakup teknik mengajar, psikologi pendidikan, dan evaluasi pembelajaran seni. Siswa mendalami teori dan praktik seni sesuai bidang (musik, rupa, atau tari), serta belajar menciptakan lingkungan belajar yang inspiratif, ekspresif, dan mendorong apresiasi seni sejak usia dini hingga remaja.',
    'core_subjects' => 'Art Education Theory, Teaching Methods, Curriculum Development, Child Psychology, Art Therapy, Music Education, Visual Arts Education, Dance Education',
    'degree_types' => 'S.Pd (Sarjana Pendidikan)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Guru Seni, Instruktur Seni Komunitas, Pengembang Kurikulum Seni, Koordinator Program Seni',
    'industry_sectors' => 'Education, Community Arts, Cultural Organizations, Art Therapy, Private Art Schools',
    'future_trends' => 'Digital art education, online art classes, inclusive art education, STEAM integration',
    'compatibility_reason' => 'Ideal untuk kamu yang ingin berbagi passion seni, membimbing dan menginspirasi orang lain (Ekstrovert), serta menciptakan lingkungan belajar yang positif dan kolaboratif.',
    'riasec_match' => 'A',
    'mbti_match' => 'ENFJ'
],
[
    'personality_type_id' => 12, // A-ENFJ
    'name' => 'Pendidikan (Pendidikan Bahasa, Pendidikan Agama, Pendidikan Anak Usia Dini)',
    'description' => 'Mempersiapkan pendidik untuk mengajarkan mata pelajaran tertentu atau kelompok usia tertentu.',
    'full_description' => 'Mempersiapkan pendidik untuk mengajarkan mata pelajaran tertentu atau kelompok usia tertentu, dengan fokus pada pengembangan potensi siswa. Jurusan ini mencakup teori belajar, perencanaan pembelajaran, metode pengajaran yang sesuai dengan karakteristik peserta didik, serta evaluasi hasil belajar. Pendidikan Bahasa menekankan pada penguasaan linguistik dan keterampilan komunikasi, Pendidikan Agama membentuk nilai-nilai spiritual dan moral, sedangkan PAUD menitikberatkan pada pendekatan holistik untuk tumbuh kembang anak secara kognitif, emosional, sosial, dan motorik.',
    'core_subjects' => 'Educational Psychology, Curriculum Development, Teaching Methods, Assessment, Child Development, Language Pedagogy, Religious Studies, Early Childhood Education',
    'degree_types' => 'S.Pd (Sarjana Pendidikan)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Guru/Dosen, Konsultan Pendidikan, Pengembang Kurikulum, Pengelola Lembaga Pendidikan',
    'industry_sectors' => 'Education, Schools, Universities, Educational Consulting, Training Institutions',
    'future_trends' => 'Digital learning, personalized education, inclusive education, multilingual education',
    'compatibility_reason' => 'Cocok untuk kamu yang memiliki kemampuan komunikasi yang kuat, empati, dan keinginan untuk membentuk dan menginspirasi generasi muda, seringkali dengan pendekatan kreatif dalam pengajaran.',
    'riasec_match' => 'A',
    'mbti_match' => 'ENFJ'
],
[
    'personality_type_id' => 12, // A-ENFJ
    'name' => 'Desain Komunikasi Visual (Fokus Branding/Sosial)',
    'description' => 'Mempelajari perancangan media komunikasi visual, dengan penekanan pada pengembangan identitas merek atau kampanye sosial yang inspiratif.',
    'full_description' => 'Mempelajari perancangan media komunikasi visual, dengan penekanan pada pengembangan identitas merek atau kampanye sosial yang inspiratif. Jurusan ini mengeksplorasi strategi visual untuk membangun citra dan pesan yang kuat, baik untuk kebutuhan komersial maupun isu sosial. Mahasiswa belajar merancang logo, identitas visual, kemasan, poster, infografis, hingga konten digital yang komunikatif dan berdampak. Kritis terhadap isu-isu masyarakat dan tren budaya juga menjadi bagian penting agar karya mampu menyampaikan nilai dan menggerakkan audiens.',
    'core_subjects' => 'Brand Design, Social Campaign Design, Visual Identity, Typography, Digital Marketing Design, Infographic Design, Community Engagement Design',
    'degree_types' => 'S.Ds (Sarjana Desain)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Desainer Grafis, Brand Strategist, Copywriter, Art Director, Manajer Kampanye Sosial',
    'industry_sectors' => 'Advertising, Branding Agencies, NGOs, Social Enterprises, Marketing Agencies',
    'future_trends' => 'Purpose-driven design, social impact design, sustainable branding, digital activism',
    'compatibility_reason' => 'Memungkinkan kamu untuk menggunakan kreativitas mereka dalam mengkomunikasikan pesan yang memiliki dampak sosial atau membangun koneksi emosional dengan audiens, seringkali dalam kolaborasi tim.',
    'riasec_match' => 'A',
    'mbti_match' => 'ENFJ'
],
// Lanjutan untuk array $majors di MajorSeeder.php

// S (Sosial) + INFJ majors (personality_type_id = 13)
[
    'personality_type_id' => 13, // S-INFJ
    'name' => 'Psikologi (terutama Klinis, Konseling, Perkembangan)',
    'description' => 'Mempelajari perilaku dan proses mental manusia, termasuk diagnosis, pengobatan, dan pencegahan masalah kesehatan mental.',
    'full_description' => 'Mempelajari perilaku dan proses mental manusia, termasuk diagnosis, pengobatan, dan pencegahan masalah kesehatan mental. Fokus Klinis menekankan pada asesmen dan intervensi terhadap gangguan psikologis, Konseling berfokus pada pemberian bantuan emosional dan pengembangan potensi individu, sedangkan Psikologi Perkembangan mempelajari perubahan perilaku dan mental sepanjang rentang kehidupan. Mahasiswa dibekali keterampilan observasi, wawancara, psikometri, serta pemahaman mendalam tentang emosi, kepribadian, dan relasi sosial untuk mendukung kesejahteraan psikologis individu.',
    'core_subjects' => 'Clinical Psychology, Counseling Techniques, Developmental Psychology, Psychotherapy, Psychological Assessment, Mental Health, Research Methods',
    'degree_types' => 'S.Psi (Sarjana Psikologi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Psikolog Klinis (dengan pendidikan lanjutan), Konselor, Terapis, Psikolog Pendidikan, Psikolog Organisasi (fokus pada kesejahteraan)',
    'industry_sectors' => 'Healthcare, Mental Health Services, Education, Social Services, Private Practice',
    'future_trends' => 'Teletherapy, mental health technology, trauma-informed care, positive psychology',
    'compatibility_reason' => 'Sangat cocok untuk kamu yang memiliki empati mendalam, intuisi tentang masalah manusia, dan keinginan untuk membantu individu mengatasi tantangan psikologis. Kamu dapat memberikan dukungan yang mendalam dan transformatif.',
    'riasec_match' => 'S',
    'mbti_match' => 'INFJ'
],
[
    'personality_type_id' => 13, // S-INFJ
    'name' => 'Ilmu Kesejahteraan Sosial',
    'description' => 'Mempelajari intervensi untuk membantu individu, keluarga, dan komunitas mengatasi masalah sosial dan meningkatkan kualitas hidup.',
    'full_description' => 'Mempelajari intervensi untuk membantu individu, keluarga, dan komunitas mengatasi masalah sosial dan meningkatkan kualitas hidup. Jurusan ini membekali mahasiswa dengan pemahaman teori sosial, kebijakan publik, dan keterampilan praktik kerja sosial seperti asesmen, konseling, dan advokasi. Fokusnya adalah pemberdayaan kelompok rentan, perlindungan anak, layanan rehabilitasi, dan pengembangan masyarakat. Mahasiswa juga dilatih dalam kerja lapangan dan kolaborasi lintas sektor untuk menciptakan perubahan sosial yang inklusif dan berkelanjutan.',
    'core_subjects' => 'Social Work Theory, Community Development, Social Policy, Case Management, Human Rights, Social Research, Group Work, Crisis Intervention',
    'degree_types' => 'S.Sos (Sarjana Sosial)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Pekerja Sosial, Case Manager, Koordinator Program Sosial, Konsultan Pembangunan Komunitas, Peneliti Sosial',
    'industry_sectors' => 'Social Services, NGOs, Government, Healthcare, Community Organizations',
    'future_trends' => 'Digital social work, community-based interventions, trauma-informed practice, social entrepreneurship',
    'compatibility_reason' => 'Ideal untuk kamu yang memiliki kepedulian sosial yang kuat, keinginan untuk melakukan perubahan positif di masyarakat, dan kemampuan untuk memahami dan menavigasi sistem untuk membantu yang membutuhkan.',
    'riasec_match' => 'S',
    'mbti_match' => 'INFJ'
],
[
    'personality_type_id' => 13, // S-INFJ
    'name' => 'Bimbingan Konseling',
    'description' => 'Mempersiapkan konselor untuk membantu individu mengembangkan potensi mereka, mengatasi masalah pribadi, sosial, atau akademik.',
    'full_description' => 'Mempersiapkan konselor untuk membantu individu mengembangkan potensi mereka, serta mengatasi masalah pribadi, sosial, atau akademik. Jurusan ini mengajarkan teori perkembangan individu, teknik konseling, psikologi pendidikan, dan etika profesi. Mahasiswa dilatih dalam keterampilan komunikasi empatik, asesmen psikologis, dan penyusunan program bimbingan di lingkungan sekolah maupun masyarakat. Tujuannya adalah membentuk pendamping yang mampu membimbing individu dalam membuat keputusan positif, meningkatkan kesejahteraan mental, dan membangun hubungan interpersonal yang sehat.',
    'core_subjects' => 'Counseling Theory, Individual Counseling, Group Counseling, Career Guidance, Educational Psychology, Crisis Counseling, Family Counseling',
    'degree_types' => 'S.Pd (Sarjana Pendidikan)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Konselor Sekolah, Konselor Karir, Konselor Keluarga, Konselor Rehabilitasi',
    'industry_sectors' => 'Education, Mental Health, Rehabilitation Centers, Community Centers, Private Practice',
    'future_trends' => 'Online counseling, peer counseling programs, multicultural counseling, preventive mental health',
    'compatibility_reason' => 'Cocok untuk kamu yang suka mendengarkan, memberikan dukungan emosional, dan membimbing orang lain menuju pertumbuhan pribadi, dengan pendekatan yang peka dan mendalam.',
    'riasec_match' => 'S',
    'mbti_match' => 'INFJ'
],

// S (Sosial) + ISFJ majors (personality_type_id = 14)
[
    'personality_type_id' => 14, // S-ISFJ
    'name' => 'Keperawatan',
    'description' => 'Memberikan perawatan kesehatan langsung kepada pasien, membantu pemulihan, dan mendidik tentang kesehatan.',
    'full_description' => 'Memberikan perawatan kesehatan langsung kepada pasien, membantu pemulihan, dan mendidik tentang kesehatan. Jurusan ini membekali mahasiswa dengan pengetahuan anatomi, fisiologi, farmakologi, dan keperawatan klinis. Mahasiswa juga dilatih dalam keterampilan komunikasi, etika profesi, serta penanganan pasien dalam berbagai situasi medis, baik di rumah sakit maupun komunitas. Fokus utama adalah pelayanan holistik yang mencakup aspek fisik, psikologis, dan sosial, serta peran penting perawat dalam tim kesehatan untuk meningkatkan kualitas hidup pasien.',
    'core_subjects' => 'Nursing Fundamentals, Medical-Surgical Nursing, Pediatric Nursing, Community Health Nursing, Mental Health Nursing, Pharmacology, Anatomy & Physiology',
    'degree_types' => 'S.Kep (Sarjana Keperawatan)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Perawat Klinis, Perawat Komunitas, Perawat Spesialis (dengan pendidikan lanjutan), Kepala Perawat, Perawat Geriatri',
    'industry_sectors' => 'Healthcare, Hospitals, Community Health Centers, Home Care, Long-term Care Facilities',
    'future_trends' => 'Telemedicine nursing, specialized nursing care, geriatric nursing, preventive healthcare',
    'compatibility_reason' => 'Sangat cocok untuk kamu yang ingin memberikan bantuan konkret, bekerja dengan detail, dan merawat orang lain dengan penuh dedikasi dan rasa tanggung jawab yang tinggi.',
    'riasec_match' => 'S',
    'mbti_match' => 'ISFJ'
],
[
    'personality_type_id' => 14, // S-ISFJ
    'name' => 'Gizi / Dietisien',
    'description' => 'Mempelajari ilmu pangan dan nutrisi, serta bagaimana menerapkannya untuk meningkatkan kesehatan individu atau kelompok.',
    'full_description' => 'Mempelajari ilmu pangan dan nutrisi, serta bagaimana menerapkannya untuk meningkatkan kesehatan individu atau kelompok. Jurusan ini mencakup biokimia nutrisi, dietetik klinis, manajemen pelayanan makanan, dan promosi kesehatan. Mahasiswa dibekali keterampilan untuk menyusun rencana makan sesuai kebutuhan medis, mengedukasi masyarakat tentang pola makan sehat, serta menangani masalah malnutrisi, obesitas, dan penyakit terkait gizi. Peran dietisien sangat penting dalam pencegahan dan pemulihan kesehatan melalui intervensi berbasis nutrisi yang tepat.',
    'core_subjects' => 'Nutrition Science, Clinical Nutrition, Food Service Management, Community Nutrition, Biochemistry, Food Safety, Diet Therapy',
    'degree_types' => 'S.Gz (Sarjana Gizi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Ahli Gizi Klinis, Konsultan Gizi, Peneliti Gizi, Pengembang Produk Pangan Sehat, Edukator Gizi Masyarakat',
    'industry_sectors' => 'Healthcare, Food Industry, Public Health, Sports Nutrition, Research Institutions',
    'future_trends' => 'Personalized nutrition, functional foods, nutrition technology, preventive nutrition',
    'compatibility_reason' => 'Ideal untuk tipe kepribadian ini yang suka membantu orang lain secara praktis melalui edukasi kesehatan dan memberikan saran yang detail dan terstruktur terkait nutrisi.',
    'riasec_match' => 'S',
    'mbti_match' => 'ISFJ'
],
[
    'personality_type_id' => 14, // S-ISFJ
    'name' => 'Pendidikan Anak Usia Dini (PAUD) / Pendidikan Dasar',
    'description' => 'Mempersiapkan pendidik untuk mengajar dan membimbing anak-anak pada usia dini atau jenjang dasar.',
    'full_description' => 'Mempersiapkan pendidik untuk mengajar dan membimbing anak-anak pada usia dini atau jenjang dasar. Jurusan ini membekali mahasiswa dengan pemahaman perkembangan kognitif, sosial, emosional, dan motorik anak, serta strategi pembelajaran yang sesuai dengan tahapan usia. Mahasiswa juga mempelajari desain kurikulum, pengelolaan kelas, asesmen, dan pendekatan bermain sebagai sarana edukatif. Tujuannya adalah menciptakan lingkungan belajar yang aman, menyenangkan, dan mendukung tumbuh kembang optimal anak sejak dini.',
    'core_subjects' => 'Child Development, Early Childhood Education, Play-based Learning, Curriculum Development, Classroom Management, Educational Assessment, Special Needs Education',
    'degree_types' => 'S.Pd (Sarjana Pendidikan)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Guru PAUD, Guru SD, Kepala Sekolah (dengan pengalaman), Pengembang Kurikulum Anak, Konsultan Pendidikan Anak',
    'industry_sectors' => 'Education, Early Childhood Centers, Elementary Schools, Educational Consulting, Child Development Centers',
    'future_trends' => 'Digital learning for children, inclusive education, play-based STEM, social-emotional learning',
    'compatibility_reason' => 'Cocok untuk tipe kepribadian kamu yang sabar, peduli, dan suka menciptakan lingkungan yang terstruktur dan aman bagi perkembangan anak-anak.',
    'riasec_match' => 'S',
    'mbti_match' => 'ISFJ'
],

// S (Sosial) + ESFJ majors (personality_type_id = 15)
[
    'personality_type_id' => 15, // S-ESFJ
    'name' => 'Kesehatan Masyarakat',
    'description' => 'Berfokus pada pencegahan penyakit, promosi kesehatan, dan perbaikan kualitas hidup di tingkat komunitas dan populasi.',
    'full_description' => 'Berfokus pada pencegahan penyakit, promosi kesehatan, dan perbaikan kualitas hidup di tingkat komunitas dan populasi. Jurusan ini mencakup epidemiologi, biostatistik, manajemen layanan kesehatan, kesehatan lingkungan, dan perilaku kesehatan. Mahasiswa dilatih untuk mengidentifikasi masalah kesehatan masyarakat, merancang intervensi, serta menjalankan edukasi dan advokasi kesehatan. Lulusan diharapkan mampu berperan aktif dalam meningkatkan derajat kesehatan masyarakat melalui pendekatan promotif dan preventif yang berbasis data dan budaya lokal.',
    'core_subjects' => 'Epidemiology, Biostatistics, Health Promotion, Environmental Health, Health Policy, Community Health, Health Education, Disease Prevention',
    'degree_types' => 'S.KM (Sarjana Kesehatan Masyarakat)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Penyuluh Kesehatan Masyarakat, Koordinator Program Kesehatan, Epidemiolog (fokus komunitas), Manajer Pelayanan Kesehatan, Petugas Promosi Kesehatan',
    'industry_sectors' => 'Public Health, Government Health Departments, NGOs, International Health Organizations, Healthcare Systems',
    'future_trends' => 'Digital health promotion, community-based health programs, global health initiatives, health equity',
    'compatibility_reason' => 'Sangat cocok untuk tipe kepribadian ini karena bisa membantu banyak orang, berinteraksi dengan komunitas (Ekstrovert), dan melihat dampak nyata dari pekerjaan mereka dalam meningkatkan kesejahteraan sosial.',
    'riasec_match' => 'S',
    'mbti_match' => 'ESFJ'
],
[
    'personality_type_id' => 15, // S-ESFJ
    'name' => 'Manajemen Sumber Daya Manusia (MSDM)',
    'description' => 'Mempelajari pengelolaan karyawan dalam organisasi, termasuk rekrutmen, pelatihan, kompensasi, dan hubungan industrial.',
    'full_description' => 'Mempelajari pengelolaan karyawan dalam organisasi, termasuk rekrutmen, pelatihan, kompensasi, dan hubungan industrial. Jurusan ini membekali mahasiswa dengan pemahaman strategi pengembangan SDM, perilaku organisasi, hukum ketenagakerjaan, serta teknik evaluasi kinerja. Mahasiswa juga dilatih untuk menciptakan lingkungan kerja yang produktif dan harmonis melalui pendekatan psikologis, administratif, dan strategis. Tujuannya adalah memastikan bahwa sumber daya manusia menjadi aset utama yang mendorong pencapaian tujuan organisasi.',
    'core_subjects' => 'Human Resource Management, Organizational Behavior, Recruitment & Selection, Training & Development, Compensation Management, Labor Relations, Performance Management',
    'degree_types' => 'S.E (Sarjana Ekonomi) / S.M (Sarjana Manajemen)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Manajer SDM, Spesialis Rekrutmen, Spesialis Kompensasi & Benefit, HR Business Partner, Pelatih SDM',
    'industry_sectors' => 'Corporate HR, Consulting, Government, Manufacturing, Services, Technology',
    'future_trends' => 'Digital HR, employee wellness, remote work management, diversity & inclusion',
    'compatibility_reason' => 'Ideal untuk tipe kepribadian ini yang suka berinteraksi dengan orang lain, peduli pada kesejahteraan karyawan, dan dapat menerapkan prosedur yang terstruktur (Judging) dalam lingkungan kerja yang berorientasi pada manusia.',
    'riasec_match' => 'S',
    'mbti_match' => 'ESFJ'
],
[
    'personality_type_id' => 15, // S-ESFJ
    'name' => 'Administrasi Publik (Fokus Pelayanan)',
    'description' => 'Mempelajari manajemen organisasi pemerintahan dan pelayanan publik kepada masyarakat.',
    'full_description' => 'Mempelajari manajemen organisasi pemerintahan dan pelayanan publik kepada masyarakat. Jurusan ini mencakup kebijakan publik, tata kelola pemerintahan, manajemen pelayanan, serta etika dan akuntabilitas birokrasi. Mahasiswa dilatih untuk merancang, mengimplementasikan, dan mengevaluasi program-program publik yang responsif dan efisien. Fokus pelayanan menekankan pentingnya kualitas, transparansi, dan partisipasi masyarakat dalam proses administrasi, dengan tujuan menciptakan tata kelola yang adil dan berorientasi pada kebutuhan warga.',
    'core_subjects' => 'Public Administration, Public Policy, Public Service Management, Government Relations, Public Finance, Administrative Law, E-Government',
    'degree_types' => 'S.AP (Sarjana Administrasi Publik)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Pegawai Negeri Sipil (PNS) di berbagai departemen pelayanan publik, Staf Pelayanan Publik, Analis Kebijakan Publik (fokus implementasi), Koordinator Program Pemerintah',
    'industry_sectors' => 'Government, Public Services, Local Government, International Organizations, NGOs',
    'future_trends' => 'Digital government services, citizen engagement, transparent governance, smart city initiatives',
    'compatibility_reason' => 'Menarik bagi tipe kepribadian ini yang ingin melayani masyarakat, berinteraksi dengan publik, dan menerapkan prosedur yang jelas untuk memastikan pelayanan yang efisien dan responsif.',
    'riasec_match' => 'S',
    'mbti_match' => 'ESFJ'
],

// S (Sosial) + ENFJ majors (personality_type_id = 16)
[
    'personality_type_id' => 16, // S-ENFJ
    'name' => 'Ilmu Komunikasi (Fokus Public Relations/Penyuluhan)',
    'description' => 'Mempelajari teori dan praktik komunikasi, dengan penekanan pada pembangunan hubungan baik dengan publik atau penyampaian pesan yang efektif.',
    'full_description' => 'Mempelajari teori dan praktik komunikasi, dengan penekanan pada pembangunan hubungan baik dengan publik atau penyampaian pesan yang efektif. Jurusan ini membekali mahasiswa dengan keterampilan menulis, berbicara di depan umum, manajemen media, strategi komunikasi, serta analisis audiens. Fokus Public Relations menekankan pada pengelolaan citra dan komunikasi organisasi, sedangkan penyuluhan lebih berfokus pada komunikasi perubahan perilaku dalam konteks sosial atau pembangunan. Lulusan diharapkan mampu menjadi jembatan komunikasi antara institusi dan masyarakat secara etis dan strategis.',
    'core_subjects' => 'Communication Theory, Public Relations, Media Relations, Crisis Communication, Event Management, Digital Communication, Community Outreach',
    'degree_types' => 'S.IKom (Sarjana Ilmu Komunikasi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Spesialis Public Relations, Konsultan Komunikasi, Penyuluh, Manajer Komunikasi Korporat, Corporate Social Responsibility (CSR) Specialist',
    'industry_sectors' => 'Public Relations, Corporate Communications, Government, NGOs, Media, Consulting',
    'future_trends' => 'Digital PR, influencer relations, crisis communication, stakeholder engagement',
    'compatibility_reason' => 'Sangat cocok untuk tipe kepribadian yang memiliki kemampuan komunikasi yang luar biasa, empati, dan keinginan untuk membangun koneksi serta mempengaruhi orang lain secara positif.',
    'riasec_match' => 'S',
    'mbti_match' => 'ENFJ'
],
[
    'personality_type_id' => 16, // S-ENFJ
    'name' => 'Pendidikan (Guru/Dosen)',
    'description' => 'Mempersiapkan individu untuk menjadi pendidik yang efektif, mampu menginspirasi dan membimbing siswa di berbagai jenjang.',
    'full_description' => 'Mempersiapkan individu untuk menjadi pendidik yang efektif, mampu menginspirasi dan membimbing siswa di berbagai jenjang. Jurusan ini mencakup teori belajar, kurikulum, strategi pengajaran, evaluasi pendidikan, dan psikologi pendidikan. Mahasiswa dibekali keterampilan pedagogis, komunikasi, serta kemampuan merancang pembelajaran yang adaptif dan inklusif. Selain itu, pendidikan calon dosen juga mencakup penelitian ilmiah dan pengembangan keilmuan. Lulusan diharapkan mampu menciptakan proses belajar yang bermakna dan berkontribusi pada kemajuan pendidikan.',
    'core_subjects' => 'Educational Psychology, Curriculum Development, Teaching Methods, Educational Assessment, Classroom Management, Educational Technology, Research Methods',
    'degree_types' => 'S.Pd (Sarjana Pendidikan)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Guru/Dosen, Kepala Sekolah, Pengembang Kurikulum, Konsultan Pendidikan, Trainer Profesional',
    'industry_sectors' => 'Education, Schools, Universities, Training Institutions, Educational Consulting, Government Education',
    'future_trends' => 'Digital education, personalized learning, inclusive education, lifelong learning',
    'compatibility_reason' => 'Ideal untuk tipe kepribadian kamu karena memiliki passion untuk mengajar, membimbing, dan memotivasi orang lain, menciptakan lingkungan belajar yang positif dan partisipatif.',
    'riasec_match' => 'S',
    'mbti_match' => 'ENFJ'
],
[
    'personality_type_id' => 16, // S-ENFJ
    'name' => 'Manajemen Nirlaba / Organisasi Sosial',
    'description' => 'Mempelajari pengelolaan organisasi yang berorientasi pada tujuan sosial dan komunitas.',
    'full_description' => 'Mempelajari pengelolaan organisasi yang berorientasi pada tujuan sosial dan komunitas. Jurusan ini membekali mahasiswa dengan keterampilan manajemen strategis, penggalangan dana, pemasaran sosial, kepemimpinan relawan, serta evaluasi dampak program. Fokusnya adalah menciptakan keberlanjutan dan efektivitas organisasi nirlaba melalui tata kelola yang transparan dan akuntabel. Lulusan diharapkan mampu mengelola inisiatif sosial yang berkontribusi pada pemberdayaan masyarakat dan penyelesaian masalah sosial secara kreatif dan kolaboratif.',
    'core_subjects' => 'Nonprofit Management, Fundraising, Social Marketing, Volunteer Management, Program Evaluation, Grant Writing, Social Entrepreneurship',
    'degree_types' => 'S.M (Sarjana Manajemen) / S.Sos (Sarjana Sosial)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Direktur Organisasi Nirlaba, Manajer Proyek Sosial, Penggalang Dana (Fundraiser), Koordinator Program Komunitas, Aktivis Sosial',
    'industry_sectors' => 'NGOs, Social Enterprises, Foundations, International Development, Community Organizations',
    'future_trends' => 'Social impact measurement, digital fundraising, collaborative philanthropy, sustainable development',
    'compatibility_reason' => 'Menarik bagi tipe kepribadian kamu yang ingin memimpin dan mengelola proyek-proyek yang berdampak sosial, menggalang dukungan, dan memotivasi tim untuk mencapai misi yang berlandaskan nilai-nilai kemanusiaan.',
    'riasec_match' => 'S',
    'mbti_match' => 'ENFJ'
],
// Lanjutan untuk array $majors di MajorSeeder.php

// E (Enterprising) + ENTJ majors (personality_type_id = 17)
[
    'personality_type_id' => 17, // E-ENTJ
    'name' => 'Manajemen Bisnis / Administrasi Bisnis',
    'description' => 'Mempelajari perencanaan, pengorganisasian, pengarahan, dan pengendalian sumber daya untuk mencapai tujuan organisasi.',
    'full_description' => 'Mempelajari perencanaan, pengorganisasian, pengarahan, dan pengendalian sumber daya untuk mencapai tujuan organisasi. Jurusan ini mencakup manajemen operasional, keuangan, pemasaran, SDM, dan strategi bisnis. Mahasiswa dibekali kemampuan analisis pasar, pengambilan keputusan, kepemimpinan, serta kewirausahaan. Tujuannya adalah menciptakan pemimpin dan manajer yang mampu menjalankan dan mengembangkan bisnis secara efektif dan adaptif dalam lingkungan yang kompetitif dan dinamis.',
    'core_subjects' => 'Strategic Management, Financial Management, Marketing Management, Operations Management, Human Resource Management, Business Ethics, Entrepreneurship',
    'degree_types' => 'S.E (Sarjana Ekonomi) / S.M (Sarjana Manajemen)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Manajer Bisnis/Operasional, Konsultan Manajemen, Pengusaha/Wirausahawan, Direktur/Eksekutif Perusahaan, Project Manager, Business Development Manager',
    'industry_sectors' => 'Business Services, Consulting, Manufacturing, Finance, Technology, Retail',
    'future_trends' => 'Digital transformation, sustainable business, agile management, data-driven decision making',
    'compatibility_reason' => 'Sangat cocok untuk tipe kepribadian kamu yang memiliki kemampuan kepemimpinan, pemikiran strategis, dan keinginan untuk mengelola serta mengembangkan organisasi. Kamu mampu membuat keputusan cepat dan efektif.',
    'riasec_match' => 'E',
    'mbti_match' => 'ENTJ'
],
[
    'personality_type_id' => 17, // E-ENTJ
    'name' => 'Hukum (Fokus Bisnis / Korporasi)',
    'description' => 'Mempelajari peraturan dan prinsip hukum yang berkaitan dengan kegiatan bisnis, termasuk kontrak, perusahaan, investasi, dan litigasi.',
    'full_description' => 'Mempelajari peraturan dan prinsip hukum yang berkaitan dengan kegiatan bisnis, termasuk kontrak, perusahaan, investasi, dan litigasi. Jurusan ini membekali mahasiswa dengan pemahaman tentang regulasi perdagangan, hukum perbankan, perlindungan konsumen, dan kepatuhan hukum dalam lingkungan korporat. Mahasiswa juga dilatih dalam keterampilan analisis hukum, negosiasi kontrak, serta penyelesaian sengketa bisnis. Lulusan diharapkan mampu memberikan solusi hukum yang strategis dan melindungi kepentingan hukum perusahaan secara profesional.',
    'core_subjects' => 'Business Law, Corporate Law, Contract Law, Commercial Law, Securities Law, Mergers & Acquisitions, Legal Research, Negotiation',
    'degree_types' => 'S.H (Sarjana Hukum)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Pengacara Bisnis/Korporasi, Legal Counsel Perusahaan, Konsultan Hukum Bisnis, Notaris, Mediator Bisnis',
    'industry_sectors' => 'Law Firms, Corporate Legal Departments, Financial Services, Government, Consulting',
    'future_trends' => 'Legal technology, compliance automation, international business law, cybersecurity law',
    'compatibility_reason' => 'Menarik bagi tipe kepribadian kamu yang suka argumen logis, strategi, dan memiliki kemampuan persuasi. Kamu bisa memimpin negosiasi dan melindungi kepentingan bisnis dengan analisis yang tajam.',
    'riasec_match' => 'E',
    'mbti_match' => 'ENTJ'
],
[
    'personality_type_id' => 17, // E-ENTJ
    'name' => 'Ekonomi (Fokus Pembangunan/Kebijakan Publik)',
    'description' => 'Menganalisis perilaku ekonomi dan pasar, serta merumuskan kebijakan untuk pertumbuhan dan stabilitas ekonomi.',
    'full_description' => 'Menganalisis perilaku ekonomi dan pasar, serta merumuskan kebijakan untuk pertumbuhan dan stabilitas ekonomi. Jurusan ini mencakup teori ekonomi mikro dan makro, statistik, ekonomi pembangunan, serta evaluasi kebijakan publik. Mahasiswa dibekali kemampuan analisis data, pemodelan ekonomi, dan penyusunan rekomendasi kebijakan yang berdampak pada sektor riil, kesejahteraan masyarakat, dan pembangunan berkelanjutan. Fokus ini menyiapkan lulusan untuk berkontribusi dalam lembaga pemerintah, internasional, maupun riset ekonomi strategis.',
    'core_subjects' => 'Microeconomics, Macroeconomics, Development Economics, Public Policy, Econometrics, Economic Research, International Economics, Financial Economics',
    'degree_types' => 'S.E (Sarjana Ekonomi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Ekonom, Analis Kebijakan, Konsultan Ekonomi, Peneliti Ekonomi, Analis Investasi, Manajer Portofolio',
    'industry_sectors' => 'Government, Central Banking, International Organizations, Consulting, Financial Services, Research Institutions',
    'future_trends' => 'Digital economy, sustainable development, behavioral economics, economic modeling',
    'compatibility_reason' => 'Cocok untuk tipe kepribadian kamu yang berpikir strategis, mampu menganalisis sistem yang kompleks, dan memiliki keinginan untuk mempengaruhi keputusan besar di tingkat makro ekonomi atau kebijakan.',
    'riasec_match' => 'E',
    'mbti_match' => 'ENTJ'
],

// E (Enterprising) + ESTP majors (personality_type_id = 18)
[
    'personality_type_id' => 18, // E-ESTP
    'name' => 'Pemasaran / Marketing Komunikasi',
    'description' => 'Mempelajari strategi untuk mempromosikan produk/jasa, memahami perilaku konsumen, dan membangun citra merek.',
    'full_description' => 'Mempelajari strategi untuk mempromosikan produk/jasa, memahami perilaku konsumen, dan membangun citra merek. Jurusan ini mencakup riset pasar, strategi branding, periklanan, komunikasi pemasaran terpadu, serta digital marketing. Mahasiswa dilatih untuk merancang kampanye yang efektif, mengelola hubungan dengan pelanggan, dan menganalisis tren pasar. Lulusan diharapkan mampu menghubungkan produk dengan target audiens melalui pesan yang tepat dan media yang relevan, baik di dunia fisik maupun digital.',
    'core_subjects' => 'Marketing Management, Consumer Behavior, Brand Management, Digital Marketing, Advertising, Market Research, Sales Management, Integrated Marketing Communications',
    'degree_types' => 'S.E (Sarjana Ekonomi) / S.IKom (Sarjana Ilmu Komunikasi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Manajer Pemasaran, Spesialis Pemasaran Digital, Manajer Merek (Brand Manager), Sales Manager, Account Executive, Konsultan Pemasaran',
    'industry_sectors' => 'Marketing Agencies, Retail, FMCG, Technology, E-commerce, Media, Consulting',
    'future_trends' => 'Digital marketing automation, influencer marketing, data-driven marketing, personalized marketing',
    'compatibility_reason' => 'Sangat cocok untuk tipe kepribadian kammu yang memiliki kemampuan persuasi, suka berinteraksi sosial (Ekstrovert), dan dapat berpikir cepat dalam lingkungan yang kompetitif dan berorientasi pada hasil penjualan.',
    'riasec_match' => 'E',
    'mbti_match' => 'ESTP'
],
[
    'personality_type_id' => 18, // E-ESTP
    'name' => 'Ilmu Komunikasi (Fokus Periklanan/Penyiaran)',
    'description' => 'Mempelajari proses komunikasi dalam berbagai konteks, termasuk strategi periklanan dan produksi konten untuk media massa.',
    'full_description' => 'Mempelajari proses komunikasi dalam berbagai konteks, termasuk strategi periklanan dan produksi konten untuk media massa. Jurusan ini mencakup teori komunikasi, teknik copywriting, media planning, produksi audio-visual, dan manajemen media. Mahasiswa dibekali kemampuan menyusun pesan yang persuasif, kreatif, dan sesuai dengan karakteristik audiens. Fokus ini menyiapkan lulusan untuk berkarier di bidang periklanan, televisi, radio, hingga konten digital dan media kreatif.',
    'core_subjects' => 'Communication Theory, Advertising, Broadcasting, Media Production, Copywriting, Media Planning, Digital Content Creation, Audience Analysis',
    'degree_types' => 'S.IKom (Sarjana Ilmu Komunikasi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Spesialis Periklanan, Produser Konten Media, Presenter TV/Radio, Copywriter Iklan, Event Organizer',
    'industry_sectors' => 'Advertising, Broadcasting, Media Production, Digital Media, Event Management, Creative Agencies',
    'future_trends' => 'Streaming media, podcast production, social media content, interactive advertising',
    'compatibility_reason' => 'Memberikan wadah bagi tipe kepribadian seperti kamu untuk menggunakan energi, kreativitas, dan kemampuan persuasif kamu dalam dunia yang cepat, kompetitif, dan membutuhkan interaksi publik.',
    'riasec_match' => 'E',
    'mbti_match' => 'ESTP'
],
[
    'personality_type_id' => 18, // E-ESTP
    'name' => 'Kewirausahaan',
    'description' => 'Mempelajari proses penciptaan, pengembangan, dan pengelolaan usaha baru, termasuk identifikasi peluang dan manajemen risiko.',
    'full_description' => 'Mempelajari proses penciptaan, pengembangan, dan pengelolaan usaha baru, termasuk identifikasi peluang dan manajemen risiko. Jurusan ini membekali mahasiswa dengan keterampilan dalam merancang model bisnis, inovasi produk, strategi pemasaran, pengelolaan keuangan, serta kepemimpinan usaha. Mahasiswa dilatih untuk berpikir kreatif, adaptif, dan solutif dalam menghadapi tantangan bisnis. Lulusan diharapkan menjadi wirausahawan mandiri yang mampu menciptakan lapangan kerja dan memberi dampak positif bagi masyarakat.',
    'core_subjects' => 'Entrepreneurship, Business Model Development, Innovation Management, Startup Finance, Market Validation, Business Planning, Leadership, Risk Management',
    'degree_types' => 'S.E (Sarjana Ekonomi) / S.M (Sarjana Manajemen)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Pengusaha, Startup Founder, Business Development Manager, Franchise Owner, Konsultan Bisnis',
    'industry_sectors' => 'Startups, Small Business, Consulting, Franchise, Technology, E-commerce',
    'future_trends' => 'Digital entrepreneurship, social entrepreneurship, sustainable business models, tech startups',
    'compatibility_reason' => 'Ideal untuk tipe kepribadian yang berani mengambil risiko, praktis, dan memiliki dorongan kuat untuk menciptakan dan memimpin bisnis kamu sendiri, seringkali dengan pendekatan "learning by doing".',
    'riasec_match' => 'E',
    'mbti_match' => 'ESTP'
],

// E (Enterprising) + ENTP majors (personality_type_id = 19)
[
    'personality_type_id' => 19, // E-ENTP
    'name' => 'Bisnis Digital / E-commerce',
    'description' => 'Mempelajari strategi bisnis dan teknologi yang diterapkan dalam lingkungan digital, termasuk e-commerce, pemasaran digital, dan transformasi digital.',
    'full_description' => 'Mempelajari strategi bisnis dan teknologi yang diterapkan dalam lingkungan digital, termasuk e-commerce, pemasaran digital, dan transformasi digital. Jurusan ini mencakup analisis data digital, pengembangan platform online, strategi omnichannel, dan manajemen konten digital. Mahasiswa dibekali keterampilan untuk merancang, mengelola, dan mengoptimalkan bisnis berbasis teknologi, serta memahami tren pasar digital yang terus berkembang. Lulusan diharapkan mampu bersaing dalam ekosistem ekonomi digital secara inovatif dan adaptif.',
    'core_subjects' => 'Digital Business Strategy, E-commerce Management, Digital Marketing, Data Analytics, Platform Development, Digital Innovation, Online Consumer Behavior',
    'degree_types' => 'S.E (Sarjana Ekonomi) / S.Kom (Sarjana Komputer)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Digital Marketing Specialist, E-commerce Manager, Startup Founder (Tech-based), Konsultan Bisnis Digital, Product Manager (Tech)',
    'industry_sectors' => 'E-commerce, Technology, Digital Marketing, Fintech, Online Platforms, Digital Agencies',
    'future_trends' => 'AI-driven commerce, blockchain in business, metaverse commerce, sustainable digital business',
    'compatibility_reason' => 'Ideal untuk tipe kepribadian yang inovatif, berani mencoba hal baru, dan tertarik pada potensi besar dunia digital untuk menciptakan peluang bisnis. Kamu suka memecahkan masalah dengan solusi kreatif dan out-of-the-box.',
    'riasec_match' => 'E',
    'mbti_match' => 'ENTP'
],
[
    'personality_type_id' => 19, // E-ENTP
    'name' => 'Manajemen Inovasi & Kewirausahaan Teknologi',
    'description' => 'Menggabungkan manajemen inovasi dengan pengembangan bisnis berbasis teknologi.',
    'full_description' => 'Menggabungkan manajemen inovasi dengan pengembangan bisnis berbasis teknologi. Jurusan ini mempelajari cara menciptakan nilai melalui inovasi produk, proses, dan model bisnis yang didorong oleh teknologi. Mahasiswa dibekali pengetahuan tentang riset pasar, komersialisasi hasil riset, manajemen start-up, serta strategi pengembangan usaha teknologi tinggi. Lulusan diharapkan mampu mengelola siklus inovasi dan mendorong pertumbuhan bisnis berbasis teknologi secara berkelanjutan.',
    'core_subjects' => 'Innovation Management, Technology Entrepreneurship, R&D Management, Technology Transfer, Venture Capital, Startup Ecosystem, Disruptive Innovation',
    'degree_types' => 'S.T (Sarjana Teknik) / S.M (Sarjana Manajemen)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Manajer Inovasi, Konsultan Strategi, Product Development Manager, CTO (Chief Technology Officer) Startup, Venture Capitalist',
    'industry_sectors' => 'Technology Startups, Innovation Consulting, Venture Capital, R&D Organizations, Tech Companies',
    'future_trends' => 'Deep tech innovation, sustainable technology, AI entrepreneurship, biotech ventures',
    'compatibility_reason' => 'Sangat cocok untuk tipe kepribadian yang senang dengan ide-ide baru, memecahkan masalah secara kreatif, dan memimpin perubahan untuk keuntungan bisnis, terutama di sektor teknologi yang dinamis.',
    'riasec_match' => 'E',
    'mbti_match' => 'ENTP'
],
[
    'personality_type_id' => 19, // E-ENTP
    'name' => 'Hubungan Internasional (Fokus Bisnis Internasional/Negosiasi)',
    'description' => 'Mempelajari hubungan antar negara, organisasi internasional, dan isu-isu global, dengan penekanan pada aspek ekonomi, perdagangan, dan diplomasi.',
    'full_description' => 'Mempelajari hubungan antar negara, organisasi internasional, dan isu-isu global, dengan penekanan pada aspek ekonomi, perdagangan, dan diplomasi. Jurusan ini mencakup negosiasi internasional, politik ekonomi global, kebijakan luar negeri, serta hukum dan etika perdagangan internasional. Mahasiswa dilatih untuk menganalisis dinamika geopolitik dan merancang strategi komunikasi lintas budaya dalam konteks bisnis global. Lulusan diharapkan mampu menjembatani kerja sama antarnegara dan sektor swasta secara profesional dan strategis.',
    'core_subjects' => 'International Relations Theory, International Business, Trade Policy, Diplomatic Negotiation, Global Economics, Cross-cultural Communication, International Law',
    'degree_types' => 'S.Hub.Int (Sarjana Hubungan Internasional)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Diplomat, Konsultan Bisnis Internasional, Analis Kebijakan Luar Negeri, Negosiator Perdagangan, Tenaga Pemasaran Internasional',
    'industry_sectors' => 'Government, International Organizations, Multinational Corporations, Consulting, Trade Associations',
    'future_trends' => 'Digital diplomacy, sustainable trade, regional economic integration, global supply chain management',
    'compatibility_reason' => 'Menarik bagi tipe kepribadian kamu yang suka bernegosiasi, menganalisis situasi kompleks, dan mencari peluang di pasar global. Kamu dapat menggunakan kemampuan debat dan persuasi dalam konteks internasional.',
    'riasec_match' => 'E',
    'mbti_match' => 'ENTP'
],

// E (Enterprising) + ESFP majors (personality_type_id = 20)
[
    'personality_type_id' => 20, // E-ESFP
    'name' => 'Pariwisata & Perhotelan',
    'description' => 'Mempelajari manajemen destinasi wisata, tour, dan pelayanan di industri pariwisata dan perhotelan.',
    'full_description' => 'Mempelajari manajemen destinasi wisata, tour, dan pelayanan di industri pariwisata dan perhotelan. Jurusan ini mencakup perencanaan perjalanan, pelayanan pelanggan, event management, serta pemasaran dan pengembangan destinasi. Mahasiswa juga mempelajari etika pelayanan, budaya lokal dan internasional, serta keterampilan operasional hotel dan restoran. Lulusan dipersiapkan untuk bekerja di sektor pariwisata global dengan kompetensi pelayanan, manajerial, dan komunikasi lintas budaya.',
    'core_subjects' => 'Tourism Management, Hospitality Operations, Destination Marketing, Event Management, Cultural Tourism, Sustainable Tourism, Customer Service Excellence',
    'degree_types' => 'S.Par (Sarjana Pariwisata)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Manajer Destinasi Wisata, Pengelola Tour & Travel, Manajer Hotel/Resort, Event Organizer, Pemandu Wisata',
    'industry_sectors' => 'Tourism, Hospitality, Event Management, Travel Agencies, Resort Management, Cultural Tourism',
    'future_trends' => 'Sustainable tourism, digital tourism platforms, experiential travel, eco-tourism',
    'compatibility_reason' => 'Sangat ideal untuk tipe kepribadian yang menyukai interaksi dengan banyak orang, lingkungan yang dinamis, dan potensi untuk menciptakan pengalaman yang menyenangkan bagi orang lain. karismatik dan pandai menjual pengalaman.',
    'riasec_match' => 'E',
    'mbti_match' => 'ESFP'
],
[
    'personality_type_id' => 20, // E-ESFP
    'name' => 'Manajemen Event',
    'description' => 'Mempelajari perencanaan, pengorganisasian, dan pelaksanaan berbagai jenis acara, dari konser hingga konferensi, dengan fokus pada pengalaman peserta.',
    'full_description' => 'Mempelajari perencanaan, pengorganisasian, dan pelaksanaan berbagai jenis acara, dari konser hingga konferensi, dengan fokus pada pengalaman peserta. Jurusan ini membekali mahasiswa dengan keterampilan dalam budgeting, koordinasi tim, manajemen vendor, promosi acara, serta pengelolaan risiko dan evaluasi kesuksesan acara. Ditekankan pula pentingnya kreativitas, komunikasi efektif, dan kemampuan menyelesaikan masalah secara cepat dalam situasi dinamis. Lulusan siap bekerja di industri event profesional maupun menjadi penyelenggara acara mandiri.',
    'core_subjects' => 'Event Planning, Project Management, Venue Management, Vendor Relations, Event Marketing, Risk Management, Creative Event Design',
    'degree_types' => 'S.M (Sarjana Manajemen) / S.Par (Sarjana Pariwisata)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Event Manager, Wedding Organizer, Konser Promotor, Corporate Event Planner, Exhibition Organizer',
    'industry_sectors' => 'Event Management, Entertainment, Corporate Events, Wedding Industry, Exhibition, Conference Management',
    'future_trends' => 'Hybrid events, virtual event platforms, sustainable events, experiential marketing',
    'compatibility_reason' => 'Memberi kesempatan bagi kamu untuk menggabungkan energi, kemampuan sosial, dan kreativitas mereka dalam menciptakan pengalaman yang berkesan dan mengelola proyek yang kompleks dengan sentuhan personal.',
    'riasec_match' => 'E',
    'mbti_match' => 'ESFP'
],
[
    'personality_type_id' => 20, // E-ESFP
    'name' => 'Penyiaran & Komunikasi Massa (Fokus Presentasi/Hiburan)',
    'description' => 'Mempelajari produksi konten untuk media massa seperti radio dan televisi, termasuk penulisan skrip, penyutradaraan, dan presentasi.',
    'full_description' => 'Mempelajari produksi konten untuk media massa seperti radio, televisi, dan platform digital, dengan penekanan pada aspek hiburan dan presentasi. Mahasiswa mempelajari teknik penulisan skrip, penyutradaraan, produksi audio-visual, serta keterampilan tampil di depan kamera atau mikrofon. Jurusan ini juga membahas strategi komunikasi massa, dinamika audiens, dan tren media. Lulusan dipersiapkan untuk menjadi presenter, produser, host acara, atau kreator konten di industri penyiaran modern.',
    'core_subjects' => 'Broadcasting Techniques, TV/Radio Production, Presentation Skills, Script Writing, Media Performance, Audience Engagement, Digital Content Creation',
    'degree_types' => 'S.IKom (Sarjana Ilmu Komunikasi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Presenter TV/Radio, Public Speaker, Entertainer, MC, Produser Konten Hiburan, Manajer Komunitas Online',
    'industry_sectors' => 'Broadcasting, Entertainment, Digital Media, Event Management, Content Creation, Social Media',
    'future_trends' => 'Streaming platforms, podcast hosting, social media influencing, interactive broadcasting',
    'compatibility_reason' => 'Cocok untuk tipe kepribadian yang karismatik, suka menjadi pusat perhatian, dan mampu menghibur serta mempengaruhi audiens melalui media.',
    'riasec_match' => 'E',
    'mbti_match' => 'ESFP'
],
// Lanjutan untuk array $majors di MajorSeeder.php

// C (Konvensional) + ISTJ majors (personality_type_id = 21)
[
    'personality_type_id' => 21, // C-ISTJ
    'name' => 'Akuntansi / Perpajakan',
    'description' => 'Mencatat, mengklasifikasikan, dan menginterpretasikan transaksi keuangan secara sistematis.',
    'full_description' => 'Mencatat, mengklasifikasikan, dan menginterpretasikan transaksi keuangan secara sistematis untuk menghasilkan laporan keuangan yang akurat dan andal. Mahasiswa jurusan akuntansi mempelajari audit, akuntansi manajerial, dan pelaporan keuangan. Sementara itu, konsentrasi perpajakan fokus pada perencanaan, perhitungan, serta kepatuhan terhadap regulasi pajak. Lulusan memiliki keterampilan dalam analisis keuangan, pengambilan keputusan berbasis data, dan memahami aspek hukum dalam perpajakan.',
    'core_subjects' => 'Financial Accounting, Management Accounting, Auditing, Taxation, Financial Reporting, Cost Accounting, Accounting Information Systems',
    'degree_types' => 'S.E (Sarjana Ekonomi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Akuntan Publik, Auditor, Analis Keuangan, Tax Consultant, Internal Auditor, Pengelola Keuangan Perusahaan',
    'industry_sectors' => 'Accounting Firms, Banking, Government, Manufacturing, Consulting, Tax Services',
    'future_trends' => 'Digital accounting, blockchain in finance, automated reporting, forensic accounting',
    'compatibility_reason' => 'Sangat cocok untuk tipe pribadi yang menyukai data, detail, aturan, dan struktur. kamu akan nyaman dengan pekerjaan yang membutuhkan akurasi, presisi, dan kepatuhan pada standar yang ditetapkan.',
    'riasec_match' => 'C',
    'mbti_match' => 'ISTJ'
],
[
    'personality_type_id' => 21, // C-ISTJ
    'name' => 'Manajemen Operasi / Supply Chain Management',
    'description' => 'Mempelajari desain, pengelolaan, dan optimalisasi sistem produksi dan distribusi barang atau jasa.',
    'full_description' => 'Mempelajari desain, pengelolaan, dan optimalisasi sistem produksi dan distribusi barang atau jasa. Mahasiswa dibekali keterampilan dalam perencanaan kapasitas, manajemen kualitas, pengendalian inventori, serta pemanfaatan teknologi dalam operasi. Pada fokus Supply Chain Management, pembelajaran meluas ke koordinasi rantai pasok dari pemasok hingga konsumen, termasuk logistik, manajemen pemasok, dan strategi distribusi global. Lulusan mampu merancang dan mengelola sistem operasi yang efisien dan responsif terhadap kebutuhan pasar.',
    'core_subjects' => 'Operations Management, Supply Chain Management, Quality Control, Inventory Management, Production Planning, Logistics, Process Improvement, Lean Manufacturing',
    'degree_types' => 'S.T (Sarjana Teknik) / S.E (Sarjana Ekonomi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Manajer Operasi, Konsultan Operasional, Supply Chain Manager, Quality Control Manager, Logistics Manager, Analis Proses Bisnis',
    'industry_sectors' => 'Manufacturing, Logistics, Retail, Automotive, Food & Beverage, Technology',
    'future_trends' => 'Industry 4.0, AI in operations, sustainable supply chains, digital twin technology',
    'compatibility_reason' => 'Ideal untuk tipe kepribadian ini karena fokus pada efisiensi proses, prosedur yang terstruktur, dan optimalisasi sistem yang membutuhkan ketelitian dan analisis data.',
    'riasec_match' => 'C',
    'mbti_match' => 'ISTJ'
],
[
    'personality_type_id' => 21, // C-ISTJ
    'name' => 'Ilmu Perpustakaan & Informasi',
    'description' => 'Mempelajari organisasi, pengelolaan, dan penyebaran informasi serta pengetahuan, termasuk sistem klasifikasi dan penyimpanan data.',
    'full_description' => 'Mempelajari organisasi, pengelolaan, dan penyebaran informasi dalam berbagai bentuk dan media. Mahasiswa mempelajari teknik katalogisasi, klasifikasi, pengarsipan, serta pemanfaatan teknologi informasi untuk sistem pencarian dan manajemen data. Jurusan ini juga membahas literasi informasi, preservasi dokumen, serta peran perpustakaan dalam mendukung pendidikan dan penelitian. Lulusan siap bekerja di perpustakaan, pusat dokumentasi, arsip, dan lembaga informasi digital.',
    'core_subjects' => 'Information Organization, Cataloging, Digital Libraries, Information Retrieval, Knowledge Management, Archives Management, Information Literacy',
    'degree_types' => 'S.IP (Sarjana Ilmu Perpustakaan)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Pustakawan, Arsiparis, Manajer Informasi, Spesialis Data, Kurator Digital, Peneliti Informasi',
    'industry_sectors' => 'Libraries, Archives, Educational Institutions, Government, Research Organizations, Digital Information Services',
    'future_trends' => 'Digital preservation, data analytics, AI in information retrieval, open access initiatives',
    'compatibility_reason' => 'Sangat cocok untuk tipe kepribadian yang menyukai keteraturan, klasifikasi, dan bekerja dengan sistem informasi yang terstruktur.',
    'riasec_match' => 'C',
    'mbti_match' => 'ISTJ'
],

// C (Konvensional) + ISFJ majors (personality_type_id = 22)
[
    'personality_type_id' => 22, // C-ISFJ
    'name' => 'Administrasi Perkantoran / Sekretaris Profesional',
    'description' => 'Mempelajari keterampilan administrasi, organisasi, dan komunikasi yang diperlukan untuk mendukung operasional kantor dan manajerial.',
    'full_description' => 'Mempelajari keterampilan teknis dan interpersonal dalam mendukung kelancaran administrasi kantor, termasuk pengelolaan dokumen, pengarsipan, pengolahan data, korespondensi bisnis, dan penggunaan aplikasi perkantoran. Mahasiswa juga dibekali etika kerja, manajemen waktu, pelayanan pelanggan, dan protokol komunikasi profesional, sehingga mampu menjadi pendukung andal bagi pimpinan dan tim manajerial dalam berbagai jenis organisasi.',
    'core_subjects' => 'Office Administration, Business Communication, Records Management, Office Technology, Customer Service, Business Ethics, Project Coordination',
    'degree_types' => 'D3/S1 Administrasi Perkantoran',
    'study_duration' => '3-4 tahun',
    'career_prospects' => 'Sekretaris Eksekutif, Staf Administrasi, Office Manager, Asisten Pribadi, Koordinator Proyek',
    'industry_sectors' => 'Corporate Offices, Government, Healthcare, Education, Legal Services, Consulting',
    'future_trends' => 'Digital office management, virtual assistance, automated administrative processes, remote work coordination',
    'compatibility_reason' => 'Sangat cocok untuk tipe kepribadian yang suka keteraturan, detail, dan berinteraksi untuk mendukung orang lain dalam lingkungan kantor yang terstruktur dan harmonis.',
    'riasec_match' => 'C',
    'mbti_match' => 'ISFJ'
],
[
    'personality_type_id' => 22, // C-ISFJ
    'name' => 'Rekam Medis & Informasi Kesehatan',
    'description' => 'Mempelajari pengelolaan data dan informasi kesehatan pasien secara akurat dan rahasia, serta sistem rekam medis elektronik.',
    'full_description' => 'Mempelajari pencatatan, pengelolaan, dan analisis data kesehatan pasien untuk mendukung pelayanan medis dan administrasi rumah sakit. Mahasiswa dibekali pengetahuan tentang sistem rekam medis manual dan elektronik, etika kerahasiaan data, klasifikasi penyakit (ICD), pengkodean diagnosis dan tindakan, serta sistem informasi kesehatan. Lulusan berperan penting dalam menjaga mutu dokumentasi medis dan mendukung pengambilan keputusan di fasilitas kesehatan.',
    'core_subjects' => 'Medical Records Management, Health Information Systems, Medical Coding, Healthcare Data Analysis, Medical Terminology, Health Law & Ethics, Quality Assurance',
    'degree_types' => 'D3/S1 Rekam Medis dan Informasi Kesehatan',
    'study_duration' => '3-4 tahun',
    'career_prospects' => 'Manajer Rekam Medis, Coder Medis, Analis Informasi Kesehatan, Spesialis Kepatuhan Medis',
    'industry_sectors' => 'Hospitals, Clinics, Healthcare Systems, Insurance Companies, Government Health Departments',
    'future_trends' => 'Electronic health records, telemedicine documentation, AI in medical coding, health data analytics',
    'compatibility_reason' => 'Ideal untuk tipe kepribadian yang memiliki kepedulian terhadap kesehatan (Sosial), sangat teliti, dan menghargai pentingnya data yang terorganisir dan akurat dalam lingkungan medis.',
    'riasec_match' => 'C',
    'mbti_match' => 'ISFJ'
],
[
    'personality_type_id' => 22, // C-ISFJ
    'name' => 'Manajemen Kearsipan',
    'description' => 'Mempelajari pengelolaan, penyimpanan, dan pelestarian arsip serta dokumen penting organisasi.',
    'full_description' => 'Mempelajari prinsip, metode, dan teknik pengelolaan arsip sejak penciptaan, penyimpanan, penggunaan, hingga penyusutan atau pemusnahan. Mahasiswa dibekali keterampilan dalam klasifikasi dokumen, sistem penyimpanan fisik dan digital, preservasi arsip, serta penggunaan teknologi informasi dalam pengelolaan arsip elektronik. Jurusan ini juga menekankan pentingnya keamanan, kerahasiaan, dan akurasi informasi dalam mendukung efisiensi organisasi publik maupun swasta.',
    'core_subjects' => 'Archives Management, Records Classification, Digital Preservation, Information Security, Document Management Systems, Legal Compliance, Data Privacy',
    'degree_types' => 'S1 Kearsipan / D3 Kearsipan',
    'study_duration' => '3-4 tahun',
    'career_prospects' => 'Arsiparis, Konsultan Kearsipan, Manajer Dokumen, Staf Informasi dan Kearsipan',
    'industry_sectors' => 'Government Archives, Corporate Records Management, Legal Services, Historical Institutions, Digital Archives',
    'future_trends' => 'Digital archives, cloud-based records management, AI in document classification, blockchain for record integrity',
    'compatibility_reason' => 'Cocok untuk tipe kepribadian yang menyukai keteraturan, detail, dan bertanggung jawab atas pengelolaan informasi yang sistematis dan terstruktur.',
    'riasec_match' => 'C',
    'mbti_match' => 'ISFJ'
],

// C (Konvensional) + ESTJ majors (personality_type_id = 23)
[
    'personality_type_id' => 23, // C-ESTJ
    'name' => 'Manajemen Keuangan / Perbankan',
    'description' => 'Mempelajari pengelolaan aset, investasi, dan liabilitas keuangan, serta operasional perbankan.',
    'full_description' => 'Mempelajari perencanaan, pengelolaan, dan pengawasan keuangan perusahaan atau individu, termasuk pengambilan keputusan investasi, analisis risiko, dan pengelolaan aset-liabilitas. Dalam konteks perbankan, fokus juga diberikan pada sistem operasional bank, layanan keuangan, regulasi, serta manajemen kredit dan simpanan. Mahasiswa dilatih berpikir strategis dan analitis dalam menghadapi dinamika keuangan global dan domestik.',
    'core_subjects' => 'Financial Management, Banking Operations, Investment Analysis, Risk Management, Corporate Finance, Financial Markets, Credit Analysis, Regulatory Compliance',
    'degree_types' => 'S.E (Sarjana Ekonomi)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Analis Keuangan, Manajer Investasi, Akuntan, Auditor, Relationship Manager Bank, Credit Analyst',
    'industry_sectors' => 'Banking, Investment Firms, Insurance, Corporate Finance, Government Financial Institutions, Consulting',
    'future_trends' => 'Fintech integration, digital banking, sustainable finance, cryptocurrency regulation',
    'compatibility_reason' => 'Sangat cocok untuk tipe kepribadian yang logis, teratur, dan berorientasi pada hasil. Kamu dapat mengelola angka dan sistem keuangan dengan efisien dan bertanggung jawab.',
    'riasec_match' => 'C',
    'mbti_match' => 'ESTJ'
],
[
    'personality_type_id' => 23, // C-ESTJ
    'name' => 'Sistem Informasi / Analisis Bisnis',
    'description' => 'Mempelajari bagaimana teknologi informasi dapat digunakan untuk mendukung keputusan manajerial dalam organisasi, termasuk desain dan implementasi sistem.',
    'full_description' => 'Mempelajari integrasi antara teknologi informasi, proses bisnis, dan manajemen untuk mendukung pengambilan keputusan dalam organisasi. Mahasiswa memahami cara menganalisis kebutuhan sistem, merancang solusi berbasis IT, serta mengevaluasi efektivitas proses bisnis. Analisis bisnis berfokus pada identifikasi masalah, peluang, serta penyusunan rekomendasi strategis berbasis data dan teknologi.',
    'core_subjects' => 'Information Systems, Business Analysis, Database Management, Systems Design, Business Process Management, Data Analytics, Project Management, IT Strategy',
    'degree_types' => 'S.SI (Sarjana Sistem Informasi) / S.Kom (Sarjana Komputer)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Analis Sistem, Konsultan IT, Manajer Proyek IT, Data Analyst, Business Analyst, Spesialis Implementasi Sistem',
    'industry_sectors' => 'Information Technology, Consulting, Banking, Government, Manufacturing, Healthcare',
    'future_trends' => 'Business intelligence, cloud computing, AI in business analysis, digital transformation',
    'compatibility_reason' => 'Ideal untuk tipe kepribadian yang logis dan menyukai sistem yang terstruktur, serta ingin menerapkan teknologi untuk meningkatkan efisiensi dan pengambilan keputusan dalam bisnis.',
    'riasec_match' => 'C',
    'mbti_match' => 'ESTJ'
],
[
    'personality_type_id' => 23, // C-ESTJ
    'name' => 'Administrasi Publik (Fokus Kebijakan/Manajemen)',
    'description' => 'Mempelajari manajemen organisasi pemerintahan, perumusan kebijakan publik, dan implementasi program pemerintah.',
    'full_description' => 'Mempelajari perencanaan, pelaksanaan, dan evaluasi kebijakan publik serta pengelolaan lembaga pemerintahan. Mahasiswa dibekali pengetahuan tentang birokrasi, tata kelola yang baik (good governance), pelayanan publik, dan kepemimpinan administratif. Fokus pada bagaimana merancang kebijakan yang responsif terhadap kebutuhan masyarakat dan mengelola sumber daya publik secara efektif dan efisien.',
    'core_subjects' => 'Public Administration, Public Policy Analysis, Government Management, Public Finance, Administrative Law, Strategic Planning, Performance Management',
    'degree_types' => 'S.AP (Sarjana Administrasi Publik)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Pegawai Negeri Sipil (PNS) di lembaga kebijakan, Manajer Proyek Pemerintah, Auditor Pemerintah, Analis Kebijakan, Pejabat Pemerintah',
    'industry_sectors' => 'Government, Public Administration, Policy Research, International Organizations, Public Consulting',
    'future_trends' => 'Digital governance, evidence-based policy, citizen engagement platforms, smart government',
    'compatibility_reason' => 'Menarik bagi tipe kepribadian yang suka dengan struktur birokrasi, prosedur yang jelas, dan kemampuan untuk memimpin serta mengelola proyek atau departemen pemerintah secara efektif.',
    'riasec_match' => 'C',
    'mbti_match' => 'ESTJ'
],

// C (Konvensional) + ESFJ majors (personality_type_id = 24)
[
    'personality_type_id' => 24, // C-ESFJ
    'name' => 'Manajemen Sumber Daya Manusia (MSDM)',
    'description' => 'Mempelajari pengelolaan karyawan dalam organisasi, termasuk rekrutmen, pelatihan, kompensasi, dan hubungan industrial.',
    'full_description' => 'Mempelajari strategi dan praktik dalam mengelola manusia sebagai aset organisasi. Cakupan meliputi perencanaan tenaga kerja, rekrutmen, seleksi, pelatihan dan pengembangan, manajemen kinerja, kompensasi, hubungan kerja, serta kepatuhan terhadap regulasi ketenagakerjaan. Jurusan ini menekankan pentingnya peran SDM dalam pencapaian tujuan organisasi dan menciptakan lingkungan kerja yang produktif dan harmonis.',
    'core_subjects' => 'Human Resource Management, Organizational Behavior, Recruitment & Selection, Training & Development, Compensation Management, Labor Relations, Performance Management',
    'degree_types' => 'S.E (Sarjana Ekonomi) / S.M (Sarjana Manajemen)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Manajer SDM, Spesialis Rekrutmen, Spesialis Kompensasi & Benefit, HR Business Partner, Pelatih SDM, Konsultan Karir',
    'industry_sectors' => 'Corporate HR, Consulting, Government, Manufacturing, Services, Technology',
    'future_trends' => 'Digital HR, employee wellness, remote work management, diversity & inclusion',
    'compatibility_reason' => 'Sangat cocok untuk tipe kepribadian yang suka berinteraksi dengan orang lain, peduli pada kesejahteraan karyawan, dan dapat menerapkan prosedur yang terstruktur (Judging) dalam lingkungan kerja yang berorientasi pada manusia.',
    'riasec_match' => 'C',
    'mbti_match' => 'ESFJ'
],
[
    'personality_type_id' => 24, // C-ESFJ
    'name' => 'Administrasi Pendidikan',
    'description' => 'Mempelajari pengelolaan dan administrasi lembaga pendidikan, termasuk operasional, keuangan, dan pengembangan kurikulum.',
    'full_description' => 'Mempelajari proses manajerial dalam penyelenggaraan pendidikan, meliputi perencanaan, pengorganisasian, pengarahan, dan pengawasan kegiatan di lembaga pendidikan. Fokus utamanya pada aspek operasional, pengelolaan keuangan, pengembangan kurikulum, manajemen SDM pendidikan, hingga evaluasi kebijakan pendidikan untuk menciptakan sistem pendidikan yang efektif dan efisien.',
    'core_subjects' => 'Educational Administration, Educational Finance, Curriculum Management, School Leadership, Educational Policy, Human Resources in Education, Quality Assurance',
    'degree_types' => 'S.Pd (Sarjana Pendidikan) / S.AP (Sarjana Administrasi Publik)',
    'study_duration' => '4 tahun (S1)',
    'career_prospects' => 'Administrator Sekolah/Universitas, Kepala Tata Usaha, Koordinator Akademik, Staf Registrasi Mahasiswa',
    'industry_sectors' => 'Education, Schools, Universities, Educational Consulting, Government Education Departments',
    'future_trends' => 'Digital education management, student information systems, online learning administration, data-driven education',
    'compatibility_reason' => 'Ideal untuk tipe kepribadian yang peduli pada sistem pendidikan (Sosial), menyukai keteraturan, dan dapat mengelola proses administrasi dengan detail untuk mendukung lingkungan belajar yang efektif.',
    'riasec_match' => 'C',
    'mbti_match' => 'ESFJ'
],
[
    'personality_type_id' => 24, // C-ESFJ
    'name' => 'Asisten Medis / Administrasi Kesehatan',
    'description' => 'Mempelajari dukungan administratif dan operasional di fasilitas kesehatan, termasuk penjadwalan, rekam medis, dan interaksi pasien.',
    'full_description' => 'Mempelajari keterampilan administratif dan operasional di lingkungan layanan kesehatan, termasuk pengelolaan jadwal, pendataan pasien, pengarsipan rekam medis, komunikasi dengan pasien, serta koordinasi antara tenaga medis dan administratif. Jurusan ini menyiapkan lulusan untuk mendukung efisiensi dan kualitas layanan di rumah sakit, klinik, atau pusat kesehatan.',
    'core_subjects' => 'Healthcare Administration, Medical Office Procedures, Patient Relations, Health Information Management, Healthcare Communication, Medical Ethics, Healthcare Quality',
    'degree_types' => 'D3/S1 Administrasi Rumah Sakit',
    'study_duration' => '3-4 tahun',
    'career_prospects' => 'Asisten Medis, Staf Administrasi Klinik/Rumah Sakit, Petugas Rekam Medis, Koordinator Pasien',
    'industry_sectors' => 'Healthcare, Hospitals, Clinics, Medical Centers, Health Insurance, Government Health Services',
    'future_trends' => 'Digital health records, telemedicine support, patient experience management, healthcare analytics',
    'compatibility_reason' => 'Menarik bagi tipe kepribadian yang suka membantu dan berinteraksi dengan pasien (Sosial), serta teliti dalam menangani detail administrasi medis dan jadwal.',
    'riasec_match' => 'C',
    'mbti_match' => 'ESFJ'
]
        ];

        foreach ($majors as $major) {
            $this->db->table('majors')->insert($major);
        }
    }
}