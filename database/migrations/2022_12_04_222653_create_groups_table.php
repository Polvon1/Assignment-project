<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('groups', static function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('link')->unique()->index();
            $table->boolean('status')->default(false);
            $table->timestamp('start')->nullable();
            $table->timestamp('finish')->nullable();
            $table->unsignedInteger('qty')->default(0);
            $table->foreignId('organization_id')->constrained('users');
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('groups');
    }
};
