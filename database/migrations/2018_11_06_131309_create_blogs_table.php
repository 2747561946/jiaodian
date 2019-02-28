<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->timestamps();
            $table->string('title')->comment('文章标题');
            $table->integer('lab_id')->comment('标签ID');
            $table->longText('content')->comment('文章内容');
            $table->string('logo')->comment('图片');
            $table->unsignedInteger('discuss')->default(0)->comment('评论');
            $table->unsignedInteger('display')->default(0)->comment('浏览量');
            $table->engine='innodb';
            $table->comment='文章表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
