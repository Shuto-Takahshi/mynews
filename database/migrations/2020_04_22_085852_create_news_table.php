<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id'); //ニュースを投稿したユーザーのカラム
            $table->string('title'); //ニュースのタイトルを保存するカラム
            $table->text('body'); //ニュースの本文を保存するカラム
            $table->string('image_path')->nullable(); //画像のパスを保存するカラム　空でも可
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
        Schema::dropIfExists('news');
    }
}
