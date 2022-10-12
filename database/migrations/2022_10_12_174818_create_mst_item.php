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
        Schema::create('mst_item', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->tinyInteger('merk')->unsigned();
            $table->foreign('merk')->references('id')->on('ref_merk');
            $table->tinyInteger('model')->unsigned();
            $table->foreign('model')->references('id')->on('ref_model');
            $table->tinyInteger('type')->unsigned();
            $table->foreign('type')->references('id')->on('ref_type');
            $table->bigInteger('price');
            $table->integer('year');
            $table->enum('fuel', ['Bensin', 'Solar']);
            $table->integer('cc');
            $table->enum('transmition', ['Matic', 'Manual']);
            $table->string('color', 15)->nullable();
            $table->integer('mileage')->nullable();
            $table->tinyText('desc')->nullable();
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
        Schema::dropIfExists('mst_item');
    }
};
