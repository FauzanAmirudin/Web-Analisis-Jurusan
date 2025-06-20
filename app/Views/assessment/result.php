<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="min-h-screen bg-gray-50 py-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-primary to-red-700 rounded-xl p-8 text-white mb-10 shadow-custom overflow-hidden relative">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJ3aGl0ZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMzAgNjBjMTYuNTY5IDAgMzAtMTMuNDMxIDMwLTMwQzYwIDEzLjQzMSA0Ni41NjkgMCAzMCAwIDEzLjQzMSAwIDAgMTMuNDMxIDAgMzBjMCAxNi41NjkgMTMuNDMxIDMwIDMwIDMwem0wLTVjMTMuODA3IDAgMjUtMTEuMTkzIDI1LTI1UzQzLjgwNyA1IDMwIDUgNSAxNi4xOTMgNSAzMHMxMS4xOTMgMjUgMjUgMjV6Ii8+PC9nPjwvc3ZnPg==')]" opacity=".1"></div>
            
            <div class="text-center relative z-10">
                <div class="mb-6">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full">
                        <i class="fas fa-trophy text-6xl text-yellow-300 drop-shadow-md"></i>
                    </div>
                </div>
                <h1 class="text-4xl font-bold mb-4">Selamat!</h1>
                <p class="text-xl text-red-100 mb-3">Tes Analisis Kepribadian Anda telah selesai</p>
                <p class="text-red-200 mb-6">
                    <i class="fas fa-calendar-check mr-2"></i>
                    Diselesaikan pada <?= date('d F Y, H:i', strtotime($session['completed_at'])) ?> WIB
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-x-0 sm:space-x-4 space-y-3 sm:space-y-0 mt-6">
                    <button onclick="window.print()" 
                            class="bg-yellow-400 text-gray-900 px-6 py-3 rounded-lg font-medium hover:bg-yellow-300 transition-custom btn-hover inline-flex items-center justify-center">
                        <i class="fas fa-download mr-2"></i>Download PDF
                    </button>
                    <button onclick="shareResult()" 
                            class="bg-white/20 text-white px-6 py-3 rounded-lg font-medium hover:bg-white/30 transition-custom inline-flex items-center justify-center">
                        <i class="fas fa-share mr-2"></i>Bagikan Hasil
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Personality Profile -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-custom p-8 mb-6 hover:shadow-lg transition-custom">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <i class="fas fa-user-circle text-primary mr-3"></i>
                        Profil Kepribadian Anda
                    </h2>
                    
                    <div class="text-center mb-8">
                        <div class="bg-primary/10 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-5">
                            <i class="fas fa-user-circle text-4xl text-primary"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-1"><?= $result['personality_name'] ?></h3>
                        <!-- <p class="text-sm text-gray-600 bg-gray-100 px-4 py-1.5 rounded-full inline-flex items-center">
                            <i class="fas fa-tag mr-1.5"></i>
                            Tipe Kepribadian: <?= $result['personality_type'] ?>
                        </p> -->
                    </div>

                    <div class="mb-8">
                        <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-book mr-2 text-primary/70"></i>
                            Deskripsi
                        </h4>
                        <div class="bg-gray-50 p-4 rounded-lg border-l-3 border-primary/30">
                            <p class="text-sm text-gray-600 leading-relaxed">
                                <?= $result['personality_description'] ?>
                            </p>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h4 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-star mr-2 text-yellow-500"></i>
                            Kekuatan Utama
                        </h4>
                        <ul class="space-y-3">
                            <?php foreach ($result['strengths'] as $strength): ?>
                                <li class="flex items-start bg-green-50/50 p-3 rounded-lg">
                                    <i class="fas fa-check-circle text-green-500 mr-3 mt-0.5"></i>
                                    <span class="text-sm text-gray-700"><?= $strength ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-arrow-up mr-2 text-blue-500"></i>
                            Area Pengembangan
                        </h4>
                        <ul class="space-y-3">
                            <?php foreach ($result['development_areas'] as $area): ?>
                                <li class="flex items-start bg-blue-50/50 p-3 rounded-lg">
                                    <i class="fas fa-arrow-alt-circle-up text-blue-500 mr-3 mt-0.5"></i>
                                    <span class="text-sm text-gray-700"><?= $area ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Major Recommendations -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-custom p-8 hover:shadow-lg transition-custom">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <i class="fas fa-graduation-cap text-primary mr-3"></i>
                        Rekomendasi Jurusan untuk Anda
                    </h2>
                    
                    <div class="space-y-8">
                        <?php foreach ($result['recommended_majors'] as $index => $major): ?>
                            <div class="border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-custom bg-white">
                                <div class="flex items-start justify-between mb-5">
                                    <div class="flex items-center">
                                        <div class="bg-gradient-to-br from-primary to-red-700 text-white w-10 h-10 rounded-full flex items-center justify-center font-bold mr-4 shadow-sm">
                                            <?= $index + 1 ?>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-900"><?= $major['name'] ?></h3>
                                            <div class="flex items-center mt-1.5">
                                                <span class="text-sm font-medium text-gray-500 mr-2">Tingkat Kesesuaian:</span>
                                                <?php
                                                $level = $major['compatibility_level'];
                                                $colorClass = $level === 'Sangat Cocok' ? 'bg-green-100 text-green-800' : 
                                                            ($level === 'Cocok' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800');
                                                ?>
                                                <span class="<?= $colorClass ?> px-3 py-1 rounded-full text-xs font-medium flex items-center">
                                                    <?php if ($level === 'Sangat Cocok'): ?>
                                                        <i class="fas fa-check-circle mr-1.5"></i>
                                                    <?php elseif ($level === 'Cocok'): ?>
                                                        <i class="fas fa-thumbs-up mr-1.5"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-star mr-1.5"></i>
                                                    <?php endif; ?>
                                                    <?= $level ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gray-50 p-4 rounded-lg mb-5 border-l-4 border-primary/30">
                                    <p class="text-gray-600 leading-relaxed">
                                        <?= $major['description'] ?>
                                    </p>
                                </div>

                                <div class="mb-5">
                                    <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                                        <i class="fas fa-briefcase text-primary/70 mr-2"></i>
                                        Prospek Karier:
                                    </h4>
                                    <div class="flex flex-wrap gap-2">
                                        <?php 
                                        $careers = explode(', ', $major['career_prospects']);
                                        foreach (array_slice($careers, 0, 5) as $career): 
                                        ?>
                                            <span class="bg-gray-100 text-gray-700 px-3 py-1.5 rounded-full text-sm flex items-center">
                                                <i class="fas fa-user-tie text-gray-400 mr-2"></i>
                                                <?= trim($career) ?>
                                            </span>
                                        <?php endforeach; ?>
                                        <?php if (count($careers) > 5): ?>
                                            <span class="bg-gray-100 text-gray-700 px-3 py-1.5 rounded-full text-sm">
                                                +<?= count($careers) - 5 ?> lainnya
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center">
                                    <div class="text-sm text-gray-500 flex items-center">
                                        <i class="fas fa-graduation-cap mr-1.5"></i>
                                        <?= $major['study_duration'] ?> • <?= $major['degree_types'] ?>
                                    </div>
                                    <a href="/test/major/<?= $major['id'] ?>" 
                                       class="bg-gradient-to-r from-primary to-red-700 hover:from-red-700 hover:to-primary text-white px-5 py-2 rounded-lg text-sm font-medium transition-custom btn-hover flex items-center">
                                        <i class="fas fa-info-circle mr-1.5"></i>
                                        Lihat Detail Lengkap
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Executive Summary -->
                <div class="bg-white rounded-xl shadow-custom p-8 mt-10 hover:shadow-lg transition-custom">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <i class="fas fa-file-alt text-primary mr-3"></i>
                        Ringkasan Eksekutif
                    </h2>
                    
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="bg-gray-50 p-5 rounded-xl border border-gray-100">
                            <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                                <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center mr-2">
                                    <i class="fas fa-question text-primary"></i>
                                </div>
                                Mengapa Jurusan Ini Cocok?
                            </h3>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Berdasarkan analisis kepribadian Anda sebagai <strong><?= $result['personality_name'] ?></strong>, 
                                jurusan-jurusan yang direkomendasikan sangat sesuai dengan preferensi kerja, gaya belajar, 
                                dan kekuatan natural Anda. Kombinasi minat dan kepribadian Anda menunjukkan potensi besar 
                                untuk sukses di bidang-bidang tersebut.
                            </p>
                        </div>
                        
                        <div class="bg-gray-50 p-5 rounded-xl border border-gray-100">
                            <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                                <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center mr-2">
                                    <i class="fas fa-map-signs text-primary"></i>
                                </div>
                                Langkah Selanjutnya
                            </h3>
                            <ul class="text-sm text-gray-600 space-y-3">
                                <li class="flex items-start">
                                    <div class="bg-white w-6 h-6 rounded-full flex items-center justify-center shadow-sm flex-shrink-0 mt-0.5 mr-3">
                                        <i class="fas fa-check text-primary text-xs"></i>
                                    </div>
                                    <span>Pelajari detail setiap jurusan yang direkomendasikan</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="bg-white w-6 h-6 rounded-full flex items-center justify-center shadow-sm flex-shrink-0 mt-0.5 mr-3">
                                        <i class="fas fa-check text-primary text-xs"></i>
                                    </div>
                                    <span>Konsultasi dengan konselor pendidikan atau orang tua</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="bg-white w-6 h-6 rounded-full flex items-center justify-center shadow-sm flex-shrink-0 mt-0.5 mr-3">
                                        <i class="fas fa-check text-primary text-xs"></i>
                                    </div>
                                    <span>Riset universitas yang menawarkan jurusan pilihan</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="bg-white w-6 h-6 rounded-full flex items-center justify-center shadow-sm flex-shrink-0 mt-0.5 mr-3">
                                        <i class="fas fa-check text-primary text-xs"></i>
                                    </div>
                                    <span>Pertimbangkan faktor lain seperti lokasi dan biaya</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-5 mt-10">
                    <a href="/dashboard" 
                       class="flex-1 bg-gradient-to-r from-primary to-red-700 hover:from-red-700 hover:to-primary text-white text-center py-4 px-6 rounded-lg font-medium transition-custom btn-hover flex items-center justify-center">
                        <i class="fas fa-tachometer-alt mr-2"></i>Kembali ke Dashboard
                    </a>
                    <a href="/test/start" 
                       class="flex-1 bg-gray-100 text-gray-700 text-center py-4 px-6 rounded-lg font-medium hover:bg-gray-200 transition-custom flex items-center justify-center">
                        <i class="fas fa-redo mr-2"></i>Tes Ulang
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
function shareResult() {
    if (navigator.share) {
        navigator.share({
            title: 'Hasil Tes Analisis Jurusan',
            text: 'Saya baru saja menyelesaikan tes analisis jurusan dan mendapat hasil: <?= $result['personality_name'] ?>',
            url: window.location.href
        });
    } else {
        // Fallback to copy to clipboard
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert('Link hasil tes telah disalin ke clipboard!');
        });
    }
}

// Print styles
window.addEventListener('beforeprint', function() {
    document.body.classList.add('print-mode');
});

window.addEventListener('afterprint', function() {
    document.body.classList.remove('print-mode');
});
</script>

<style>
@media print {
    .print-mode {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    body {
        background: white !important;
    }
    
    .no-print {
        display: none !important;
    }
}

.border-l-3 {
    border-left-width: 3px;
}
</style>
<?= $this->endSection() ?>