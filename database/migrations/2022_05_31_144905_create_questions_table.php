<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('a');
            $table->text('b');
            $table->text('c');
            $table->text('d');
            $table->text('answer_explain');
            $table->string('answer');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
