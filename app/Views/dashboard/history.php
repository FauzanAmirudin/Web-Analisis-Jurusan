<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="container px-6 py-8 mx-auto">
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-gray-800">Riwayat Tes</h1>
        <p class="text-gray-600">Daftar semua tes kepribadian yang telah Anda selesaikan</p>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->has('error')): ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
        <p><?= session('error') ?></p>
    </div>
    <?php endif; ?>

    <?php if (session()->has('success')): ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
        <p><?= session('success') ?></p>
    </div>
    <?php endif; ?>

    <!-- Test History Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <?php if (empty($history)): ?>
            <div class="p-8 text-center">
                <div class="text-gray-400 mb-4">
                    <i class="fas fa-history text-5xl"></i>
                </div>
                <h3 class="text-xl font-medium text-gray-700 mb-2">Belum Ada Riwayat Tes</h3>
                <p class="text-gray-500 mb-6">Anda belum menyelesaikan tes kepribadian apa pun.</p>
                <a href="/test/start" class="bg-primary text-white px-6 py-2 rounded-lg font-medium hover:bg-red-800 transition duration-200">
                    Mulai Tes Sekarang
                </a>
            </div>
        <?php else: ?>
            <!-- Responsive table: visible on medium screens and above -->
            <div class="hidden md:block">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Tes
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tipe Kepribadian
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Kepribadian
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach($history as $index => $item): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?= $index + 1 ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    <?= date('d M Y', strtotime($item['completed_at'] ?? $item['created_at'])) ?>
                                </div>
                                <div class="text-xs text-gray-500">
                                    <?= date('H:i', strtotime($item['completed_at'] ?? $item['created_at'])) ?> WIB
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary bg-opacity-10 text-primary">
                                    <?= $item['personality_type'] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <?= $item['personality_name'] ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="<?= site_url('dashboard/history/'.$item['id']) ?>" class="text-primary hover:text-red-800">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="<?= site_url('dashboard/history/pdf/'.$item['id']) ?>" class="text-gray-600 hover:text-gray-900 ml-3">
                                        <i class="fas fa-download"></i> PDF
                                    </a>
                                    <a href="<?= site_url('dashboard/history/delete/'.$item['id']) ?>" 
                                       class="text-red-600 hover:text-red-800 ml-3 delete-test-btn">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Mobile cards: visible on small screens -->
            <div class="md:hidden">
                <?php foreach($history as $index => $item): ?>
                <div class="border-b border-gray-200 p-4">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <div class="text-sm font-medium text-gray-900">Tes #<?= $index + 1 ?></div>
                            <div class="text-xs text-gray-500">
                                <?= date('d M Y', strtotime($item['completed_at'] ?? $item['created_at'])) ?>, 
                                <?= date('H:i', strtotime($item['completed_at'] ?? $item['created_at'])) ?> WIB
                            </div>
                        </div>
                        <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-primary bg-opacity-10 text-primary">
                            <?= $item['personality_type'] ?>
                        </span>
                    </div>
                    <div class="mb-3">
                        <div class="text-sm font-medium text-gray-700">Nama Kepribadian:</div>
                        <div class="text-sm text-gray-900"><?= $item['personality_name'] ?></div>
                    </div>
                    <div class="flex space-x-4 pt-2 border-t border-gray-100">
                        <a href="<?= site_url('dashboard/history/'.$item['id']) ?>" class="flex items-center text-primary hover:text-red-800">
                            <i class="fas fa-eye mr-1"></i> <span>Lihat</span>
                        </a>
                        <a href="<?= site_url('dashboard/history/pdf/'.$item['id']) ?>" class="flex items-center text-gray-600 hover:text-gray-900">
                            <i class="fas fa-download mr-1"></i> <span>PDF</span>
                        </a>
                        <a href="<?= site_url('dashboard/history/delete/'.$item['id']) ?>" 
                          class="flex items-center text-red-600 hover:text-red-800 delete-test-btn">
                            <i class="fas fa-trash mr-1"></i> <span>Hapus</span>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <a href="/test/start" class="text-primary hover:text-red-800 font-medium">
                    <i class="fas fa-plus-circle mr-1"></i> Lakukan Tes Baru
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Delete confirmation modal -->
<div x-data="deleteConfirmation" class="relative z-50">
    <!-- Modal backdrop with blur effect -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm" 
         @click="closeModal()"></div>

    <!-- Modal dialog with improved animation -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-90 translate-y-4"
         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 transform scale-90 translate-y-4"
         class="fixed inset-0 flex items-center justify-center z-50 p-4">
        
        <div class="bg-white rounded-2xl shadow-2xl max-w-md mx-auto overflow-hidden w-full border border-red-100" 
             @click.away="closeModal()" 
             x-transition:enter="transition ease-out duration-300 delay-150"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100">
            
            <!-- Header with gradient background -->
            <div class="bg-gradient-to-r from-red-500 to-red-700 px-6 py-5 border-b border-red-300/30">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="bg-white/20 backdrop-blur-sm p-3 rounded-full shadow-lg">
                            <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white ml-4 tracking-wide">Konfirmasi Hapus</h3>
                    </div>
                    <button @click="closeModal()" class="text-white/80 hover:text-white hover:bg-white/10 h-8 w-8 rounded-full flex items-center justify-center transition-all duration-200">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <!-- Content with icon -->
            <div class="px-6 py-6 flex items-start">
                <div class="mr-4 mt-1 text-red-500 text-4xl hidden sm:block">
                    <i class="fas fa-trash-alt"></i>
                </div>
                <div>
                    <h4 class="text-gray-800 font-semibold text-lg mb-2">Hapus Riwayat Tes</h4>
                    <p class="text-gray-600">Apakah Anda yakin ingin menghapus riwayat tes ini? Tindakan ini <span class="font-semibold text-red-500">tidak dapat</span> dibatalkan.</p>
                </div>
            </div>
            
            <!-- Action buttons with improved styling -->
            <div class="px-6 py-4 bg-gray-50 flex justify-end gap-3 border-t border-gray-200">
                <button @click="closeModal()" 
                        class="px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 hover:shadow-sm transition-all duration-200 font-medium flex items-center">
                    <i class="fas fa-times mr-2 text-gray-400"></i>
                    Batal
                </button>
                <button @click="confirmDelete()" 
                        class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-700 hover:to-red-800 hover:shadow-md transition-all duration-200 font-medium flex items-center group">
                    <i class="fas fa-trash-alt mr-2 transform group-hover:scale-110 transition-transform duration-200"></i>
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Define Alpine.js component
    document.addEventListener('alpine:init', () => {
        Alpine.data('deleteConfirmation', () => ({
            open: false,
            deleteUrl: '',
            openModal(url) {
                this.deleteUrl = url;
                this.open = true;
            },
            closeModal() {
                this.open = false;
            },
            confirmDelete() {
                window.location.href = this.deleteUrl;
            }
        }));
    });
    
    // Setup click handlers for delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-test-btn');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                
                // Get Alpine.js component instance and call its method
                const modal = Alpine.store('deleteConfirmation');
                if (modal) {
                    modal.openModal(url);
                } else {
                    // Fallback - access the Alpine component directly
                    const modalEl = document.querySelector('[x-data="deleteConfirmation"]');
                    if (modalEl && modalEl.__x) {
                        modalEl.__x.getUnobservedData().openModal(url);
                    } else {
                        // Ultimate fallback - normal confirmation
                        if (confirm('Apakah Anda yakin ingin menghapus riwayat tes ini?')) {
                            window.location.href = url;
                        }
                    }
                }
            });
        });
    });
</script>
<?= $this->endSection() ?> 