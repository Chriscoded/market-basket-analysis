<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('product_name');
            $table->integer('qty')->default(0);
            $table->string('jenis');
            $table->integer('bv')->default(0);
            $table->timestamps();
        });

        Schema::create('product_details', function (Blueprint $table){
            $table->id();
            $table->foreignId('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('harga')->default(0);
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
        Schema::dropIfExists('members'); 
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_details');   
    }
}
