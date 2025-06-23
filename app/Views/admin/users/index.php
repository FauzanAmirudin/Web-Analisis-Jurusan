<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 md:mb-0">Manajemen Pengguna</h2>
        <a href="/admin/users/create" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg shadow-sm hover:bg-red-800 transition-all">
            <i class="fas fa-plus mr-2"></i>
            <span>Tambah Pengguna</span>
        </a>
    </div>
    
    <!-- Filters -->
    <form action="/admin/users" method="get" class="mb-6">
        <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
            <h3 class="text-sm font-medium text-gray-700 mb-3">Filter & Pencarian</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label for="search" class="block text-xs text-gray-500 mb-1">Kata Kunci</label>
                    <input type="text" id="search" name="search" value="<?= $search ?? '' ?>" 
                           placeholder="Nama, email, username..." 
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
                <div>
                    <label for="date_from" class="block text-xs text-gray-500 mb-1">Tanggal Awal</label>
                    <input type="text" id="date_from" name="date_from" value="<?= $date_from ?? '' ?>" 
                           placeholder="YYYY-MM-DD" 
                           class="datepicker w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                </div>
                <div>
                    <label for="date_to" class="block text-xs text-gray-500 mb-1">Tanggal Akhir</label>
                    <input type="text" id="date_to" name="date_to" value="<?= $date_to ?? '' ?>" 
                           placeholder="YYYY-MM-DD" 
                           class="datepicker w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="/admin/users" class="inline-flex items-center px-3 py-2 text-gray-600 hover:text-gray-800 mr-2">
                    <i class="fas fa-times mr-1"></i> Reset
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 transition-all">
                    <i class="fas fa-search mr-2"></i> Terapkan Filter
                </button>
            </div>
        </div>
    </form>
    
    <!-- Users Table -->
    <div class="bg-white rounded-lg overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="min-w-full table-striped table-hover">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Pengguna</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Kontak</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Status</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Kredit Tes</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Peran</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Tanggal Registrasi</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-sm text-gray-500 text-center">
                                Tidak ada data pengguna yang ditemukan
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <?php if (!empty($user['profile_picture'])): ?>
                                                <img class="h-10 w-10 rounded-full object-cover" 
                                                     src="/uploads/profiles/<?= $user['profile_picture'] ?>" alt="">
                                            <?php else: ?>
                                                <img class="h-10 w-10 rounded-full" 
                                                     src="https://ui-avatars.com/api/?name=<?= urlencode($user['full_name']) ?>&background=7C0A02&color=fff" alt="">
                                            <?php endif; ?>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900"><?= esc($user['full_name']) ?></div>
                                            <div class="text-xs text-gray-500">@<?= esc($user['username']) ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><?= esc($user['email']) ?></div>
                                    <div class="text-xs text-gray-500"><?= esc($user['phone_number'] ?? 'Tidak ada') ?></div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <?php if ($user['is_active']): ?>
                                        <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Aktif</span>
                                    <?php else: ?>
                                        <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Tidak Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <span class="text-sm font-medium"><?= $user['test_credits'] ?></span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <?php if ($user['role'] === 'admin'): ?>
                                        <span class="px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded-full">Admin</span>
                                    <?php else: ?>
                                        <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full">Pengguna</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    <?= date('d M Y', strtotime($user['created_at'])) ?>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <div class="flex justify-center space-x-1" x-data="{ showActions: false }">
                                        <button @click="showActions = !showActions" class="text-gray-400 hover:text-gray-600 transition-all">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        
                                        <div x-show="showActions" @click.away="showActions = false" x-transition
                                             class="absolute z-30 mt-8 w-48 bg-white rounded-md shadow-lg border border-gray-100">
                                            <div class="py-1">
                                                <a href="/admin/users/edit/<?= $user['id'] ?>" 
                                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-all">
                                                    <i class="fas fa-edit mr-2 text-blue-500"></i> Edit
                                                </a>
                                                
                                                <a href="/admin/users/activities/<?= $user['id'] ?>" 
                                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-all">
                                                    <i class="fas fa-history mr-2 text-indigo-500"></i> Log Aktivitas
                                                </a>
                                                
                                                <button type="button" onclick="openCreditsModal(<?= $user['id'] ?>, <?= $user['test_credits'] ?>)"
                                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-all">
                                                    <i class="fas fa-coins mr-2 text-yellow-500"></i> Kelola Kredit
                                                </button>
                                                
                                                <button type="button" onclick="toggleStatus(<?= $user['id'] ?>, <?= $user['is_active'] ?>)"
                                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-all">
                                                    <?php if ($user['is_active']): ?>
                                                        <i class="fas fa-user-slash mr-2 text-red-500"></i> Nonaktifkan
                                                    <?php else: ?>
                                                        <i class="fas fa-user-check mr-2 text-green-500"></i> Aktifkan
                                                    <?php endif; ?>
                                                </button>
                                                
                                                <button type="button" onclick="openResetPasswordModal(<?= $user['id'] ?>)"
                                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-all">
                                                    <i class="fas fa-key mr-2 text-orange-500"></i> Reset Password
                                                </button>
                                                
                                                <button type="button" onclick="confirmDelete(<?= $user['id'] ?>)"
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
                Menampilkan <span class="font-medium text-gray-700"><?= count($users) ?></span> dari 
                <span class="font-medium text-gray-700"><?= $total ?></span> data
            </div>
            <div>
                <?= $pager ?>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<!-- Credits Modal -->
