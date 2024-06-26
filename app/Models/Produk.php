<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'gambar',
        'kategori_id',
        'nama',
        'harga',
        'deskripsi',
    ];

    public function produk(){
        return $this->hasMany((Produk::class));
    }
}
