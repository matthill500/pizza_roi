<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaTopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_tops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pizza_id')->unsigned();
            $table->biginteger('topping_id')->unsigned();
            $table->timestamps();

            $table->foreign('pizza_id')->references('id')->on('pizzas')->onDelete('cascade');
            $table->foreign('topping_id')->references('id')->on('toppings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_tops');
    }
}
