<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Types::latest()->paginate(3);
        return view('inventory.jenis', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.tambahjenis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['jenis'=> 'required|unique:types,jenis']);

        Types::create($request->all());
        return redirect('/jenis')->with('status', 'Data jenis berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function show(Types $types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @param  \App\Models\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function edit(Types $id)
    {
        return view('inventory.editjenis', ['types' =>$id]);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Types $id)
    {
        $request->validate(['jenis'=> 'required|unique:types,jenis']);
        
        Types::where('id', $id->id)->update([
            'jenis' => $request -> jenis,
        ]);
        
        return redirect('/jenis')->with('status', 'Data jenis berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @param  \App\Models\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function destroy(Types $id)
    {
        Types::destroy($id->id);

        return redirect('/jenis')->with('status', 'Data jenis berhasil dihapus!');
    }
}
