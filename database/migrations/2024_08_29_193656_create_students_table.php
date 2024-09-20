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
        Schema::create('students', function (Blueprint $table) {
            // $table->id(); 
            $table->string('ssn')->unique(); 
            $table->string('fname',30);
            $table->string('lname',30); 
            $table->string('email',255)->primary(); 
            $table->string('phone',11)->unique(); 
            // $table->enum('gender', ['m', 'f']); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
