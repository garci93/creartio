<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = "comentarios";

    protected $fillable = [

        'puntos',
        'fortalezas',
        'consejos',
        'padre_id',
        'publicacion_id',
    ];

    public function comentarios()
        {
            return $this->hasMany(Comentario::class)->whereNull('padre_id');
        }
}
