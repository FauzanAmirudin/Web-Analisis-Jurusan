<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="space-y-8">
    <!-- Header -->
    <div class="bg-gradient-to-r from-primary to-red-700 rounded-xl p-6 sm:p-8 text-white shadow-custom">
        <h1 class="text-xl sm:text-2xl md:text-3xl font-bold mb-3">Beli Kredit Tes</h1>
        <p class="text-red-100 text-base sm:text-lg">Dapatkan kredit tambahan untuk melakukan tes kepribadian</p>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Current Credits -->
        <div class="bg-white rounded-xl shadow-soft p-6 lg:col-span-1">
            <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-ticket-alt text-primary mr-2"></i>
                Kredit Tes Anda
            </h2>
            
            <div class="text-center py-8">
                <div class="bg-primary/10 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-4xl font-bold text-primary"><?= $user['test_credits'] ?? 0 ?></span>
                </div>
                <p class="text-gray-600">Kredit tersisa</p>
            </div>
            
            <div class="border-t border-gray-100 pt-4 mt-4">
                <p class="text-sm text-gray-500">
                    <i class="fas fa-info-circle mr-2"></i>
                    Setiap kredit dapat digunakan untuk satu kali tes kepribadian lengkap
                </p>
            </div>
        </div>
        
        <!-- Purchase Options -->
        <div class="bg-white rounded-xl shadow-soft p-6 lg:col-span-2">
            <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-shopping-cart text-primary mr-2"></i>
                Pilih Paket
            </h2>
            
            <form action="/payment/processPayment" method="post" class="space-y-6">
                <?= csrf_field() ?>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Package Option 1 -->
                    <div class="border border-gray-200 rounded-xl p-4 relative">
                        <input type="radio" name="amount" value="1" id="amount_1" class="absolute top-4 right-4">
                        <label for="amount_1" class="block cursor-pointer">
                            <div class="text-center mb-4">
                                <span class="text-3xl font-bold text-primary">1</span>
                                <p class="text-gray-700 font-medium">Kredit Tes</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg text-center">
                                <span class="text-lg font-bold text-gray-900">Rp 50.000</span>
                            </div>
                        </label>
                    </div>
                    
                    <!-- Package Option 2 -->
                    <div class="border border-gray-200 rounded-xl p-4 relative">
                        <input type="radio" name="amount" value="3" id="amount_3" class="absolute top-4 right-4" checked>
                        <label for="amount_3" class="block cursor-pointer">
                            <div class="text-center mb-4">
                                <span class="text-3xl font-bold text-primary">3</span>
                                <p class="text-gray-700 font-medium">Kredit Tes</p>
                                <span class="bg-yellow-400 text-yellow-800 text-xs px-2 py-1 rounded-full">Populer</span>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg text-center">
                                <span class="text-lg font-bold text-gray-900">Rp 120.000</span>
                                <p class="text-xs text-gray-500 line-through">Rp 150.000</p>
                            </div>
                        </label>
                    </div>
                    
                    <!-- Package Option 3 -->
                    <div class="border border-gray-200 rounded-xl p-4 relative">
                        <input type="radio" name="amount" value="5" id="amount_5" class="absolute top-4 right-4">
                        <label for="amount_5" class="block cursor-pointer">
                            <div class="text-center mb-4">
                                <span class="text-3xl font-bold text-primary">5</span>
                                <p class="text-gray-700 font-medium">Kredit Tes</p>
                                <span class="bg-green-400 text-green-800 text-xs px-2 py-1 rounded-full">Hemat</span>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg text-center">
                                <span class="text-lg font-bold text-gray-900">Rp 180.000</span>
                                <p class="text-xs text-gray-500 line-through">Rp 250.000</p>
                            </div>
                        </label>
                    </div>
                </div>
                
                <div class="border-t border-gray-100 pt-6">
                    <h3 class="font-medium text-gray-900 mb-4">Pilih Metode Pembayaran</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="border border-gray-200 rounded-lg p-3 flex items-center">
                            <input type="radio" name="payment_method" value="bank_transfer" id="bank_transfer" checked>
                            <label for="bank_transfer" class="ml-3 flex items-center cursor-pointer">
                                <i class="fas fa-university text-gray-600 mr-2"></i>
                                <span>Transfer Bank</span>
                            </label>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-3 flex items-center">
                            <input type="radio" name="payment_method" value="e_wallet" id="e_wallet">
                            <label for="e_wallet" class="ml-3 flex items-center cursor-pointer">
                                <i class="fas fa-wallet text-gray-600 mr-2"></i>
                                <span>E-Wallet</span>
                            </label>
                        </div>
                    </div>
                    
                    <button type="submit" disabled class="w-full bg-gray-400 text-white py-3 rounded-lg font-medium cursor-not-allowed opacity-70">
                        Lanjutkan Pembayaran
                    </button>
                    
                    <p class="text-center text-sm text-gray-500 mt-4">
                        Dengan melanjutkan, Anda menyetujui syarat dan ketentuan yang berlaku
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 