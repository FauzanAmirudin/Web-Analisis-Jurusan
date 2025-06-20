<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Lampung Cerdas' ?></title>
    <meta name="description" content="<?= $meta_description ?? 'Temukan jurusan kuliah yang tepat dengan tes analisis kepribadian komprehensif' ?>">
    
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
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }
        html {
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
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
        /* Background patterns */
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Ccircle stroke='%23FFC107' stroke-width='2' cx='50' cy='50' r='30' opacity='.5'/%3E%3C/g%3E%3C/svg%3E");
            background-size: 200px 200px;
        }
        .bg-dots {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20'%3E%3Ccircle cx='10' cy='10' r='2' fill='%23000' opacity='0.1'/%3E%3C/svg%3E");
            background-size: 20px 20px;
        }
        .bg-circles {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='white' fill-rule='evenodd'%3E%3Cpath d='M30 60c16.569 0 30-13.431 30-30C60 13.431 46.569 0 30 0 13.431 0 0 13.431 0 30c0 16.569 13.431 30 30 30zm0-5c13.807 0 25-11.193 25-25S43.807 5 30 5 5 16.193 5 30s11.193 25 25 25z'/%3E%3C/g%3E%3C/svg%3E");
            background-size: 120px 120px;
        }
        /* Mobile responsiveness */
        @media (max-width: 640px) {
            .container {
                width: 100%;
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
    </style>
</head>
<body class="h-full bg-gray-50 overflow-x-hidden">
    <?= $this->renderSection('content') ?>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>