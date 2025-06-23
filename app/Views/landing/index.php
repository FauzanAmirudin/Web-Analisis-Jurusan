<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-soft sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3">
                <div class="flex items-center">
                    <div class="flex-shrink-0 mr-2 sm:mr-3">
                        <img src="/images/logo.png" alt="Lampung Cerdas Logo" class="h-8 sm:h-10">
                    </div>
                    <h1 class="text-xl sm:text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-red-700">Lampung Cerdas</h1>
                </div>
                
                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button type="button" class="mobile-menu-button text-gray-700 hover:text-primary focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                
                <!-- Desktop menu -->
                <div class="hidden sm:flex items-center space-x-4">
                    <?php if (isset($is_logged_in) && $is_logged_in): ?>
                    <!-- User is logged in - Show profile dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-custom">
                            <img class="h-8 w-8 rounded-full object-cover border-2 border-gray-200" 
                                 src="<?= isset($user['profile_picture']) && $user['profile_picture'] ? '/uploads/profiles/' . $user['profile_picture'] : 'https://ui-avatars.com/api/?name=' . urlencode($user['full_name'] ?? 'User') . '&background=7C0A02&color=fff' ?>" 
                                 alt="Profile">
                            <span class="ml-2 text-gray-700 font-medium"><?= $user['full_name'] ?? 'User' ?></span>
                            <i class="fas fa-chevron-down ml-1 text-gray-400"></i>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" x-transition
                             class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 dropdown-menu">
                            <div class="py-1">
                                <a href="/dashboard" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-custom">
                                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                                </a>
                                <a href="/dashboard/profile" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-custom">
                                    <i class="fas fa-user mr-2"></i>Profil
                                </a>
                                <a href="/auth/logout" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-custom"
                                   onclick="return confirm('Yakin ingin logout?')">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <!-- User is not logged in - Show login/register buttons -->
                    <a href="/auth/login" class="text-gray-700 hover:text-primary font-medium transition-custom text-base">Masuk</a>
                    <a href="/auth/register" class="bg-gradient-to-r from-primary to-red-700 text-white px-6 py-2 rounded-lg hover:shadow-lg hover:from-red-700 hover:to-primary transition-custom btn-hover text-base">Daftar</a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div class="mobile-menu hidden sm:hidden pb-2">
                <?php if (isset($is_logged_in) && $is_logged_in): ?>
                <!-- User is logged in - Mobile view -->
                <a href="/dashboard" class="block py-2 text-gray-700 hover:text-primary font-medium transition-custom">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
                <a href="/dashboard/profile" class="block py-2 text-gray-700 hover:text-primary font-medium transition-custom">
                    <i class="fas fa-user mr-2"></i>Profil
                </a>
                <a href="/auth/logout" class="block py-2 text-primary font-medium hover:text-red-700 transition-custom" onclick="return confirm('Yakin ingin logout?')">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </a>
                <?php else: ?>
                <!-- User is not logged in - Mobile view -->
                <a href="/auth/login" class="block py-2 text-gray-700 hover:text-primary font-medium transition-custom">Masuk</a>
                <a href="/auth/register" class="block py-2 text-primary font-medium hover:text-red-700 transition-custom">Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary to-red-800 text-white relative overflow-hidden pb-20 sm:pb-32">
        <div class="absolute inset-0 bg-pattern opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 md:py-28 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl md:text-6xl font-bold mb-4 sm:mb-6 leading-tight px-2 sm:px-0">
                    Temukan Jurusan yang <br class="hidden sm:block">
                    <span class="text-yellow-300 relative inline-block">
                        Tepat Untukmu
                        <svg class="absolute -bottom-1 left-0 w-full hidden sm:block" viewBox="0 0 338 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 5.26001C36.9976 3.23185 139.189 1.35327 162.32 5.26001C185.45 9.16675 202.3 9.31436 225.782 8.28001C249.264 7.24566 328.355 -0.881905 337 3.21249" stroke="#FCD34D" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </span>
                </h1>
                <p class="text-lg sm:text-xl md:text-2xl mb-6 sm:mb-10 max-w-3xl mx-auto text-red-100 leading-relaxed px-4 sm:px-0">
                    Tes analisis kepribadian komprehensif untuk menemukan jurusan kuliah yang sesuai dengan minat, bakat, dan kepribadian Anda
                </p>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center px-4 sm:px-0">
                    <a href="/auth/register" class="bg-yellow-400 text-gray-900 px-6 sm:px-8 py-3 sm:py-4 rounded-lg font-semibold text-base sm:text-lg hover:bg-yellow-300 hover:shadow-lg transition-custom btn-hover">
                        Mulai Sekarang
                    </a>
                    <!-- <a href="#features" class="border-2 border-white/60 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-lg font-semibold text-base sm:text-lg hover:bg-white/10 transition-custom mt-3 sm:mt-0">
                        Pelajari Lebih Lanjut
                    </a> -->
                </div>
            </div>
        </div>
        
        <!-- Wave Separator -->
        <div class="absolute bottom-0 left-0 right-0 w-full overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-28 sm:h-32 md:h-48 lg:h-56" preserveAspectRatio="none">
                <path fill="#ffffff" fill-opacity="1" d="M0,192L48,176C96,160,192,128,288,138.7C384,149,480,203,576,202.7C672,203,768,149,864,138.7C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 sm:py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-4 relative inline-block">
                    Mengapa Pilih Lampung Cerdas?
                    <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-16 sm:w-24 h-1 bg-primary rounded-full"></div>
                </h2>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto mt-4 sm:mt-6">
                    Dapatkan rekomendasi jurusan yang akurat berdasarkan analisis kepribadian mendalam
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8 md:gap-10">
                <div class="text-center p-6 sm:p-8 rounded-xl hover:shadow-custom transition-custom bg-gray-50/50 hover:bg-white">
                    <div class="bg-primary/10 w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-brain text-2xl sm:text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-4 text-gray-900">Analisis Mendalam</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        Tes kepribadian komprehensif yang menganalisis minat, bakat, dan gaya belajar Anda secara detail
                    </p>
                </div>

                <div class="text-center p-6 sm:p-8 rounded-xl hover:shadow-custom transition-custom bg-gray-50/50 hover:bg-white">
                    <div class="bg-primary/10 w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-graduation-cap text-2xl sm:text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-4 text-gray-900">Rekomendasi Akurat</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        Dapatkan rekomendasi jurusan teratas dengan tingkat kesesuaian yang tinggi dengan kepribadian Anda
                    </p>
                </div>

                <div class="text-center p-6 sm:p-8 rounded-xl hover:shadow-custom transition-custom bg-gray-50/50 hover:bg-white sm:col-span-2 md:col-span-1 mx-auto sm:max-w-md md:max-w-none">
                    <div class="bg-primary/10 w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                        <i class="fas fa-chart-line text-2xl sm:text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-4 text-gray-900">Prospek Karier</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        Informasi lengkap tentang prospek karier dan peluang kerja untuk setiap jurusan yang direkomendasikan
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 sm:py-24 bg-gray-50 relative">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-dots opacity-20"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-10 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-4 relative inline-block">
                    Cara Kerja Tes Kami
                    <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-16 sm:w-24 h-1 bg-primary rounded-full"></div>
                </h2>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 mt-4 sm:mt-6">
                    Proses sederhana dalam 3 langkah untuk menemukan jurusan ideal Anda
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8 md:gap-10">
                <div class="text-center bg-white p-6 sm:p-8 rounded-xl shadow-soft hover:shadow-custom transition-custom">
                    <div class="bg-primary w-12 h-12 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6 text-lg sm:text-xl font-bold text-white">
                        1
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-4 text-gray-900">Isi Tes Kepribadian</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        Jawab 52 pertanyaan tentang minat, preferensi, dan gaya kepribadian Anda. Estimasi waktu: 15-20 menit.
                    </p>
                </div>

                <div class="text-center bg-white p-6 sm:p-8 rounded-xl shadow-soft hover:shadow-custom transition-custom">
                    <div class="bg-primary w-12 h-12 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6 text-lg sm:text-xl font-bold text-white">
                        2
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-4 text-gray-900">Analisis Otomatis</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        Sistem kami menganalisis jawaban Anda menggunakan metode psikologi teruji untuk menentukan profil kepribadian.
                    </p>
                </div>

                <div class="text-center bg-white p-6 sm:p-8 rounded-xl shadow-soft hover:shadow-custom transition-custom sm:col-span-2 md:col-span-1 mx-auto sm:max-w-md md:max-w-none">
                    <div class="bg-primary w-12 h-12 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6 text-lg sm:text-xl font-bold text-white">
                        3
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-4 text-gray-900">Terima Hasil</h3>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
                        Dapatkan laporan lengkap dengan rekomendasi jurusan, analisis kepribadian, dan panduan pengembangan karier.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- E-Book Section -->
    <section class="py-16 sm:py-24 bg-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-gray-50 to-white opacity-70"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-center">
                <!-- Left Side - Book Image -->
                <div class="flex justify-center lg:justify-center lg:pr-0">
                    <div class="relative w-48 sm:w-56 md:w-72 transform transition-transform hover:scale-105 duration-500 lg:mr-0">
                        <div class="absolute inset-0 bg-primary/10 rounded-lg transform rotate-3"></div>
                        <div class="shadow-2xl rounded-lg overflow-hidden relative z-10">
                            <img src="/images/cover-ebook.jpg" alt="E-Book Analisis Minat" class="w-full h-auto">
                        </div>
                        <div class="absolute -bottom-4 -left-4 w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center text-primary font-bold z-20">
                            <span class="text-sm">GRATIS</span>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Text Content -->
                <div class="lg:pl-4">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-4 sm:mb-6">
                        Panduan Lengkap Pemilihan Jurusan
                    </h2>
                    <div class="h-1 w-20 bg-primary mb-6 sm:mb-8"></div>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed mb-4 sm:mb-6">
                        Ingin memahami lebih dalam mengapa analisis kepribadian sangat penting dalam pemilihan jurusan?
                    </p>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed mb-6 sm:mb-8">
                        E-book kami berisi penelitian terkini, studi kasus, dan panduan komprehensif tentang hubungan antara tipe kepribadian dan kesuksesan akademik. Dapatkan wawasan mendalam dari para ahli psikologi pendidikan dan konselor karier profesional.
                    </p>
                    <ul class="space-y-3 mb-8 sm:mb-10">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                            <span class="text-gray-700">Rahasia memilih jurusan yang sesuai dengan kepribadian Anda</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                            <span class="text-gray-700">Tips memaksimalkan potensi berdasarkan tipe kepribadian Anda</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                            <span class="text-gray-700">Strategi pengembangan karier jangka panjang</span>
                        </li>
                    </ul>
                    <div class="flex justify-center lg:justify-start">
                        <a href="https://example.com/ebook-download" target="_blank" rel="noopener noreferrer" 
                           class="bg-gradient-to-r from-primary to-red-700 text-white px-8 py-4 rounded-lg font-semibold text-lg inline-flex items-center hover:shadow-lg hover:from-red-700 hover:to-primary transition-custom btn-hover group">
                            <span>Download E-Book Gratis</span>
                            <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 sm:py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary to-red-700"></div>
        <div class="absolute inset-0 bg-circles opacity-10"></div>
        
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8 relative z-10">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 sm:mb-6 text-white">
                Siap Menemukan Jurusan Impian Anda?
            </h2>
            <p class="text-base sm:text-lg md:text-xl mb-6 sm:mb-10 text-red-100 leading-relaxed">
                Bergabung dengan ribuan siswa yang telah menemukan jurusan yang tepat dengan bantuan analisis kepribadian kami
            </p>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 justify-center">
                <a href="/auth/register" class="bg-yellow-400 text-gray-900 px-6 sm:px-8 py-3 sm:py-4 rounded-lg font-semibold text-base sm:text-lg hover:bg-yellow-300 hover:shadow-lg transition-custom btn-hover">
                    Daftar Gratis Sekarang
                </a>
                <a href="/auth/login" class="border-2 border-white/70 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-lg font-semibold text-base sm:text-lg hover:bg-white/10 transition-custom">
                    Sudah Punya Akun?
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-4">
                <div class="col-span-1 sm:col-span-2">
                    <div class="flex items-center mb-4">
                        <img src="/images/logo.png" alt="Lampung Cerdas Logo" class="h-8 sm:h-10 mr-2 sm:mr-3">
                        <h3 class="text-lg sm:text-2xl font-bold">Lampung Cerdas</h3>
                    </div>
                    <p class="text-gray-400 mb-6 leading-relaxed text-sm sm:text-base">
                        Platform terpercaya untuk membantu siswa menemukan jurusan kuliah yang sesuai dengan kepribadian dan minat mereka.
                    </p>
                    <div class="flex space-x-3 sm:space-x-4">
                        <a href="https://www.youtube.com/@lampungcerdas" target="_blank" rel="noopener noreferrer" class="bg-gray-800 w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center hover:bg-primary transition-custom">
                            <i class="fab fa-youtube text-sm sm:text-base"></i>
                        </a>
                        <a href="https://www.tiktok.com/@lampungcerdas" target="_blank" rel="noopener noreferrer" class="bg-gray-800 w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center hover:bg-primary transition-custom">
                            <i class="fab fa-tiktok text-sm sm:text-base"></i>
                        </a>
                        <a href="https://www.instagram.com/lampungcerdas" target="_blank" rel="noopener noreferrer" class="bg-gray-800 w-8 h-8 sm:w-10 sm:h-10 rounded-full flex items-center justify-center hover:bg-primary transition-custom">
                            <i class="fab fa-instagram text-sm sm:text-base"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold mb-3 sm:mb-4 text-base sm:text-lg">Layanan</h4>
                    <ul class="space-y-2 sm:space-y-3 text-sm sm:text-base">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-custom">Tes Kepribadian</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-custom">Rekomendasi Jurusan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-3 sm:mb-4 text-base sm:text-lg mt-4 sm:mt-0">Kontak</h4>
                    <ul class="space-y-2 sm:space-y-3 text-sm sm:text-base">
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-2 sm:mr-3"></i> 
                            <span>it@lampungcerdas.com</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone mt-1 mr-2 sm:mr-3"></i>
                            <span>+62 811-737-1015</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2 sm:mr-3"></i>
                            <span>Lampung, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 sm:mt-12 pt-6 sm:pt-8 text-center text-gray-400 text-sm sm:text-base">
                <p>&copy; 2024 Lampung Cerdas. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div x-data="{ show: true }" x-show="show" x-transition class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <?= session()->getFlashdata('success') ?>
            <button @click="show = false" class="ml-4 text-white hover:text-gray-200">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Animations on scroll
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.animate');
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            if (elementTop < windowHeight - 100) {
                element.classList.add('animated');
            }
        });
    }
    
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Initial check and listen for scroll
    window.addEventListener('scroll', animateOnScroll);
    document.addEventListener('DOMContentLoaded', animateOnScroll);
</script>
<?= $this->endSection() ?>