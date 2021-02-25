<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actual_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('top_id')->unsigned()->nullable();
            $table->bigInteger('side_id')->unsigned()->nullable();
            $table->float('Qty')->default('0');
            $table->date('date')->nullable();

            $table->foreign('top_id')->references('id')->on('toppings')->onDelete('cascade');
            $table->foreign('side_id')->references('id')->on('sides')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actual_stock');
    }
}
