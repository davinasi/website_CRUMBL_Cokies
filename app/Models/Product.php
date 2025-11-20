<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'price',
        'image',
        'is_active'
        // description dihapus karena tidak ada di tabel
    ];

    // SLUG OTOMATIS TERISI (ini yang bikin error slug hilang selamanya!)
    protected static function booted()
    {
        static::creating(function ($product) {
            $product->slug = $product->slug ?: Str::slug($product->name);
        });

        static::updating(function ($product) {
            $product->slug = $product->slug ?: Str::slug($product->name);
        });
    }

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}