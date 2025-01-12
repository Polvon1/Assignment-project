<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    public function up()
    {
        Schema::create('quizzes', static function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->unsignedFloat('mark');
            $table->unsignedSmallInteger('duration');
            $table->text('description')->nullable();
            $table->string("image")->nullable();
            $table->boolean('show_answer')->default(false);
            $table->timestamp('start')->nullable();
            $table->timestamp('finish')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('difficulty_id')->constrained('difficulties');
            $table->foreignId('language_id')->constrained('languages');
            $table->boolean('is_public')->default(true);
            $table->unsignedSmallInteger('qty')->nullable();
            $table->foreignId('organization_id')->nullable()->constrained('users');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
