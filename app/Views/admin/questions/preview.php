<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-1">Preview Pertanyaan <?= strtoupper($type) ?></h2>
            <p class="text-gray-600 text-sm">Menampilkan daftar pertanyaan yang aktif untuk tes <?= strtoupper($type) ?></p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-2">
            <a href="/admin/questions/preview?type=<?= $type === 'riasec' ? 'mbti' : 'riasec' ?>" 
               class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg shadow-sm hover:bg-indigo-700 transition-all">
                <i class="fas fa-eye mr-2"></i>
                <span>Preview <?= $type === 'riasec' ? 'MBTI' : 'RIASEC' ?></span>
            </a>
            <a href="/admin/questions" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg shadow-sm hover:bg-gray-200 transition-all">
                <i class="fas fa-arrow-left mr-2"></i>
                <span>Kembali</span>
            </a>
        </div>
    </div>
    
    <!-- Preview Instructions -->
    <div class="bg-blue-50 rounded-lg p-4 mb-6 border border-blue-100">
        <div class="flex">
            <div class="flex-shrink-0">
                <i class="fas fa-info-circle text-blue-500 text-xl"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-blue-800">Petunjuk Pengisian</h3>
                <div class="mt-2 text-sm text-blue-700">
                    <p>Preview ini menampilkan pertanyaan seperti yang akan dilihat pengguna saat mengambil tes.</p>
                    <p class="mt-1">Pengguna akan menjawab "Ya" atau "Tidak" untuk setiap pertanyaan.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Question Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <?php if (empty($questions)): ?>
            <div class="col-span-2 bg-gray-50 rounded-lg p-8 text-center border border-gray-100">
                <div class="text-gray-400 mb-2">
                    <i class="fas fa-question-circle text-4xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-700 mb-1">Tidak Ada Pertanyaan</h3>
                <p class="text-sm text-gray-500">Tidak ada pertanyaan aktif untuk tipe tes ini.</p>
                <div class="mt-4">
                    <a href="/admin/questions/create" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg shadow-sm hover:bg-red-800 transition-all">
                        <i class="fas fa-plus mr-2"></i>
                        <span>Tambah Pertanyaan Baru</span>
                    </a>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($questions as $index => $question): ?>
                <?php
                $bgColor = 'bg-white';
                $borderColor = 'border-gray-200';
                $headerBg = 'bg-gray-50';
                $categoryClass = 'bg-gray-100 text-gray-800';
                
                if ($type === 'riasec') {
                    switch ($question['category']) {
                        case 'R':
                            $bgColor = 'bg-blue-50';
                            $borderColor = 'border-blue-100';
                            $headerBg = 'bg-blue-100';
                            $categoryClass = 'bg-blue-200 text-blue-800';
                            break;
                        case 'I':
                            $bgColor = 'bg-purple-50';
                            $borderColor = 'border-purple-100';
                            $headerBg = 'bg-purple-100';
                            $categoryClass = 'bg-purple-200 text-purple-800';
                            break;
                        case 'A':
                            $bgColor = 'bg-pink-50';
                            $borderColor = 'border-pink-100';
                            $headerBg = 'bg-pink-100';
                            $categoryClass = 'bg-pink-200 text-pink-800';
                            break;
                        case 'S':
                            $bgColor = 'bg-green-50';
                            $borderColor = 'border-green-100';
                            $headerBg = 'bg-green-100';
                            $categoryClass = 'bg-green-200 text-green-800';
                            break;
                        case 'E':
                            $bgColor = 'bg-yellow-50';
                            $borderColor = 'border-yellow-100';
                            $headerBg = 'bg-yellow-100';
                            $categoryClass = 'bg-yellow-200 text-yellow-800';
                            break;
                        case 'C':
                            $bgColor = 'bg-gray-50';
                            $borderColor = 'border-gray-200';
                            $headerBg = 'bg-gray-100';
                            $categoryClass = 'bg-gray-200 text-gray-800';
                            break;
                    }
                } else if ($type === 'mbti') {
                    switch ($question['category']) {
                        case 'EI':
                            $bgColor = 'bg-red-50';
                            $borderColor = 'border-red-100';
                            $headerBg = 'bg-red-100';
                            $categoryClass = 'bg-red-200 text-red-800';
                            break;
                        case 'SN':
                            $bgColor = 'bg-green-50';
                            $borderColor = 'border-green-100';
                            $headerBg = 'bg-green-100';
                            $categoryClass = 'bg-green-200 text-green-800';
                            break;
                        case 'TF':
                            $bgColor = 'bg-blue-50';
                            $borderColor = 'border-blue-100';
                            $headerBg = 'bg-blue-100';
                            $categoryClass = 'bg-blue-200 text-blue-800';
                            break;
                        case 'JP':
                            $bgColor = 'bg-yellow-50';
                            $borderColor = 'border-yellow-100';
                            $headerBg = 'bg-yellow-100';
                            $categoryClass = 'bg-yellow-200 text-yellow-800';
                            break;
                    }
                }
                
                $categoryText = $question['category'];
                if ($type === 'riasec') {
                    $categoryNames = [
                        'R' => 'Realistic',
                        'I' => 'Investigative',
                        'A' => 'Artistic',
                        'S' => 'Social',
                        'E' => 'Enterprising',
                        'C' => 'Conventional'
                    ];
                    $categoryText = $categoryNames[$question['category']] ?? $question['category'];
                } else if ($type === 'mbti') {
                    $categoryNames = [
                        'EI' => 'Extraversion/Introversion',
                        'SN' => 'Sensing/Intuition',
                        'TF' => 'Thinking/Feeling',
                        'JP' => 'Judging/Perceiving'
                    ];
                    $categoryText = $categoryNames[$question['category']] ?? $question['category'];
                }
                ?>
                
                <div class="rounded-lg border <?= $borderColor ?> overflow-hidden shadow-sm <?= $bgColor ?>">
                    <div class="px-4 py-3 <?= $headerBg ?> border-b <?= $borderColor ?> flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <span class="text-sm font-medium text-gray-700">#<?= $question['order_number'] ?></span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $categoryClass ?>">
                                <?= $categoryText ?>
                                <?php if ($type === 'mbti' && !empty($question['mbti_direction'])): ?>
                                    - <?= $question['mbti_direction'] ?>
                                <?php endif; ?>
                            </span>
                        </div>
                        <a href="/admin/questions/edit/<?= $question['id'] ?>" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <div class="p-4">
                        <p class="text-gray-800"><?= esc($question['question_text']) ?></p>
                        
                        <div class="mt-4 flex justify-between">
                            <button type="button" class="px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-700 transition-all disabled:opacity-50" disabled>
                                Ya
                            </button>
                            <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 transition-all disabled:opacity-50" disabled>
                                Tidak
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <!-- Summary -->
    <?php if (!empty($questions)): ?>
        <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
            <div class="flex items-center">
                <div class="flex-1">
                    <h3 class="text-base font-medium text-gray-800">Total: <?= count($questions) ?> pertanyaan</h3>
                    <p class="text-sm text-gray-500">Hanya menampilkan pertanyaan yang aktif</p>
                </div>
                <div>
                    <a href="/admin/questions" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg shadow-sm hover:bg-red-800 transition-all">
                        <i class="fas fa-cog mr-2"></i>
                        <span>Kelola Pertanyaan</span>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?> 