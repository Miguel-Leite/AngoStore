<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCartproduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartsproducts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("carts_id")->constrained()->cascadeOnDelete();
            $table->foreignId("products_id")->constrained()->cascadeOnDelete();
            $table->dateTime("dtremoved");
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
        Schema::dropIfExists('cartsproducts');
    }
}
