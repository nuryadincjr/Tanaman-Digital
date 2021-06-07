<?php

namespace App\Http\Livewire;

use App\Models\Carts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartAddeupdateLivewire extends Component
{

    public $post;

    public function render()
    {
        return view('livewire.cart-addeupdate-livewire');
    }

    public function add($id)
    {

        $uid = Auth::user()->id;
        $users = DB::table('carts')->where([
            ['users_id', '=', $uid],
            ['inventories_id', '=', $id['id']],
        ])->first();
        

        if($users == null){
            Carts::create([
                'quntity' => 1,
                'users_id' => $uid,
                'inventories_id' =>  $id['id'],
            ]);
        }else{
            Carts::where('id', $users->id)
            ->update([
                'quntity' =>$users->quntity+1,
            ]);
        }
    }
}
