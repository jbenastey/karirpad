<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $primaryKey = 'id';

    protected $fillable = [
        'foto',
        'nama',
        'kategori',
        'harga',
        'diskon',
    ];
}
