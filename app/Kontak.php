<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontaks';
    protected $fillable = ['nama','gambar','content','instagram','facebook','nohp','email','alamat'];
    public $timestamps = true;
}
