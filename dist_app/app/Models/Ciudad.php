<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';

    protected $fillable = [
        'nombre',
        'pais_id',
        'provincia_id'
    ];

    public function provincia(){
        return $this->belongsTo(Provincia::class);
    }

    public function pais(){
        return $this->belongsTo(Pais::class);
    }

    use HasFactory;
}
