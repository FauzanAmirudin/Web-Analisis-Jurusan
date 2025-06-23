<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 md:mb-0">Edit Pengguna</h2>
        <a href="/admin/users" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg shadow-sm hover:bg-gray-200 transition-all">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>
    
    <form action="/admin/users/update/<?= $user['id'] ?>" method="post" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Informasi Akun</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="username" class="block text-sm text-gray-600 mb-1">Username <span class="text-red-600">*</span></label>
                            <input type="text" id="username" name="username" value="<?= old('username', $user['username']) ?>" 
                                   placeholder="Masukkan username" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('username')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('username') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm text-gray-600 mb-1">Email <span class="text-red-600">*</span></label>
                            <input type="email" id="email" name="email" value="<?= old('email', $user['email']) ?>" 
                                   placeholder="Masukkan email" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('email')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('email') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="password" class="block text-sm text-gray-600 mb-1">Password <small>(Kosongkan jika tidak diubah)</small></label>
                            <input type="password" id="password" name="password" 
                                   placeholder="Minimal 6 karakter"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('password')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('password') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="role" class="block text-sm text-gray-600 mb-1">Peran <span class="text-red-600">*</span></label>
                                <select id="role" name="role" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                                    <option value="user" <?= old('role', $user['role']) === 'user' ? 'selected' : '' ?>>Pengguna</option>
                                    <option value="admin" <?= old('role', $user['role']) === 'admin' ? 'selected' : '' ?>>Admin</option>
                                </select>
                                <?php if (isset($validation) && $validation->hasError('role')): ?>
                                    <p class="text-xs text-red-600 mt-1"><?= $validation->getError('role') ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <div>
                                <label for="is_active" class="block text-sm text-gray-600 mb-1">Status <span class="text-red-600">*</span></label>
                                <select id="is_active" name="is_active" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                                    <option value="1" <?= old('is_active', $user['is_active']) == 1 ? 'selected' : '' ?>>Aktif</option>
                                    <option value="0" <?= old('is_active', $user['is_active']) == 0 ? 'selected' : '' ?>>Tidak Aktif</option>
                                </select>
                                <?php if (isset($validation) && $validation->hasError('is_active')): ?>
                                    <p class="text-xs text-red-600 mt-1"><?= $validation->getError('is_active') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Kredit Tes</h3>
                    
                    <div>
                        <label for="test_credits" class="block text-sm text-gray-600 mb-1">Jumlah Kredit <span class="text-red-600">*</span></label>
                        <input type="number" id="test_credits" name="test_credits" value="<?= old('test_credits', $user['test_credits']) ?>" 
                               min="0" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                        <?php if (isset($validation) && $validation->hasError('test_credits')): ?>
                            <p class="text-xs text-red-600 mt-1"><?= $validation->getError('test_credits') ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Info Lainnya</h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Tanggal Registrasi</span>
                            <span class="text-sm font-medium"><?= date('d M Y H:i', strtotime($user['created_at'])) ?></span>
                        </div>
                        
                        <div class="flex justify-between py-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Terakhir Diperbarui</span>
                            <span class="text-sm font-medium"><?= date('d M Y H:i', strtotime($user['updated_at'])) ?></span>
                        </div>
                        
                        <div class="flex justify-between py-2">
                            <span class="text-sm text-gray-600">Login Terakhir</span>
                            <span class="text-sm font-medium">
                                <?= $user['last_login_at'] ? date('d M Y H:i', strtotime($user['last_login_at'])) : 'Belum pernah login' ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column -->
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Informasi Pribadi</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="full_name" class="block text-sm text-gray-600 mb-1">Nama Lengkap <span class="text-red-600">*</span></label>
                            <input type="text" id="full_name" name="full_name" value="<?= old('full_name', $user['full_name']) ?>" 
                                   placeholder="Masukkan nama lengkap" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('full_name')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('full_name') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="phone_number" class="block text-sm text-gray-600 mb-1">Nomor Telepon</label>
                            <input type="text" id="phone_number" name="phone_number" value="<?= old('phone_number', $user['phone_number']) ?>" 
                                   placeholder="Masukkan nomor telepon"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('phone_number')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('phone_number') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="birth_date" class="block text-sm text-gray-600 mb-1">Tanggal Lahir</label>
                            <input type="text" id="birth_date" name="birth_date" value="<?= old('birth_date', $user['birth_date']) ?>" 
                                   placeholder="YYYY-MM-DD"
                                   class="datepicker w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('birth_date')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('birth_date') ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Foto Profil</h3>
                    
                    <div class="space-y-4">
                        <div x-data="{ imagePreview: '<?= !empty($user['profile_picture']) ? '/uploads/profiles/' . $user['profile_picture'] : '' ?>' }" class="text-center">
                            <div class="mb-3">
                                <img x-show="imagePreview" x-bind:src="imagePreview" 
                                     class="rounded-lg h-40 w-40 object-cover mx-auto border border-gray-200 shadow-sm" alt="Preview">
                                <div x-show="!imagePreview" class="rounded-lg h-40 w-40 bg-gray-100 flex items-center justify-center mx-auto border border-gray-200">
                                    <i class="fas fa-user text-gray-300 text-5xl"></i>
                                </div>
                            </div>
                            
                            <label for="profile_picture" class="cursor-pointer">
                                <div class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 transition-all inline-flex items-center">
                                    <i class="fas fa-upload mr-2"></i>
                                    <span>Ganti Foto</span>
                                </div>
                                <input type="file" id="profile_picture" name="profile_picture" 
                                       accept="image/jpeg,image/png,image/jpg" hidden
                                       @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                            </label>
                            <?php if (isset($validation) && $validation->hasError('profile_picture')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('profile_picture') ?></p>
                            <?php endif; ?>
                            <p class="text-xs text-gray-500 mt-2">Format gambar yang didukung: JPG, JPEG, PNG. Maks. 2MB.</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Aksi Lainnya</h3>
                    
                    <div class="space-y-3">
                        <a href="/admin/users/activities/<?= $user['id'] ?>" 
                           class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 transition-all w-full">
                            <div class="bg-indigo-100 text-indigo-600 p-2 rounded-lg mr-3">
                                <i class="fas fa-history"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-700">Lihat Log Aktivitas</h4>
                                <p class="text-xs text-gray-500">Melihat catatan aktivitas pengguna</p>
                            </div>
                            <i class="fas fa-chevron-right ml-auto text-gray-400"></i>
                        </a>
                        
                        <button type="button" onclick="openResetPasswordModal(<?= $user['id'] ?>)"
                                class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-100 transition-all w-full text-left">
                            <div class="bg-orange-100 text-orange-600 p-2 rounded-lg mr-3">
                                <i class="fas fa-key"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-700">Reset Password</h4>
                                <p class="text-xs text-gray-500">Mengatur ulang password pengguna</p>
                            </div>
                            <i class="fas fa-chevron-right ml-auto text-gray-400"></i>
                        </button>
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
            
            <form id="resetPasswordForm" action="/admin/users/reset-password/<?= $user['id'] ?>" method="post">
                <?= csrf_field() ?>
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
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Reset Password Modal
    function openResetPasswordModal() {
        document.getElementById('resetPasswordModal').classList.remove('hidden');
    }
    
    function closeResetPasswordModal() {
        document.getElementById('resetPasswordModal').classList.add('hidden');
    }
</script>
<?= $this->endSection() ?>
