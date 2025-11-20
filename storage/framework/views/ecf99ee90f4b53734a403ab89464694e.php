

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-12">
    <!-- Header -->
    <div class="text-center mb-16">
        <h1 class="text-6xl font-bold text-pink-600 mb-4">CRUMBL Cookies</h1>
        <p class="text-2xl text-gray-700">Aplikasi Pembayaran Toko Kue Berbasis Laravel</p>
    </div>

    <!-- Grid Produk -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-3 border border-gray-100">
                <!-- Gambar Produk -->
                <div class="relative overflow-hidden">
                    <?php if($product->image): ?>
                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" 
                             alt="<?php echo e($product->name); ?>" 
                             class="w-full h-72 object-cover transition-transform duration-500 hover:scale-110">
                    <?php else: ?>
                        <div class="bg-gradient-to-br from-pink-100 to-purple-100 h-72 flex items-center justify-center">
                            <span class="text-4xl text-pink-400 font-bold"><?php echo e(Str::limit($product->name, 2, '')); ?></span>
                        </div>
                    <?php endif; ?>

                    <!-- Badge Kategori -->
                    <div class="absolute top-4 left-4 bg-pink-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        <?php echo e($product->category->name ?? 'Umum'); ?>

                    </div>
                </div>

                <!-- Detail Produk -->
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 truncate"><?php echo e($product->name); ?></h3>
                    
                    <div class="flex items-center justify-between mt-3">
                        <p class="text-3xl font-bold text-pink-700">
                            Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?>

                        </p>
                        <span class="text-sm text-gray-500">per pcs</span>
                    </div>

                    <!-- Tombol Keranjang (SUDAH 100% JALAN!) -->
                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST" class="mt-6">
                        <?php echo csrf_field(); ?>
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-pink-600 to-purple-600 text-white font-bold py-4 rounded-2xl hover:from-pink-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center gap-3 text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full text-center py-24">
                <div class="bg-gray-100 rounded-full w-32 h-32 mx-auto mb-8 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <p class="text-3xl text-gray-600 font-bold mb-4">Belum ada kue yang ditampilkan</p>
                <p class="text-xl text-gray-500">Yuk tambah produk pertama kamu!</p>
                <a href="<?php echo e(route('admin.products.index')); ?>" 
                   class="mt-8 inline-block bg-pink-600 text-white px-8 py-4 rounded-xl text-lg font-bold hover:bg-pink-700 transition shadow-lg">
                    Tambah Produk Sekarang
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/home.blade.php ENDPATH**/ ?>