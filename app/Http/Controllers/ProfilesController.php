<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cartcount = Carts::where('users_id', $user->id)->count();
        return view('shops.profil', ['users' => $user, 'cartcount' => $cartcount]);
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
    public function edit(Users $id)
    {
        $user = Auth::user();
        $cartcount = Carts::where('users_id', $user->id)->count();
        return view('shops.edit', ['users' => $id, 'cartcount' => $cartcount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $id)
    {
        $request->validate([
            'nama' => 'required',
            'telpon' => 'required|numeric',
            'photo' => 'mimes:jpg,JPEG,png,bmp,gif|image|max:2000'
        ]);

        $password = bcrypt($request->password);

        $status = ($request->status=='Aktif') ? true : false;
        
        $base64 = $id->photo;
        if ($request->photo != null) {
            $file = $request->file('photo')->getRealPath();
            $logo = file_get_contents($file);
            $base64 = base64_encode($logo);
        }

        Users::where('id', $id->id)
            ->update([
                'nama' => $request->nama,
                'telpon' => $request->telpon,
                'photo' => $base64,
                'password' => $password,
                'alamat' => $request->alamat,
                'status' => $status,
        ]);

        return redirect('/profil')->with('status', 'Data pengguna berhasil diubah!');
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
