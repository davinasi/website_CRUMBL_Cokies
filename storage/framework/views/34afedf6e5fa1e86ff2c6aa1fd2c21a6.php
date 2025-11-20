

<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-12">
    <h1 class="text-4xl font-bold mb-8 text-pink-600">Keranjang Belanja</h1>

    <?php if(empty(session('cart'))): ?>
        <p>Keranjang kosong. <a href="/" class="text-pink-600 underline">Belanja sekarang</a></p>
    <?php else: ?>
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex items-center border-b p-6">
                <?php if($item['image']): ?>
                    <img src="<?php echo e(asset('storage/'.$item['image'])); ?>" class="w-24 h-24 object-cover rounded mr-6">
                <?php endif; ?>
                <div class="flex-1">
                    <h3 class="text-xl font-bold"><?php echo e($item['name']); ?></h3>
                    <p>Rp <?php echo e(number_format($item['price'] * $item['quantity'], 0, ',', '.')); ?></p>
                    <p>Jumlah: <?php echo e($item['quantity']); ?></p>
                </div>
                <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="text-red-600 hover:underline">Hapus</button>
                </form>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="mt-8 text-right">
            <a href="/" class="bg-pink-600 text-white px-8 py-4 rounded-lg text-xl font-bold">
                Checkout (Total: Rp <?php echo e(number_format(collect(session('cart'))->sum(function($i){return $i['price']*$i['quantity'];}), 0, ',', '.')); ?>

            </a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/cart.blade.php ENDPATH**/ ?>