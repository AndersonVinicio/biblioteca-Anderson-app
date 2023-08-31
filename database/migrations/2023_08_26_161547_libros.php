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
         Schema::create('libros',function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->string('isbn');
            $table->string('titulo');
            $table->string('autor');
            $table->date('año_publicacion');
            $table->string('genero');
            $table->boolean('disponible');
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
