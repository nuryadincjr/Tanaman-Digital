<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    protected $fillable = ['quntity', 'users_id', 'inventories_id'];

    public function users()
    {
        return $this->belongsTo(Users::class, 'users_id');
    }

    public function inventories()
    {
        return $this->belongsTo(Inventories::class);
    }
}
