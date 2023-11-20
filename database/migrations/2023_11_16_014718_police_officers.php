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
        
        Schema::create('police_officers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('division');
            $table->string('category');
            // $table->enum('gender' ,['masculino', 'feminino', 'outro']);
            $table->string('nip')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('police_officers');
    }
};