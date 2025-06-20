<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Profil Saya</h1>
        <p class="text-gray-600">Kelola informasi profil Anda</p>
    </div>

    <!-- Profile Form -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex flex-col md:flex-row md:space-x-8">
            <!-- Avatar Section -->
            <div class="md:w-1/3 flex flex-col items-center mb-6 md:mb-0">
                <div class="w-40 h-40 rounded-full overflow-hidden bg-gray-100 mb-4 border-4 border-primary">
                    <img src="<?= !empty($user['profile_picture']) ? base_url('uploads/profiles/' . $user['profile_picture']) : 'https://ui-avatars.com/api/?name=' . urlencode($user['full_name'] ?? 'User') . '&background=7C0A02&color=fff&size=200' ?>" 
                         alt="Profile Picture"
                         class="w-full h-full object-cover">
                </div>
                <p class="text-sm text-gray-600 mb-4 text-center">
                    Upload foto dengan ukuran maksimal 2MB<br>
                    Format: JPG, PNG
                </p>
                <form id="avatarForm" method="POST" action="/dashboard/profile" enctype="multipart/form-data" class="flex flex-col items-center">
                    <input type="file" name="profile_picture" id="profile_picture" class="hidden" accept="image/*" onchange="updateFileInfo(this)">
                    <label for="profile_picture" class="bg-primary text-white px-4 py-2 rounded cursor-pointer hover:bg-red-800 transition duration-200 mb-2">
                        <i class="fas fa-camera mr-2"></i>Pilih Foto
                    </label>
                    <span id="fileInfo" class="text-xs text-gray-500">Belum ada file dipilih</span>
                </form>
            </div>
            
            <!-- Profile Form -->
            <div class="md:w-2/3">
                <form method="POST" action="/dashboard/profile">
                    <?= csrf_field() ?>
                    
                    <?php if (session()->has('errors')): ?>
                        <div class="bg-red-50 border border-red-200 rounded-md p-4 mb-4">
                            <div class="flex">
                                <i class="fas fa-exclamation-circle text-red-400 mr-3 mt-0.5"></i>
                                <div>
                                    <h3 class="text-sm font-medium text-red-800">Ada beberapa kesalahan:</h3>
                                    <ul class="mt-2 pl-5 text-sm text-red-700 list-disc">
                                        <?php foreach (session('errors') as $error): ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="full_name" id="full_name" 
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                   value="<?= $user['full_name'] ?? '' ?>">
                        </div>
                        
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <input type="text" name="username" id="username" 
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 bg-gray-50"
                                   value="<?= $user['username'] ?? '' ?>" readonly>
                            <p class="text-xs text-gray-500 mt-1">Username tidak dapat diubah</p>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" id="email" 
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                   value="<?= $user['email'] ?? '' ?>">
                        </div>
                        
                        <div class="pt-4 border-t border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900 mb-3">Ganti Password</h3>
                            <p class="text-sm text-gray-600 mb-4">Kosongkan jika tidak ingin mengganti password</p>
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Password Saat Ini</label>
                                    <input type="password" name="current_password" id="current_password" 
                                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                </div>
                                
                                <div>
                                    <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                                    <input type="password" name="new_password" id="new_password" 
                                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                </div>
                                
                                <div>
                                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                                    <input type="password" name="confirm_password" id="confirm_password" 
                                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end pt-4">
                            <button type="submit" class="bg-primary text-white px-6 py-2 rounded-md font-medium hover:bg-red-800 transition duration-200">
                                <i class="fas fa-save mr-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
function updateFileInfo(input) {
    const fileInfo = document.getElementById('fileInfo');
    if (input.files && input.files[0]) {
        const file = input.files[0];
        fileInfo.textContent = file.name + ' (' + Math.round(file.size / 1024) + ' KB)';
        
        // Auto submit form when file is selected
        document.getElementById('avatarForm').submit();
    } else {
        fileInfo.textContent = 'Belum ada file dipilih';
    }
}
</script>
<?= $this->endSection() ?> 