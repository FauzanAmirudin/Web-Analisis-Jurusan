<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="min-h-screen bg-gray-50 py-6 sm:py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Progress Header -->
        <div class="bg-white rounded-xl shadow-custom p-4 sm:p-6 mb-6 sm:mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <h1 class="text-xl sm:text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-red-700 mb-2 sm:mb-0">Tes Kepribadian Lampung Cerdas</h1>
                <div class="bg-primary/10 px-4 py-1.5 rounded-full text-sm font-medium text-primary self-start sm:self-auto">
                    Langkah <?= $current_step ?> dari <?= $total_steps ?>
                </div>
            </div>
            
            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 rounded-full h-3 mb-4 overflow-hidden">
                <div class="bg-gradient-to-r from-primary to-red-700 h-3 rounded-full transition-all duration-500 ease-out" 
                     style="width: <?= $progress_percentage ?>%"></div>
            </div>
            
            <div class="flex flex-col sm:flex-row sm:justify-between text-sm text-gray-600">
                <span class="font-medium mb-1 sm:mb-0"><?= $page_title ?></span>
                <span class="font-medium"><?= round($progress_percentage) ?>% selesai</span>
            </div>

            <!-- Question Counter -->
            <!-- <div class="mt-3 text-xs text-gray-500 flex items-center">
                <i class="fas fa-info-circle mr-1.5"></i>
                <?php if ($question_type === 'riasec'): ?>
                    Pertanyaan RIASEC: <?= ($current_step - 1) * 6 + 1 ?> - <?= min($current_step * 6, 36) ?> dari 36
                <?php else: ?>
                    Pertanyaan MBTI: <?= 36 + (($current_step - 7) * 8) + 1 ?> - <?= 36 + (($current_step - 6) * 8) ?> dari 16
                <?php endif; ?>
            </div> -->
        </div>

        <!-- Question Form -->
        <div class="bg-white rounded-xl shadow-custom p-4 sm:p-8">
            <form id="testForm" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="session_token" value="<?= $session['session_token'] ?>">
                <input type="hidden" name="current_step" value="<?= $current_step ?>">
                
                <div class="space-y-6 sm:space-y-8">
                    <div class="text-center mb-6 sm:mb-10">
                        <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-900 mb-3"><?= $page_title ?></h2>
                        <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">
                            <?php if ($question_type === 'riasec'): ?>
                                Pilih "Setuju" jika pernyataan menggambarkan diri Anda, atau "Tidak Setuju" jika tidak
                            <?php else: ?>
                                Pilih "Setuju" jika pernyataan sangat menggambarkan diri Anda, atau "Tidak Setuju" jika tidak
                            <?php endif; ?>
                        </p>
                    </div>

                    <?php foreach ($questions as $index => $question): ?>
                        <div class="bg-gray-50 rounded-xl p-4 sm:p-6 border-l-4 border-primary hover:shadow-soft transition-custom">
                            <h3 class="text-base sm:text-lg font-medium text-gray-900 mb-4 sm:mb-5">
                                <?= $question['order_number'] ?>. <?= $question['question_text'] ?>
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4">
                                <label class="flex items-center cursor-pointer p-3 sm:p-4 rounded-xl hover:bg-white transition-custom <?= isset($existing_answers[$question['id']]) && $existing_answers[$question['id']] == 1 ? 'bg-green-50 border border-green-100' : 'bg-white/50 border border-gray-100' ?>">
                                    <input type="radio" name="answers[<?= $question['id'] ?>]" value="1" 
                                           class="h-5 w-5 text-primary focus:ring-primary border-gray-300"
                                           <?= isset($existing_answers[$question['id']]) && $existing_answers[$question['id']] == 1 ? 'checked' : '' ?>>
                                    <div class="ml-4">
                                        <span class="text-gray-700 font-medium flex items-center">
                                            <i class="fas fa-check-circle text-green-500 mr-2"></i>Setuju
                                        </span>
                                        <span class="text-xs text-gray-500 mt-1 block">Pernyataan ini menggambarkan saya</span>
                                    </div>
                                </label>
                                <label class="flex items-center cursor-pointer p-3 sm:p-4 rounded-xl hover:bg-white transition-custom <?= isset($existing_answers[$question['id']]) && $existing_answers[$question['id']] == 0 ? 'bg-red-50 border border-red-100' : 'bg-white/50 border border-gray-100' ?>">
                                    <input type="radio" name="answers[<?= $question['id'] ?>]" value="0" 
                                           class="h-5 w-5 text-primary focus:ring-primary border-gray-300"
                                           <?= isset($existing_answers[$question['id']]) && $existing_answers[$question['id']] == 0 ? 'checked' : '' ?>>
                                    <div class="ml-4">
                                        <span class="text-gray-700 font-medium flex items-center">
                                            <i class="fas fa-times-circle text-red-500 mr-2"></i>Tidak Setuju
                                        </span>
                                        <span class="text-xs text-gray-500 mt-1 block">Pernyataan ini kurang menggambarkan saya</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex flex-col sm:flex-row justify-between items-center mt-8 sm:mt-10 pt-6 border-t border-gray-100 space-y-4 sm:space-y-0">
                    <div>
                        <?php if ($current_step > 1): ?>
                            <button type="button" onclick="goToPreviousStep()" 
                                    class="w-full sm:w-auto bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-200 transition-custom flex items-center justify-center">
                                <i class="fas fa-arrow-left mr-2"></i>Sebelumnya
                            </button>
                        <?php endif; ?>
                    </div>

                    <div class="flex items-center order-first sm:order-none">
                        <div id="autosaveStatus" class="text-sm text-gray-500 flex items-center">
                            <i class="fas fa-save mr-1.5"></i>
                            <span>Otomatis tersimpan</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 w-full sm:w-auto">
                        <button type="button" onclick="saveDraft()" 
                                class="w-full sm:w-auto bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-200 transition-custom flex items-center justify-center">
                            <i class="fas fa-save mr-2"></i>Simpan Draft
                        </button>
                        
                        <button type="submit" id="submitBtn"
                                class="w-full sm:w-auto bg-gradient-to-r from-primary to-red-700 text-white px-8 py-3 rounded-lg font-medium hover:from-red-700 hover:to-primary transition-custom btn-hover flex items-center justify-center">
                            <?= $current_step >= $total_steps ? 'Selesai' : 'Selanjutnya' ?>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Auto-save Indicator -->
        <div id="autosaveIndicator" class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg hidden flex items-center z-40">
            <i class="fas fa-check mr-2"></i>Tersimpan otomatis
        </div>
    </div>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl p-6 sm:p-8 shadow-xl">
        <div class="flex flex-col items-center">
            <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-primary mb-4"></div>
            <span class="text-gray-700 font-medium">Memproses jawaban...</span>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add a variable to track intentional navigation
    window.isIntentionalNavigation = false;
    
    // Auto-save functionality
    let autoSaveTimer;
    const form = document.getElementById('testForm');
    const inputs = form.querySelectorAll('input[type="radio"]');
    
    inputs.forEach(input => {
        input.addEventListener('change', function() {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(autoSave, 2000); // Auto-save after 2 seconds
            updateSubmitButton();
            
            // Highlight selected option
            const allLabels = document.querySelectorAll('label');
            allLabels.forEach(label => {
                const radioInput = label.querySelector('input[type="radio"]');
                if (radioInput && radioInput.name === this.name) {
                    if (radioInput.checked) {
                        if (radioInput.value === "1") {
                            label.classList.add('bg-green-50', 'border', 'border-green-100');
                        } else {
                            label.classList.add('bg-red-50', 'border', 'border-red-100');
                        }
                    } else {
                        label.classList.remove('bg-green-50', 'border', 'border-green-100', 'bg-red-50', 'border-red-100');
                        label.classList.add('bg-white/50', 'border', 'border-gray-100');
                    }
                }
            });
        });
    });

    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        // Set intentional navigation flag
        window.isIntentionalNavigation = true;
        submitForm();
    });

    // Check initial state
    updateSubmitButton();
});

