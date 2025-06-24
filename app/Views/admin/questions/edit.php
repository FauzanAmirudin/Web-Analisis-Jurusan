<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 md:mb-0">Edit Pertanyaan</h2>
        <a href="/admin/questions" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg shadow-sm hover:bg-gray-200 transition-all">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>
    
    <form action="/admin/questions/update/<?= $question['id'] ?>" method="post" class="space-y-6">
        <?= csrf_field() ?>
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Informasi Pertanyaan</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="question_text" class="block text-sm text-gray-600 mb-1">Teks Pertanyaan <span class="text-red-600">*</span></label>
                            <textarea id="question_text" name="question_text" rows="4" 
                                   placeholder="Masukkan teks pertanyaan" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"><?= old('question_text', $question['question_text']) ?></textarea>
                            <?php if (isset($validation) && $validation->hasError('question_text')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('question_text') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="type" class="block text-sm text-gray-600 mb-1">Tipe Tes</label>
                            <input type="text" value="<?= $question['type'] === 'riasec' ? 'RIASEC' : 'MBTI' ?>" 
                                   class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md" readonly>
                            <input type="hidden" name="type" value="<?= $question['type'] ?>">
                            <p class="text-xs text-gray-500 mt-1">Tipe tes tidak dapat diubah</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Info Lainnya</h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">ID Pertanyaan</span>
                            <span class="text-sm font-medium">#<?= $question['id'] ?></span>
                        </div>
                        
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Tanggal Dibuat</span>
                            <span class="text-sm font-medium"><?= date('d M Y H:i', strtotime($question['created_at'])) ?></span>
                        </div>
                        
                        <div class="flex justify-between py-2">
                            <span class="text-sm text-gray-600">Terakhir Diperbarui</span>
                            <span class="text-sm font-medium"><?= isset($question['updated_at']) ? date('d M Y H:i', strtotime($question['updated_at'])) : date('d M Y H:i', strtotime($question['created_at'])) ?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column -->
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Pengaturan Kategori</h3>
                    
                    <div class="space-y-4">
                        <?php if ($question['type'] === 'riasec'): ?>
                            <div>
                                <label for="category" class="block text-sm text-gray-600 mb-1">Kategori RIASEC <span class="text-red-600">*</span></label>
                                <select id="category" name="category" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                                    <option value="R" <?= old('category', $question['category']) === 'R' ? 'selected' : '' ?>>Realistic (R)</option>
                                    <option value="I" <?= old('category', $question['category']) === 'I' ? 'selected' : '' ?>>Investigative (I)</option>
                                    <option value="A" <?= old('category', $question['category']) === 'A' ? 'selected' : '' ?>>Artistic (A)</option>
                                    <option value="S" <?= old('category', $question['category']) === 'S' ? 'selected' : '' ?>>Social (S)</option>
                                    <option value="E" <?= old('category', $question['category']) === 'E' ? 'selected' : '' ?>>Enterprising (E)</option>
                                    <option value="C" <?= old('category', $question['category']) === 'C' ? 'selected' : '' ?>>Conventional (C)</option>
                                </select>
                                <?php if (isset($validation) && $validation->hasError('category')): ?>
                                    <p class="text-xs text-red-600 mt-1"><?= $validation->getError('category') ?></p>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div>
                                <label for="category" class="block text-sm text-gray-600 mb-1">Kategori MBTI <span class="text-red-600">*</span></label>
                                <select id="category" name="category" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                                    <option value="EI" <?= old('category', $question['category']) === 'EI' ? 'selected' : '' ?>>Extraversion/Introversion (EI)</option>
                                    <option value="SN" <?= old('category', $question['category']) === 'SN' ? 'selected' : '' ?>>Sensing/Intuition (SN)</option>
                                    <option value="TF" <?= old('category', $question['category']) === 'TF' ? 'selected' : '' ?>>Thinking/Feeling (TF)</option>
                                    <option value="JP" <?= old('category', $question['category']) === 'JP' ? 'selected' : '' ?>>Judging/Perceiving (JP)</option>
                                </select>
                                <?php if (isset($validation) && $validation->hasError('category')): ?>
                                    <p class="text-xs text-red-600 mt-1"><?= $validation->getError('category') ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <div>
                                <label for="mbti_direction" class="block text-sm text-gray-600 mb-1">Arah MBTI <span class="text-red-600">*</span></label>
                                <select id="mbti_direction" name="mbti_direction" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                                    <?php 
                                    $category = old('category', $question['category']);
                                    $direction = old('mbti_direction', $question['mbti_direction']);
                                    
                                    if ($category === 'EI'): ?>
                                        <option value="E" <?= $direction === 'E' ? 'selected' : '' ?>>Extraversion (E)</option>
                                        <option value="I" <?= $direction === 'I' ? 'selected' : '' ?>>Introversion (I)</option>
                                    <?php elseif ($category === 'SN'): ?>
                                        <option value="S" <?= $direction === 'S' ? 'selected' : '' ?>>Sensing (S)</option>
                                        <option value="N" <?= $direction === 'N' ? 'selected' : '' ?>>Intuition (N)</option>
                                    <?php elseif ($category === 'TF'): ?>
                                        <option value="T" <?= $direction === 'T' ? 'selected' : '' ?>>Thinking (T)</option>
                                        <option value="F" <?= $direction === 'F' ? 'selected' : '' ?>>Feeling (F)</option>
                                    <?php elseif ($category === 'JP'): ?>
                                        <option value="J" <?= $direction === 'J' ? 'selected' : '' ?>>Judging (J)</option>
                                        <option value="P" <?= $direction === 'P' ? 'selected' : '' ?>>Perceiving (P)</option>
                                    <?php endif; ?>
                                </select>
                                <?php if (isset($validation) && $validation->hasError('mbti_direction')): ?>
                                    <p class="text-xs text-red-600 mt-1"><?= $validation->getError('mbti_direction') ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div>
                            <label for="order_number" class="block text-sm text-gray-600 mb-1">Urutan Tampil <span class="text-red-600">*</span></label>
                            <input type="number" id="order_number" name="order_number" value="<?= old('order_number', $question['order_number']) ?>" 
                                   placeholder="Masukkan nomor urut" required min="1"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('order_number')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('order_number') ?></p>
                            <?php endif; ?>
                            <p class="text-xs text-gray-500 mt-1">Nomor urut untuk menentukan urutan tampil pertanyaan pada tes</p>
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="is_active" name="is_active" value="1" <?= old('is_active', $question['is_active']) ? 'checked' : '' ?>
                                   class="h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary">
                            <label for="is_active" class="text-sm text-gray-700">Aktifkan pertanyaan ini</label>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Informasi Bantuan</h3>
                    
                    <div class="space-y-4">
                        <div class="p-3 bg-blue-50 rounded-lg border border-blue-100">
                            <div class="flex">
                                <i class="fas fa-info-circle text-blue-500 mr-2 mt-0.5"></i>
                                <div>
                                    <p class="text-sm text-blue-700 mb-2">Panduan Pengaturan</p>
                                    <ul class="text-xs text-blue-700 list-disc pl-4 space-y-1">
                                        <li>Ubah teks pertanyaan sesuai kebutuhan</li>
                                        <li>Pastikan kategori sesuai dengan tipe pertanyaan</li>
                                        <li>Nomor urut harus unik untuk tiap tipe tes</li>
                                        <li>Nonaktifkan pertanyaan jika tidak ingin tampil pada tes</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-center pt-4">
            <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg shadow-sm hover:bg-red-800 transition-all">
                <i class="fas fa-save mr-2"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Event listener for MBTI category changes
    document.addEventListener('DOMContentLoaded', function() {
        <?php if ($question['type'] === 'mbti'): ?>
        const categorySelect = document.getElementById('category');
        const directionSelect = document.getElementById('mbti_direction');
        
        categorySelect.addEventListener('change', function() {
            const category = this.value;
            
            // Clear existing options
            while (directionSelect.options.length > 0) {
                directionSelect.remove(0);
            }
            
            // Add new options based on category
            if (category === 'EI') {
                addOption(directionSelect, 'E', 'Extraversion (E)');
                addOption(directionSelect, 'I', 'Introversion (I)');
            } else if (category === 'SN') {
                addOption(directionSelect, 'S', 'Sensing (S)');
                addOption(directionSelect, 'N', 'Intuition (N)');
            } else if (category === 'TF') {
                addOption(directionSelect, 'T', 'Thinking (T)');
                addOption(directionSelect, 'F', 'Feeling (F)');
            } else if (category === 'JP') {
                addOption(directionSelect, 'J', 'Judging (J)');
                addOption(directionSelect, 'P', 'Perceiving (P)');
            }
        });
        
        function addOption(select, value, text) {
            const option = document.createElement('option');
            option.value = value;
            option.text = text;
            select.add(option);
        }
        <?php endif; ?>
    });
</script>
<?= $this->endSection() ?> 