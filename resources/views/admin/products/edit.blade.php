@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-bold mb-8">Edit Produk</h1>

<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg max-w-2xl">
    @csrf
    @method('PUT')

    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2">Nama Kue</label>
        <input type="text" name="name" value="{{ $product->name }}" required class="w-full border rounded-lg px-4 py-3">
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2">Kategori</label>
        <select name="category_id" required class="w-full border rounded-lg px-4 py-3">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 font-bold mb-2">Harga</label>
        <input type="number" name="price" value="{{ $product->price }}" required class="w-full border rounded-lg px-4 py-3">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-8 py-4 rounded-lg hover:bg-blue-700 text-lg font-semibold">
        Update Produk
    </button>
</form>
@endsection