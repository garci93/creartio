<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coleccion extends Model
{
    use HasFactory;

    protected $table = "colecciones";

    protected $fillable = [
        'titulo',
    ];

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

}
