<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function($table) {
            $table->increments('id')->unsigned();
            $table->string('username', 255);
            $table->string('gituser', 255);
            $table->bigInteger('role_id');
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('confirmation_code', 255);
            $table->boolean('confirmed');
            $table->string('remember_token', 255);
            $table->dateTime('last_login');
            $table->mediumtext('settings');
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
