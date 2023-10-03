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
            $table->unsignedBigInteger('id_tipo_campo')->nullable();
            $table->string('nombre');
            $table->string('descripcion');
            $table->dateTime('horario');
            $table->integer('capacidad');
            $table->double('precio');
            $table->string('estado');
            $table->foreign('id_tipo_campo')->references('id')->on('tipo_campos')->onDelete('set null');
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
