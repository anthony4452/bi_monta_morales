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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->unsignedBigInteger('faculty_id'); // FK a faculties
            $table->integer('duration_years')->nullable();
            $table->string('level')->nullable();
            $table->string('degree_awarded')->nullable();
            $table->boolean('status')->default(1);

            // Clave foránea
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
