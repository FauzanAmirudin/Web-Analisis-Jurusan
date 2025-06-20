<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="min-h-screen flex flex-col lg:flex-row bg-gray-50">
    <!-- Left Side - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center py-8 sm:py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-6 sm:space-y-8">
            <div>
                <div class="text-center">
                    <h1 class="text-2xl sm:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-primary to-red-700 mb-2">Lampung Cerdas</h1>
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1">Selamat Datang Kembali</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Atau 
                        <a href="/auth/register" class="font-medium text-primary hover:text-red-800 transition-custom">
                            daftar akun baru
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

            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-50 border border-green-200 rounded-lg p-4 shadow-soft animate-fade-in">
                    <div class="flex">
                        <i class="fas fa-check-circle text-green-500 mr-3 mt-0.5"></i>
                        <div class="text-sm text-green-700">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form class="mt-6 sm:mt-8 space-y-4 sm:space-y-6" action="/auth/login" method="POST">
                <?= csrf_field() ?>
                <div class="space-y-4 sm:space-y-5">
                    <div>
                        <label for="login" class="block text-sm font-medium text-gray-700">
                            Email atau Username
                        </label>
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input id="login" name="login" type="text" required 
                                   class="appearance-none block w-full pl-10 px-3 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-primary focus:border-primary transition-custom" 
                                   placeholder="Masukkan email atau username"
                                   value="<?= old('login') ?>">
                        </div>
                        <?php if (isset($errors['login'])): ?>
                            <p class="mt-1 text-sm text-red-600"><?= $errors['login'] ?></p>
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
                                   placeholder="Masukkan password">
                        </div>
                        <?php if (isset($errors['password'])): ?>
                            <p class="mt-1 text-sm text-red-600"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between sm:space-y-0 space-y-3">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                               class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded transition-custom">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            Ingat saya
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="/auth/forgot-password" class="font-medium text-primary hover:text-red-800 transition-custom">
                            Lupa password?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-primary to-red-700 hover:from-red-700 hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-custom btn-hover">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-sign-in-alt text-red-300 group-hover:text-red-200"></i>
                        </span>
                        Masuk
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        Belum punya akun? 
                        <a href="/auth/register" class="font-medium text-primary hover:text-red-800 transition-custom">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Right Side - Image/Gradient -->
    <div class="hidden lg:block lg:w-1/2 bg-gradient-to-tr from-primary to-red-700 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQ0MCIgaGVpZ2h0PSI3NjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBmaWxsPSIjRUY0NDQ0IiBvcGFjaXR5PSIuMSIgZD0iTTAgMGgxNDQwdjc2MEgweiIvPjxwYXRoIGQ9Ik0xNDQwIDBIMHY3NjBoMTQ0MFYweiIvPjxwYXRoIGQ9Ik0yNjMgMzc0YzQxLjQyMSAwIDc1IDMzLjU3OSA3NSA3NXMtMzMuNTc5IDc1LTc1IDc1LTc1LTMzLjU3OS03NS03NSAzMy41NzktNzUgNzUtNzV6IiBzdHJva2U9IiNGRkMxMDciIG9wYWNpdHk9Ii41IiBzdHJva2Utd2lkdGg9IjIwIi8+PC9nPjwvc3ZnPg==')]" opacity=".05"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white p-8">
                <div class="mb-6">
                    <i class="fas fa-graduation-cap text-6xl text-yellow-300"></i>
                </div>
                <h2 class="text-3xl font-bold mb-3">Temukan Jurusan Impian Anda</h2>
                <p class="text-xl text-red-100 max-w-md mx-auto">
                    Tes kepribadian komprehensif untuk menemukan jurusan ideal yang sesuai dengan minat, bakat, dan kekuatan Anda
                </p>
                
                <div class="mt-12">
                    <div class="flex justify-center">
                        <div class="flex -space-x-2">
                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=7C0A02&color=fff" alt="User" class="w-10 h-10 rounded-full border-2 border-white">
                            <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=7C0A02&color=fff" alt="User" class="w-10 h-10 rounded-full border-2 border-white">
                            <img src="https://ui-avatars.com/api/?name=Bob+Johnson&background=7C0A02&color=fff" alt="User" class="w-10 h-10 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <p class="mt-3 text-sm text-red-100">Bergabung dengan 1,000+ pengguna lainnya</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
<?= $this->endSection() ?>