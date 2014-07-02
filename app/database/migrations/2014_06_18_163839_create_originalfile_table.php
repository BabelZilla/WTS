<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginalfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('original_file', function($table) {
            $table->increments('file_id')->unsigned();
            $table->string('file_name', 255);
            $table->string('file_path', 255);
            $table->string('file_md5', 32)->nullable();
            $table->string('iniRef', 255);
            $table->string('status', 20)->default("unchanged");
            $table->unsignedInteger('parent_id')->nullable()->unsigned();
            $table->tinyInteger('type_id')->unsigned();
            $table->unsignedInteger('project_id')->unsigned();
            $table->boolean('active')->default("1");
            $table->boolean('is_virtual');
            $table->unsignedInteger('string_count')->unsigned();
            $table->dateTime('created_at')->default("0000-00-00 00:00:00");
            $table->dateTime('updated_at')->nullable()->default("0000-00-00 00:00:00");
        });;

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('original_file');
	}

}
