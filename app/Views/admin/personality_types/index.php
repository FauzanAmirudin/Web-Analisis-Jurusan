<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 md:mb-0">Manajemen Tipe Kepribadian</h2>
        <a href="/admin/personality-types/create" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg shadow-sm hover:bg-red-800 transition-all">
            <i class="fas fa-plus mr-2"></i>
            <span>Tambah Tipe Kepribadian</span>
        </a>
    </div>
    
    <!-- Filters -->
    <form action="/admin/personality-types" method="get" class="mb-6">
        <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Filter & Pencarian</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="search" class="block text-xs text-gray-500 mb-1">Kata Kunci</label>
                    <input type="text" id="search" name="search" value="<?= $search ?? '' ?>" 
                           placeholder="Nama, kode RIASEC, kode MBTI..." 
                           class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                </div>
                <div>
                    <label for="status" class="block text-xs text-gray-500 mb-1">Status</label>
                    <select id="status" name="status" 
                            class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="">Semua Status</option>
                        <option value="1" <?= ($status === '1') ? 'selected' : '' ?>>Aktif</option>
                        <option value="0" <?= ($status === '0') ? 'selected' : '' ?>>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="/admin/personality-types" class="inline-flex items-center px-3 py-2 text-gray-600 hover:text-gray-800 mr-2">
                    <i class="fas fa-times mr-1"></i> Reset
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 transition-all">
                    <i class="fas fa-search mr-2"></i> Terapkan Filter
                </button>
            </div>
        </div>
    </form>
    
    <!-- Personality Types Table -->
    <div class="bg-white rounded-lg overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="min-w-full table-striped table-hover">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Kode</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Nama Kepribadian</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">I/E</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Status</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Penggunaan</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($types)): ?>
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-sm text-gray-500 text-center">
                                Tidak ada data tipe kepribadian yang ditemukan
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($types as $type): ?>
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            <?= esc($type['riasec_code']) ?> / <?= esc($type['mbti_code']) ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="text-sm text-gray-900"><?= esc($type['personality_name']) ?></div>
                                    <div class="text-xs text-gray-500 truncate max-w-xs">
                                        <?= substr(strip_tags($type['personality_description']), 0, 80) ?>...
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <?php if ($type['introvert_extrovert'] === 'I'): ?>
                                        <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">Introvert</span>
                                    <?php else: ?>
                                        <span class="px-2 py-1 text-xs font-medium bg-orange-100 text-orange-800 rounded-full">Extrovert</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <?php if ($type['is_active']): ?>
                                        <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Aktif</span>
                                    <?php else: ?>
                                        <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Tidak Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <span class="text-sm font-medium"><?= isset($usage_stats[$type['id']]) ? $usage_stats[$type['id']] : 0 ?></span>
                                    <span class="text-xs text-gray-500">kali</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <div class="flex justify-center space-x-1" x-data="{ showActions: false }">
                                        <button @click="showActions = !showActions" class="text-gray-400 hover:text-gray-600 transition-all">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        
                                        <div x-show="showActions" @click.away="showActions = false" x-transition
                                             class="absolute z-30 mt-8 w-48 bg-white rounded-md shadow-lg border border-gray-100">
                                            <div class="py-1">
                                                <a href="/admin/personality-types/show/<?= $type['id'] ?>" 
                                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-all">
                                                    <i class="fas fa-eye mr-2 text-green-500"></i> Detail
                                                </a>
                                                
                                                <a href="/admin/personality-types/edit/<?= $type['id'] ?>" 
                                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-all">
                                                    <i class="fas fa-edit mr-2 text-blue-500"></i> Edit
                                                </a>
                                                
                                                <button type="button" onclick="toggleStatus(<?= $type['id'] ?>, <?= $type['is_active'] ?>)"
                                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-all">
                                                    <?php if ($type['is_active']): ?>
                                                        <i class="fas fa-ban mr-2 text-orange-500"></i> Nonaktifkan
                                                    <?php else: ?>
                                                        <i class="fas fa-check mr-2 text-green-500"></i> Aktifkan
                                                    <?php endif; ?>
                                                </button>
                                                
                                                <button type="button" onclick="confirmDelete(<?= $type['id'] ?>)"
                                                        class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-all">
                                                    <i class="fas fa-trash-alt mr-2"></i> Hapus
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-100 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Menampilkan <span class="font-medium text-gray-700"><?= count($types) ?></span> dari 
                <span class="font-medium text-gray-700"><?= $total ?></span> data
            </div>
            <div>
                <?= $pager ?>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden modal-backdrop">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Konfirmasi Hapus</h3>
                <button type="button" onclick="closeDeleteModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus tipe kepribadian ini? Tindakan ini tidak dapat dibatalkan.</p>
            
            <form id="deleteForm" action="" method="post">
                <?= csrf_field() ?>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeDeleteModal()" 
                            class="px-4 py-2 text-gray-700 hover:text-gray-900 transition-all">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 transition-all">
                        Ya, Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Get CSRF token to use in AJAX requests
    let csrfToken = '<?= csrf_hash() ?>';
    let csrfName = '<?= csrf_token() ?>';
    
    // Toggle status function
    function toggleStatus(id, currentStatus) {
        if (confirm(currentStatus ? 'Nonaktifkan tipe kepribadian ini?' : 'Aktifkan tipe kepribadian ini?')) {
            fetch(`/admin/personality-types/toggle-status/${id}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    alert(data.message);
                    // Reload the page to reflect changes
                    window.location.reload();
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengubah status. Silakan coba lagi.');
            });
        }
    }
    
    // Delete confirmation
    function confirmDelete(id) {
        document.getElementById('deleteForm').action = `/admin/personality-types/delete/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    
    // Close delete modal
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
<?= $this->endSection() ?>
