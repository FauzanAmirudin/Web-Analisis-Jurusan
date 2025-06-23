<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-1">Log Aktivitas Pengguna</h2>
            <p class="text-gray-600 text-sm"><?= esc($user['full_name']) ?> (<?= esc($user['email']) ?>)</p>
        </div>
        <a href="/admin/users/edit/<?= $user['id'] ?>" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg shadow-sm hover:bg-gray-200 transition-all mt-4 md:mt-0">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali ke Profil</span>
        </a>
    </div>
    
    <div class="bg-gray-50 rounded-lg p-4 mb-6 border border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0 h-12 w-12">
                    <?php if (!empty($user['profile_picture'])): ?>
                        <img class="h-12 w-12 rounded-full object-cover" 
                             src="/uploads/profiles/<?= $user['profile_picture'] ?>" alt="">
                    <?php else: ?>
                        <img class="h-12 w-12 rounded-full" 
                             src="https://ui-avatars.com/api/?name=<?= urlencode($user['full_name']) ?>&background=7C0A02&color=fff" alt="">
                    <?php endif; ?>
                </div>
                <div>
                    <div class="text-sm font-medium text-gray-900"><?= esc($user['full_name']) ?></div>
                    <div class="text-xs text-gray-500">@<?= esc($user['username']) ?></div>
                </div>
            </div>
            
            <div>
                <div class="text-xs text-gray-500 mb-1">Status</div>
                <div>
                    <?php if ($user['is_active']): ?>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <span class="h-1.5 w-1.5 mr-1 rounded-full bg-green-600"></span>
                            Aktif
                        </span>
                    <?php else: ?>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            <span class="h-1.5 w-1.5 mr-1 rounded-full bg-red-600"></span>
                            Tidak Aktif
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            
            <div>
                <div class="text-xs text-gray-500 mb-1">Terakhir Login</div>
                <div class="text-sm font-medium">
                    <?= $user['last_login_at'] ? date('d M Y H:i', strtotime($user['last_login_at'])) : 'Belum pernah login' ?>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Activities Table -->
    <div class="bg-white rounded-lg overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="min-w-full table-striped table-hover">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Aktivitas</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Deskripsi</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Waktu</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($activities)): ?>
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-sm text-gray-500 text-center">
                                Tidak ada data aktivitas yang ditemukan
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($activities as $activity): ?>
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <?php 
                                        $activityIcon = 'fas fa-info-circle text-blue-500';
                                        $activityType = 'Aktivitas';
                                        
                                        // Set icon and label based on activity type
                                        switch ($activity['activity_type']) {
                                            case 'login':
                                                $activityIcon = 'fas fa-sign-in-alt text-green-500';
                                                $activityType = 'Login';
                                                break;
                                            case 'logout':
                                                $activityIcon = 'fas fa-sign-out-alt text-orange-500';
                                                $activityType = 'Logout';
                                                break;
                                            case 'test_started':
                                                $activityIcon = 'fas fa-play text-indigo-500';
                                                $activityType = 'Mulai Tes';
                                                break;
                                            case 'test_completed':
                                                $activityIcon = 'fas fa-check-circle text-green-500';
                                                $activityType = 'Selesai Tes';
                                                break;
                                            case 'profile_updated':
                                                $activityIcon = 'fas fa-user-edit text-blue-500';
                                                $activityType = 'Update Profil';
                                                break;
                                            case 'password_reset':
                                                $activityIcon = 'fas fa-key text-yellow-500';
                                                $activityType = 'Reset Password';
                                                break;
                                            case 'credit_adjustment':
                                                $activityIcon = 'fas fa-coins text-amber-500';
                                                $activityType = 'Perubahan Kredit';
                                                break;
                                            case 'registration':
                                                $activityIcon = 'fas fa-user-plus text-green-500';
                                                $activityType = 'Registrasi';
                                                break;
                                        }
                                        ?>
                                        <i class="<?= $activityIcon ?> mr-3"></i>
                                        <span class="text-sm font-medium text-gray-900"><?= $activityType ?></span>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="text-sm text-gray-700"><?= esc($activity['activity_description']) ?></div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-500"><?= date('d M Y H:i:s', strtotime($activity['created_at'])) ?></div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <?php if (!empty($activities)): ?>
            <div class="px-4 py-3 border-t border-gray-100 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Menampilkan aktivitas terbaru
                </div>
                <div>
                    <?= $pager->links() ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
