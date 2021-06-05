<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;
    
    protected $table = 'units';
    protected $primaryKey = 'id';
    protected $fillable = ['id','unit'];

    public function inventories()
    {
        return $this->hasMany(Inventories::class);
    }
}
