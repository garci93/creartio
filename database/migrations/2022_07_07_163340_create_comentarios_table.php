<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('puntos');
            $table->string('fortalezas');
            $table->string('consejos');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            // $table->foreignId('padre_id')->constrained('comentarios')->onDelete('cascade')->nullable();
            $table->foreignId('publicacion_id')->constrained('publicaciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
