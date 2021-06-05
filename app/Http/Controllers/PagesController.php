<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        return view('shops.home');
    }
    public function shop()
    {
        return view('shops.shop');
    }
    public function blog()
    {
        return view('shops.blog');
    }

}
