<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("carts_id")->constrained()->cascadeOnDelete();
            $table->foreignId("users_id")->constrained()->cascadeOnDelete();
            $table->foreignId("orderstatus_id")->constrained("ordersstatus","id")->cascadeOnDelete();
            $table->decimal("vltotal",10);
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
        Schema::dropIfExists('orders');
    }
}
