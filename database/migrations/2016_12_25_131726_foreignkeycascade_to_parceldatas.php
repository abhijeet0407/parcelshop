<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignkeycascadeToParceldatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parceldatas', function (Blueprint $table) {
            //
            $table->dropForeign(['parcel_id']);
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parceldatas', function (Blueprint $table) {
            //
        });
    }
}
