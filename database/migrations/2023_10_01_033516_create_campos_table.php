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
        Schema::create('campos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_campo_id')->nullable();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('horario');
            $table->integer('capacidad');
            $table->double('precio');
            $table->string('estado');
            $table->foreign('tipo_campo_id')->references('id')->on('tipo_campos')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campos');
    }
};
