<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Inventories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PagesController extends Controller
{

    
    public function home()
    {
        return view('index');
    }

    public function transaction()
    {
        return view('transaksi');
    }

    public function index()
    {
        $user = Auth::user();
        $cartcount = Carts::where('users_id', $user->id)->count();
        $slide = Inventories::wherenotnull('photo1')->latest()->get();
        $populer = Inventories::with('types', 'units')->oldest()->paginate(3);
        return view('shops.home', ['cartcount' => $cartcount, 'slide' => $slide, 'populer' => $populer]);
    }

    public function shop()
    {
        return view('shops.shop');
    }
    public function blog()
    {
        $user = Auth::user();
        $cartcount = Carts::where('users_id', $user->id)->count();
        return view('shops.blog', ['cartcount' => $cartcount]);
    }

}
