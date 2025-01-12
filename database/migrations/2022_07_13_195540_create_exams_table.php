<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->boolean('retake')->default(false);
            $table->timestamp('start');
            $table->timestamp('finish');
            $table->integer('answers')->nullable()->default(0);
            $table->float('mark')->nullable()->default(0);
            $table->boolean('is_finished')->default(false);
            $table->string('token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exams');
    }
};
