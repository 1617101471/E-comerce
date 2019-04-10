<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FrontendController@index');
// Route::get('/', function () {
//     return view('front');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
	Route::resource('/produk','ProduksController');
	Route::resource('/galeri','GaleriController');
	Route::resource('/user','UsersController');
	Route::resource('/artikel','ArtikelController');
	Route::resource('/testimoni','TestimoniController');
	Route::resource('/kontak', 'KontakController');
    Route::resource('/cart', 'CartController');
    Route::resource('/custom','CustomController');
});

Route::get('/produk','FrontendController@produk')->name('produk');
Route::get('/produk/single/{produk}','FrontendController@singleproduk')->name('singleproduk');
Route::get('/galeri','FrontendController@galeri')->name('galeri');
Route::get('/artikel','FrontendController@artikel')->name('artikel');
Route::get('/testimoni','FrontendController@testimoni')->name('testimoni');
Route::get('/kontak','FrontendController@kontak')->name('kontak');
Route::get('/artikel/single/{artikel}','FrontendController@single')->name('single');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/add-cart/{product_id}', function($product_id){
        // $produk = \App\Product::find($product_id);
        $exist = \App\Cart::where('user_id', \Auth::user()->id)->where('product_id',$product_id)->first();
        if($exist){
            $exist->jumlah = $exist->jumlah + 1;
            $exist->save(); 
        }else{    
            $data = new \App\Cart;
            $data->product_id = $product_id;
            $data->jumlah = 1;
            $data->user_id = \Auth::user()->id;
            $data->save();
       
        }
        return redirect()->back();
    });    

    Route::get('cart/{usr_id}', function ($usr_id) {
        $cart = \App\Cart::where('user_id', $usr_id)->get();
        return view('frontend.cart', compact('cart'));
    });

    Route::get('cart/delete/{id}', function ($id) {
        $cart = \App\Cart::find($id)->delete();
        return redirect()->back();
    });

   Route::post('cart/edit/{user_id}', function ( \Illuminate\Http\Request $request, $user_id) {
        for($i = 0; $i < count($request->id); $i++){
            $cart = \App\Cart::find($request->id[$i]);
            $cart->jumlah = $request->jumlah[$i];
            $cart->save();
        }

        return redirect()->back();
    });

   Route::post('checkout/{user_id}',function( \Illuminate\Http\Request $request, $user_id){
        $request->validate([
            'alamat' => 'required|',
            'no_tlp' => 'required|',
            'pengiriman' => 'required|',
            'pembayaran' => 'required|',
        ]);
        // dd(json_decode($request->chart));
        foreach(json_decode($request->chart) as $data){

            $custom = new \App\Custom;
            $custom->nama = \Auth::user()->name;
            $custom->alamat = $request->alamat;
            $custom->no_tlp = $request->no_tlp;
            $custom->pengiriman = $request->pengiriman;
            $custom->jumlah = $data->jumlah;
            $custom->pembayaran = $request->pembayaran;
            $custom->cek_pembayaran = $request->cek_pembayaran;
            $custom->product_id = $data->product_id;
            $custom->user_id = \Auth::user()->id;

            $custom->save();
        }

        $del = \App\Cart::where('user_id', $user_id)->delete();

        return redirect()->back();
    });
});
