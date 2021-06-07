<?php

namespace App\Http\Livewire;

use App\Models\Carts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartLivewire extends Component
{
    public $data;
    public $post;
    public $dataqty;
    
    public function render()
    {
        return view('livewire.cart-livewire');
        $this->emit('showdata');
    }

    public function incQty(Carts $id)
    {
        $finddata = Carts::find($id->id);

        Carts::where('id', $id->id)
        ->update([
            'quntity' => $finddata->quntity+1,
        ]);

        $carts = Carts::where('id', $id->id)->first();
        $this->dataqty = $carts->quntity;

        $this->emit('incQty', $carts);
    }

    public function decQty(Carts $id)
    {
        $finddata = Carts::find($id->id);

        if( $finddata->quntity!=1){
            Carts::where('id', $id->id)
            ->update([
                'quntity' => $finddata->quntity-1,
            ]);
        }
      
        $carts = Carts::where('id', $id->id)->first();
        $this->dataqty = $carts->quntity;

        $this->emit('decQty', $carts);


    }

    // public function showdata($dataqty)
    // {
    //    dd($dataqty);
    // }

}
