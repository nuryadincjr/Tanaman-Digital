<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Citypays;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = Auth::user()->id;
        $user = Auth::user();
        $ongkir = Citypays::get()->sortBy('kota');
        $carts = Carts::with('users', 'inventories.types', 'inventories.units')->where('users_id',$users)->get();
        return view('shops.checkout', ['carts' => $carts, 'users' => $user, 'ongkir'=> $ongkir]);
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
     * @param boolean $bol
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = DB::table('carts')->where([
            ['users_id', '=', $request->user()->id],
            ['inventories_id', '=', $request->id],
        ])->first();
        

        if($users == null){
            Carts::create([
                'quntity' => 1,
                'users_id' => $request->user()->id,
                'inventories_id' => $request->id,
            ]);
        }

        return redirect('/checkout')->with('status', 'Berhasil ditambakan kekeranjang!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show(Carts $carts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function edit(Carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carts $carts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carts::destroy($id);

        return redirect('/checkout')->with('status', 'Berhasil ditambakan kekeranjang!');
    }


    public function incresaseQty($id)
    {
        $inventories = Carts::get($id);
        $qty = $inventories->quntity + 1;
        Carts::update($id, $qty);
    }
    
    public function desresaseQty($id)
    {
        $inventories = Carts::get($id);
        $qty = $inventories->quntity - 1;
        Carts::update($id, $qty);
    }

    public function tes($id)  {

        dd($id);
        $users = Auth::user()->id;
        $users = DB::table('carts')->where([
            ['users_id', '=', $users],
            ['inventories_id', '=', $id],
        ])->first();
        

        if($users == null){
            Carts::create([
                'quntity' => 1,
                'users_id' => $users,
                'inventories_id' => $id,
            ]);
        }
    }
}
