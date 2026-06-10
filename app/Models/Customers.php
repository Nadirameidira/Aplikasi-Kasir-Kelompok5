<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Tentukan nama tabelnya (opsional, tapi aman kalau pakai ini)
    protected $table = 'customers';

    // Daftarkan kolom apa saja yang boleh diisi lewat form registrasi kamu
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];
}