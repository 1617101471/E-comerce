<?php

namespace App\Http\Controllers;

use App\Custom;
use App\Custom_order;
use Illuminate\Http\Request;
use App\Role;
use App\Product;
use Auth;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('admin')){
            $customa = Custom::all();
        //     $customNotif = Custom::where('status','0');
        // $countNotif=Custom::where('status',0)->get()->count();
        // $countoNotif=Custom_order::where('status',0)->get()->count();
        return view('customadmin.index',compact('customa'));

        }elseif($user = Auth::user()){
        $customa = Custom::where('user_id',Auth::user()->id)->get();
        return view('customadmin.index',compact('customa'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $custom = Custom::findOrFail($id);
        $product = Produk::all();
        $selectedProduct = Custom::findOrFail($id)->product_id;
        
        return view('customadmin.edit',compact('custom','product','selectedProduct'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $custom = Custom::findOrFail($id);
        $custom->delete();
        return redirect()->route('custom.index');
    }
}
