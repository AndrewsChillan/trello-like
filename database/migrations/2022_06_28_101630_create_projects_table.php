<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('users_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('projets');
    }
};