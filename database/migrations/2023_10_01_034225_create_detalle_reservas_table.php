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
        Schema::create('detalle_reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_reserva')->nullable();
            $table->unsignedBigInteger('id_campo')->nullable();
            $table->double('total');
            $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('set null');
            $table->foreign('id_campo')->references('id')->on('campos')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_reservas');
    }
};
