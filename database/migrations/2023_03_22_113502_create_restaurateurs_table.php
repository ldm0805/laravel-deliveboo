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
        Schema::create('restaurateurs', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50)->unique()->required();
            $table->string('password', 50)->required();
            $table->string('name', 50)->required();
            $table->string('slug', 70);
            $table->string('address', 100)->required();
            $table->string('p_iva', 11)->required();
            $table->string('image')->nullable();

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
        Schema::dropIfExists('restaurateurs');
    }
};
