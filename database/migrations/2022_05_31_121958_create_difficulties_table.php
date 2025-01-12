<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDifficultiesTable extends Migration
{
    public function up()
    {
        Schema::create('difficulties', static function (Blueprint $table) {
            $table->id();
            $table->jsonb('title');
            $table->string('level');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('difficulties');
    }
}
