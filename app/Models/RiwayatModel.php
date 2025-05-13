<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatModel extends Model
{
    protected $table = 'riwayat';
    protected $fillable = ['subjek', 'pesan', 'tanggal', 'kategori', 'tujuan', 'status'];
}
