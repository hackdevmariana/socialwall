<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->boolean('is_category')->default(false)->after('name');
        });
    }

    public function down()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('is_category');
        });
    }
};
