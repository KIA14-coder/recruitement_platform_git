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
        Schema::create('job_createds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employeur_id')->constrained('employeurs')->onDelete('cascade');
            $table->string('url')->nullable();;
            $table->string('entreprise');
            $table->string('titre');
            $table->text('description');
            $table->enum('type_contrat', ['CDI', 'CDD', 'Interim', 'Stage','Alternance']);
            $table->enum('Horaires', ['temps_plein', 'temps_partel','week-ends'])->default('temps_plein');
            $table->enum('teletravail', ['Oui', 'Non'])->default('Oui');
            $table->decimal('salaire', 10, 2)->nullable();
            $table->string('lieu');
            $table->timestamp('date_publication')->useCurrent();
            $table->timestamp('date_expiration')->nullable();
            $table->enum('statut', ['ouvert', 'fermé'])->default('ouvert');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_createds');
    }
};
