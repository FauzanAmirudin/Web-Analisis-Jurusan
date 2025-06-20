<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard - Lampung Cerdas' ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/logo.png">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7C0A02',
                        secondary: '#D9D9D9',
                        accent: '#DC2626'
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif']
                    },
                    boxShadow: {
                        'soft': '0 4px 20px rgba(0, 0, 0, 0.05)',
                        'custom': '0 4px 15px rgba(0, 0, 0, 0.08)'
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #ccc;
        }
        /* Smooth transitions */
        .transition-custom {
            transition: all 0.3s ease;
        }
        /* Button hover effect */
        .btn-hover:hover {
            transform: translateY(-2px);
        }
        /* Active nav item */
        .nav-item-active {
            background: linear-gradient(to right, #7C0A02, #9B0A04);
            color: white;
            box-shadow: 0 4px 10px rgba(124, 10, 2, 0.2);
        }
        /* Dropdown menu */
        .dropdown-menu {
            z-index: 100;
        }
    </style>
</head>
<body class="h-full">
    <div x-data="{ sidebarOpen: false }" class="flex h-full">
        <!-- Sidebar - Default hidden on all screen sizes -->
        <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-custom transform transition-transform duration-300 ease-in-out -translate-x-full" 
             :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">
            <div class="bg-gradient-to-r from-primary to-red-800 h-16 flex items-center justify-between px-4">
                <div class="flex items-center">
                    <img src="/images/logo.png" alt="Lampung Cerdas Logo" class="h-8 mr-2">
                    <h1 class="text-xl font-bold text-white">Lampung Cerdas</h1>
                </div>
                <button @click="sidebarOpen = false" class="text-white hover:text-gray-200 lg:hidden">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <nav class="mt-8">
                <div class="px-4 space-y-2">
                <a href="/" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-custom <?= uri_string() === 'home' ? 'nav-item-active text-white' : '' ?>">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Home
                    </a>
                    <a href="/dashboard" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-custom <?= uri_string() === 'dashboard' ? 'nav-item-active text-white' : '' ?>">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    
                    <a href="/test/start" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-custom">
                        <i class="fas fa-play mr-3"></i>
                        Mulai Tes
                    </a>
                    
                    <a href="/dashboard/history" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-custom <?= uri_string() === 'dashboard/history' ? 'nav-item-active text-white' : '' ?>">
                        <i class="fas fa-history mr-3"></i>
                        Riwayat Tes
                    </a>
                    
                    <a href="/dashboard/profile" 
                       class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-custom <?= uri_string() === 'dashboard/profile' ? 'nav-item-active text-white' : '' ?>">
                        <i class="fas fa-user mr-3"></i>
                        Profil
                    </a>
                </div>
                
                <div class="mt-10 pt-8 border-t border-gray-100">
                    <div class="px-4">
                        <a href="/auth/logout" 
                           class="flex items-center px-4 py-3 text-red-600 rounded-lg hover:bg-red-50 transition-custom"
                           onclick="return confirm('Yakin ingin logout?')">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content - Full width by default -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Top Bar -->
            <div class="bg-white shadow-soft sticky top-0 z-40">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <button @click="sidebarOpen = !sidebarOpen" 
                                    class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 transition-custom">
                                <i class="fas fa-bars text-xl"></i>
                            </button>
                            <h1 class="ml-4 text-xl font-semibold text-gray-900">
                                <?= $page_title ?? 'Dashboard' ?>
                            </h1>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" 
                                        class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-custom">
                                    <img class="h-9 w-9 rounded-full object-cover border-2 border-gray-200" 
                                         src="<?= session('profile_picture') ? '/uploads/profiles/' . session('profile_picture') : 'https://ui-avatars.com/api/?name=' . urlencode(session('full_name')) . '&background=7C0A02&color=fff' ?>" 
                                         alt="Profile">
                                    <span class="ml-2 text-gray-700 font-medium"><?= session('full_name') ?></span>
                                    <i class="fas fa-chevron-down ml-1 text-gray-400"></i>
                                </button>
                                
                                <div x-show="open" @click.away="open = false" x-transition
                                     class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 dropdown-menu">
                                    <div class="py-1">
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="py-8 flex-1">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Flash Messages -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div x-data="{ show: true }" x-show="show" x-transition class="mb-6">
                            <div class="bg-green-50 border border-green-200 rounded-lg p-4 shadow-soft">
                                <div class="flex">
                                    <i class="fas fa-check-circle text-green-500 mr-3 mt-0.5"></i>
                                    <div class="flex-1">
                                        <p class="text-sm text-green-700"><?= session()->getFlashdata('success') ?></p>
                                    </div>
                                    <button @click="show = false" class="text-green-400 hover:text-green-600 transition-custom">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div x-data="{ show: true }" x-show="show" x-transition class="mb-6">
                            <div class="bg-red-50 border border-red-200 rounded-lg p-4 shadow-soft">
                                <div class="flex">
                                    <i class="fas fa-exclamation-circle text-red-500 mr-3 mt-0.5"></i>
                                    <div class="flex-1">
                                        <p class="text-sm text-red-700"><?= session()->getFlashdata('error') ?></p>
                                    </div>
                                    <button @click="show = false" class="text-red-400 hover:text-red-600 transition-custom">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?= $this->renderSection('content') ?>
                </div>
            </main>
        </div>

        <!-- Sidebar Overlay -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" 
             class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75" x-transition></div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>