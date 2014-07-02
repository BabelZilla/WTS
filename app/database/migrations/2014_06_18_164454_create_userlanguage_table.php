<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserlanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('userlanguage', function($table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('language', 10);
            $table->unsignedInteger('level');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ueserlanguage');
	}

}
