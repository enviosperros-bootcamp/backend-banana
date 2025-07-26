<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id(); // id autoincremental
            $table->unsignedBigInteger('usuario_ID')->unique(); // FK a users
            $table->string('nombre_persona');
            $table->string('apellido_persona');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('imagenPerfil_url')->nullable();
            $table->timestamps();

            // Llave foránea para mantener integridad referencial
            $table->foreign('usuario_ID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
