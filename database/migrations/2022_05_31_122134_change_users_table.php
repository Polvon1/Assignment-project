<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->foreignId('region_id')->nullable()->constrained('regions');
            $table->foreignId('district_id')->nullable()->constrained('districts');
        });
    }

    public function down()
    {
        Schema::table('users', static function (Blueprint $table) {});
    }
};
