<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="mb-5">
            <ol class="flex text-sm text-gray-500">
                <li class="flex items-center">
                    <a href="/" class="hover:text-primary">Beranda</a>
                    <span class="mx-2">/</span>
                </li>
                <li class="flex items-center">
                    <a href="/dashboard" class="hover:text-primary">Dashboard</a>
                    <span class="mx-2">/</span>
                </li>
                <li class="flex items-center text-primary font-medium">
                    Detail Jurusan
                </li>
            </ol>
        </nav>

        <!-- Flash Messages -->
        <?php if (session()->has('error')): ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
            <p><?= session('error') ?></p>
        </div>
        <?php endif; ?>

        <!-- Major Header -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-primary to-red-800 p-8 text-white">
                <h1 class="text-3xl font-bold mb-2"><?= $major['name'] ?? 'Detail Jurusan' ?></h1>
                <p class="text-red-100 text-lg mb-4">
                    <?= $major['degree_types'] ?? 'S1' ?> • 
                    <?= $major['study_duration'] ?? '4 Tahun' ?>
                </p>
                
                <!-- <div class="flex flex-wrap gap-3 mt-4">
                    <?php if(!empty($major['riasec_match'])): ?>
                    <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm">
                        RIASEC: <?= $major['riasec_match'] ?>
                    </span>
                    <?php endif; ?>
                    
                    <?php if(!empty($major['mbti_match'])): ?>
                    <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm">
                        MBTI: <?= $major['mbti_match'] ?>
                    </span>
                    <?php endif; ?>
                </div> -->
            </div>
            
            <div class="p-6">
                <div class="prose max-w-none">
                    <p class="text-lg text-gray-600 mb-6"><?= $major['description'] ?? 'Informasi deskripsi jurusan tidak tersedia.' ?></p>
                </div>
            </div>
        </div>

        <!-- Major Details -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Full Description -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Tentang Jurusan</h2>
                    <div class="prose max-w-none text-gray-600">
                        <p><?= $major['full_description'] ?? 'Informasi deskripsi lengkap tidak tersedia.' ?></p>
                    </div>
                </div>

                <!-- Core Subjects -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Mata Kuliah Utama</h2>
                    <?php if(!empty($major['core_subjects'])): ?>
                    <div class="grid md:grid-cols-2 gap-4">
                        <?php 
                        $subjects = is_array($major['core_subjects']) ? $major['core_subjects'] : explode(',', $major['core_subjects']); 
                        foreach ($subjects as $subject):
                        ?>
                        <div class="flex items-center">
                            <i class="fas fa-book text-primary mr-3"></i>
                            <span class="text-gray-700"><?= trim($subject) ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php else: ?>
                    <p class="text-gray-600">Informasi mata kuliah utama tidak tersedia.</p>
                    <?php endif; ?>
                </div>

                <!-- Career Prospects -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Prospek Karier</h2>
                    <p class="text-gray-600 mb-4"><?= $major['career_prospects'] ?? 'Informasi prospek karier tidak tersedia.' ?></p>
                    
                    <?php if(!empty($major['industry_sectors'])): ?>
                    <h3 class="font-semibold text-gray-900 mt-6 mb-3">Sektor Industri</h3>
                    <div class="flex flex-wrap gap-2">
                        <?php 
                        $sectors = is_array($major['industry_sectors']) ? $major['industry_sectors'] : explode(',', $major['industry_sectors']);
                        foreach ($sectors as $sector): 
                        ?>
                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                            <?= trim($sector) ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Future Trends -->
                <?php if(!empty($major['future_trends'])): ?>
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Tren Masa Depan</h2>
                    <div class="prose max-w-none text-gray-600">
                        <p><?= $major['future_trends'] ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Compatibility -->
                <?php if(!empty($major['compatibility_reason'])): ?>
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-3">Alasan Kesesuaian</h2>
                    <p class="text-gray-600"><?= $major['compatibility_reason'] ?></p>
                </div>
                <?php endif; ?>

                <!-- Key Information -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Informasi Utama</h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-md bg-primary/10">
                                <i class="fas fa-graduation-cap text-primary"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-base font-medium text-gray-900">Gelar Akademik</h3>
                                <p class="text-sm text-gray-600"><?= $major['degree_types'] ?? 'S1' ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-md bg-primary/10">
                                <i class="fas fa-clock text-primary"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-base font-medium text-gray-900">Durasi Studi</h3>
                                <p class="text-sm text-gray-600"><?= $major['study_duration'] ?? '4 Tahun' ?></p>
                            </div>
                        </div>
                        
                        <!-- <?php if(!empty($major['riasec_match']) || !empty($major['mbti_match'])): ?>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center rounded-md bg-primary/10">
                                <i class="fas fa-user text-primary"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-base font-medium text-gray-900">Cocok untuk Tipe</h3>
                                <p class="text-sm text-gray-600">
                                    <?php if(!empty($major['riasec_match'])): ?><?= $major['riasec_match'] ?><?php endif; ?>
                                    <?php if(!empty($major['riasec_match']) && !empty($major['mbti_match'])): ?>-<?php endif; ?>
                                    <?php if(!empty($major['mbti_match'])): ?><?= $major['mbti_match'] ?><?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <?php endif; ?> -->
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col gap-3">
                    <a href="/dashboard/history" class="bg-primary text-white text-center py-3 px-6 rounded-lg font-medium hover:bg-red-800 transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Riwayat
                    </a>
                    <a href="/test/start" class="bg-gray-100 text-gray-700 text-center py-3 px-6 rounded-lg font-medium hover:bg-gray-200 transition duration-200">
                        <i class="fas fa-redo mr-2"></i>Tes Ulang
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 