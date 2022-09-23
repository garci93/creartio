<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{
    use HasFactory;

    protected $table = "recomendaciones";

    protected $fillable = [
        'destinatario_id',
        'texto',
    ];
}
