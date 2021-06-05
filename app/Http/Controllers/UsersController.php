<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::latest()->paginate(3);
        return view('users.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.tambahusers');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email',
            'telpon' => 'required|numeric',
            'password' => 'required',
            'photo' => 'mimes:jpg,jpeg,png,bmp,gif|image|max:2000'
        ]);

        $password = bcrypt($request->password);

        $status = ($request->status=='Aktif') ? true : false;
        
        $base64 = null;
        if ($request->photo != null) {
            $file = $request->file('photo')->getRealPath();
            $logo = file_get_contents($file);
            $base64 = base64_encode($logo);
        }

        Users::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telpon' => $request->telpon,
            'photo' => $base64,
            'password' => $password,
            'alamat' => $request->alamat,
            'status' => $status,
        ]);

        return redirect('/users')->with('status', 'Data pengguna berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $id)
    {
        return view('users.detailusers', ['users' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $id)
    {
        return view('users.editusers', ['users' => $id]);
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $id)
    {
        $request->validate([
            'nama' => 'required',
            'telpon' => 'required|numeric',
            'password' => 'required',
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

        return redirect('/users')->with('status', 'Data pengguna berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::destroy($id);
        return redirect('/users')->with('status', 'Data pengguna berhasil dihapus!');
    }
}
