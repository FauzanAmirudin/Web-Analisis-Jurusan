<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 md:mb-0">Manajemen Pertanyaan</h2>
        <a href="/admin/questions/create" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg shadow-sm hover:bg-red-800 transition-all">
            <i class="fas fa-plus mr-2"></i>
            <span>Tambah Pertanyaan</span>
        </a>
    </div>
    
    <!-- Filter and Search -->
    <div class="bg-gray-50 rounded-lg p-4 mb-6 border border-gray-100">
        <form action="/admin/questions" method="get" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="type" class="block text-sm text-gray-600 mb-1">Tipe Tes</label>
                    <select id="type" name="type" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="all" <?= $filters['type'] === 'all' ? 'selected' : '' ?>>Semua Tipe</option>
                        <option value="riasec" <?= $filters['type'] === 'riasec' ? 'selected' : '' ?>>RIASEC</option>
                        <option value="mbti" <?= $filters['type'] === 'mbti' ? 'selected' : '' ?>>MBTI</option>
                    </select>
                </div>
                
                <div>
                    <label for="category" class="block text-sm text-gray-600 mb-1">Kategori</label>
                    <select id="category" name="category" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="">Semua Kategori</option>
                        <!-- RIASEC Categories -->
                        <optgroup label="RIASEC">
                            <option value="R" <?= $filters['category'] === 'R' ? 'selected' : '' ?>>Realistic (R)</option>
                            <option value="I" <?= $filters['category'] === 'I' ? 'selected' : '' ?>>Investigative (I)</option>
                            <option value="A" <?= $filters['category'] === 'A' ? 'selected' : '' ?>>Artistic (A)</option>
                            <option value="S" <?= $filters['category'] === 'S' ? 'selected' : '' ?>>Social (S)</option>
                            <option value="E" <?= $filters['category'] === 'E' ? 'selected' : '' ?>>Enterprising (E)</option>
                            <option value="C" <?= $filters['category'] === 'C' ? 'selected' : '' ?>>Conventional (C)</option>
                        </optgroup>
                        <!-- MBTI Categories -->
                        <optgroup label="MBTI">
                            <option value="EI" <?= $filters['category'] === 'EI' ? 'selected' : '' ?>>Extraversion/Introversion (EI)</option>
                            <option value="SN" <?= $filters['category'] === 'SN' ? 'selected' : '' ?>>Sensing/Intuition (SN)</option>
                            <option value="TF" <?= $filters['category'] === 'TF' ? 'selected' : '' ?>>Thinking/Feeling (TF)</option>
                            <option value="JP" <?= $filters['category'] === 'JP' ? 'selected' : '' ?>>Judging/Perceiving (JP)</option>
                        </optgroup>
                    </select>
                </div>
                
                <div>
                    <label for="status" class="block text-sm text-gray-600 mb-1">Status</label>
                    <select id="status" name="status" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="all" <?= $filters['status'] === 'all' ? 'selected' : '' ?>>Semua Status</option>
                        <option value="active" <?= $filters['status'] === 'active' ? 'selected' : '' ?>>Aktif</option>
                        <option value="inactive" <?= $filters['status'] === 'inactive' ? 'selected' : '' ?>>Tidak Aktif</option>
                    </select>
                </div>
                
                <div>
                    <label for="search" class="block text-sm text-gray-600 mb-1">Cari Pertanyaan</label>
                    <div class="relative">
                        <input type="text" id="search" name="search" value="<?= esc($filters['search']) ?>" 
                               placeholder="Kata kunci..."
                               class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-2">
                <a href="/admin/questions" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Reset
                </a>
                <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Terapkan Filter
                </button>
            </div>
        </form>
    </div>
    
    <!-- Preview Buttons -->
    <div class="flex space-x-2 mb-6">
        <a href="/admin/questions/preview?type=riasec" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm rounded-md shadow-sm hover:bg-indigo-700 transition-all">
            <i class="fas fa-eye mr-2"></i> Preview RIASEC
        </a>
        <a href="/admin/questions/preview?type=mbti" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm rounded-md shadow-sm hover:bg-blue-700 transition-all">
            <i class="fas fa-eye mr-2"></i> Preview MBTI
        </a>
    </div>
    
    <!-- Questions Table -->
    <div class="bg-white rounded-lg overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="min-w-full table-striped table-hover">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center w-12">No</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Pertanyaan</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center w-24">Tipe</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center w-32">Kategori</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center w-24">Urutan</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center w-24">Status</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($questions)): ?>
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-sm text-gray-500 text-center">
                                Tidak ada data pertanyaan yang ditemukan
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($questions as $index => $question): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-500 text-center">
                                    <?= (($pager->getCurrentPage() - 1) * $pager->getPerPage()) + $index + 1 ?>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="text-sm text-gray-900"><?= esc($question['question_text']) ?></div>
                                    <?php if ($question['type'] === 'mbti' && !empty($question['mbti_direction'])): ?>
                                        <div class="text-xs text-gray-500">Arah: <?= $question['mbti_direction'] ?></div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <?php if ($question['type'] === 'riasec'): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            RIASEC
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            MBTI
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <?php 
                                    $categoryClass = 'bg-gray-100 text-gray-800';
                                    $categoryText = $question['category'];
                                    
                                    if ($question['type'] === 'riasec') {
                                        switch ($question['category']) {
                                            case 'R':
                                                $categoryClass = 'bg-blue-100 text-blue-800';
                                                $categoryText = 'Realistic (R)';
                                                break;
                                            case 'I':
                                                $categoryClass = 'bg-purple-100 text-purple-800';
                                                $categoryText = 'Investigative (I)';
                                                break;
                                            case 'A':
                                                $categoryClass = 'bg-pink-100 text-pink-800';
                                                $categoryText = 'Artistic (A)';
                                                break;
                                            case 'S':
                                                $categoryClass = 'bg-green-100 text-green-800';
                                                $categoryText = 'Social (S)';
                                                break;
                                            case 'E':
                                                $categoryClass = 'bg-yellow-100 text-yellow-800';
                                                $categoryText = 'Enterprising (E)';
                                                break;
                                            case 'C':
                                                $categoryClass = 'bg-gray-100 text-gray-800';
                                                $categoryText = 'Conventional (C)';
                                                break;
                                        }
                                    } else if ($question['type'] === 'mbti') {
                                        switch ($question['category']) {
                                            case 'EI':
                                                $categoryClass = 'bg-red-100 text-red-800';
                                                $categoryText = 'E/I';
                                                break;
                                            case 'SN':
                                                $categoryClass = 'bg-green-100 text-green-800';
                                                $categoryText = 'S/N';
                                                break;
                                            case 'TF':
                                                $categoryClass = 'bg-blue-100 text-blue-800';
                                                $categoryText = 'T/F';
                                                break;
                                            case 'JP':
                                                $categoryClass = 'bg-yellow-100 text-yellow-800';
                                                $categoryText = 'J/P';
                                                break;
                                        }
                                    }
                                    ?>
                                    
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $categoryClass ?>">
                                        <?= $categoryText ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="text-sm font-medium text-gray-900"><?= $question['order_number'] ?></span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <?php if ($question['is_active']): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <span class="h-1.5 w-1.5 mr-1 rounded-full bg-green-600"></span>
                                            Aktif
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <span class="h-1.5 w-1.5 mr-1 rounded-full bg-red-600"></span>
                                            Tidak Aktif
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500 text-center">
                                    <div class="flex justify-center space-x-1">
                                        <a href="/admin/questions/edit/<?= $question['id'] ?>" 
                                           class="inline-flex items-center p-1.5 text-blue-600 hover:text-blue-800 transition-all" 
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <a href="javascript:void(0)" 
                                           onclick="toggleStatus(<?= $question['id'] ?>, <?= $question['is_active'] ? 'true' : 'false' ?>)"
                                           class="inline-flex items-center p-1.5 <?= $question['is_active'] ? 'text-orange-600 hover:text-orange-800' : 'text-green-600 hover:text-green-800' ?> transition-all" 
                                           title="<?= $question['is_active'] ? 'Nonaktifkan' : 'Aktifkan' ?>">
                                            <i class="fas <?= $question['is_active'] ? 'fa-toggle-on' : 'fa-toggle-off' ?>"></i>
                                        </a>
                                        
                                        <?php if (!in_array($question['id'], $usedQuestions)): ?>
                                            <a href="javascript:void(0)" 
                                               onclick="confirmDelete(<?= $question['id'] ?>)"
                                               class="inline-flex items-center p-1.5 text-red-600 hover:text-red-800 transition-all" 
                                               title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        <?php else: ?>
                                            <span class="inline-flex items-center p-1.5 text-gray-400 cursor-not-allowed" 
                                                  title="Tidak dapat dihapus karena sudah digunakan">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <?php if (!empty($questions)): ?>
            <div class="px-4 py-3 border-t border-gray-100 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Menampilkan <?= count($questions) ?> dari <?= $pager->getTotal() ?> data
                </div>
                <div>
                    <?= $pager->links() ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden modal-backdrop">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Konfirmasi Hapus Pertanyaan</h3>
                <button type="button" onclick="closeDeleteModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <form id="deleteForm" action="" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                
                <div class="mb-4">
                    <p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus pertanyaan ini? Tindakan ini tidak dapat dibatalkan.</p>
                    
                    <div class="mt-4 p-3 bg-yellow-50 rounded-lg border border-yellow-100">
                        <div class="flex">
                            <i class="fas fa-exclamation-triangle text-yellow-500 mr-2"></i>
                            <p class="text-sm text-yellow-700">
                                Pertanyaan yang sudah digunakan dalam tes tidak dapat dihapus.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeDeleteModal()" 
                            class="px-4 py-2 text-gray-700 hover:text-gray-900 transition-all">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 transition-all">
                        Hapus Pertanyaan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Delete Modal
    function confirmDelete(questionId) {
        document.getElementById('deleteForm').action = '/admin/questions/delete/' + questionId;
        document.getElementById('deleteModal').classList.remove('hidden');
        
        // Refresh CSRF token
        fetch('/admin/get-csrf-token', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.token_name && data.token_hash) {
                const form = document.getElementById('deleteForm');
                const csrfInput = form.querySelector(`input[name="${data.token_name}"]`);
                if (csrfInput) {
                    csrfInput.value = data.token_hash;
                }
            }
        })
        .catch(error => console.error('Error refreshing CSRF token:', error));
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
    
    // Toggle Status
    function toggleStatus(questionId, isActive) {
        if (confirm('Apakah Anda yakin ingin ' + (isActive ? 'menonaktifkan' : 'mengaktifkan') + ' pertanyaan ini?')) {
            window.location.href = '/admin/questions/toggle-status/' + questionId;
        }
    }
</script>
<?= $this->endSection() ?> 