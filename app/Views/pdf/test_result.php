<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Tes Analisis Jurusan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: "DejaVu Sans", Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.6;
            color: #333;
        }
        
        .header {
            background-color: #7C0A02;
            color: white;
            padding: 30px;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 15px;
        }
        
        .logo {
            height: 80px;
        }
        
        .header h1 {
            font-size: 24pt;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 14pt;
            opacity: 0.9;
        }
        
        .container {
            padding: 0 40px;
        }
        
        .section {
            margin-bottom: 30px;
            page-break-inside: avoid;
        }
        
        .section-title {
            font-size: 18pt;
            color: #7C0A02;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #7C0A02;
        }
        
        .personality-box {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        
        .personality-type {
            font-size: 20pt;
            font-weight: bold;
            color: #7C0A02;
            text-align: center;
            margin-bottom: 10px;
        }
        
        .personality-name {
            font-size: 16pt;
            text-align: center;
            margin-bottom: 15px;
            color: #555;
        }
        
        .user-info {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
        
        .info-row {
            margin-bottom: 5px;
        }
        
        .info-label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        
        .page-break {
            page-break-after: always;
        }
        
        .major-box {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            page-break-inside: avoid;
        }
        
        .major-number {
            display: inline-block;
            width: 30px;
            height: 30px;
            background-color: #7C0A02;
            color: white;
            text-align: center;
            line-height: 30px;
            border-radius: 50%;
            margin-right: 10px;
            font-weight: bold;
        }
        
        .major-name {
            font-size: 16pt;
            font-weight: bold;
            color: #333;
            display: inline-block;
            margin-bottom: 10px;
        }
        
        .compatibility {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 10pt;
            margin-left: 10px;
        }
        
        .compatibility-high {
            background-color: #d4edda;
            color: #155724;
        }
        
        .compatibility-medium {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        
        .compatibility-low {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .footer {
            margin-top: 50px;
            padding: 20px;
            background-color: #f8f8f8;
            text-align: center;
            font-size: 10pt;
            color: #666;
        }
        
        .list-item {
            margin-bottom: 10px;
            padding-left: 20px;
        }
        
        .list-item:before {
            content: "✓";
            color: #28a745;
            font-weight: bold;
            margin-left: -20px;
            margin-right: 10px;
        }
        
        .development-item:before {
            content: "→";
            color: #007bff;
        }
        
        .career-tag {
            display: inline-block;
            background-color: #e9ecef;
            padding: 3px 10px;
            margin: 3px;
            border-radius: 10px;
            font-size: 10pt;
        }
        
        .summary-box {
            background-color: #e8f4f8;
            border: 1px solid #b8daff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        
        .text-justify {
            text-align: justify;
        }
        
        .text-center {
            text-align: center;
        }
        
        .mb-15 {
            margin-bottom: 15px;
        }
        
        .note {
            font-style: italic;
            color: #666;
            font-size: 11pt;
            margin-top: 10px;
            padding: 15px;
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <?php if(!empty($logo_image)): ?>
            <div class="logo-container">
                <img src="<?= $logo_image ?>" alt="Logo Analisis Jurusan" class="logo">
            </div>
        <?php endif; ?>
        <h1>HASIL TES ANALISIS JURUSAN</h1>
        <p>Laporan Analisis Kepribadian dan Rekomendasi Jurusan</p>
    </div>

    <div class="container">
        <!-- User Information -->
        <div class="section">
            <div class="user-info">
                <div class="info-row">
                    <span class="info-label">Nama Lengkap</span>: <?= $user['full_name'] ?>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>: <?= $user['email'] ?>
                </div>
                <div class="info-row">
                    <span class="info-label">Tanggal Tes</span>: <?= date('d F Y', strtotime($result['created_at'])) ?>
                </div>
                <div class="info-row">
                    <span class="info-label">Waktu Tes</span>: <?= date('H:i', strtotime($result['created_at'])) ?> WIB
                </div>
                <div class="info-row">
                    <span class="info-label">Tanggal Download</span>: <?= $download_date ?>
                </div>
            </div>
        </div>

        <!-- Personality Profile -->
        <div class="section">
            <h2 class="section-title">PROFIL KEPRIBADIAN</h2>
            
            <div class="personality-box">
                <div class="personality-type"><?= $result['personality_type'] ?></div>
                <div class="personality-name"><?= $result['personality_name'] ?></div>
                
                <p class="text-justify mb-15">
                    <?= $result['personality_description'] ?>
                </p>
            </div>

            <!-- Strengths -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #333; margin-bottom: 10px;">Kekuatan Utama:</h3>
                <?php 
                $strengths = is_array($result['strengths']) ? $result['strengths'] : json_decode($result['strengths'], true);
                if (is_array($strengths)):
                    foreach ($strengths as $strength): 
                ?>
                    <div class="list-item"><?= $strength ?></div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>

            <!-- Development Areas -->
            <div>
                <h3 style="color: #333; margin-bottom: 10px;">Area Pengembangan:</h3>
                <?php 
                $areas = is_array($result['development_areas']) ? $result['development_areas'] : json_decode($result['development_areas'], true);
                if (is_array($areas)):
                    foreach ($areas as $area): 
                ?>
                    <div class="list-item development-item"><?= $area ?></div>
                <?php 
                    endforeach; 
                endif;
                ?>
            </div>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- Major Recommendations -->
        <div class="section">
            <h2 class="section-title">REKOMENDASI JURUSAN</h2>
            
            <div class="summary-box">
                <p><strong>Ringkasan:</strong> Berdasarkan hasil analisis kepribadian Anda, kami merekomendasikan jurusan-jurusan berikut yang sesuai dengan minat, bakat, dan karakteristik kepribadian Anda.</p>
            </div>

            <?php 
            $majors = is_array($result['recommended_majors']) ? $result['recommended_majors'] : json_decode($result['recommended_majors'], true);
            if (is_array($majors)):
                foreach ($majors as $index => $major): 
            ?>
                <div class="major-box">
                    <div>
                        <span class="major-number"><?= $index + 1 ?></span>
                        <span class="major-name"><?= $major['name'] ?></span>
                        <?php
                        $level = isset($major['compatibility_level']) ? $major['compatibility_level'] : 'Cocok';
                        $compatClass = $level === 'Sangat Cocok' ? 'compatibility-high' : 
                                     ($level === 'Cocok' ? 'compatibility-medium' : 'compatibility-low');
                        ?>
                        <span class="compatibility <?= $compatClass ?>"><?= $level ?></span>
                    </div>
                    
                    <p style="margin: 15px 0; text-align: justify;">
                        <?= $major['description'] ?>
                    </p>

                    <?php if(isset($major['career_prospects'])): ?>
                    <div style="margin-top: 15px;">
                        <strong>Prospek Karier:</strong><br>
                        <?php 
                        $careers = explode(', ', $major['career_prospects']);
                        foreach ($careers as $career): 
                        ?>
                            <span class="career-tag"><?= trim($career) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($major['study_duration']) || isset($major['degree_types'])): ?>
                    <div style="margin-top: 10px; font-size: 11pt; color: #666;">
                        <strong>Durasi Studi:</strong> <?= isset($major['study_duration']) ? $major['study_duration'] : '4 Tahun' ?> | 
                        <strong>Gelar:</strong> <?= isset($major['degree_types']) ? $major['degree_types'] : 'S1' ?>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($major['compatibility_reason'])): ?>
                    <div class="note">
                        <strong>Alasan Kesesuaian:</strong> <?= $major['compatibility_reason'] ?>
                    </div>
                    <?php endif; ?>
                </div>
            <?php 
                endforeach;
            endif;
            ?>
        </div>

        <!-- Executive Summary -->
        <div class="section">
            <h2 class="section-title">KESIMPULAN DAN SARAN</h2>
            
            <div class="summary-box">
                <h3 style="margin-bottom: 10px;">Kesimpulan:</h3>
                <p style="text-align: justify;">
                    Berdasarkan hasil tes analisis kepribadian, Anda memiliki tipe kepribadian <strong><?= $result['personality_type'] ?></strong> 
                    yang menunjukkan bahwa Anda adalah <strong><?= $result['personality_name'] ?></strong>. 
                    Karakteristik ini sangat sesuai dengan jurusan-jurusan yang telah direkomendasikan di atas.
                </p>
            </div>

            <div style="margin-top: 20px;">
                <h3 style="margin-bottom: 10px;">Saran Pengembangan:</h3>
                <ol style="margin-left: 20px;">
                    <li style="margin-bottom: 10px;">Pelajari lebih dalam tentang jurusan-jurusan yang direkomendasikan melalui website universitas atau konsultasi dengan konselor pendidikan.</li>
                    <li style="margin-bottom: 10px;">Pertimbangkan untuk mengikuti kegiatan ekstrakurikuler atau magang yang relevan dengan bidang yang diminati.</li>
                    <li style="margin-bottom: 10px;">Kembangkan kekuatan yang Anda miliki sambil terus berupaya memperbaiki area yang perlu ditingkatkan.</li>
                    <li style="margin-bottom: 10px;">Diskusikan hasil ini dengan orang tua, guru, atau mentor untuk mendapatkan perspektif tambahan.</li>
                </ol>
            </div>

            <div class="note">
                <strong>Catatan Penting:</strong> Hasil tes ini merupakan panduan dan bukan keputusan final. 
                Pertimbangkan juga faktor lain seperti minat pribadi, peluang karier, lokasi universitas, 
                dan kemampuan finansial dalam memilih jurusan.
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p><strong>Analisis Jurusan</strong></p>
        <p>Platform Analisis Kepribadian dan Rekomendasi Jurusan Terpercaya</p>
        <p>© <?= date('Y') ?> Analisis Jurusan. All rights reserved.</p>
        <p style="margin-top: 10px; font-size: 9pt;">
            Dokumen ini bersifat rahasia dan hanya untuk penggunaan pribadi.<br>
            Hasil tes berlaku selama 6 bulan sejak tanggal pelaksanaan tes.
        </p>
    </div>
</body>
</html>
