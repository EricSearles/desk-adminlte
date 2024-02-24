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
        Schema::create('access_level_pages', function (Blueprint $table) {
            $table->id();
            $table->integer('permission');
            $table->integer('order');
            $table->integer('dropdown');
            $table->integer('menu_release');
            $table->foreignId('menu_id')->constrained();
            $table->foreignId('page_id')->constrained();
            $table->foreignId('access_level_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_level_pages');
    }
};
