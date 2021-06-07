<?php

namespace App\Http\Livewire;

use App\Models\Carts;
use Livewire\Component;

class CartPieceupdateLivewire extends Component
{
    public $data;
    public $post;
    public $quntity;
    public $picecount;

    protected $listeners = ['decQty' => 'showdata', 'incQty' => 'showdata', 'showdata' => 'showdata'];

    public function render()
    {
        $carts = Carts::with('users', 'inventories.types', 'inventories.units')
        ->where('users_id', '3')->get();
        $total = 0;
        foreach ($carts as $key) {
        $total += $key->quntity*$key->inventories->harga;
        }

        $this->picecount = $total;
        return view('livewire.cart-pieceupdate-livewire');
    }

    public function showdata($dataqty)
    {
        $carts = Carts::with('users', 'inventories.types', 'inventories.units')
            ->where('users_id', $dataqty['users_id'])->get();
        $total = 0;
        foreach ($carts as $key) {
           $total += $key->quntity*$key->inventories->harga;
        }

        $this->picecount = $total;
    }

}
