<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('project', function($table) {
            $table->increments('project_id');
            $table->unsignedInteger('project_type');
            $table->string('moz_id', 10);
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->unsignedInteger('user_id');
            $table->dateTime('release_date')->nullable();
            $table->string('ext_guid', 255)->nullable();
            $table->string('ext_ver', 25)->nullable();
            $table->boolean('sdk')->nullable();
            $table->string('license', 25)->nullable();
            $table->string('path', 255)->nullable();
            $table->text('locale_path')->nullable();
            $table->text('root_path')->nullable();
            $table->text('repo_path')->nullable();
            $table->text('remote_Url')->nullable();
            $table->string('gituser', 255);
            $table->string('gitproject', 255);
            $table->text('description')->nullable();
            $table->text('webapp_manifest')->nullable();
            $table->unsignedInteger('parent_project_id')->nullable();
            $table->string('source_language', 20);
            $table->string('source_url_template', 255)->nullable();
            $table->unsignedInteger('topic_id')->nullable();
            $table->tinyInteger('active')->nullable();
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
		Schema::drop('project');
	}

}
