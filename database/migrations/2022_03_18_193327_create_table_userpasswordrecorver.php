<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserpasswordrecorver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userspasswordsrecorveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId("users_id")->constrained()->cascadeOnDelete();
            $table->string("ip",45);
            $table->dateTime("dtrecovery");
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
        Schema::dropIfExists('userspasswordsrecorveries');
    }
}
