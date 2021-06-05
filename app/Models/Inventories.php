<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventories extends Model
{
    use HasFactory;

    protected $table = 'inventories';
    protected $primaryKey = 'id';
    protected $fillable = ['id','nama','types_id', 'jenis','units_id','harga','stok','photo1','photo2','keterangan'];

    public function types()
    {
        return $this->belongsTo(Types::class);
    }
    
    public function units()
    {
        return $this->belongsTo(Units::class);
    }

    public function carts()
    {
        return $this->hasOne(Carts::class);
    }
}
