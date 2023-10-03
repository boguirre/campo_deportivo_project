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
        Schema::create('reserva_horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_reserva')->nullable();
            $table->unsignedBigInteger('id_horario')->nullable();
            $table->string('estado');
            $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('set null');
            $table->foreign('id_horario')->references('id')->on('horarios')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_horarios');
    }
};
