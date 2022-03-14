<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_rating', function (Blueprint $table) {
            $table->id();
            
$table->integer('rating');
$table->string('review');
$table->integer('productId')->unsigned()->index(); 
$table->string('customerName'); 
$table->string('productName');   
$table->integer('customerId')->unsigned()->index();  
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
        Schema::dropIfExists('products_rating');
    }
}
