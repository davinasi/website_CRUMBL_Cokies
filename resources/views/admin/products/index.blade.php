@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-4xl font-bold text-gray-800">Daftar Produk</h1>
    <a href="{{ route('admin.products.create') }}" 
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
        @forelse($products as $i => $product)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                <td class="px-6 py-4">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" class="h-16 w-16 object-cover rounded">
                    @else
                        <div class="h-16 w-16 bg-gray-200 rounded"></div>
                    @endif
                </td>
                <td class="px-6 py-4 font-semibold">{{ $product->name }}</td>
                <td class="px-6 py-4">
                    {{ $product->category->name }}   <!-- YANG BENAR ADALAH INI -->
                </td>
                <td class="px-6 py-4 text-pink-600 font-bold">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.products.edit', $product) }}" 
                       class="text-blue-600 hover:underline mr-4">Edit</a>

                    <form action="{{ route('admin.products.destroy', $product) }}" 
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Yakin hapus?')" 
                                class="text-red-600 hover:underline">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center py-8 text-gray-500">
                    Belum ada produk. <a href="{{ route('admin.products.create') }}" class="text-blue-600 underline">Tambah sekarang</a>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection