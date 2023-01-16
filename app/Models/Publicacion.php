<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    const CREATED_AT = 'fecha_publicacion';
    const UPDATED_AT = 'fecha_ultima_edicion';

    protected $table = "publicaciones";

    protected $fillable = [
        'titulo',
        'texto',
        'usuario_id',
    ];

    public function archivo ()
        {
            return $this->hasOne(Archivo::class, 'id', 'archivo_id');
        }

    public function comentarios()
        {
            return $this->hasMany(Comentario::class);
        }

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }

    public function usuario ()
    {
        return $this->hasOne(User::class, 'id', 'usuario_id');
    }

    public function colecciones()
    {
        return $this->hasMany(Coleccion::class);
    }

}
