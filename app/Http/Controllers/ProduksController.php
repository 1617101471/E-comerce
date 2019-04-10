<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use File;

class ProduksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::paginate(10);
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_produk' => 'required|max:255',
            'harga' => 'required|max:255',
            'gambar' => 'required|',
            'stok' => 'required',
            'content' => 'required'
        ]);

        $produks = new Produk;
        $produks->nama_produk = $request->nama_produk;
        $produks->harga = $request->harga;
        $produks->content = $request->content;
        $produks->stok = $request->stok;
        $produks->gambar = $request->gambar;

        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);
            $produks->gambar = $filename;
        }
        $produks->save();
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produks = Produk::findOrFail($id);
        return view('produk.edit', compact('produks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_produk' => 'required|max:255',
            'harga' => 'required|max:255',
            'stok' => 'required|max:255',
            'content' => 'required',
            'gambar' => ''
        ]);

        $produks = Produk::findOrFail($id);
        $produks->nama_produk = $request->nama_produk;
        $produks->stok = $request->stok;

        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);

        if ($produks->gambar) { 
        $old_gambar = $produks->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/gambar'
        . DIRECTORY_SEPARATOR . $produks->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }    
        }
        $produks->gambar = $filename;
    }
        $produks->harga = $request->harga;
        $produks->content = $request->content;
        $produks->save();
        return redirect()->route('produk.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produks = Produk::findOrFail($id);
            if ($produks->gambar) {
                $old_foto = $produks->gambar;
                $filepath = public_path(). DIRECTORY_SEPARATOR . 'assets/img/gambar/' . DIRECTORY_SEPARATOR . $produks->gambar;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e){
                    // file sudah dihapus
                }
            }
        $produks->delete();
        return redirect()->route('produk.index');
    }
}
