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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');                                                         // Titre du projet
            $table->string('slug')->unique();                                                // Slug pour URL (ex: amenagement-rural)
            $table->text('description');                                                     // Description détaillée
            $table->date('start_date')->nullable();                                          // Date de début
            $table->date('end_date')->nullable();                                            // Date de fin
            $table->enum('status', ['prévu', 'en cours', 'terminé'])->default('prévu'); // État du projet
            $table->decimal('budget', 15, 2)->nullable();                                    // Budget alloué
            $table->string('image')->nullable();                                             // Image principale (visuel)                                          // Partenaires impliqués
            $table->foreignId('user_id')->constrained();                                     // Auteur ou responsable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
