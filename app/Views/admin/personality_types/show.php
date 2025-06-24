<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Detail Tipe Kepribadian</h2>
        <div class="flex space-x-2">
            <a href="/admin/personality-types/edit/<?= $type['id'] ?>" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg shadow-sm hover:bg-blue-700 transition-all">
                <i class="fas fa-edit mr-2"></i>
                <span>Edit</span>
            </a>
            <a href="/admin/personality-types" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all">
                <i class="fas fa-arrow-left mr-2"></i>
                <span>Kembali</span>
            </a>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Kolom 1: Informasi Dasar -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Dasar</h3>
            
            <div class="space-y-4">
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Kode RIASEC / MBTI</h4>
                    <div class="mt-1 flex items-center">
                        <span class="px-3 py-1 bg-primary text-white text-sm rounded-md mr-2"><?= esc($type['riasec_code']) ?></span>
                        <span class="px-3 py-1 bg-blue-600 text-white text-sm rounded-md"><?= esc($type['mbti_code']) ?></span>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Nama Kepribadian</h4>
                    <p class="mt-1 text-lg font-semibold text-gray-900"><?= esc($type['personality_name']) ?></p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Kecenderungan</h4>
                    <?php if ($type['introvert_extrovert'] === 'I'): ?>
                        <span class="mt-1 px-3 py-1 bg-blue-100 text-blue-800 rounded-md inline-block">Introvert</span>
                    <?php else: ?>
                        <span class="mt-1 px-3 py-1 bg-orange-100 text-orange-800 rounded-md inline-block">Extrovert</span>
                    <?php endif; ?>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Status</h4>
                    <?php if ($type['is_active']): ?>
                        <span class="mt-1 px-3 py-1 bg-green-100 text-green-800 rounded-md inline-block">Aktif</span>
                    <?php else: ?>
                        <span class="mt-1 px-3 py-1 bg-red-100 text-red-800 rounded-md inline-block">Tidak Aktif</span>
                    <?php endif; ?>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Jumlah Hasil Tes</h4>
                    <p class="mt-1 text-xl font-bold text-primary"><?= number_format($test_count) ?> <span class="text-sm text-gray-500 font-normal">kali</span></p>
                </div>
            </div>
        </div>
        
        <!-- Kolom 2: Deskripsi -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 md:col-span-2">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Deskripsi</h3>
            <div class="prose prose-sm max-w-none text-gray-700">
                <?= nl2br(esc($type['personality_description'])) ?>
            </div>
        </div>
        
        <!-- Kolom 3: Kekuatan -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Kekuatan</h3>
            
            <?php 
            $strengths = [];
            if (is_string($type['strengths'])) {
                $strengths = json_decode($type['strengths'], true) ?: [];
            } else if (is_array($type['strengths'])) {
                $strengths = $type['strengths'];
            }
            ?>
            
            <?php if (empty($strengths)): ?>
                <p class="text-gray-500 italic">Tidak ada data kekuatan</p>
            <?php else: ?>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <?php foreach ($strengths as $strength): ?>
                        <li><?= esc($strength) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        
        <!-- Kolom 4: Area Pengembangan -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Area Pengembangan</h3>
            
            <?php 
            $developmentAreas = [];
            if (is_string($type['development_areas'])) {
                $developmentAreas = json_decode($type['development_areas'], true) ?: [];
            } else if (is_array($type['development_areas'])) {
                $developmentAreas = $type['development_areas'];
            }
            ?>
            
            <?php if (empty($developmentAreas)): ?>
                <p class="text-gray-500 italic">Tidak ada data area pengembangan</p>
            <?php else: ?>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <?php foreach ($developmentAreas as $area): ?>
                        <li><?= esc($area) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        
        <!-- Kolom 5: Rekomendasi Jurusan -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 md:col-span-3">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Rekomendasi Jurusan</h3>
            
            <?php if (empty($recommended_majors)): ?>
                <p class="text-gray-500 italic">Tidak ada jurusan yang direkomendasikan</p>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach ($recommended_majors as $major): ?>
                        <div class="bg-white rounded-lg p-4 border border-gray-200 hover:shadow-md transition-all">
                            <h4 class="font-semibold text-gray-800"><?= esc($major['name']) ?></h4>
                            <p class="text-sm text-gray-600 mt-2 line-clamp-2"><?= esc(substr($major['description'], 0, 100)) ?>...</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
