<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectxpifileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('project_xpifile', function($table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->unique();
            $table->string('filename', 200);
            $table->dateTime('added_date');
            $table->unsignedInteger('user_id')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_xpifile');
	}

}
