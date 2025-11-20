<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; // Ini yang penting!
use App\Models\KategoriKue;
use App\Models\Kue;

class DashboardController extends BaseController // Bukan Controller, tapi BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('dashboard', [
            'totalKategori' => KategoriKue::count(),
            'totalKue'      => Kue::count(),
            'rataHarga'     => Kue::avg('harga') ?? 0,
            'kueTerbaru'    => Kue::with('kategori')->latest()->take(5)->get()
        ]);
    }
}