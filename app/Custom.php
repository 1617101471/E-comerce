<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    protected $table = 'customs';
    protected $fillable = ['nama', 'alamat', 'no_tlp', 'pengiriman', 'jumlah', 'pembayaran', 'cek_pembayaran', 'product_id', 'user_id'];
    public $timestamps = true;

    public function product()
    {
    	return $this->belongsTo('App\Produk', 'product_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
