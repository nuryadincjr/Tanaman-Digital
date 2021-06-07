<?php

namespace App\Http\Livewire;

use App\Models\Carts;
use Livewire\Component;

class CartupdateLivewire extends Component
{
    public $data;
    public $post;
    public $quntity;

    protected $listeners = ['decQty' => 'showdata', 'incQty' => 'showdata',];

    public function render()
    {
        return view('livewire.cartupdate-livewire');
    }

    public function showdata($dataqty)
    {
       $this->quntity = $dataqty['quntity'];
    }



}
