<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 40)->unique();
            $table->string('texto')->nullable();
            //$table->foreignId('colaborador_id')->constrained('users')->onDelete('null')->nullable(); //Añadir más adelante con migración
            $table->foreignId('archivo_id')->constrained('archivos')->onDelete('cascade');
            $table->timestamp('fecha_publicacion');
            $table->timestamp("fecha_ultima_edicion")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
}
