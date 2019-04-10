<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $fillable = ['nama_produk','harga','gambar','content','stok'];
    public $timestamps = true;
}
