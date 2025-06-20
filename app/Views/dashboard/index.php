<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="space-y-8">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-primary to-red-700 rounded-xl p-6 sm:p-8 text-white shadow-custom relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute top-0 right-0 h-full">
            <svg width="350" height="280" viewBox="0 0 350 280" xmlns="http://www.w3.org/2000/svg" class="opacity-10">
                <path d="M100,25 L225,25 C238.807,25 250,36.1929 250,50 L250,175 C250,188.807 238.807,200 225,200 L100,200 C86.1929,200 75,188.807 75,175 L75,50 C75,36.1929 86.1929,25 100,25 Z" stroke="white" stroke-width="3" fill="none" />
                <circle cx="250" cy="100" r="50" stroke="white" stroke-width="3" fill="none" />
                <path d="M25,100 L150,100" stroke="white" stroke-width="3" />
                <path d="M25,150 L150,150" stroke="white" stroke-width="3" />
                <path d="M175,225 L300,225" stroke="white" stroke-width="3" />
            </svg>
        </div>
        
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between relative z-10">
            <div>
                <h1 class="text-xl sm:text-2xl md:text-3xl font-bold mb-3">Selamat datang, <?= $user['name'] ?>!</h1>
                <p class="text-red-100 text-base sm:text-lg">Siap untuk menemukan jurusan yang tepat untuk Anda?</p>
                
                <?php if (!$incomplete_test && $stats['completed_tests'] == 0): ?>
                <div class="mt-4">
                    <a href="/test/start" class="inline-flex items-center bg-white/15 hover:bg-white/25 backdrop-blur-sm transition-custom text-white px-4 py-2 rounded-lg text-sm">
                        <i class="fas fa-play mr-2"></i> Mulai Tes Sekarang
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <div class="hidden md:block">
                <div class="relative">
                    <div class="absolute -top-2 -right-2 w-16 h-16 bg-yellow-400 rounded-full opacity-30"></div>
                    <div class="relative z-10">
                        <i class="fas fa-graduation-cap text-7xl text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
        <div class="bg-white rounded-xl shadow-soft p-4 sm:p-6 transition-custom hover:shadow-custom">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 sm:p-4 rounded-full">
                    <i class="fas fa-clipboard-list text-blue-600 text-lg sm:text-xl"></i>
                </div>
                <div class="ml-4 sm:ml-5">
                    <p class="text-sm font-medium text-gray-500">Total Tes</p>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900"><?= $stats['total_tests'] ?></p>
                </div>
            </div>
            <div class="mt-4 h-1 w-full bg-blue-50">
                <div class="h-1 bg-blue-500" style="width: 100%"></div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-soft p-4 sm:p-6 transition-custom hover:shadow-custom">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 sm:p-4 rounded-full">
                    <i class="fas fa-check-circle text-green-600 text-lg sm:text-xl"></i>
                </div>
                <div class="ml-4 sm:ml-5">
                    <p class="text-sm font-medium text-gray-500">Tes Selesai</p>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900"><?= $stats['completed_tests'] ?></p>
                </div>
            </div>
            <div class="mt-4 h-1 w-full bg-green-50">
                <div class="h-1 bg-green-500" style="width: <?= $stats['total_tests'] > 0 ? ($stats['completed_tests'] / $stats['total_tests'] * 100) : 0 ?>%"></div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-soft p-4 sm:p-6 transition-custom hover:shadow-custom sm:col-span-2 md:col-span-1">
            <div class="flex items-center">
                <div class="bg-yellow-100 p-3 sm:p-4 rounded-full">
                    <i class="fas fa-clock text-yellow-600 text-lg sm:text-xl"></i>
                </div>
                <div class="ml-4 sm:ml-5">
                    <p class="text-sm font-medium text-gray-500">Dalam Progress</p>
                    <p class="text-xl sm:text-2xl font-bold text-gray-900"><?= $stats['in_progress_tests'] ?></p>
                </div>
            </div>
            <div class="mt-4 h-1 w-full bg-yellow-50">
                <div class="h-1 bg-yellow-500" style="width: <?= $stats['total_tests'] > 0 ? ($stats['in_progress_tests'] / $stats['total_tests'] * 100) : 0 ?>%"></div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">
        <!-- Start New Test -->
        <div class="bg-white rounded-xl shadow-soft p-4 sm:p-6 hover:shadow-custom transition-custom">
            <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-play-circle text-primary mr-2"></i>
                Mulai Tes Baru
            </h2>
            
            <?php if ($incomplete_test): ?>
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 sm:p-5 mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-start">
                        <i class="fas fa-exclamation-triangle text-yellow-500 mt-1 mr-3 mb-2 sm:mb-0"></i>
                        <div>
                            <p class="text-sm font-medium text-yellow-800 mb-1">Tes Belum Selesai</p>
                            <p class="text-sm text-yellow-700 mb-3">Anda memiliki tes yang belum diselesaikan</p>
                            <a href="/test/<?= $incomplete_test['session_token'] ?>" 
                               class="bg-yellow-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-yellow-600 transition-custom inline-flex items-center">
                                <i class="fas fa-redo mr-2"></i>
                                Lanjutkan Tes
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="text-center bg-gray-50 p-4 sm:p-8 rounded-xl border border-gray-100">
                <div class="bg-primary/10 w-16 sm:w-20 h-16 sm:h-20 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                    <i class="fas fa-play text-2xl sm:text-3xl text-primary"></i>
                </div>
                <h3 class="text-base sm:text-lg font-medium text-gray-900 mb-2 sm:mb-3">Tes Kepribadian Lampung Cerdas</h3>
                <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6 max-w-md mx-auto">
                    Temukan jurusan yang sesuai dengan kepribadian Anda melalui tes komprehensif
                </p>
                <div class="flex flex-wrap justify-center gap-3 sm:gap-6 mb-4 sm:mb-6">
                    <div class="flex items-center text-xs sm:text-sm text-gray-500">
                        <i class="fas fa-clock text-gray-400 mr-2"></i> 15-20 menit
                    </div>
                    <div class="flex items-center text-xs sm:text-sm text-gray-500">
                        <i class="fas fa-question-circle text-gray-400 mr-2"></i> 52 pertanyaan
                    </div>
                    <div class="flex items-center text-xs sm:text-sm text-gray-500">
                        <i class="fas fa-chart-bar text-gray-400 mr-2"></i> Analisis komprehensif
                    </div>
                </div>
                <a href="/test/start" 
                   class="bg-gradient-to-r from-primary to-red-700 hover:from-red-700 hover:to-primary text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg text-sm font-medium transition-custom btn-hover inline-flex items-center">
                    <i class="fas fa-play mr-2"></i>
                    Mulai Tes Sekarang
                </a>
            </div>
        </div>

        <!-- Latest Result -->
        <div class="bg-white rounded-xl shadow-soft p-4 sm:p-6 hover:shadow-custom transition-custom">
            <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-chart-pie text-primary mr-2"></i>
                Hasil Tes Terakhir
            </h2>
            
            <?php if ($latest_result): ?>
                <div class="space-y-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-medium text-gray-900 text-lg"><?= $latest_result['personality_name'] ?></h3>
                            <p class="text-sm text-gray-500 flex items-center mt-1">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                <?= date('d M Y', strtotime($latest_result['created_at'])) ?>
                            </p>
                        </div>
                        <div class="bg-green-100 text-green-800 px-3 py-1.5 rounded-full text-xs font-medium">
                            Selesai
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg border-l-4 border-primary">
                        <p class="text-sm text-gray-600 leading-relaxed">
                            <?= substr($latest_result['personality_description'], 0, 150) ?>...
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-2"></i>
                            Top 3 Rekomendasi:
                        </p>
                        <div class="space-y-2.5">
                            <?php 
                            $majors = array_slice($latest_result['recommended_majors'], 0, 3);
                            foreach ($majors as $index => $major): 
                            ?>
                                <div class="flex items-center bg-white p-2 rounded-lg border border-gray-100">
                                    <div class="bg-primary w-6 h-6 rounded-full flex items-center justify-center text-white text-xs">
                                        <?= $index + 1 ?>
                                    </div>
                                    <span class="ml-3 text-gray-700 font-medium text-sm">
                                        <?= $major['name'] ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="flex space-x-3 pt-2">
                        <a href="/dashboard/history/<?= $latest_result['id'] ?>" 
                           class="flex-1 bg-gradient-to-r from-primary to-red-700 hover:from-red-700 hover:to-primary text-white text-center py-2.5 px-4 rounded-lg text-sm font-medium transition-custom flex justify-center items-center">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Detail
                        </a>
                        <a href="/dashboard/history/pdf/<?= $latest_result['id'] ?>" 
                           class="flex-1 bg-gray-100 text-gray-700 text-center py-2.5 px-4 rounded-lg text-sm font-medium hover:bg-gray-200 transition-custom flex justify-center items-center">
                            <i class="fas fa-file-pdf mr-2"></i>
                            Download PDF
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-12 bg-gray-50 rounded-xl">
                    <i class="fas fa-clipboard-list text-5xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 font-medium">Anda belum memiliki hasil tes</p>
                    <p class="text-sm text-gray-400 mt-2 mb-4 max-w-xs mx-auto">Mulai tes pertama Anda untuk melihat rekomendasi jurusan</p>
                    <a href="/test/start" class="inline-flex items-center text-primary hover:text-red-700 font-medium transition-custom">
                        Mulai Tes Sekarang
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Activity -->
    <?php if (!empty($recent_sessions)): ?>
    <div class="bg-white rounded-xl shadow-soft p-6 hover:shadow-custom transition-custom">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                <i class="fas fa-history text-primary mr-2"></i>
                Aktivitas Terbaru
            </h2>
            <a href="/dashboard/history" class="text-primary hover:text-red-800 text-sm font-medium flex items-center transition-custom">
                Lihat Semua
                <i class="fas fa-arrow-right ml-1.5 text-xs"></i>
            </a>
        </div>
        
        <div class="overflow-hidden">
            <div class="divide-y divide-gray-100">
                <?php foreach ($recent_sessions as $session): ?>
                    <div class="flex items-center justify-between py-3.5">
                        <div class="flex items-center">
                            <div class="bg-gray-100 p-2.5 rounded-lg mr-4">
                                <i class="fas fa-clipboard-list text-gray-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">
                                    Tes Analisis Kepribadian
                                </p>
                                <p class="text-xs text-gray-500 mt-1 flex items-center">
                                    <i class="fas fa-clock mr-1.5"></i>
                                    <?= date('d M Y H:i', strtotime($session['created_at'])) ?>
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <?php if ($session['status'] === 'completed'): ?>
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">
                                    Selesai
                                </span>
                            <?php elseif ($session['status'] === 'in_progress'): ?>
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-medium">
                                    Progress
                                </span>
                            <?php else: ?>
                                <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs font-medium">
                                    Ditinggalkan
                                </span>
                            <?php endif; ?>
                            
                            <?php if ($session['status'] === 'in_progress'): ?>
                                <a href="/test/<?= $session['session_token'] ?>" class="ml-3 text-primary hover:text-red-800">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            <?php elseif ($session['status'] === 'completed'): ?>
                                <a href="/dashboard/history/<?= $session['id'] ?>" class="ml-3 text-primary hover:text-red-800">
                                    <i class="fas fa-eye"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>