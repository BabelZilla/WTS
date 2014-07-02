<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('profiles', function($table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('user_id');
            $table->string('provider', 255);
            $table->string('identifier', 255);
            $table->string('webSiteURL', 255)->nullable();
            $table->string('profileURL', 255)->nullable();
            $table->string('photoURL', 255)->nullable();
            $table->string('displayName', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('firstName', 255)->nullable();
            $table->string('lastName', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('language', 255)->nullable();
            $table->string('age', 255)->nullable();
            $table->string('birthDay', 255)->nullable();
            $table->string('birthMonth', 255)->nullable();
            $table->string('birthYear', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('emailVerified', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('region', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('zip', 255)->nullable();
            $table->string('username', 255)->nullable();
            $table->string('coverInfoURL', 255)->nullable();
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
		Schema::drop('profiles');
	}

}
