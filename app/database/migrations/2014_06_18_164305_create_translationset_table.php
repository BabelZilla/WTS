<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationsetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('translation_set', function($table) {
            $table->increments('translationset_id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('status', 15);
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('project_id')->nullable();
            $table->string('locale', 10)->nullable();
            $table->boolean('open')->default("1");
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
		Schema::drop('translation_set');
	}

}
