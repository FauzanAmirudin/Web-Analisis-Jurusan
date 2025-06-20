<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-8 sm:py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-6 sm:space-y-8">
        <div>
            <div class="text-center">
                <h1 class="text-2xl sm:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary to-red-700 mb-2">Lampung Cerdas</h1>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Daftar Akun Baru</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Sudah punya akun? 
                    <a href="/auth/login" class="font-medium text-primary hover:text-red-800 transition-custom">
                        Masuk di sini
                    </a>
                </p>
            </div>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 shadow-soft animate-fade-in">
                <div class="flex">
                    <i class="fas fa-exclamation-circle text-red-500 mr-3 mt-0.5"></i>
                    <div class="text-sm text-red-700">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form class="mt-6 sm:mt-8 space-y-4 sm:space-y-6" action="/auth/register" method="POST">
            <?= csrf_field() ?>
            <div class="space-y-4">
                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700">
                        Nama Lengkap
                    </label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input id="full_name" name="full_name" type="text" required 
                               class="appearance-none block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-primary focus:border-primary transition-custom" 
                               placeholder="Masukkan nama lengkap"
                               value="<?= old('full_name') ?>">
                    </div>
                    <?php if (isset($errors['full_name'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?= $errors['full_name'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                        Username
                    </label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-at text-gray-400"></i>
                        </div>
                        <input id="username" name="username" type="text" required 
                               class="appearance-none block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-primary focus:border-primary transition-custom" 
                               placeholder="Pilih username unik"
                               value="<?= old('username') ?>">
                    </div>
                    <?php if (isset($errors['username'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?= $errors['username'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email
                    </label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="email" required 
                               class="appearance-none block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-primary focus:border-primary transition-custom" 
                               placeholder="Masukkan alamat email"
                               value="<?= old('email') ?>">
                    </div>
                    <?php if (isset($errors['email'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?= $errors['email'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required 
                               class="appearance-none block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-primary focus:border-primary transition-custom" 
                               placeholder="Minimal 6 karakter">
                    </div>
                    <?php if (isset($errors['password'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?= $errors['password'] ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="password_confirm" class="block text-sm font-medium text-gray-700">
                        Konfirmasi Password
                    </label>
                    <div class="mt-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password_confirm" name="password_confirm" type="password" required 
                               class="appearance-none block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-primary focus:border-primary transition-custom" 
                               placeholder="Ulangi password">
                    </div>
                    <?php if (isset($errors['password_confirm'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?= $errors['password_confirm'] ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-primary to-red-700 hover:from-red-700 hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-custom btn-hover">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-user-plus text-red-300 group-hover:text-red-200"></i>
                    </span>
                    Daftar
                </button>
            </div>

            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Dengan mendaftar, Anda menyetujui 
                    <a href="#" class="text-primary hover:text-red-800 transition-custom">Syarat & Ketentuan</a> 
                    dan 
                    <a href="#" class="text-primary hover:text-red-800 transition-custom">Kebijakan Privasi</a>
                </p>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>