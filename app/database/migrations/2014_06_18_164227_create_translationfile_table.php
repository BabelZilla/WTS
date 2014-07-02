<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('translation_file', function($table) {
        $table->increments('file_id')->unsigned();
        $table->unsignedInteger('original_file');
        $table->unsignedInteger('translation_set');
        $table->string('language', 10);
        $table->string('file_name', 255);
        $table->string('file_path', 255);
        $table->string('file_md5', 32)->nullable();
        $table->string('status', 20)->default("unchanged");
        $table->unsignedInteger('parent_id')->nullable()->unsigned();
        $table->boolean('type_id')->unsigned();
        $table->unsignedInteger('project_id')->unsigned();
        $table->string('source_language', 20);
        $table->boolean('active')->default("1");
        $table->unsignedInteger('str_added');
        $table->unsignedInteger('str_missing');
        $table->unsignedInteger('str_changed');
        $table->unsignedInteger('str_warnings');
        $table->dateTime('created_at')->default("0000-00-00 00:00:00");
        $table->dateTime('updated_at')->nullable()->default("0000-00-00 00:00:00");
    });
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('translation_file');
	}

}
