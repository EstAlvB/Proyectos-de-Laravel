<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'name',
        'postal_code',
        'nomenclatura',
        'created_at',
        'updated_at'
    ];

    public function provincias(){
        return $this->hasMany(Provincia::class);
    }

    public function ciudades(){
        return $this->hasMany(Ciudad::class);
    }

    use HasFactory;
}
