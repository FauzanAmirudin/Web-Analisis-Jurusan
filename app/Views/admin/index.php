<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 md:mb-0">Dashboard Admin</h2>
        <div class="flex items-center space-x-2">
            <span class="text-sm text-gray-500"><?= date('d M Y') ?></span>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card: Total Users -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-6 shadow-sm transition-all hover:shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-blue-600 font-medium">Total Pengguna</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1"><?= $total_users ?></h3>
                </div>
                <div class="bg-blue-500 rounded-lg p-3 text-white">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="/admin/users" class="text-sm text-blue-600 hover:text-blue-800 flex items-center">
                    <span>Lihat Detail</span>
                    <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
        </div>
        
        <!-- Card: Active Users -->
        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-6 shadow-sm transition-all hover:shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-green-600 font-medium">Pengguna Aktif</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1"><?= $active_users ?></h3>
                </div>
                <div class="bg-green-500 rounded-lg p-3 text-white">
                    <i class="fas fa-user-check text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="/admin/users?status=1" class="text-sm text-green-600 hover:text-green-800 flex items-center">
                    <span>Lihat Detail</span>
                    <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
        </div>
        
        <!-- Card: New Users Today -->
        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-6 shadow-sm transition-all hover:shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-purple-600 font-medium">Pengguna Baru Hari Ini</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1"><?= $new_users_today ?></h3>
                </div>
                <div class="bg-purple-500 rounded-lg p-3 text-white">
                    <i class="fas fa-user-plus text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="/admin/users?date_from=<?= date('Y-m-d') ?>&date_to=<?= date('Y-m-d') ?>" class="text-sm text-purple-600 hover:text-purple-800 flex items-center">
                    <span>Lihat Detail</span>
                    <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-soft p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Akses Cepat</h3>
        <div class="space-y-4">
            <a href="/admin/users/create" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-all">
                <div class="bg-blue-100 text-blue-600 p-3 rounded-lg mr-4">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div>
                    <h4 class="text-base font-medium text-gray-700">Tambah Pengguna Baru</h4>
                    <p class="text-sm text-gray-500">Daftarkan pengguna baru ke sistem</p>
                </div>
                <i class="fas fa-chevron-right ml-auto text-gray-400"></i>
            </a>
            
            <a href="/admin/users?status=0" class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition-all">
                <div class="bg-orange-100 text-orange-600 p-3 rounded-lg mr-4">
                    <i class="fas fa-user-slash"></i>
                </div>
                <div>
                    <h4 class="text-base font-medium text-gray-700">Pengguna Tidak Aktif</h4>
                    <p class="text-sm text-gray-500">Kelola pengguna yang dinonaktifkan</p>
                </div>
                <i class="fas fa-chevron-right ml-auto text-gray-400"></i>
            </a>
        </div>
    </div>
    
    <!-- System Info -->
    <div class="bg-white rounded-xl shadow-soft p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Sistem</h3>
        <div class="space-y-3">
            <div class="flex justify-between py-2 border-b border-gray-100">
                <span class="text-gray-600">PHP Version</span>
                <span class="font-medium"><?= phpversion() ?></span>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-100">
                <span class="text-gray-600">CodeIgniter Version</span>
                <span class="font-medium"><?= \CodeIgniter\CodeIgniter::CI_VERSION ?></span>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-100">
                <span class="text-gray-600">Server</span>
                <span class="font-medium"><?= $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' ?></span>
            </div>
            <div class="flex justify-between py-2">
                <span class="text-gray-600">Waktu Server</span>
                <span class="font-medium"><?= date('Y-m-d H:i:s') ?></span>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 