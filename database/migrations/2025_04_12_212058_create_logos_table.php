<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('logos', function (Blueprint $table) {
            $table->id();
            $table->string('first_word');
            $table->string('second_word')->nullable();
            $table->string('slogan')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('logos');
    }
};
