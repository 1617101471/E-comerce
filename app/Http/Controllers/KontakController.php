<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontak;
use File;
class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontaks = Kontak::paginate(10);
        return view('kontak.index', compact('kontaks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontak.create');
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
            'nama' => 'required|max:255',
            'gambar' => '',
            'email' => 'required|max:255',
            'instagram' => 'required|max:255',
            'facebook' => 'required|max:255',
            'nohp' => 'required|max:255',
            'alamat' => 'required|max:255',
            'content' => 'required|max:2000'
        ]);
        $kontaks = new Kontak;
        $kontaks->nama = $request->nama;
        $kontaks->email = $request->email;
        $kontaks->instagram = $request->instagram;
        $kontaks->facebook = $request->facebook;
        $kontaks->nohp = $request->nohp;
        $kontaks->alamat = $request->alamat;
        $kontaks->content = $request->content;
        $kontaks->gambar = $request->gambar;

        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);
            $kontaks->gambar = $filename;
        }
        $kontaks->save();
        return redirect()->route('kontak.index');
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
        $kontaks = Kontak::findOrFail($id);
        return view('kontak.edit', compact('kontaks'));
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
            'nama' => 'required|max:255',
            'gambar' => '',
            'email' => 'required|max:255',
            'instagram' => 'required|max:255',
            'facebook' => 'required|max:255',
            'nohp' => 'required|max:255',
            'alamat' => 'required|max:255',
            'content' => 'required|max:2000'
        ]);

        $kontaks = Kontak::findOrFail($id);
        $kontaks->nama = $request->nama;
        $kontaks->alamat = $request->alamat;

        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);

        if ($kontaks->gambar) { 
        $old_gambar = $kontaks->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/gambar'
        . DIRECTORY_SEPARATOR . $kontaks->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }    
        }
        $kontaks->gambar = $filename;
    }
        $kontaks->email = $request->email;
        $kontaks->instagram = $request->instagram;
        $kontaks->facebook = $request->facebook;
        $kontaks->nohp = $request->nohp;
        $kontaks->content = $request->content;
        $kontaks->save();
        return redirect()->route('kontak.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontaks = Kontak::findOrFail($id);
            if ($kontaks->gambar) {
                $old_foto = $kontaks->gambar;
                $filepath = public_path(). DIRECTORY_SEPARATOR . 'assets/img/gambar/' . DIRECTORY_SEPARATOR . $kontaks->gambar;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e){
                    // file sudah dihapus
                }
            }
        $kontaks->delete();
        return redirect()->route('kontak.index');
    }
}
