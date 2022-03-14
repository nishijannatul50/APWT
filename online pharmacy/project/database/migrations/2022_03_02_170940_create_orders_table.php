<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('customerName');
            $table->string('Address');
            $table->string('phone');
            $table->string('price');
            $table->string('status');
            $table->string('method');
            $table->integer('productId')->unsigned()->index(); 
            $table->integer('customerId')->unsigned()->index(); 
            $table->integer('sellerId')->unsigned()->index(); 
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
        Schema::dropIfExists('orders');
    }
}
