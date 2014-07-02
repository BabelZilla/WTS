<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginalfilecontentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('original_file_content', function($table) {
            $table->increments('id');
            $table->unsignedInteger('file_id');
            $table->unsignedInteger('project_id');
            $table->mediumtext('content');
            $table->string('hash', 32)->nullable();
            $table->string('status', 20);
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
		Schema::drop('original_file_content');
	}

}
