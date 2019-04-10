<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artikel;
use App\Produk;
use App\Galeri;
use App\Testimoni;
use App\Kontak;
use Vinkla\Instagram\Instagram;

class FrontendController extends Controller
{   
    public function index(){
        $produks = Produk::paginate(4);
        $artikels = Artikel::paginate(1);
        $artikel = Artikel::paginate(3);
        $galeris = Galeri::paginate(8);
        $testimonis = Testimoni::all();
        $kontaks = Kontak::all();
        return view('front',compact('kontaks','testimonis','produks','artikels','artikel','galeris'));
    }

    public function produk(){
    	$produks = Produk::orderBy('created_at')->get();
    	return view('frontend.produk', compact('produks'));
    }

    public function singleproduk(Produk $produk){
        $produks = Produk::all();
        $users = User::all();
        return view('frontend.singleproduk', compact('produk','produks','users'));
    }

    public function galeri(){
    	$galeris = Galeri::all();
    	return view('frontend.galeri', compact('galeris'));
    }

    public function artikel(){
        $artikels = Artikel::all();
        return view('frontend.artikel', compact('artikels'));
    }

    public function single(Artikel $artikel){
        $previous = Artikel::where('id', '<', $artikel->id)->orderBy('id', 'desc')->first();
        $next = Artikel::where('id', '>', $artikel->id)->orderBy('id')->first();

        return view('frontend.single', compact('artikel','previous','next'));
    }
    public function testimoni(){
        $testimonis = Testimoni::all();
        return view('frontend.testimoni', compact('testimonis'));
    }

    public function kontak(){
        $kontaks = Kontak::all();
        return view('frontend.kontak', compact('kontaks'));
    }


}
