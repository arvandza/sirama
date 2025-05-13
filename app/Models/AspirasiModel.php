<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AspirasiModel extends Model
{
    protected $table = 'aspirasi';
    protected $fillable = ['subjek', 'pesan', 'tanggal', 'kategori', 'tujuan', 'status'];
}
