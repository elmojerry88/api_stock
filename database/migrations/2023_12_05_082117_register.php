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
        
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('officer');
            $table->string('nip_officer');
            $table->string('weapon');
            $table->string('qtd_bullets');
            $table->string('weapon_number');
            $table->enum('status', ['entregue','não entregue'])->default('não entregue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
