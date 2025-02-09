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
        Schema::create('about_itens', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_disabled')->default(false)->nullable();;
            $table->text('url')->nullable();
            $table->text('icon')->nullable();
            $table->text('title')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_itens');
    }
};
