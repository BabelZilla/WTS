<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationsuggestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('translation_suggestion', function($table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('original_id')->nullable();
            $table->unsignedInteger('original_file');
            $table->unsignedInteger('file_id');
            $table->unsignedInteger('translation_set_id')->nullable();
            $table->string('language', 10);
            $table->string('context', 255);
            $table->text('one');
            $table->text('other')->nullable();
            $table->text('two')->nullable();
            $table->text('few')->nullable();
            $table->text('many')->nullable();
            $table->text('zero')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('translation_suggestion');
	}

}
