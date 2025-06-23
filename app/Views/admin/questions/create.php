<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 md:mb-0">Tambah Pertanyaan Baru</h2>
        <a href="/admin/questions" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg shadow-sm hover:bg-gray-200 transition-all">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>
    
    <form action="/admin/questions/store" method="post" class="space-y-6">
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
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"><?= old('question_text') ?></textarea>
                            <?php if (isset($validation) && $validation->hasError('question_text')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('question_text') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="type" class="block text-sm text-gray-600 mb-1">Tipe Tes <span class="text-red-600">*</span></label>
                            <select id="type" name="type" required onchange="toggleCategoryOptions()"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                                <option value="riasec" <?= old('type') === 'riasec' ? 'selected' : '' ?>>RIASEC</option>
                                <option value="mbti" <?= old('type') === 'mbti' ? 'selected' : '' ?>>MBTI</option>
                            </select>
                            <?php if (isset($validation) && $validation->hasError('type')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('type') ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column -->
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Pengaturan Kategori</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="category" class="block text-sm text-gray-600 mb-1">Kategori <span class="text-red-600">*</span></label>
                            
                            <!-- RIASEC Categories (default visible) -->
                            <select id="riasec_category" name="category" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary riasec-field">
                                <option value="R" <?= old('category') === 'R' ? 'selected' : '' ?>>Realistic (R)</option>
                                <option value="I" <?= old('category') === 'I' ? 'selected' : '' ?>>Investigative (I)</option>
                                <option value="A" <?= old('category') === 'A' ? 'selected' : '' ?>>Artistic (A)</option>
                                <option value="S" <?= old('category') === 'S' ? 'selected' : '' ?>>Social (S)</option>
                                <option value="E" <?= old('category') === 'E' ? 'selected' : '' ?>>Enterprising (E)</option>
                                <option value="C" <?= old('category') === 'C' ? 'selected' : '' ?>>Conventional (C)</option>
                            </select>
                            
                            <!-- MBTI Categories (hidden by default) -->
                            <select id="mbti_category" name="category" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary mbti-field hidden">
                                <option value="EI" <?= old('category') === 'EI' ? 'selected' : '' ?>>Extraversion/Introversion (EI)</option>
                                <option value="SN" <?= old('category') === 'SN' ? 'selected' : '' ?>>Sensing/Intuition (SN)</option>
                                <option value="TF" <?= old('category') === 'TF' ? 'selected' : '' ?>>Thinking/Feeling (TF)</option>
                                <option value="JP" <?= old('category') === 'JP' ? 'selected' : '' ?>>Judging/Perceiving (JP)</option>
                            </select>
                            
                            <?php if (isset($validation) && $validation->hasError('category')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('category') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <!-- MBTI Direction (hidden by default) -->
                        <div class="mbti-field hidden">
                            <label for="mbti_direction" class="block text-sm text-gray-600 mb-1">Arah MBTI <span class="text-red-600">*</span></label>
                            <select id="mbti_direction" name="mbti_direction"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                                <option value="">-- Pilih Arah --</option>
                                <optgroup label="Extraversion/Introversion">
                                    <option value="E" <?= old('mbti_direction') === 'E' ? 'selected' : '' ?>>Extraversion (E)</option>
                                    <option value="I" <?= old('mbti_direction') === 'I' ? 'selected' : '' ?>>Introversion (I)</option>
                                </optgroup>
                                <optgroup label="Sensing/Intuition">
                                    <option value="S" <?= old('mbti_direction') === 'S' ? 'selected' : '' ?>>Sensing (S)</option>
                                    <option value="N" <?= old('mbti_direction') === 'N' ? 'selected' : '' ?>>Intuition (N)</option>
                                </optgroup>
                                <optgroup label="Thinking/Feeling">
                                    <option value="T" <?= old('mbti_direction') === 'T' ? 'selected' : '' ?>>Thinking (T)</option>
                                    <option value="F" <?= old('mbti_direction') === 'F' ? 'selected' : '' ?>>Feeling (F)</option>
                                </optgroup>
                                <optgroup label="Judging/Perceiving">
                                    <option value="J" <?= old('mbti_direction') === 'J' ? 'selected' : '' ?>>Judging (J)</option>
                                    <option value="P" <?= old('mbti_direction') === 'P' ? 'selected' : '' ?>>Perceiving (P)</option>
                                </optgroup>
                            </select>
                            <?php if (isset($validation) && $validation->hasError('mbti_direction')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('mbti_direction') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="order_number" class="block text-sm text-gray-600 mb-1">Urutan Tampil <span class="text-red-600">*</span></label>
                            <input type="number" id="order_number" name="order_number" value="<?= old('order_number') ?>" 
                                   placeholder="Masukkan nomor urut" required min="1"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('order_number')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('order_number') ?></p>
                            <?php endif; ?>
                            <p class="text-xs text-gray-500 mt-1">Nomor urut untuk menentukan urutan tampil pertanyaan pada tes</p>
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="is_active" name="is_active" value="1" checked
                                   class="h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary">
                            <label for="is_active" class="text-sm text-gray-700">Aktifkan pertanyaan ini</label>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Informasi Tambahan</h3>
                    
                    <div class="space-y-4">
                        <div class="p-3 bg-blue-50 rounded-lg border border-blue-100">
                            <div class="flex">
                                <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                                <div>
                                    <p class="text-sm text-blue-700 mb-1">Panduan Pengisian</p>
                                    <ul class="text-xs text-blue-700 list-disc pl-4 space-y-1">
                                        <li>Pertanyaan RIASEC memiliki kategori: R, I, A, S, E, C</li>
                                        <li>Pertanyaan MBTI memiliki kategori: EI, SN, TF, JP, dan arah: E, I, S, N, T, F, J, P</li>
                                        <li>Nomor urut harus unik untuk tiap tipe tes</li>
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
                <i class="fas fa-save mr-2"></i> Simpan Pertanyaan
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Show/hide fields based on test type
    function toggleCategoryOptions() {
        const testType = document.getElementById('type').value;
        const riasecFields = document.querySelectorAll('.riasec-field');
        const mbtiFields = document.querySelectorAll('.mbti-field');
        
        if (testType === 'riasec') {
            riasecFields.forEach(field => field.classList.remove('hidden'));
            mbtiFields.forEach(field => field.classList.add('hidden'));
            
            // Disable MBTI-specific fields
            document.getElementById('mbti_category').disabled = true;
            document.getElementById('mbti_direction').disabled = true;
            document.getElementById('riasec_category').disabled = false;
        } else {
            riasecFields.forEach(field => field.classList.add('hidden'));
            mbtiFields.forEach(field => field.classList.remove('hidden'));
            
            // Enable MBTI-specific fields
            document.getElementById('mbti_category').disabled = false;
            document.getElementById('mbti_direction').disabled = false;
            document.getElementById('riasec_category').disabled = true;
        }
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        toggleCategoryOptions();
        
        // Add change listener for MBTI category to update direction options
        document.getElementById('mbti_category').addEventListener('change', function() {
            const category = this.value;
            const directionSelect = document.getElementById('mbti_direction');
            
            // Reset selection
            directionSelect.value = '';
            
            // Hide all optgroups first
            Array.from(directionSelect.querySelectorAll('optgroup')).forEach(group => {
                group.classList.add('hidden');
            });
            
            // Show only relevant optgroup
            if (category) {
                const relevantGroup = directionSelect.querySelector(`optgroup[label^="${category[0]}"`);
                if (relevantGroup) {
                    relevantGroup.classList.remove('hidden');
                }
            }
        });
    });
</script>
<?= $this->endSection() ?> 