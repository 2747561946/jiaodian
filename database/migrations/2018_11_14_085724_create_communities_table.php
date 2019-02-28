<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->comment('题目');
            $table->longText('content')->comment('内容');
            $table->string('logo')->comment('图片');
            $table->integer('display')->default('0')->comment('浏览量');
            $table->string('discuss')->default('0')->comment('评论');
            $table->integer('cat_id')->comment('分类');
            $table->integer('user_id')->comment('用户ID');
            $table->integer('lab_id')->comment('标签');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communities');
    }
}
