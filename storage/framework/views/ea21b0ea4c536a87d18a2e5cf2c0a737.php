<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUMBL Cookies <?php echo $__env->yieldContent('title', ''); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-pink-600 text-white shadow-xl sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">

                <!-- Nama Toko -->
                <h1 class="text-3xl font-extrabold tracking-wide">
                    <a href="<?php echo e(route('home')); ?>" class="hover:text-pink-200 transition duration-300">
                        CRUMBL Cookies
                    </a>
                </h1>

                <!-- Menu Tengah (Desktop Only) -->
                <div class="hidden lg:flex items-center space-x-10 text-lg font-medium">
                    <a href="<?php echo e(route('home')); ?>" class="hover:text-pink-200 transition">Beranda</a>
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="hover:text-pink-200 transition">Admin</a>
                </div>

                <!-- Tombol Keranjang -->
                <div>
                    <a href="<?php echo e(route('cart.index')); ?>"
                       class="bg-white text-pink-600 px-7 py-4 rounded-full font-bold flex items-center gap-4 hover:bg-pink-50 hover:shadow-2xl transition-all duration-300 transform hover:scale-105 shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="text-lg">Keranjang</span>
                        <span class="bg-pink-600 text-white rounded-full w-9 h-9 flex items-center justify-center font-bold text-base shadow-lg">
                            <?php echo e(collect(session('cart'))->sum('quantity') ?? 0); ?>

                        </span>
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <!-- Notifikasi Success (jika ada) -->
    <?php if(session('success')): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 mx-6 mt-6 rounded-r-lg shadow-md">
            <p class="font-semibold"><?php echo e(session('success')); ?></p>
        </div>
    <?php endif; ?>

    <!-- Konten Utama -->
    <main class="container mx-auto flex-1 px-6 py-10">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="bg-pink-800 text-white py-8 mt-auto">
        <div class="container mx-auto text-center">
            <p class="text-lg font-medium">
                © 2025 CRUMBL Cookies — Praktikum Pemrograman Website Framework
            </p>
        </div>
    </footer>

</body>
</html><?php /**PATH C:\xampp\htdocs\example-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>