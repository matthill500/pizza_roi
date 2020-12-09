<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealPizzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_pizza', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('deal_id')->unsigned();
          $table->biginteger('pizza_id')->unsigned();
          $table->timestamps();

          $table->foreign('deal_id')->references('id')->on('deals')->onDelete('cascade');
          $table->foreign('pizza_id')->references('id')->on('pizzas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deal_pizza');
    }
}
