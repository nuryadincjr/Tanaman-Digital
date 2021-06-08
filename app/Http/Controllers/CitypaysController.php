<?php

namespace App\Http\Controllers;

use App\Models\Citypays;
use Illuminate\Http\Request;

class CitypaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ongkir = Citypays::latest()->paginate(3);

        return view('citypays.kota', ['ongkir' => $ongkir]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citypays.tambahkota');
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
            'kota' => 'required',
            'harga' => 'required|numeric',
        ]);

        Citypays::create([
            'kota' => $request->kota,
            'harga' => $request->harga,
        ]);

        return redirect('/kota')->with('status', 'Data berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CityPays  $cityPays
     * @return \Illuminate\Http\Response
     */
    public function show(CityPays $cityPays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @param  \App\Models\CityPays  $cityPays
     * @return \Illuminate\Http\Response
     */
    public function edit(CityPays $id)
    {
        return view('citypays.editkota', ['ongkir' => $id]);
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CityPays  $cityPays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityPays $id)
    {
        $request->validate([
            'kota' => 'required',
            'harga' => 'required|numeric',
        ]);

        Citypays::where('id', $id->id)
            ->update([
                'kota' => $request->kota,
                'harga' => $request->harga,
            ]);

        return redirect('/kota')->with('status', 'Data berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *  @param int $id
     * @param  \App\Models\CityPays  $cityPays
     * @return \Illuminate\Http\Response
     */
    public function destroy(CityPays $id)
    {
        Citypays::destroy($id->id);
        return redirect('/kota')->with('status', 'Data berhasil di hapus!');
    }
}
