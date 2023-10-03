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
        Schema::create('complejo_campos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_complejo')->nullable();
            $table->unsignedBigInteger('id_campo')->nullable();
            $table->string('estado');
            $table->foreign('id_complejo')->references('id')->on('complejo_deportivos')->onDelete('set null');
            $table->foreign('id_campo')->references('id')->on('campos')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complejo_campos');
    }
};
