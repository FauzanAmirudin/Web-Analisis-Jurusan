<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-white to-gray-50 rounded-xl shadow-md p-6 border-l-4 border-primary relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 bg-primary/10 rounded-full"></div>
        <div class="absolute bottom-0 right-16 w-16 h-16 -mb-4 bg-primary/5 rounded-full"></div>
        <div class="relative z-10">
            <h1 class="text-2xl font-bold text-gray-900 mb-1">Profil Saya</h1>
            <p class="text-gray-600">Kelola informasi profil dan pengaturan akun Anda</p>
        </div>
    </div>

    <!-- Profile Form -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="flex flex-col md:flex-row">
            <!-- Avatar Section -->
            <div class="md:w-1/3 bg-gradient-to-br from-gray-50 to-gray-100 flex flex-col items-center py-12 px-6 border-r border-gray-100">
                <div class="w-40 h-40 rounded-full overflow-hidden bg-white mb-6 border-4 border-white ring-2 ring-primary/30 shadow-xl transform hover:scale-105 transition-all duration-300">
                    <img src="<?= !empty($user['profile_picture']) ? base_url('uploads/profiles/' . $user['profile_picture']) : 'https://ui-avatars.com/api/?name=' . urlencode($user['full_name'] ?? 'User') . '&background=7C0A02&color=fff&size=200' ?>" 
                         alt="Profile Picture"
                         class="w-full h-full object-cover">
                </div>
                <div class="text-center space-y-4">
                    <h3 class="font-semibold text-lg"><?= $user['full_name'] ?? 'User' ?></h3>
                    
                    <?php if (session()->getFlashdata('error') && strpos(session()->getFlashdata('error'), 'foto profil') !== false): ?>
                    <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-3 mb-2 animate-fade-in text-left shadow-sm">
                        <div class="flex">
                            <i class="fas fa-exclamation-circle text-red-400 mt-0.5 mr-2"></i>
                            <p class="text-xs text-red-700"><?= session()->getFlashdata('error') ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (session()->getFlashdata('success') && strpos(session()->getFlashdata('success'), 'foto profil') !== false): ?>
                    <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-3 mb-2 animate-fade-in text-left shadow-sm">
                        <div class="flex">
                            <i class="fas fa-check-circle text-green-500 mt-0.5 mr-2"></i>
                            <p class="text-xs text-green-700"><?= session()->getFlashdata('success') ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <p class="text-sm text-gray-500 mb-6">
                    Upload foto dengan ukuran maksimal 2MB<br>
                    Format: JPG, PNG
                </p>
                <form id="avatarForm" method="POST" action="/dashboard/profile" enctype="multipart/form-data" class="flex flex-col items-center">
                        <?= csrf_field() ?>
                    <input type="file" name="profile_picture" id="profile_picture" class="hidden" accept="image/*" onchange="updateFileInfo(this)">
                        <label for="profile_picture" class="bg-gradient-to-r from-primary to-red-700 text-white px-5 py-2.5 rounded-lg cursor-pointer hover:shadow-xl hover:from-red-700 hover:to-primary transition-all duration-200 inline-flex items-center">
                        <i class="fas fa-camera mr-2"></i>Pilih Foto
                    </label>
                        <span id="fileInfo" class="text-xs text-gray-500 mt-2">Belum ada file dipilih</span>
                </form>
                </div>
                
                <div class="mt-10 pt-6 border-t border-gray-200 w-full">
                    <div class="flex flex-col space-y-3">
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-user-circle w-5 text-center mr-2 text-primary"></i>
                            <span class="text-sm"><?= $user['username'] ?? '-' ?></span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-envelope w-5 text-center mr-2 text-primary"></i>
                            <span class="text-sm"><?= $user['email'] ?? '-' ?></span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-phone w-5 text-center mr-2 text-primary"></i>
                            <span class="text-sm"><?= $user['phone_number'] ?? '-' ?></span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-calendar-alt w-5 text-center mr-2 text-primary"></i>
                            <span class="text-sm"><?= $user['birth_date'] ? date('d F Y', strtotime($user['birth_date'])) : '-' ?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Profile Form -->
            <div class="md:w-2/3 p-6 sm:p-8">
                <form id="profileForm" method="POST" action="<?= base_url('dashboard/profile') ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="is_profile_update" value="1">
                    
                    <?php if (session()->has('errors')): ?>
                        <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6 animate-fade-in shadow-md">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-circle text-red-400 mt-1 mr-3"></i>
                                <div>
                                    <h3 class="text-sm font-medium text-red-800">Ada beberapa kesalahan:</h3>
                                    <ul class="mt-2 pl-5 text-sm text-red-700 list-disc space-y-1">
                                        <?php foreach (session('errors') as $error): ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (session()->getFlashdata('success') && strpos(session()->getFlashdata('success'), 'foto profil') === false): ?>
                        <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6 animate-fade-in shadow-md">
                            <div class="flex">
                                <i class="fas fa-check-circle text-green-500 mt-0.5 mr-3"></i>
                                <p class="text-sm text-green-700"><?= session()->getFlashdata('success') ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (session()->getFlashdata('error') && strpos(session()->getFlashdata('error'), 'foto profil') === false): ?>
                        <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6 animate-fade-in shadow-md">
                            <div class="flex">
                                <i class="fas fa-exclamation-circle text-red-400 mt-0.5 mr-3"></i>
                                <p class="text-sm text-red-700"><?= session()->getFlashdata('error') ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (session()->getFlashdata('info')): ?>
                        <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4 mb-6 animate-fade-in shadow-md">
                            <div class="flex">
                                <i class="fas fa-info-circle text-blue-500 mt-0.5 mr-3"></i>
                                <p class="text-sm text-blue-700"><?= session()->getFlashdata('info') ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="bg-gray-50 p-5 rounded-xl mb-6 shadow-md">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-user-edit text-primary mr-2"></i>
                            Informasi Pribadi
                        </h3>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-primary opacity-70"></i>
                                    </div>
                                    <input type="text" name="full_name" id="full_name" required
                                        class="w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-30 transition-all duration-200 group-hover:border-primary/50"
                                        value="<?= old('full_name', $user['full_name'] ?? '') ?>">
                                </div>
                        </div>
                        
                        <div>
                                <label for="username" class="block text-sm font-medium text-gray-700 mb-1.5">Username</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-at text-primary opacity-70"></i>
                                    </div>
                            <input type="text" name="username" id="username" 
                                        class="w-full pl-10 rounded-lg border-gray-300 bg-gray-50 shadow-sm focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-30 transition-all duration-200"
                                   value="<?= $user['username'] ?? '' ?>" readonly>
                                    <p class="text-xs text-gray-500 mt-1.5 ml-1">Username tidak dapat diubah</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-5">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-primary opacity-70"></i>
                                </div>
                                <input type="email" name="email" id="email" required
                                    class="w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-30 transition-all duration-200 group-hover:border-primary/50"
                                    value="<?= old('email', $user['email'] ?? '') ?>">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-5">
                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1.5">Nomor Telepon / WhatsApp</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-phone text-primary opacity-70"></i>
                                    </div>
                                    <input type="tel" name="phone_number" id="phone_number" minlength="10"
                                        class="w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-30 transition-all duration-200 group-hover:border-primary/50"
                                        value="<?= old('phone_number', $user['phone_number'] ?? '') ?>">
                                </div>
                            </div>
                            
                                <div>
                                <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Lahir</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-calendar-alt text-primary opacity-70"></i>
                                    </div>
                                    <input type="date" name="birth_date" id="birth_date" 
                                        class="w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-30 transition-all duration-200 group-hover:border-primary/50"
                                        value="<?= old('birth_date', $user['birth_date'] ?? '') ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-5 rounded-xl shadow-md">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-lock text-primary mr-2"></i>
                            Keamanan Akun
                        </h3>
                        <p class="text-sm text-gray-600 mb-5 italic">Kosongkan jika tidak ingin mengganti password</p>
                                
                                <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1.5">Password Saat Ini</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-key text-primary opacity-70"></i>
                                </div>
                                <input type="password" name="current_password" id="current_password" 
                                    class="w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-30 transition-all duration-200 group-hover:border-primary/50">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mt-5">
                            <div>
                                <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1.5">Password Baru</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-primary opacity-70"></i>
                                    </div>
                                    <input type="password" name="new_password" id="new_password" 
                                        class="w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-30 transition-all duration-200 group-hover:border-primary/50">
                                </div>
                                </div>
                                
                                <div>
                                <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password Baru</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-check-circle text-primary opacity-70"></i>
                                    </div>
                                    <input type="password" name="confirm_password" id="confirm_password" 
                                        class="w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-30 transition-all duration-200 group-hover:border-primary/50">
                                </div>
                                </div>
                            </div>
                        </div>
                        
                    <div class="flex justify-end pt-6">
                        <button type="submit" 
                            class="bg-gradient-to-r from-primary to-red-700 text-white px-6 py-2.5 rounded-lg font-medium hover:from-red-700 hover:to-primary hover:shadow-xl transition-all duration-200 inline-flex items-center">
                                <i class="fas fa-save mr-2"></i>Simpan Perubahan
                            </button>
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
        fileInfo.classList.add('text-primary');
        
        // Show loading indicator
        fileInfo.textContent = 'Mengupload foto...';
        fileInfo.classList.add('text-primary');
        
        // Disable the label during upload
        const label = document.querySelector('label[for="profile_picture"]');
        label.classList.add('opacity-50', 'cursor-not-allowed');
        label.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengupload...';
        
        // Auto submit form when file is selected
        document.getElementById('avatarForm').submit();
    } else {
        fileInfo.textContent = 'Belum ada file dipilih';
        fileInfo.classList.remove('text-primary');
    }
}

