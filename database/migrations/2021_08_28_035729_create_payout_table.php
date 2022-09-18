<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('no_transaction')->nullable();
            $table->string('product_name1')->nullable();
            $table->string('product_name2')->nullable();
            $table->string('product_name3')->nullable();
            $table->string('product_name4')->nullable();
            $table->string('qty1')->nullable();
            $table->string('qty2')->nullable();
            $table->string('qty3')->nullable();
            $table->string('qty4')->nullable();
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
        Schema::dropIfExists('payout');
    }
}
