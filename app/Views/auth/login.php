<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="min-h-screen flex flex-col lg:flex-row bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Left Side - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center py-8 sm:py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-6 sm:space-y-8 bg-white p-8 sm:p-10 rounded-2xl shadow-xl animate-fade-in-up">
            <div>
                <div class="text-center">
                    <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary to-red-700 mb-3">Lampung Cerdas</h1>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Selamat Datang Kembali</h2>
                    <div class="h-1 w-20 bg-primary mx-auto mb-5 rounded-full"></div>
                    <p class="text-base text-gray-600">
                        Atau 
                        <a href="/auth/register" class="font-medium text-primary hover:text-red-800 transition-custom underline">
                            daftar akun baru
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

            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-50 border-l-4 border-green-500 rounded-lg p-5 shadow-md animate-fade-in">
                    <div class="flex">
                        <i class="fas fa-check-circle text-green-500 text-xl mr-4 mt-0.5"></i>
                        <div class="text-sm text-green-700">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form class="mt-8 space-y-6" action="/auth/login" method="POST">
                <?= csrf_field() ?>
                <div class="space-y-5 sm:space-y-6">
                    <div>
                        <label for="login" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Email atau Username
                        </label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-primary"></i>
                            </div>
                            <input id="login" name="login" type="text" required 
                                   class="appearance-none block w-full pl-10 px-3 py-3.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200" 
                                   placeholder="Masukkan email atau username"
                                   value="<?= old('login') ?>">
                        </div>
                        <?php if (isset($errors['login'])): ?>
                            <p class="mt-1.5 text-sm text-red-600"><?= $errors['login'] ?></p>
                        <?php endif; ?>
                    </div>

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
                                   placeholder="Masukkan password">
                        </div>
                        <?php if (isset($errors['password'])): ?>
                            <p class="mt-1.5 text-sm text-red-600"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between sm:space-y-0 space-y-3 mb-2">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" 
                               class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded transition-custom">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            Ingat saya
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="/auth/forgot-password" class="font-medium text-primary hover:text-red-800 transition-custom underline">
                            Lupa password?
                        </a>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-base font-medium rounded-lg text-white bg-gradient-to-r from-primary to-red-700 hover:from-red-700 hover:to-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-sign-in-alt text-red-300 group-hover:text-red-200"></i>
                        </span>
                        Masuk Sekarang
                    </button>
                </div>

                <div class="text-center text-sm text-gray-600 border-t border-gray-200 pt-4 mt-4">
                    <p>
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
        <div class="absolute inset-0 bg-pattern opacity-10"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white p-8 mx-auto max-w-lg animate-fade-in-right">
                <div class="mb-8 bg-white/10 p-6 rounded-full inline-block">
                    <i class="fas fa-graduation-cap text-7xl text-yellow-300"></i>
                </div>
                <h2 class="text-3xl font-bold mb-6">Temukan Jurusan Impian Anda</h2>
                <p class="text-xl text-red-100 max-w-md mx-auto leading-relaxed">
                    Tes kepribadian komprehensif untuk menemukan jurusan ideal yang sesuai dengan minat, bakat, dan kekuatan Anda
                </p>
                
                <div class="mt-12">
                    <div class="flex justify-center">
                        <div class="flex -space-x-4">
                            <img src="/images/avatar-1.jpg" alt="User" class="w-12 h-12 rounded-full border-2 border-white shadow-lg">
                            <img src="/images/avatar-2.jpg" alt="User" class="w-12 h-12 rounded-full border-2 border-white shadow-lg">
                            <img src="/images/Avatar-3.jpg" alt="User" class="w-12 h-12 rounded-full border-2 border-white shadow-lg">
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-red-100">Bergabung dengan 1,000+ pengguna lainnya</p>
                </div>
            </div>
        </div>
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
    .animate-fade-in-right {
        animation: fadeInRight 0.7s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInRight {
        from { opacity: 0; transform: translateX(20px); }
        to { opacity: 1; transform: translateX(0); }
    }
    .transition-custom {
        transition: all 0.3s ease;
    }
    .bg-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
</style>
<?= $this->endSection() ?>