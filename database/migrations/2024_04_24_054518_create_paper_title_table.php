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
        Schema::create('paper_title', function (Blueprint $table) {
            $table->id();
            $table->string('title_of_paper');
            $table->string('author_name');
            $table->string('affiliation');
            $table->string('email');
            $table->string('abstract');
            $table->string('keyword');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paper_title');
    }
};
