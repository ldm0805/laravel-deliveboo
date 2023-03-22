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
        Schema::create('restaurateur_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurateur_id');
            $table->foreign('restaurateur_id')->references('id')->on('restaurateurs')->cascadeOnDelete();
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->cascadeOnDelete();
            
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
        Schema::dropIfExists('restaurateur_type');
    }
};
