

<?php $__env->startSection('content'); ?>
<h1 class="text-4xl font-bold mb-8 text-gray-800">Tambah Produk Baru</h1>

<form action="<?php echo e(route('admin.products.store')); ?>" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-xl shadow-lg max-w-2xl">
    <?php echo csrf_field(); ?>

    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2">Nama Kue</label>
        <input type="text" name="name" required class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:border-pink-500">
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2">Kategori</label>
        <select name="category_id" required class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:border-pink-500">
            <option value="">-- Pilih Kategori --</option>
            <option value="1">Cookies</option>
            <option value="2">Cake</option>
            <option value="3">Dessert</option>
        </select>
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2">Harga</label>
        <input type="number" name="price" required min="1000" class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:border-pink-500">
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2">Gambar Kue (opsional)</label>
        <input type="file" name="image" accept="image/*" class="w-full">
    </div>

    <button type="submit" class="bg-pink-600 text-white px-8 py-4 rounded-lg hover:bg-pink-700 text-lg font-semibold">
        Simpan Produk
    </button>
    <a href="<?php echo e(route('admin.products.index')); ?>" class="ml-4 text-gray-600 hover:underline">Kembali</a>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/admin/products/create.blade.php ENDPATH**/ ?>