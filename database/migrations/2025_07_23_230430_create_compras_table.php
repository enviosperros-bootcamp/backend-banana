<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Corre la migracion
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_ID'); // Relación con usuario que hizo la compra
            $table->date('fecha'); // Fecha de la compra
            $table->string('tipo_pago'); // Tipo de pago, ej. tarjeta, efectivo, etc.
            $table->decimal('total', 10, 2); // Monto total de la compra
            $table->timestamps();

            // Llave foránea para integridad referencial
            $table->foreign('usuario_ID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    //Reversa de la migracion
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
