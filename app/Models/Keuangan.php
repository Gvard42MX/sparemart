<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal', 'keterangan', 'pemasukan', 'pengeluaran'
    ];

    // Atribut tambahan untuk menghitung saldo
    public function getSaldoAttribute()
    {
        return $this->pemasukan - $this->pengeluaran;
    }
}
