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
    ];

    public function archivo ()
        {
            return $this->hasOne(Archivo::class, 'id', 'archivo_id');
        }

    public function comentarios()
        {
            return $this->hasMany(Comentario::class)->whereNull('padre_id');
        }

}
