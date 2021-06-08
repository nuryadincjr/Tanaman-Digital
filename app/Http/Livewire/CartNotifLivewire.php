<?php

namespace App\Http\Livewire;

use App\Models\Carts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartNotifLivewire extends Component
{
    public $data;

    protected $listeners = ['showdata' => 'showdata'];

    public function render()
    {
        $users = Auth::user()->id;
        $cartcount = Carts::where('users_id', $users)->count();

        $this->data = $cartcount;
        return view('livewire.cart-notif-livewire');
    }

    public function showdata()
    {
        $users = Auth::user()->id;
        $cartcount = Carts::where('users_id', $users)->count();

        $this->data = $cartcount;
    }
}
