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
        Schema::create('assign_reviewer', function (Blueprint $table) {
            $table->id();
            $table->string('menuscript_id');
            $table->string('assign_reviewer_id');
            $table->string('reviewer_remark');
            $table->string('reviewer_status');
            $table->timestamps();
        });
    }
    
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_reviewer');
    }
};
