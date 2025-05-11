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
        Schema::create('candidat_applyings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('job_createds')->onDelete('cascade');
            $table->foreignId('candidat_id')->constrained('candidats')->onDelete('cascade');
            $table->enum('statut', ['en attente', 'rejeté', 'entretien', 'offre envoyée','accepté'])->default('en attente');
            $table->string('cv_path')->nullable(); // Ajout du chemin du CV
            $table->string('lm_path')->nullable(); // Ajout du chemin de la Lettre de Motivation
            $table->text('message')->nullable(); // Ajout du champ pour le message
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidat_applyings');
    }
};
