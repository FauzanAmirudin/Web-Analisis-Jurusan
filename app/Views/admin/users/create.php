<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 md:mb-0">Tambah Pengguna Baru</h2>
        <a href="/admin/users" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg shadow-sm hover:bg-gray-200 transition-all">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>
    
    <form action="/admin/users/store" method="post" enctype="multipart/form-data" class="space-y-6">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
                    <h3 class="text-base font-medium text-gray-800 mb-4">Informasi Akun</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="username" class="block text-sm text-gray-600 mb-1">Username <span class="text-red-600">*</span></label>
                            <input type="text" id="username" name="username" value="<?= old('username') ?>" 
                                   placeholder="Masukkan username" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('username')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('username') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm text-gray-600 mb-1">Email <span class="text-red-600">*</span></label>
                            <input type="email" id="email" name="email" value="<?= old('email') ?>" 
                                   placeholder="Masukkan email" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('email')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('email') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="password" class="block text-sm text-gray-600 mb-1">Password <span class="text-red-600">*</span></label>
                            <input type="password" id="password" name="password" 
                                   placeholder="Minimal 6 karakter" required
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
                                    <option value="user" <?= old('role') === 'user' ? 'selected' : '' ?>>Pengguna</option>
                                    <option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>Admin</option>
                                </select>
                                <?php if (isset($validation) && $validation->hasError('role')): ?>
                                    <p class="text-xs text-red-600 mt-1"><?= $validation->getError('role') ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <div>
                                <label for="is_active" class="block text-sm text-gray-600 mb-1">Status <span class="text-red-600">*</span></label>
                                <select id="is_active" name="is_active" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                                    <option value="1" <?= old('is_active', '1') === '1' ? 'selected' : '' ?>>Aktif</option>
                                    <option value="0" <?= old('is_active') === '0' ? 'selected' : '' ?>>Tidak Aktif</option>
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
                        <input type="number" id="test_credits" name="test_credits" value="<?= old('test_credits', '0') ?>" 
                               min="0" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                        <?php if (isset($validation) && $validation->hasError('test_credits')): ?>
                            <p class="text-xs text-red-600 mt-1"><?= $validation->getError('test_credits') ?></p>
                        <?php endif; ?>
                        <p class="text-xs text-gray-500 mt-1">Kredit digunakan untuk mengikuti tes. Masukkan 0 jika tidak ada kredit.</p>
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
                            <input type="text" id="full_name" name="full_name" value="<?= old('full_name') ?>" 
                                   placeholder="Masukkan nama lengkap" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('full_name')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('full_name') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="phone_number" class="block text-sm text-gray-600 mb-1">Nomor Telepon</label>
                            <input type="text" id="phone_number" name="phone_number" value="<?= old('phone_number') ?>" 
                                   placeholder="Masukkan nomor telepon"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                            <?php if (isset($validation) && $validation->hasError('phone_number')): ?>
                                <p class="text-xs text-red-600 mt-1"><?= $validation->getError('phone_number') ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label for="birth_date" class="block text-sm text-gray-600 mb-1">Tanggal Lahir</label>
                            <input type="text" id="birth_date" name="birth_date" value="<?= old('birth_date') ?>" 
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
                        <div x-data="{ imagePreview: '' }" class="text-center">
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
                                    <span>Pilih Foto</span>
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
            </div>
        </div>
        
        <div class="flex justify-center pt-4">
            <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg shadow-sm hover:bg-red-800 transition-all">
                <i class="fas fa-save mr-2"></i> Simpan Pengguna Baru
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>