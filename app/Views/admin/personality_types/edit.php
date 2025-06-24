<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Edit Tipe Kepribadian</h2>
        <a href="/admin/personality-types" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-all">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>
    
    <form action="/admin/personality-types/update/<?= $type['id'] ?>" method="post" class="space-y-6">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-medium text-gray-700 mb-4">Informasi Dasar</h3>
                
                <!-- Kode RIASEC -->
                <div class="mb-4">
                    <label for="riasec_code" class="block text-sm font-medium text-gray-700 mb-1">Kode RIASEC <span class="text-red-500">*</span></label>
                    <input type="text" id="riasec_code" name="riasec_code" 
                           value="<?= old('riasec_code', $type['riasec_code']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
                           placeholder="Contoh: R, S, A, I, dll">
                    <?php if (isset($validation) && $validation->hasError('riasec_code')): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation->getError('riasec_code') ?></p>
                    <?php endif; ?>
                </div>
                
                <!-- Kode MBTI -->
                <div class="mb-4">
                    <label for="mbti_code" class="block text-sm font-medium text-gray-700 mb-1">Kode MBTI <span class="text-red-500">*</span></label>
                    <input type="text" id="mbti_code" name="mbti_code" 
                           value="<?= old('mbti_code', $type['mbti_code']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
                           placeholder="Contoh: INFJ, ESTJ, dll">
                    <?php if (isset($validation) && $validation->hasError('mbti_code')): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation->getError('mbti_code') ?></p>
                    <?php endif; ?>
                </div>
                
                <!-- Nama Kepribadian -->
                <div class="mb-4">
                    <label for="personality_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Kepribadian <span class="text-red-500">*</span></label>
                    <input type="text" id="personality_name" name="personality_name" 
                           value="<?= old('personality_name', $type['personality_name']) ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
                           placeholder="Masukkan nama tipe kepribadian">
                    <?php if (isset($validation) && $validation->hasError('personality_name')): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation->getError('personality_name') ?></p>
                    <?php endif; ?>
                </div>
                
                <!-- Introvert/Extrovert -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kecenderungan <span class="text-red-500">*</span></label>
                    <div class="flex space-x-4">
                        <div class="flex items-center">
                            <input type="radio" id="introvert" name="introvert_extrovert" value="I" 
                                   <?= old('introvert_extrovert', $type['introvert_extrovert']) === 'I' ? 'checked' : '' ?> 
                                   class="mr-2 text-primary focus:ring-primary">
                            <label for="introvert" class="text-sm text-gray-700">Introvert</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="extrovert" name="introvert_extrovert" value="E" 
                                   <?= old('introvert_extrovert', $type['introvert_extrovert']) === 'E' ? 'checked' : '' ?> 
                                   class="mr-2 text-primary focus:ring-primary">
                            <label for="extrovert" class="text-sm text-gray-700">Extrovert</label>
                        </div>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('introvert_extrovert')): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation->getError('introvert_extrovert') ?></p>
                    <?php endif; ?>
                </div>
                
                <!-- Status -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status <span class="text-red-500">*</span></label>
                    <div class="flex space-x-4">
                        <div class="flex items-center">
                            <input type="radio" id="active" name="is_active" value="1" 
                                   <?= old('is_active', $type['is_active']) == 1 ? 'checked' : '' ?> 
                                   class="mr-2 text-primary focus:ring-primary">
                            <label for="active" class="text-sm text-gray-700">Aktif</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="inactive" name="is_active" value="0" 
                                   <?= old('is_active', $type['is_active']) == 0 ? 'checked' : '' ?> 
                                   class="mr-2 text-primary focus:ring-primary">
                            <label for="inactive" class="text-sm text-gray-700">Tidak Aktif</label>
                        </div>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('is_active')): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation->getError('is_active') ?></p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-medium text-gray-700 mb-4">Deskripsi & Karakteristik</h3>
                
                <!-- Deskripsi Kepribadian -->
                <div class="mb-4">
                    <label for="personality_description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea id="personality_description" name="personality_description" rows="5"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
                              placeholder="Masukkan deskripsi tipe kepribadian"><?= old('personality_description', $type['personality_description']) ?></textarea>
                    <?php if (isset($validation) && $validation->hasError('personality_description')): ?>
                        <p class="text-red-500 text-xs mt-1"><?= $validation->getError('personality_description') ?></p>
                    <?php endif; ?>
                    <p class="text-xs text-gray-500 mt-1">Deskripsi singkat mengenai tipe kepribadian tersebut</p>
                </div>
                
                <!-- Kekuatan -->
                <div class="mb-4">
                    <label for="strengths" class="block text-sm font-medium text-gray-700 mb-1">Kekuatan</label>
                    <textarea id="strengths" name="strengths" rows="4"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
                              placeholder="Masukkan kekuatan (satu per baris)"><?= old('strengths', $strengths_text) ?></textarea>
                    <p class="text-xs text-gray-500 mt-1">Masukkan satu poin kekuatan per baris</p>
                </div>
                
                <!-- Area Pengembangan -->
                <div class="mb-4">
                    <label for="development_areas" class="block text-sm font-medium text-gray-700 mb-1">Area Pengembangan</label>
                    <textarea id="development_areas" name="development_areas" rows="4"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
                              placeholder="Masukkan area pengembangan (satu per baris)"><?= old('development_areas', $development_areas_text) ?></textarea>
                    <p class="text-xs text-gray-500 mt-1">Masukkan satu poin area pengembangan per baris</p>
                </div>
            </div>
        </div>
        
        <!-- Rekomendasi Jurusan -->
        <div class="pt-6 border-t border-gray-200">
            <h3 class="text-lg font-medium text-gray-700 mb-4">Rekomendasi Jurusan</h3>
            
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-100 mb-4">
                <p class="text-sm text-gray-600 mb-3">Pilih jurusan yang direkomendasikan untuk tipe kepribadian ini:</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <?php foreach ($majors as $major): ?>
                        <div class="flex items-start">
                            <input type="checkbox" id="major_<?= $major['id'] ?>" name="major_recommendations[]" value="<?= $major['id'] ?>"
                                  <?= (is_array(old('major_recommendations')) && in_array($major['id'], old('major_recommendations'))) || 
                                     (empty(old('major_recommendations')) && in_array($major['id'], $selected_majors)) ? 'checked' : '' ?>
                                  class="mt-1 mr-2 text-primary focus:ring-primary">
                            <label for="major_<?= $major['id'] ?>" class="text-sm text-gray-700"><?= esc($major['name']) ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end space-x-2 pt-4 border-t border-gray-200">
            <a href="/admin/personality-types" 
               class="px-4 py-2 text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                Batal
            </a>
            <button type="submit" 
                    class="px-4 py-2 bg-primary text-white rounded-md shadow-sm hover:bg-red-800 transition-all">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
