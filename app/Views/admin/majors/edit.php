<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="bg-white rounded-xl shadow-soft p-6 mb-8">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 md:mb-0">Edit Jurusan</h2>
        <a href="/admin/majors" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white rounded-lg shadow-sm hover:bg-gray-600 transition-all">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>
    
    <?php if (session()->has('errors')): ?>
        <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form action="/admin/majors/update/<?= $major['id'] ?>" method="post" class="space-y-6">
        <?= csrf_field() ?>
        
        <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
            <h3 class="text-base font-medium text-gray-800 mb-4">Informasi Dasar</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Jurusan <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="<?= old('name', $major['name']) ?>" required
                           class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                </div>
                
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status <span class="text-red-500">*</span></label>
                    <select id="is_active" name="is_active" required
                            class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="1" <?= old('is_active', $major['is_active']) == '1' ? 'selected' : '' ?>>Aktif</option>
                        <option value="0" <?= old('is_active', $major['is_active']) == '0' ? 'selected' : '' ?>>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="riasec_match" class="block text-sm font-medium text-gray-700 mb-1">Kode RIASEC <span class="text-red-500">*</span></label>
                    <select id="riasec_match" name="riasec_match" required
                            class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="" disabled>Pilih Kode RIASEC</option>
                        <option value="R" <?= old('riasec_match', $major['riasec_match']) == 'R' ? 'selected' : '' ?>>R (Realistic)</option>
                        <option value="I" <?= old('riasec_match', $major['riasec_match']) == 'I' ? 'selected' : '' ?>>I (Investigative)</option>
                        <option value="A" <?= old('riasec_match', $major['riasec_match']) == 'A' ? 'selected' : '' ?>>A (Artistic)</option>
                        <option value="S" <?= old('riasec_match', $major['riasec_match']) == 'S' ? 'selected' : '' ?>>S (Social)</option>
                        <option value="E" <?= old('riasec_match', $major['riasec_match']) == 'E' ? 'selected' : '' ?>>E (Enterprising)</option>
                        <option value="C" <?= old('riasec_match', $major['riasec_match']) == 'C' ? 'selected' : '' ?>>C (Conventional)</option>
                    </select>
                </div>
                
                <div>
                    <label for="mbti_match" class="block text-sm font-medium text-gray-700 mb-1">Kode MBTI <span class="text-red-500">*</span></label>
                    <select id="mbti_match" name="mbti_match" required
                            class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="" disabled>Pilih Kode MBTI</option>
                        <option value="ISTJ" <?= old('mbti_match', $major['mbti_match']) == 'ISTJ' ? 'selected' : '' ?>>ISTJ</option>
                        <option value="ISFJ" <?= old('mbti_match', $major['mbti_match']) == 'ISFJ' ? 'selected' : '' ?>>ISFJ</option>
                        <option value="INFJ" <?= old('mbti_match', $major['mbti_match']) == 'INFJ' ? 'selected' : '' ?>>INFJ</option>
                        <option value="INTJ" <?= old('mbti_match', $major['mbti_match']) == 'INTJ' ? 'selected' : '' ?>>INTJ</option>
                        <option value="ISTP" <?= old('mbti_match', $major['mbti_match']) == 'ISTP' ? 'selected' : '' ?>>ISTP</option>
                        <option value="ISFP" <?= old('mbti_match', $major['mbti_match']) == 'ISFP' ? 'selected' : '' ?>>ISFP</option>
                        <option value="INFP" <?= old('mbti_match', $major['mbti_match']) == 'INFP' ? 'selected' : '' ?>>INFP</option>
                        <option value="INTP" <?= old('mbti_match', $major['mbti_match']) == 'INTP' ? 'selected' : '' ?>>INTP</option>
                        <option value="ESTP" <?= old('mbti_match', $major['mbti_match']) == 'ESTP' ? 'selected' : '' ?>>ESTP</option>
                        <option value="ESFP" <?= old('mbti_match', $major['mbti_match']) == 'ESFP' ? 'selected' : '' ?>>ESFP</option>
                        <option value="ENFP" <?= old('mbti_match', $major['mbti_match']) == 'ENFP' ? 'selected' : '' ?>>ENFP</option>
                        <option value="ENTP" <?= old('mbti_match', $major['mbti_match']) == 'ENTP' ? 'selected' : '' ?>>ENTP</option>
                        <option value="ESTJ" <?= old('mbti_match', $major['mbti_match']) == 'ESTJ' ? 'selected' : '' ?>>ESTJ</option>
                        <option value="ESFJ" <?= old('mbti_match', $major['mbti_match']) == 'ESFJ' ? 'selected' : '' ?>>ESFJ</option>
                        <option value="ENFJ" <?= old('mbti_match', $major['mbti_match']) == 'ENFJ' ? 'selected' : '' ?>>ENFJ</option>
                        <option value="ENTJ" <?= old('mbti_match', $major['mbti_match']) == 'ENTJ' ? 'selected' : '' ?>>ENTJ</option>
                    </select>
                </div>
            </div>
            
            <div class="mt-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="3" required
                          class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"><?= old('description', $major['description']) ?></textarea>
                <p class="text-xs text-gray-500 mt-1">Deskripsi singkat mengenai jurusan (maksimal 500 karakter)</p>
            </div>
            
            <div class="mt-4">
                <label for="full_description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Lengkap</label>
                <textarea id="full_description" name="full_description" rows="5" 
                          class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"><?= old('full_description', $major['full_description']) ?></textarea>
                <p class="text-xs text-gray-500 mt-1">Deskripsi lengkap mengenai jurusan</p>
            </div>
        </div>
        
        <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
            <h3 class="text-base font-medium text-gray-800 mb-4">Detail Studi</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="degree_types" class="block text-sm font-medium text-gray-700 mb-1">Tingkat Gelar</label>
                    <input type="text" id="degree_types" name="degree_types" value="<?= old('degree_types', $major['degree_types']) ?>"
                           placeholder="D3, S1, S2, S3"
                           class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                </div>
                
                <div>
                    <label for="study_duration" class="block text-sm font-medium text-gray-700 mb-1">Durasi Studi</label>
                    <input type="text" id="study_duration" name="study_duration" value="<?= old('study_duration', $major['study_duration']) ?>"
                           placeholder="3-4 tahun"
                           class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                </div>
            </div>
            
            <div class="mt-4">
                <label for="core_subjects" class="block text-sm font-medium text-gray-700 mb-1">Mata Kuliah Inti</label>
                <textarea id="core_subjects" name="core_subjects" rows="3"
                          class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"><?= old('core_subjects', $major['core_subjects']) ?></textarea>
                <p class="text-xs text-gray-500 mt-1">Daftar mata kuliah atau bidang ilmu utama dalam jurusan ini</p>
            </div>
        </div>
        
        <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
            <h3 class="text-base font-medium text-gray-800 mb-4">Karir & Prospek</h3>
            
            <div>
                <label for="career_prospects" class="block text-sm font-medium text-gray-700 mb-1">Prospek Karir <span class="text-red-500">*</span></label>
                <textarea id="career_prospects" name="career_prospects" rows="3" required
                          class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"><?= old('career_prospects', $major['career_prospects']) ?></textarea>
                <p class="text-xs text-gray-500 mt-1">Pekerjaan yang dapat dilamar setelah lulus dari jurusan ini</p>
            </div>
            
            <div class="mt-4">
                <label for="industry_sectors" class="block text-sm font-medium text-gray-700 mb-1">Sektor Industri</label>
                <input type="text" id="industry_sectors" name="industry_sectors" value="<?= old('industry_sectors', $major['industry_sectors']) ?>"
                       placeholder="Teknologi, Kesehatan, Keuangan, dll"
                       class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
            </div>
            
            <div class="mt-4">
                <label for="future_trends" class="block text-sm font-medium text-gray-700 mb-1">Tren Masa Depan</label>
                <textarea id="future_trends" name="future_trends" rows="3"
                          class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"><?= old('future_trends', $major['future_trends']) ?></textarea>
                <p class="text-xs text-gray-500 mt-1">Tren atau perkembangan masa depan bidang ini</p>
            </div>
        </div>
        
        <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
            <h3 class="text-base font-medium text-gray-800 mb-4">Kesesuaian Kepribadian</h3>
            
            <div>
                <label for="compatibility_reason" class="block text-sm font-medium text-gray-700 mb-1">Alasan Kesesuaian</label>
                <textarea id="compatibility_reason" name="compatibility_reason" rows="3"
                          class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary"><?= old('compatibility_reason', $major['compatibility_reason']) ?></textarea>
                <p class="text-xs text-gray-500 mt-1">Mengapa jurusan ini cocok untuk tipe kepribadian tertentu</p>
            </div>
            
            <div class="mt-6">
                <h4 class="text-sm font-medium text-gray-700 mb-3">Tingkat Kesesuaian dengan Tipe Kepribadian</h4>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe Kepribadian</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Persentase Kecocokan (%)</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach ($personality_types as $type): ?>
                            <tr>
                                <td class="px-4 py-2">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                <?= $type['riasec_code'] ?>-<?= $type['mbti_code'] ?>
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                <?= $type['personality_name'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <input type="number" 
                                           name="personality_mappings[<?= $type['id'] ?>]" 
                                           value="<?= old('personality_mappings[' . $type['id'] . ']', $personality_mappings[$type['id']] ?? 0) ?>"
                                           min="0" 
                                           max="100"
                                           class="w-24 px-3 py-1 border border-gray-200 rounded-md focus:outline-none focus:ring-1 focus:ring-primary">
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg shadow-sm hover:bg-red-800 transition-all">
                <i class="fas fa-save mr-2"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    // Init TinyMCE for rich text editors
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof tinymce !== 'undefined') {
            tinymce.init({
                selector: '#full_description, #core_subjects, #career_prospects, #future_trends, #compatibility_reason',
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            });
        }
    });
</script>
<?= $this->endSection() ?>