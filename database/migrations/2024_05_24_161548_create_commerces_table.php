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
        Schema::create('commerces', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit');
            $table->string('prix_produit');
            $table->longText('descript_produit');
            $table->string('idCategorie');
            $table->string('idCouleur')->nullable(); // Champ nullable;
            $table->string('idTaille')->nullable(); // Champ nullable;
            $table->string('image');
            $table->timestamps();
            $table->integer('user_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commerces');
    }
};
