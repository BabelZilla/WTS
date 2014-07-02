<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationsetmemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('translationset_member', function($table) {
            $table->increments('id');
            $table->unsignedInteger('translationset_id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('user_id');
            $table->string('language', 8);
            $table->string('permissions', 1)->default("t");
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('translationset_member');
	}

}
