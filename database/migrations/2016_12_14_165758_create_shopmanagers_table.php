<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopmanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopmanagers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_type');
            $table->string('phone')->nullable();;
            $table->string('address')->nullable();;
            $table->string('bankname')->nullable();;
            $table->string('bankaccount')->nullable();;
            $table->integer('cod')->default(0);
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
        Schema::dropIfExists('shopmanagers');
    }
}
