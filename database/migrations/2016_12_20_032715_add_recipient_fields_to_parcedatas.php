<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecipientFieldsToParcedatas extends Migration
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
            $table->string('recipient_name')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
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
            $table->dropColumn('recipient_name');
            $table->dropColumn('zipcode');
            $table->dropColumn('address');
            $table->dropColumn('phone');
        });
    }
}
