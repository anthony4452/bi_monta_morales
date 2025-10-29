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
        Schema::table('careers', function (Blueprint $table) {
            $table->string('status')->change();
        });
    }

    public function down(): void
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->integer('status')->change(); // si antes era integer
        });
    }

};
