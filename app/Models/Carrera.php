<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrera',
        'resolucion', 
        'pdf',
    ];

    public function noticiasCarrera()
    {
       return $this->hasMany(Noticia::class, 'carrera_id');
    }

    public function Examen(){
        return $this->hasMany(Examen::class);
    }
}
