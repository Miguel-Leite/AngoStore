<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userslogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("users_id")->constrained()->cascadeOnDelete();
            $table->string("log",128);
            $table->string("ip");
            $table->string("useragent",128);
            $table->string("sessionid",64);
            $table->string("url",150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userslogs');
    }
}
