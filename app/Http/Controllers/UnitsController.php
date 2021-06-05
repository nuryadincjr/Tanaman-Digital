<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Units::latest()->paginate(3);

        return view('inventory.unit', ['units' => $units]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.tambahunit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['unit' => 'required|unique:units,unit']);

        // dump($request);
        Units::create($request->all());
        return redirect('/unit')->with('status', 'Data unit berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function show(Units $units)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @param  \App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function edit(Units $id)
    {
        return view('inventory.editunit', ['units' => $id]);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Units $id)
    {
        $request->validate(['unit' => 'required|unique:units,unit']);

        Units::where('id', $id->id)->update([
            'unit' => $request -> unit,
        ]);

        return redirect('/unit')->with('status', 'Data unit berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     * @parm int $id
     * @param  \App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function destroy(Units $id)
    {
        Units::destroy($id->id);

        return redirect('/unit')->with('status', 'Data unit berhasil dihapus!');
    }
}
