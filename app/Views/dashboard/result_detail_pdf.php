<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Tes Analisis Jurusan</title>
    <style>
        /* Reset CSS */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        /* Page settings */
        @page {
            size: A4;
            margin: 2cm;
        }
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.5;
            color: #1F2937;
            background-color: #F3F4F6;
            padding: 0;
            margin: 0;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 32px 24px;
        }
        .mb-8 {
            margin-bottom: 32px;
        }
        
        /* Header styles */
        .page-title {
            font-size: 24px;
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 4px;
        }
        .page-subtitle {
            font-size: 16px;
            color: #6B7280;
        }
        
        /* Header Card */
        .header-card {
            background: linear-gradient(to right, #B91C1C, #7F1D1D);
            color: white;
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 32px;
            text-align: center;
            page-break-after: avoid;
            break-after: avoid;
        }
        .header-icon {
            font-size: 48px;
            color: #FCD34D;
            margin-bottom: 16px;
        }
        .header-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .personality-name {
            font-size: 20px;
            color: #FEE2E2;
            margin-bottom: 8px;
        }
        .completion-date {
            color: #FEE2E2;
            font-size: 14px;
        }
        
        /* Grid Layout */
        .grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 32px;
        }
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
        
        /* Print styles */
        @media print {
            body {
                background-color: white !important;
            }
            .page-break {
                page-break-before: always;
                break-before: page;
            }
            .container {
                max-width: 100%;
                padding: 0;
                margin: 0;
            }
        }
        
        /* Cards */
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 24px;
            margin-bottom: 24px;
            page-break-inside: avoid;
            break-inside: avoid;
        }
        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: #1F2937;
            margin-bottom: 16px;
        }
        
        /* Profile Section */
        .profile-center {
            text-align: center;
            margin-bottom: 24px;
        }
        .profile-icon {
            width: 80px;
            height: 80px;
            background-color: rgba(185, 28, 28, 0.1);
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }
        .profile-icon span {
            font-size: 30px;
            color: #B91C1C;
        }
        .profile-name {
            font-size: 18px;
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 4px;
        }
        .profile-type {
            font-size: 14px;
            color: #6B7280;
        }
        
        /* Sections */
        .section {
            margin-bottom: 24px;
        }
        .section:last-child {
            margin-bottom: 0;
        }
        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 8px;
        }
        .section-text {
            font-size: 14px;
            color: #6B7280;
            line-height: 1.5;
        }
        
        /* Lists */
        .trait-list {
            list-style: none;
        }
        .trait-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 8px;
        }
        .trait-item:last-child {
            margin-bottom: 0;
        }
        .check-icon {
            color: #10B981;
            font-weight: bold;
            margin-right: 8px;
        }
        .arrow-icon {
            color: #3B82F6;
            font-weight: bold;
            margin-right: 8px;
        }
        .trait-text {
            font-size: 14px;
            color: #6B7280;
        }
        
        /* Major Cards */
        .majors-list {
            display: flex;
            flex-direction: column;
            gap: 0;
        }
        .major-card {
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 24px;
            page-break-inside: avoid;
            break-inside: avoid;
            margin-bottom: 24px;
        }
        .major-header {
            display: flex;
            margin-bottom: 16px;
        }
        .major-number {
            width: 32px;
            height: 32px;
            background-color: #B91C1C;
            color: white;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 16px;
            text-align: center;
            font-size: 16px;
            padding: 0;
            position: relative;
        }
        .major-info {
            flex: 1;
        }
        .major-name {
            font-size: 18px;
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 4px;
        }
        .compatibility {
            display: flex;
            align-items: center;
        }
        .compatibility-label {
            font-size: 14px;
            font-weight: 500;
            margin-right: 8px;
        }
        .badge {
            font-size: 12px;
            font-weight: 500;
            padding: 4px 8px;
            border-radius: 9999px;
            display: inline-block;
        }
        .badge-green {
            background-color: #D1FAE5;
            color: #065F46;
        }
        .badge-blue {
            background-color: #DBEAFE;
            color: #1E40AF;
        }
        .badge-yellow {
            background-color: #FEF3C7;
            color: #92400E;
        }
        
        .major-description {
            font-size: 14px;
            color: #6B7280;
            line-height: 1.5;
            margin-bottom: 16px;
        }
        
        /* Career Tags */
        .careers-title {
            font-size: 16px;
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 8px;
        }
        .careers-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px;
        }
        .career-tag {
            background-color: #F3F4F6;
            color: #4B5563;
            font-size: 14px;
            padding: 4px 12px;
            border-radius: 9999px;
        }
        
        /* Major Footer */
        .major-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .major-meta {
            font-size: 14px;
            color: #6B7280;
        }
        
        /* Document Footer */
        .document-footer {
            margin-top: 32px;
            padding-top: 16px;
            border-top: 1px solid #E5E7EB;
            text-align: center;
            color: #6B7280;
            font-size: 14px;
            page-break-before: avoid;
            break-before: avoid;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="mb-8">
            <h1 class="page-title">Detail Hasil Tes</h1>
            <p class="page-subtitle">Hasil tes kepribadian dan rekomendasi jurusan</p>
        </div>
        
        <div class="header-card">
            <div class="header-icon">🏆</div>
            <h2 class="header-title">Hasil Tes Analisis Jurusan</h2>
            <?php 
            // Try multiple approaches to get the user's name
            $userName = '';
            if (isset($user['full_name'])) {
                $userName = $user['full_name'];
            } elseif (isset($result['user_name'])) {
                $userName = $result['user_name'];
            } elseif (isset($result['user']['name'])) {
                $userName = $result['user']['name'];
            } elseif (isset($result['user_id'])) {
                // Load user model if needed
                $userModel = new \App\Models\UserModel();
                $userInfo = $userModel->find($result['user_id']);
                if ($userInfo) {
                    $userName = $userInfo['full_name'];
                }
            }
            ?>
            <p class="personality-name"><?= !empty($userName) ? $userName : 'Peserta Tes' ?></p>
            <p class="completion-date">
                Diselesaikan pada <?= date('d F Y, H:i', strtotime($result['created_at'])) ?> WIB
            </p>
        </div>
        
        <div class="grid">
            <!-- Profile Column -->
            <div>
                <div class="card">
                    <h3 class="card-title">Profil Hasil Analisis</h3>
                    
                    <div class="profile-center">
                        <div class="profile-icon">
                            <span>👤</span>
                        </div>
                        <h4 class="profile-name">Profil Hasil Analisis</h4>
                    </div>
                    
                    <div class="section">
                        <h4 class="section-title">Deskripsi</h4>
                        <p class="section-text">
                            Hasil analisis minat dan bakat berdasarkan tes yang telah diselesaikan.
                            Rekomendasi ini mempertimbangkan berbagai aspek yang menunjukkan kecenderungan
                            dan potensi akademik Anda.
                        </p>
                    </div>
                    
                    <div class="section">
                        <h4 class="section-title">Kekuatan Utama</h4>
                        <ul class="trait-list">
                            <?php foreach ($result['strengths'] as $strength): ?>
                            <li class="trait-item">
                                <span class="check-icon">✓</span>
                                <span class="trait-text"><?= $strength ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="section">
                        <h4 class="section-title">Area Pengembangan</h4>
                        <ul class="trait-list">
                            <?php foreach ($result['development_areas'] as $area): ?>
                            <li class="trait-item">
                                <span class="arrow-icon">↑</span>
                                <span class="trait-text"><?= $area ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Recommendations Column -->
            <div>
                <div class="card">
                    <h3 class="card-title">Rekomendasi Jurusan</h3>
                    
                    <div class="majors-list">
                        <?php foreach ($result['recommended_majors'] as $index => $major): ?>
                        <div class="major-card">
                            <div class="major-header">
                                <div class="major-number" style="display: flex; justify-content: center; align-items: center;"><?= $index + 1 ?></div>
                                <div class="major-info">
                                    <h4 class="major-name"><?= $major['name'] ?></h4>
                                    <div class="compatibility">
                                        <span class="compatibility-label">Tingkat Kesesuaian:</span>
                                        <?php
                                        $level = isset($major['compatibility_level']) ? $major['compatibility_level'] : 'Cocok';
                                        $badgeClass = $level === 'Sangat Cocok' ? 'badge-green' : 
                                                    ($level === 'Cocok' ? 'badge-blue' : 'badge-yellow');
                                        ?>
                                        <span class="badge <?= $badgeClass ?>"><?= $level ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="major-description">
                                <?= $major['description'] ?>
                            </p>
                            
                            <?php if(isset($major['career_prospects'])): ?>
                            <div>
                                <h5 class="careers-title">Prospek Karier:</h5>
                                <div class="careers-tags">
                                    <?php 
                                    $careers = explode(', ', $major['career_prospects']);
                                    foreach (array_slice($careers, 0, 4) as $career): 
                                    ?>
                                        <span class="career-tag"><?= trim($career) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <div class="major-footer">
                                <div class="major-meta">
                                    🎓 <?= isset($major['study_duration']) ? $major['study_duration'] : '4 Tahun' ?> • 
                                    <?= isset($major['degree_types']) ? $major['degree_types'] : 'S1' ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="document-footer">
            © <?= date('Y') ?> Analisis Jurusan • Laporan dibuat pada <?= date('d F Y') ?>
        </div>
    </div>
</body>
</html> 