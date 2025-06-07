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
            $table->string('title');                                                        
            $table->string('slug')->unique();                                               
            $table->text('description');                                                     
            $table->date('start_date')->nullable();                                          
            $table->date('end_date')->nullable();                                            
            $table->enum('status', ['prévu', 'en cours', 'realisé'])->default('prévu'); 
            $table->decimal('budget', 15, 2)->nullable();                                    
            $table->string('image')->nullable();                                                                          
            $table->foreignId('user_id')->constrained();                                     
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
