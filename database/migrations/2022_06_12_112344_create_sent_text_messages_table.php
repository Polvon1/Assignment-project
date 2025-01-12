<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sent_text_messages', function (Blueprint $table) {
            $table->id();
            $table->string('recipient');
            $table->string('message_id');
            $table->string('originator')->default('3700');
            $table->string('text');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sent_text_messages');
    }
};
