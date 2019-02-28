<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSqZansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sq_zans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('sq_blog_id')->comment('社区文章ID');
            $table->integer('user_id')->comment('点赞人ID');
            $table->index('sq_blog_id','user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sq_zans');
    }
}
