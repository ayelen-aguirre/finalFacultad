<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{

    protected $fillable = [
        'carrera_id', 
        'anio',
        'materia_id', 
        'fecha', 
        'vocal1',
        'vocal2',
        'vocal3'
    ];

    public function Carrera(){
        return $this->belongsTo(Carrera::class);
    }

    public function Materia(){
        return $this->belongsTo(Materia::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
