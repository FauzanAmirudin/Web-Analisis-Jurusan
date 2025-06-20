<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="container px-6 py-8 mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-gray-800">Detail Hasil Tes</h1>
        <p class="text-gray-600">Hasil tes kepribadian dan rekomendasi jurusan</p>
    </div>

    <!-- Header Card -->
    <div class="bg-gradient-to-r from-primary to-red-800 rounded-lg p-6 text-white mb-8">
        <div class="text-center">
            <div class="mb-4">
                <i class="fas fa-trophy text-5xl text-yellow-300"></i>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold mb-2">Hasil Tes</h2>
            <p class="text-xl text-red-100 mb-2"><?= $result['personality_name'] ?></p>
            <p class="text-red-200">
                Diselesaikan pada <?= date('d F Y, H:i', strtotime($result['created_at'])) ?> WIB
            </p>
            <div class="flex justify-center space-x-4 mt-6">
                <a href="<?= site_url('dashboard/history/pdf/'.$result['id']) ?>" 
                   class="bg-yellow-400 text-gray-900 px-6 py-2 rounded-lg font-medium hover:bg-yellow-300 transition duration-200">
                    <i class="fas fa-download mr-2"></i>Download PDF
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Personality Profile -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Profil Kepribadian</h3>
                
                <div class="text-center mb-6">
                    <div class="bg-primary/10 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-circle text-3xl text-primary"></i>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900"><?= $result['personality_name'] ?></h4>
                    <!-- <p class="text-sm text-gray-600">Tipe: <?= $result['personality_type'] ?></p> -->
                </div>

                <div class="mb-6">
                    <h4 class="font-semibold text-gray-900 mb-2">Deskripsi</h4>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <?= $result['personality_description'] ?>
                    </p>
                </div>

                <div class="mb-6">
                    <h4 class="font-semibold text-gray-900 mb-3">Kekuatan Utama</h4>
                    <ul class="space-y-2">
                        <?php 
                        $strengths = is_array($result['strengths']) ? $result['strengths'] : json_decode($result['strengths'], true);
                        foreach ($strengths as $strength): 
                        ?>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5 text-sm"></i>
                                <span class="text-sm text-gray-600"><?= $strength ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-gray-900 mb-3">Area Pengembangan</h4>
                    <ul class="space-y-2">
                        <?php 
                        $areas = is_array($result['development_areas']) ? $result['development_areas'] : json_decode($result['development_areas'], true);
                        foreach ($areas as $area): 
                        ?>
                            <li class="flex items-start">
                                <i class="fas fa-arrow-up text-blue-500 mr-2 mt-0.5 text-sm"></i>
                                <span class="text-sm text-gray-600"><?= $area ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Major Recommendations -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Rekomendasi Jurusan</h3>
                
                <div class="space-y-6">
                    <?php 
                    $majors = is_array($result['recommended_majors']) ? $result['recommended_majors'] : json_decode($result['recommended_majors'], true);
                    foreach ($majors as $index => $major): 
                    ?>
                        <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition duration-200">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center font-bold mr-4">
                                        <?= $index + 1 ?>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900"><?= $major['name'] ?></h4>
                                        <div class="flex items-center mt-1">
                                            <span class="text-sm font-medium mr-2">Tingkat Kesesuaian:</span>
                                            <?php
                                            $level = isset($major['compatibility_level']) ? $major['compatibility_level'] : 'Cocok';
                                            $colorClass = $level === 'Sangat Cocok' ? 'bg-green-100 text-green-800' : 
                                                        ($level === 'Cocok' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800');
                                            ?>
                                            <span class="<?= $colorClass ?> px-2 py-1 rounded-full text-xs font-medium">
                                                <?= $level ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="text-gray-600 mb-4 leading-relaxed">
                                <?= $major['description'] ?>
                            </p>

                            <?php if(isset($major['career_prospects'])): ?>
                            <div class="mb-4">
                                <h4 class="font-semibold text-gray-900 mb-2">Prospek Karier:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <?php 
                                    $careers = explode(', ', $major['career_prospects']);
                                    foreach (array_slice($careers, 0, 4) as $career): 
                                    ?>
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                                            <?= trim($career) ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="flex justify-between items-center">
                                <div class="text-sm text-gray-500">
                                    <i class="fas fa-graduation-cap mr-1"></i>
                                    <?= isset($major['study_duration']) ? $major['study_duration'] : '4 Tahun' ?> • 
                                    <?= isset($major['degree_types']) ? $major['degree_types'] : 'S1' ?>
                                </div>
                                <?php if(isset($major['id'])): ?>
                                <a href="<?= site_url('major/'.$major['id']) ?>" 
                                   class="bg-primary text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-800 transition duration-200">
                                    Lihat Detail
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 mt-6">
                <a href="/dashboard" 
                   class="flex-1 bg-primary text-white text-center py-3 px-6 rounded-lg font-medium hover:bg-red-800 transition duration-200">
                    <i class="fas fa-tachometer-alt mr-2"></i>Kembali ke Dashboard
                </a>
                <a href="/dashboard/history" 
                   class="flex-1 bg-gray-100 text-gray-700 text-center py-3 px-6 rounded-lg font-medium hover:bg-gray-200 transition duration-200">
                    <i class="fas fa-history mr-2"></i>Lihat Riwayat
                </a>
                <a href="/test/start" 
                   class="flex-1 bg-gray-200 text-gray-700 text-center py-3 px-6 rounded-lg font-medium hover:bg-gray-300 transition duration-200">
                    <i class="fas fa-redo mr-2"></i>Tes Ulang
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 