<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('content', 10000);
            $table->string('post_desc', 250);
            $table ->string('creator', 100);
            $table->string('slug',250);
            $table ->string('thumnail', 250);
            $table -> enum('status',['Phê duyệt', 'Chờ duyệt', 'Thùng rác']);
            $table->unsignedBigInteger('post_cat');
            $table->string('slug_post',100);
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
        Schema::dropIfExists('posts');
    }
}
