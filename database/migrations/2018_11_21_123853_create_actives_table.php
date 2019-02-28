<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actives', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->comment('活动主题名称');
            $table->string('host')->comment('主办单位');
            $table->string('time')->comment('活动时间');
            $table->string('place')->comment('主办地点');
            $table->integer('price')->default('0')->comment('活动费用');
            $table->integer('few')->comment('活动期数');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actives');
    }
}
