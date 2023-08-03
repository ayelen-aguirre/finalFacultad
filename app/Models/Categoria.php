<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria',
    ];

    public function noticiasCategoria()
    {
       return $this->hasMany(Categoria::class, 'categoria_id');
    }
}
