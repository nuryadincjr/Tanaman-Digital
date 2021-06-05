<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;

    protected $table = 'types';
    protected $primaryKey = 'id';
    protected $fillable = ['id','jenis'];

    public function inventories()
    {
        return $this->hasMany(Inventories::class);
    }
}
