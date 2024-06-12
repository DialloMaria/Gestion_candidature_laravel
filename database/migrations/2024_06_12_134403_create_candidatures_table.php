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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->text('biographie');
            $table->text('motivation');
            $table->enum('etat', ['en_evaluation','en_attente', 'accepter', 'refuser']);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('formation_id');
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
        $table->dropForeign('candidatures_user_id_foreign');
        $table->dropColumn('user_id');
        $table->dropForeign('candidatures_formation_id_foreign');
        $table->dropColumn('formation_id');
    }
};
