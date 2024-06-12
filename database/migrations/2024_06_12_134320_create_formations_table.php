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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->text('description');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('nombre_place');
            $table->enum('etat',['ouvert', 'fermer']);
            $table->text('image');
            $table->date('date_debut_appel');
            $table->date('date_fin_appel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
