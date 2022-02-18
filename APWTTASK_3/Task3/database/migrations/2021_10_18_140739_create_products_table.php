<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ProductId', 10)->primary();
            $table->string('ProductName',15);
            $table->string('ProductCode',10);
            $table->string('ProductDesc',55);
            $table->string('Quantity',10);
            $table->string('Category',10);
            $table->string('Price',10);
            $table->string('StockDate',15);
            $table->string('Rating',10);
            $table->string('PurchasedDate',15);
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
        Schema::dropIfExists('products');
    }
}
