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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('social_link')->nullable(); // Enlace opcional
            $table->string('featured_image')->nullable(); // Imagen destacada
            $table->enum('status', ['draft', 'scheduled', 'published'])->default('draft'); // Estado del post
            $table->timestamp('publication_date')->nullable(); // Fecha de publicación programada
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('social_link');
            $table->dropColumn('featured_image');
            $table->dropColumn('status');
            $table->dropColumn('publication_date');
        });
    }
};
