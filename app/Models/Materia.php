<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'materia', 
        'anio', 
        'programa'
    ];

    public function Carrera(){
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function Examen(){
        return $this->hasMany(Examen::class);
    }
}
