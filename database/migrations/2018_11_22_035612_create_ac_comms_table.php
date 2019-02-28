<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcCommsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_comms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment')->comment('评论内容');
            $table->integer('user_id')->comment('评论人ID');
            $table->integer('active_id')->comment('活动帖ID');

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
        Schema::dropIfExists('ac_comms');
    }
}
