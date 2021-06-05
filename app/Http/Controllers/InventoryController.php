<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use App\Models\Types;
use App\Models\Units;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inventory = Inventories::with('types', 'units')->latest()->paginate(3);

        return view('inventory.barang', ['inventory' => $inventory]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Types::all();
        $units = Units::all();
    
        return view('inventory.tambahbarang', ['types' => $types, 'units' => $units]);
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
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'photo1' => 'mimes:jpg,jpeg,png,bmp,gif|image|max:2000',
            'photo2' => 'mimes:jpg,jpeg,png,bmp,gif|image|max:2000'
        ]);

        $base64 = null;
        if ($request->photo1 != null) {
            $file = $request->file('photo1')->getRealPath();
            $logo = file_get_contents($file);
            $base64 = base64_encode($logo);
        }

        $base642 = null;
        if ($request->photo2 != null) {
            $file2 = $request->file('photo2')->getRealPath();
            $logo2 = file_get_contents($file2);
            $base642 = base64_encode($logo2);
        }

        Inventories::create([
            'nama' => $request->nama,
            'types_id' => $request->jenis,
            'units_id' => $request->unit,
            'harga' => $request->harga,
            'photo1' => $base64,
            'photo2' => $base642,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/barang')->with('status', 'Data berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inventories $id)
    {
        
        return view('inventory.detailbarang', ['inventory' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventories $id)
    {
        $inventory = Inventories::with('types', 'units')->findOrFail($id->id);
        $types = Types::all();
        $units = Units::all();

        return view('inventory.editbarang', ['inventory' => $inventory, 'types' => $types, 'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param \App\Models\Inventories $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventories $id)
    {

        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'photo1' => 'mimes:jpg,jpeg,png,bmp,gif|image|max:2000',
            'photo2' => 'mimes:jpg,jpeg,png,bmp,gif|image|max:2000'
        ]);

        $base64 = $id->photo1;
        if ($request->photo1 != null) {
            $file = $request->file('photo1')->getRealPath();
            $logo = file_get_contents($file);
            $base64 = base64_encode($logo);
        }

        $base642 = $id->photo2;
        if ($request->photo2 != null) {
            $file2 = $request->file('photo2')->getRealPath();
            $logo2 = file_get_contents($file2);
            $base642 = base64_encode($logo2);
        }

        Inventories::where('id', $id->id)
            ->update([
                'nama' => $request->nama,
                'types_id' => $request->jenis,
                'units_id' => $request->unit,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'keterangan' => $request->keterangan,
                'photo1' => $base642,
                'photo2' => $base64
            ]);

        return redirect('/barang')->with('status', 'Data berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Inventories::destroy($id);
        // return redirect('/barang')->with('status', 'Data berhasil di hapus!');
    }
}
