<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Devisions;
use Illuminate\Http\Request;

class DevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $devisions = Devisions::latest()->paginate(3);
        return view('admins.devisions', compact('devisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.tambahdevisions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bagian'=> 'required|unique:devisions,bagian',
            'gaji'=> 'required|numeric'
            ]);

        Devisions::create($request->all());
        return redirect('/devisions')->with('status', 'Data bagian berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Devisions  $devisions
     * @return \Illuminate\Http\Response
     */
    public function show(Devisions $devisions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @param  \App\Models\Devisions  $devisions
     * @return \Illuminate\Http\Response
     */
    public function edit(Devisions $id)
    {
        return view('admins.editdevisions', ['devisions' =>$id]);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Devisions  $devisions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Devisions $id)
    {
        $request->validate([
            // 'bagian'=> 'required|unique:devisions,bagian',
            'gaji'=> 'required|numeric'
            ]);

        Devisions::where('id', $id->id)->update([
            // 'bagian' => $request -> bagian,
            'gaji' => $request -> gaji,
        ]);
        
        return redirect('/devisions')->with('status', 'Data bagian berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @param  \App\Models\Devisions  $devisions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devisions $id)
    {
        Devisions::destroy($id->id);

        return redirect('/devisions')->with('status', 'Data bagian berhasil dihapus!');
    }
}
