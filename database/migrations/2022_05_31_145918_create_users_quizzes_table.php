<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users_quizzes', static function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->index(['user_id','quiz_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_quizzes');
    }
};