function updateSubmitButton() {
    const form = document.getElementById('testForm');
    const questions = <?= json_encode(array_column($questions, 'id')) ?>;
    let allAnswered = true;
    
    questions.forEach(questionId => {
        const answered = form.querySelector(`input[name="answers[${questionId}]"]:checked`);
        if (!answered) {
            allAnswered = false;
        }
    });
    
    const submitBtn = document.getElementById('submitBtn');
    if (allAnswered) {
        submitBtn.disabled = false;
        submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    } else {
        submitBtn.disabled = true;
        submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    }
}

function autoSave() {
    const formData = new FormData(document.getElementById('testForm'));
    
    fetch('/api/save-progress', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showAutoSaveIndicator();
        }
    })
    .catch(error => {
        console.error('Auto-save error:', error);
    });
}

function showAutoSaveIndicator() {
    const indicator = document.getElementById('autosaveIndicator');
    indicator.classList.remove('hidden');
    setTimeout(() => {
        indicator.classList.add('hidden');
    }, 2000);
}

function submitForm() {
    // Validate that all questions are answered
    const form = document.getElementById('testForm');
    const questions = <?= json_encode(array_column($questions, 'id')) ?>;
    let allAnswered = true;
    
    questions.forEach(questionId => {
        const answered = form.querySelector(`input[name="answers[${questionId}]"]:checked`);
        if (!answered) {
            allAnswered = false;
        }
    });
    
    if (!allAnswered) {
        alert('Mohon jawab semua pertanyaan sebelum melanjutkan.');
        return;
    }
    
    // Show loading
    document.getElementById('loadingOverlay').classList.remove('hidden');
    
    const formData = new FormData(form);
    
    fetch('/test/save', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Keep the intentional navigation flag true (already set in submitForm)
            if (data.completed) {
                window.location.href = data.redirect;
            } else {
                window.location.href = data.redirect;
            }
        } else {
            window.isIntentionalNavigation = false; // Reset flag if there's an error
            alert('Terjadi kesalahan: ' + data.message);
            document.getElementById('loadingOverlay').classList.add('hidden');
        }
    })
    .catch(error => {
        console.error('Submit error:', error);
        window.isIntentionalNavigation = false; // Reset flag if there's an error
        alert('Terjadi kesalahan saat menyimpan jawaban. Silakan coba lagi.');
        document.getElementById('loadingOverlay').classList.add('hidden');
    });
}

