<?php

namespace App\Models;

use App\Http\Controllers\UsuarioController;
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
        'publicacion_id',
        'usuario_id',
    ];

    public function usuario()
        {
            return $this->belongsTo(User::class, 'usuario_id');
        }
}
