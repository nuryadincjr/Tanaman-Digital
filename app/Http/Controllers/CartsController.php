<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = Auth::user()->id;
        $cartcount = Carts::where('users_id', $users)->count();
        $carts = Carts::with('users', 'inventories.types', 'inventories.units')->where('users_id',$users)->get();
        return view('shops.chart', ['carts' => $carts, 'cartcount' => $cartcount]);
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

        return redirect('/shop')->with('status', 'Berhasil ditambakan kekeranjang!');
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

        return redirect('/cart')->with('status', 'Berhasil ditambakan kekeranjang!');
    }


    // public function incresaseQty($id)
    // {
    //     $inventories = Carts::get($id);
    //     $qty = $inventories->quntity + 1;
    //     Carts::update($id, $qty);
    // }
    
    // public function desresaseQty($id)
    // {
    //     $inventories = Carts::get($id);
    //     $qty = $inventories->quntity - 1;
    //     Carts::update($id, $qty);
    // }

    public function tes($id)  {

        $users = Auth::user()->id;

        Carts::where('id',' 30')
            ->update([
                'quntity' => 222,
            ]);
    }
}
