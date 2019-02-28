<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('job')->nullable()->comment('职业');
            $table->string('city')->nullable()->comment('所在城市');
            $table->string('say')->nullable()->comment('语录');
            $table->string('logo')->nullable()->comment('头像');
            $table->string('email')->nullable()->comment('邮箱');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColnum('job');
            $table->dropColnum('city');
            $table->dropColnum('say');
            $table->dropColnum('logo');
            $table->dropColnum('email');
        });
    }
}
