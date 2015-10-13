<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->string('user_group');
            $table->string('avatar');
            $table->integer('admin')->default(0);
            $table->float('money')->default(0);
            $table->integer('gems')->default(0);
            $table->integer('stars')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('children');
    }
}
