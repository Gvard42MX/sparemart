<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuWarkop extends Model
{
    use HasFactory;

    protected $table = 'menu_warkop';
    protected $fillable = [
        'nama_makanan',
        'harga_makanan',
        'nama_minuman',
        'harga_minuman',
        'gambar',
        'total_harga', 
    ];
}
