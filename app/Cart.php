<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['product_id','user_id','jumlah'];
    public $timestamps = true;

    public function product()
    {
    	return $this->belongsTo('App\Produk','product_id');
    } 

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
