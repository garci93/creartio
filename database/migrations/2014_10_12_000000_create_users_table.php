<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('email')->unique();
            $table->string('rol')->default('normal');
            $table->string('nom_completo');
            $table->string('biografia')->nullable();
            $table->string('idioma')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_photos_path',2048)->default('/fotos-perfil/def-avatar.png');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
