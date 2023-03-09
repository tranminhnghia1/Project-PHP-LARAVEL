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
            $table->id();
            $table->string('name',250);
            $table->string('slug_product',250);
            $table->unsignedBigInteger('price_product');
            $table->unsignedBigInteger('number_product');
            $table->string('featured',100);
            $table->string('product_thumb',250);
            $table->string('product_image',250);
            $table->text('content_desc',10000);
            $table->text('content');
            $table-> enum('status',['posted','waiting','dustin']);
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
