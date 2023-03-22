<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_plate', function (Blueprint $table) {
            $table->id();
            //creo la colonna per il project
            $table->unsignedBigInteger('order_id');
            //creo la colonna per il foreign
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
            //creo la colonna per il tag
            $table->unsignedBigInteger('plate_id');
            //creo la colonna per la foreign
            $table->foreign('plate_id')->references('id')->on('plates')->cascadeOnDelete();

            $table->tinyInteger('quantity')->unsigned();
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
        Schema::dropIfExists('order_plate');
    }
};
