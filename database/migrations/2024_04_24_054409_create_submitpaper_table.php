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
        Schema::create('submitpaper', function (Blueprint $table) {
            $table->id();
            $table->string('title_of_paper');
            $table->string('author_name');
            $table->string('affilation');
            $table->string('email');
            $table->string('abstract');
            $table->string('keyword');
            $table->string('introduction');
            $table->string('results');
            $table->string('discussion');
            $table->string('materials_and_methods');
            $table->string('conclusion');
            $table->string('abbreviations');
            $table->string('declarations');
            $table->string('conflict_of_interests');
            $table->string('funding');
            $table->string('acknowledgment');
            $table->string('references');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submitpaper');
    }
};