function saveDraft() {
    autoSave();
    alert('Draft berhasil disimpan. Anda dapat melanjutkan tes nanti.');
    // No need to set intentional navigation flag here as we're staying on the same page
}

function goToPreviousStep() {
    // Set intentional navigation flag
    window.isIntentionalNavigation = true;
    
    // Show loading
    document.getElementById('loadingOverlay').classList.remove('hidden');
    
    const formData = new FormData(document.getElementById('testForm'));
    
    fetch('/test/previous', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = data.redirect;
        } else {
            window.isIntentionalNavigation = false; // Reset flag if there's an error
            alert('Terjadi kesalahan: ' + data.message);
            document.getElementById('loadingOverlay').classList.add('hidden');
        }
    })
    .catch(error => {
        console.error('Navigation error:', error);
        window.isIntentionalNavigation = false; // Reset flag if there's an error
        alert('Terjadi kesalahan saat navigasi. Silakan coba lagi.');
        document.getElementById('loadingOverlay').classList.add('hidden');
    });
}

// Prevent accidental page refresh, but allow intentional navigation
window.addEventListener('beforeunload', function(e) {
    // Skip the confirmation dialog if it's intentional navigation
    if (window.isIntentionalNavigation) {
        return;
    }
    
    e.preventDefault();
    e.returnValue = 'Anda yakin ingin meninggalkan halaman? Progress tes akan tersimpan otomatis.';
});
</script>
<?= $this->endSection() ?>