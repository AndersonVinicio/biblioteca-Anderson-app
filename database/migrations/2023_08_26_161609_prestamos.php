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
        Schema::create('prestamos',function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('libro_id');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');

            $table->foreign('libro_id')->references('id')->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
