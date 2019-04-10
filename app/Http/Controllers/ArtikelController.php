<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artikel;
use File;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = Artikel::with('user')->paginate(10);
        return view('artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('artikel.create', compact('users'));
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
            'id_user' => 'required|max:255',
            'gambar' => '',
            'judul'=>'required|max:255',
            'slug' => '',
            'content'=>'required|max:2000'
        ]);

        $artikels = new Artikel;
        $artikels->id_user = $request->id_user;
        $artikels->judul = $request->judul;
        $artikels->slug = str_slug($request->judul, '-');
        $artikels->content = $request->content;
        $artikels->gambar = $request->gambar;

        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);
            $artikels->gambar = $filename;
        }
        $artikels->save();
        return redirect()->route('artikel.index');
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
        $artikels = Artikel::findOrFail($id);
        $users = User::all();
        $selectusers = Artikel::findOrFail($id)->id_user;
        return view('artikel.edit', compact('artikels','users','selectusers'));
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
            'judul' => 'required|max:255',
            'slug' => '',
            'id_user' => 'required',
            'gambar' => '',
            'content' => 'required|max:2000'
        ]);

        $artikels = Artikel::findOrFail($id);
        $artikels->id_user = $request->id_user;
        $artikels->judul = $request->judul;
        $artikels->slug = str_slug($request->judul, '-');
        $artikels->content = $request->content;

        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);

        if ($artikels->gambar) { 
        $old_gambar = $artikels->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/gambar/'
        . DIRECTORY_SEPARATOR . $artikels->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }    
        }
        $artikels->gambar = $filename;
    }
        $artikels->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikels = Artikel::findOrFail($id);
            if ($artikels->gambar) {
                $old_foto = $artikels->gambar;
                $filepath = public_path(). DIRECTORY_SEPARATOR . 'assets/img/gambar/' . DIRECTORY_SEPARATOR . $artikels->gambar;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e){
                    // file sudah dihapus
                }
            }
        $artikels->delete();
        return redirect()->route('artikel.index');
    }
}
