<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParceldatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parceldatas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parcel_id')->unsigned();
            $table->foreign('parcel_id')->references('id')->on('parcels');
            $table->string('producttype')->nullable();
            $table->string('destination')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('parceldatas');
    }
}
