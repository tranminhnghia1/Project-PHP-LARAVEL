<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code',100);
            $table->string('image_product',200);
            $table->string('product_name',200);
            $table->string('fullname',100);
            $table->string('adress',250);
            $table->string('province',250);
            $table->string('district',250);
            $table->string('ward',250);
            $table->string('email',250);
            $table->text('note',1000);
            $table-> enum('status',['success','waiting','pending','dustin']);
            $table-> enum('payment',['home','direct']);
            
            $table->unsignedBigInteger('total_price');
            $table->unsignedBigInteger('sub_total');
            $table->unsignedBigInteger('product_price');
            $table->unsignedBigInteger('phone_number');
            $table->unsignedBigInteger('num_order');
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
        Schema::dropIfExists('info_orders');
    }
}