// Form submit handler
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, setting up form handlers');
    
    const profileForm = document.getElementById('profileForm');
    if (profileForm) {
        console.log('Profile form found:', profileForm);
        
        // Track original values to detect changes
        const originalValues = {};
        const inputs = profileForm.querySelectorAll('input:not([type="hidden"]):not([type="password"])');
        inputs.forEach(input => {
            originalValues[input.name] = input.value;
        });
        
        // Add hover effect to form groups
        const formGroups = document.querySelectorAll('.group');
        formGroups.forEach(group => {
            const input = group.querySelector('input');
            if (input) {
                input.addEventListener('focus', () => {
                    group.classList.add('highlight');
                });
                input.addEventListener('blur', () => {
                    group.classList.remove('highlight');
                });
            }
        });
        
        profileForm.addEventListener('submit', function(e) {
            console.log('Form submitted');
            
            // Get the submit button
            const submitBtn = this.querySelector('button[type="submit"]');
            console.log('Submit button:', submitBtn);
            
            // Change button text and add loading spinner
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-80');
            
            // Debug form data and detect changes
            const formData = new FormData(this);
            console.log('Form data:');
            const changedFields = [];
            
            for (let pair of formData.entries()) {
                if (pair[0] !== 'csrf_token' && pair[0] !== 'is_profile_update') {
                    console.log(pair[0] + ': ' + pair[1]);
                    
                    // Check if value has changed
                    if (originalValues[pair[0]] !== undefined && originalValues[pair[0]] !== pair[1]) {
                        changedFields.push(pair[0]);
                        console.log(`Field ${pair[0]} changed from "${originalValues[pair[0]]}" to "${pair[1]}"`);
                    }
                }
            }
            
            if (changedFields.length > 0) {
                console.log('Changed fields:', changedFields.join(', '));
            } else if (!formData.get('current_password')) {
                console.log('No fields changed');
            }
            
            // Let the form submit normally
            console.log('Allowing form submission to continue');
        });
    } else {
        console.error('Profile form not found!');
    }
});
</script>
<style>
.animate-fade-in {
    animation: fadeIn 0.5s ease-in-out;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
.group.highlight input {
    border-color: rgba(124, 10, 2, 0.5);
    box-shadow: 0 0 0 3px rgba(124, 10, 2, 0.15);
}
</style>
<?= $this->endSection() ?> 