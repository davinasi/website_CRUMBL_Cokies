@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-4xl font-bold">Kategori</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="flex gap-3">
        @csrf
        <input type="text" name="name" placeholder="Nama kategori baru..." required 
               class="border rounded-lg px-4 py-2">
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg">
            + Tambah
        </button>
    </form>
</div>

<ul class="space-y-3">
    @foreach($categories as $cat)
        <li class="bg-white p-4 rounded-lg shadow flex justify-between">
            <span class="text-lg font-semibold">{{ $cat->name }}</span>
        </li>
    @endforeach
</ul>
@endsection