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
        Schema::create('produit_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Produit_id')->references('id')->on('produits')
                ->onDelete('cascade');
            $table->foreignId('User_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->date('Date_Ajout');
            $table->date('Date_Expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits_user');
    }
};
