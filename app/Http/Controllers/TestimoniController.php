<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;
use File;
class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonis = Testimoni::paginate(10);
        return view('testimoni.index', compact('testimonis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimoni.create');
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
            'alamat' => 'required|max:255',
            'gambar' => '',
            'content' => 'required|max:2000'
        ]);

        $testimonis = new Testimoni;
        $testimonis->nama = $request->nama;
        $testimonis->alamat = $request->alamat;
        $testimonis->content = $request->content;
        $testimonis->gambar = $request->gambar;

        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);
            $testimonis->gambar = $filename;
        }
        $testimonis->save();
        return redirect()->route('testimoni.index');
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
        $testimonis = Testimoni::findOrFail($id);
        return view('testimoni.edit', compact('testimonis'));
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
            'alamat' => 'required|max:255',
            'gambar' => '',
            'content' => 'required|max:2000'
        ]);
        $testimonis = Testimoni::findOrFail($id);
        $testimonis->nama = $request->nama;

        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);

        if ($testimonis->gambar) { 
        $old_gambar = $testimonis->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/gambar'
        . DIRECTORY_SEPARATOR . $testimonis->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }    
        }
        $testimonis->gambar = $filename;
    }
        $testimonis->alamat = $request->alamat;
        $testimonis->content = $request->content;
        $testimonis->save();
        return redirect()->route('testimoni.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonis = Testimoni::findOrFail($id);
            if ($testimonis->gambar) {
                $old_foto = $testimonis->gambar;
                $filepath = public_path(). DIRECTORY_SEPARATOR . 'assets/img/gambar/' . DIRECTORY_SEPARATOR . $testimonis->gambar;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e){
                    // file sudah dihapus
                }
            }
        $testimonis->delete();
        return redirect()->route('testimoni.index');
    }
}
