<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    protected $table = 'artikels';
    protected $fillable = ['judul','id_user','gambar','content'];
    public $timestamps = true;

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }

    public function getRouteKeyName(){
    	return 'slug';
    }
}
