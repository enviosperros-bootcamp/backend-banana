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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_ID'); // Relación con user que creó el evento
            $table->string('titulo_evento');
            $table->text('descripcion_evento')->nullable();
            $table->dateTime('hora_inicio');
            $table->dateTime('hora_fin')->nullable();
            $table->date('fecha');
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
        Schema::dropIfExists('eventos');
    }
};
