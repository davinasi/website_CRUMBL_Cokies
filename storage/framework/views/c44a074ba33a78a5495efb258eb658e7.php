

<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-8">
    <h1 class="text-4xl font-bold text-gray-800">Daftar Produk</h1>
    <a href="<?php echo e(route('admin.products.create')); ?>" 
       class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
        + Tambah Produk Baru
    </a>
</div>

<table class="w-full bg-white rounded-lg shadow overflow-hidden">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="px-6 py-4 text-left">No</th>
            <th class="px-6 py-4 text-left">Gambar</th>
            <th class="px-6 py-4 text-left">Nama Kue</th>
            <th class="px-6 py-4 text-left">Kategori</th>
            <th class="px-6 py-4 text-left">Harga</th>
            <th class="px-6 py-4 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4"><?php echo e($loop->iteration); ?></td>
                <td class="px-6 py-4">
                    <?php if($product->image): ?>
                        <img src="<?php echo e(asset('storage/'.$product->image)); ?>" class="h-16 w-16 object-cover rounded">
                    <?php else: ?>
                        <div class="h-16 w-16 bg-gray-200 rounded"></div>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4 font-semibold"><?php echo e($product->name); ?></td>
                <td class="px-6 py-4">
                    <?php echo e($product->category->name); ?>   <!-- YANG BENAR ADALAH INI -->
                </td>
                <td class="px-6 py-4 text-pink-600 font-bold">
                    Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?>

                </td>
                <td class="px-6 py-4">
                    <a href="<?php echo e(route('admin.products.edit', $product)); ?>" 
                       class="text-blue-600 hover:underline mr-4">Edit</a>

                    <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" 
                          method="POST" class="inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" 
                                onclick="return confirm('Yakin hapus?')" 
                                class="text-red-600 hover:underline">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center py-8 text-gray-500">
                    Belum ada produk. <a href="<?php echo e(route('admin.products.create')); ?>" class="text-blue-600 underline">Tambah sekarang</a>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/admin/products/index.blade.php ENDPATH**/ ?>