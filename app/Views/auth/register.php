<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-xl w-full space-y-8 bg-white rounded-2xl shadow-xl p-8 sm:p-10 animate-fade-in-up">
        <div>
            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary to-red-700 mb-3">Lampung Cerdas</h1>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Daftar Akun Baru</h2>
                <div class="h-1 w-20 bg-primary mx-auto mb-6 rounded-full"></div>
                <p class="text-base text-gray-600">
                    Sudah punya akun? 
                    <a href="/auth/login" class="font-medium text-primary hover:text-red-800 transition-custom underline">
                        Masuk di sini
                    </a>
                </p>
            </div>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-5 shadow-md animate-fade-in">
                <div class="flex">
                    <i class="fas fa-exclamation-circle text-red-500 text-xl mr-4 mt-0.5"></i>
                    <div class="text-sm text-red-700">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Display validation errors summary -->
        <?php if (session()->has('errors')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-5 shadow-md animate-fade-in">
                <div class="flex">
                    <i class="fas fa-exclamation-circle text-red-500 text-xl mr-4 mt-0.5"></i>
                    <div class="text-sm text-red-700">
                        <p class="font-medium">Ada beberapa kesalahan:</p>
                        <ul class="list-disc ml-4 mt-1">
                            <?php foreach (session('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form class="mt-8 space-y-6" action="/auth/register" method="POST" id="registerForm" novalidate>
            <?= csrf_field() ?>
            <div id="formMsg" class="hidden"></div>
            
            <div class="space-y-5 sm:space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6">
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Nama Lengkap
                        </label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-primary"></i>
                            </div>
                            <input id="full_name" name="full_name" type="text" required 
                                class="appearance-none block w-full pl-10 px-3 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200" 
                                placeholder="Masukkan nama lengkap"
                                value="<?= old('full_name') ?>">
                        </div>
                        <?php if (isset($errors['full_name'])): ?>
                            <p class="mt-1.5 text-sm text-red-600"><?= $errors['full_name'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Username
                        </label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-at text-primary"></i>
                            </div>
                            <input id="username" name="username" type="text" required 
                                class="appearance-none block w-full pl-10 px-3 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200" 
                                placeholder="Pilih username unik"
                                value="<?= old('username') ?>">
                        </div>
                        <?php if (isset($errors['username'])): ?>
                            <p class="mt-1.5 text-sm text-red-600"><?= $errors['username'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Email
                    </label>
                    <div class="relative rounded-lg shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-primary"></i>
                        </div>
                        <input id="email" name="email" type="email" required 
                            class="appearance-none block w-full pl-10 px-3 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200" 
                            placeholder="Masukkan alamat email"
                            value="<?= old('email') ?>">
                    </div>
                    <?php if (isset($errors['email'])): ?>
                        <p class="mt-1.5 text-sm text-red-600"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6">
                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Nomor Telepon / WhatsApp
                        </label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-primary"></i>
                            </div>
                            <input id="phone_number" name="phone_number" type="tel" required 
                                class="appearance-none block w-full pl-10 px-3 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200" 
                                placeholder="Contoh: 081234567890"
                                value="<?= old('phone_number') ?>">
                        </div>
                        <?php if (isset($errors['phone_number'])): ?>
                            <p class="mt-1.5 text-sm text-red-600"><?= $errors['phone_number'] ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <div>
                        <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Tanggal Lahir
                        </label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-calendar-alt text-primary"></i>
                            </div>
                            <input id="birth_date" name="birth_date" type="date" required 
                                class="appearance-none block w-full pl-10 px-3 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200"
                                value="<?= old('birth_date') ?>">
                        </div>
                        <?php if (isset($errors['birth_date'])): ?>
                            <p class="mt-1.5 text-sm text-red-600"><?= $errors['birth_date'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Password
                        </label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-primary"></i>
                            </div>
                            <input id="password" name="password" type="password" required 
                                class="appearance-none block w-full pl-10 px-3 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200" 
                                placeholder="Minimal 6 karakter">
                        </div>
                        <?php if (isset($errors['password'])): ?>
                            <p class="mt-1.5 text-sm text-red-600"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="password_confirm" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Konfirmasi Password
                        </label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-primary"></i>
                            </div>
                            <input id="password_confirm" name="password_confirm" type="password" required 
                                class="appearance-none block w-full pl-10 px-3 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200" 
                                placeholder="Ulangi password">
                        </div>
                        <?php if (isset($errors['password_confirm'])): ?>
                            <p class="mt-1.5 text-sm text-red-600"><?= $errors['password_confirm'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" id="submitBtn"
                    class="group relative w-full flex justify-center items-center py-3.5 px-4 border border-transparent text-base font-medium rounded-lg text-white bg-gradient-to-r from-primary to-red-700 hover:from-red-700 hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-md hover:shadow-lg">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-user-plus text-red-300 group-hover:text-red-200"></i>
                    </span>
                    <span>Daftar Sekarang</span>
                </button>
            </div>

            <div class="text-center text-sm text-gray-600 border-t border-gray-200 pt-4 mt-4">
                <p>
                    Dengan mendaftar, Anda menyetujui 
                    <a href="#" class="text-primary hover:text-red-800 transition-custom font-medium">Syarat & Ketentuan</a> 
                    dan 
                    <a href="#" class="text-primary hover:text-red-800 transition-custom font-medium">Kebijakan Privasi</a>
                </p>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<style>
    .animate-fade-in {
        animation: fadeIn 0.4s ease-in-out;
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.5s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .transition-custom {
        transition: all 0.3s ease;
    }
</style>
<script>
    // Pure JavaScript implementation for form submission
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('registerForm');
        var submitBtn = document.getElementById('submitBtn');
        
        if (form) {
            // Ensure form has the proper action
            form.setAttribute('action', '/auth/register');
            form.setAttribute('method', 'POST');
            
            form.onsubmit = function() {
                // Disable the button to prevent double submission
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="absolute left-0 inset-y-0 flex items-center pl-3"><i class="fas fa-spinner fa-spin text-red-300"></i></span><span>Memproses...</span>';
                }
                return true; // Allow form submission to proceed
            };
        }
    });
</script>
<?= $this->endSection() ?>