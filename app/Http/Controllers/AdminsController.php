<?php

namespace App\Http\Controllers;

use App\Models\Devisions;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
class AdminsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $admins = Admins::with('devisions')->latest()->paginate(3);

        // dd($admins);
        return view('admins.admins', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $devisions = Devisions::all();
    
        return view('admins.tambahadmins', ['devisions' => $devisions]);
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
            'email' => 'required|unique:admins,email',
            'telpon' => 'required|numeric',
            'password' => 'required',
            'photo' => 'mimes:jpg,jpeg,png,bmp,gif|image|max:2000',
            'bagian_id' => 'Required'
        ]);

        $password = bcrypt($request->password);

        $status = ($request->status=='Aktif') ? true : false;

        $base64 = null;
        if ($request->photo != null) {
            $file = $request->file('photo')->getRealPath();
            $logo = file_get_contents($file);
            $base64 = base64_encode($logo);
        }

        Admins::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telpon' => $request->telpon,
            'photo' => $base64,
            'password' => $password,
            'status' => $status,
            'bagian_id' => $request->bagian_id,
            'alamat' => $request->alamat,

        ]);

        return redirect('/admins')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     * @param int @id
     * @param  \App\Models\Administrators  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(Admins $id)
    {
        return view('admins.detailadmins', ['admins' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @param  \App\Models\Administrators  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit(Admins $id)
    {
        $admins = Admins::with('devisions')->findOrFail($id->id);
        $devisions = Devisions::all();
    
        return view('admins.editadmins', ['admins' => $admins, 'devisions' => $devisions]);
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrators  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admins $id)
    {
        $request->validate([
            'nama' => 'required',
            'telpon' => 'required|numeric',
            'password' => 'required',
            'photo' => 'mimes:jpg,jpeg,png,bmp,gif|image|max:2000',
            'bagian_id' => 'Required'
        ]);

        $password = bcrypt($request->password);

        $status = ($request->status=='Aktif') ? true : false;

        $base64 = $id->photo;
        if ($request->photo != null) {
            $file = $request->file('photo')->getRealPath();
            $logo = file_get_contents($file);
            $base64 = base64_encode($logo);
        }

        Admins::where('id', $id->id)
        ->update([
            'nama' => $request->nama,
            'telpon' => $request->telpon,
            'photo' => $base64,
            'password' => $password,
            'status' => $status,
            'bagian_id' => $request->bagian_id,
            'alamat' => $request->alamat,

        ]);

        return redirect('/admins')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @param  \App\Models\Administrators  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admins $id)
    {
        Admins::destroy($id->id);
        return redirect('/admins')->with('status', 'Data berhasil dihapus!');
    }
}
