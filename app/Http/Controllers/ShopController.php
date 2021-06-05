<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use App\Models\Types;
use App\Models\Units;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Types::get();
        $inventory = Inventories::with('types', 'units')->latest()->paginate(6);
        $populer = Inventories::with('types', 'units')->oldest()->paginate(6);

        return view('shops.shop', ['inventory' => $inventory, 'populer' => $populer, 'types' => $types]); 
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
     * @param int $stok
     * @param string $avilable
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inventories $id)
    {
        $stok = $id->stok;

        if($stok>=0){
            $avilable = 'Tersedia';
        } else{
            $avilable = 'Tidak Tersedia';
        }
        return view('shops.detail', ['inventory' => $id, 'avilable' => $avilable]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
