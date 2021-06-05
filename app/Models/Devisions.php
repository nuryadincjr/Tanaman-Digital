<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devisions extends Model
{
    use HasFactory;

    protected $table = 'devisions';
    protected $primaryKey = 'id';
    protected $fillable = ['id','bagian', 'gaji'];

    public function admins()
    {
        return $this->hasMany(Administrators::class , 'bagian_id');
    }

}