<div id="creditsModal" class="fixed inset-0 z-50 hidden modal-backdrop">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Kelola Kredit Tes</h3>
                <button type="button" onclick="closeCreditsModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <form id="creditsForm" action="" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-4">
                    <p class="text-gray-700 mb-2">Saat ini: <span id="currentCredits" class="font-medium">0</span> kredit</p>
                    
                    <div class="mb-3">
                        <label for="credit_action" class="block text-sm text-gray-700 mb-1">Aksi</label>
                        <select id="credit_action" name="action" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <option value="add">Tambah Kredit</option>
                            <option value="subtract">Kurangi Kredit</option>
                            <option value="set">Set Jumlah Tertentu</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="credit_amount" class="block text-sm text-gray-700 mb-1">Jumlah</label>
                        <input type="number" id="credit_amount" name="amount" value="1" min="1" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                    </div>
                </div>
                
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeCreditsModal()" 
                            class="px-4 py-2 text-gray-700 hover:text-gray-900 transition-all">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-primary text-white rounded-md shadow-sm hover:bg-red-800 transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Reset Password Modal -->
<div id="resetPasswordModal" class="fixed inset-0 z-50 hidden modal-backdrop">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Reset Password</h3>
                <button type="button" onclick="closeResetPasswordModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <form id="resetPasswordForm" action="" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-4">
                    <p class="text-gray-700 mb-4">Masukkan password baru untuk pengguna ini.</p>
                    
                    <div>
                        <label for="new_password" class="block text-sm text-gray-700 mb-1">Password Baru</label>
                        <input type="password" id="new_password" name="new_password" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"
                               placeholder="Minimal 6 karakter">
                    </div>
                </div>
                
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeResetPasswordModal()" 
                            class="px-4 py-2 text-gray-700 hover:text-gray-900 transition-all">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-primary text-white rounded-md shadow-sm hover:bg-red-800 transition-all">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden modal-backdrop">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Konfirmasi Hapus Pengguna</h3>
                <button type="button" onclick="closeDeleteModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <form id="deleteForm" action="" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-4">
                    <p class="text-gray-700 mb-4">Pilih tipe penghapusan:</p>
                    
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="radio" id="soft_delete" name="deletion_type" value="soft" class="mr-2" checked>
                            <label for="soft_delete" class="text-sm text-gray-700">
                                <span class="font-medium">Nonaktifkan Saja</span> - Menonaktifkan akun tetapi mempertahankan data
                            </label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="radio" id="permanent_delete" name="deletion_type" value="permanent" class="mr-2">
                            <label for="permanent_delete" class="text-sm text-gray-700">
                                <span class="font-medium text-red-600">Hapus Permanen</span> - Menghapus seluruh data pengguna (tidak dapat dikembalikan)
                            </label>
                        </div>
                    </div>
                    
                    <div class="mt-4 p-3 bg-yellow-50 rounded-lg border border-yellow-100">
                        <div class="flex">
                            <i class="fas fa-exclamation-triangle text-yellow-500 mr-2"></i>
                            <p class="text-sm text-yellow-700">
                                Penghapusan permanen hanya dapat dilakukan jika pengguna tidak memiliki data hasil tes.
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
                        Hapus Pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // CSRF refresh function
    function refreshCSRFToken(formId) {
        // Get the current CSRF token name and hash from a meta tag
        // Assumed that you have meta tags for CSRF token name and hash in your <head> section
        fetch('/admin/get-csrf-token', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.token_name && data.token_hash) {
                const form = document.getElementById(formId);
                if (form) {
                    // Find the existing CSRF input field or create a new one
                    let csrfInput = form.querySelector(`input[name="${data.token_name}"]`);
                    if (!csrfInput) {
                        csrfInput = document.createElement('input');
                        csrfInput.type = 'hidden';
                        csrfInput.name = data.token_name;
                        form.appendChild(csrfInput);
                    }
                    csrfInput.value = data.token_hash;
                }
            }
        })
        .catch(error => console.error('Error refreshing CSRF token:', error));
    }

    // Credits Modal
    function openCreditsModal(userId, currentCredits) {
        document.getElementById('currentCredits').textContent = currentCredits;
        document.getElementById('creditsForm').action = '/admin/users/adjust-credits/' + userId;
        document.getElementById('creditsModal').classList.remove('hidden');
        
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
                const form = document.getElementById('creditsForm');
                const csrfInput = form.querySelector(`input[name="${data.token_name}"]`);
                if (csrfInput) {
                    csrfInput.value = data.token_hash;
                }
            }
        })
        .catch(error => console.error('Error refreshing CSRF token:', error));
    }
    
    function closeCreditsModal() {
        document.getElementById('creditsModal').classList.add('hidden');
    }
    
    // Reset Password Modal
    function openResetPasswordModal(userId) {
        document.getElementById('resetPasswordForm').action = '/admin/users/reset-password/' + userId;
        document.getElementById('resetPasswordModal').classList.remove('hidden');
        
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
                const form = document.getElementById('resetPasswordForm');
                const csrfInput = form.querySelector(`input[name="${data.token_name}"]`);
                if (csrfInput) {
                    csrfInput.value = data.token_hash;
                }
            }
        })
        .catch(error => console.error('Error refreshing CSRF token:', error));
    }
    
    function closeResetPasswordModal() {
        document.getElementById('resetPasswordModal').classList.add('hidden');
    }
    
    // Delete Modal
    function confirmDelete(userId) {
        document.getElementById('deleteForm').action = '/admin/users/delete/' + userId;
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
    function toggleStatus(userId, currentStatus) {
        if (confirm('Apakah Anda yakin ingin ' + (currentStatus ? 'menonaktifkan' : 'mengaktifkan') + ' pengguna ini?')) {
            window.location.href = '/admin/users/toggle-status/' + userId;
        }
    }
</script>
<?= $this->endSection() ?> 