<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('retailPrice');
            $table->float('wholesalePrice');
            $table->string('image', 255)->default('image.png');
            $table->string('type');
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
        Schema::dropIfExists('sides');
    }
}
