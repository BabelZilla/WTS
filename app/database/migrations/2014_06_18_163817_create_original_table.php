<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginalTable extends Migration
{

    public function up()
    {
        Schema::create('original', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->nullable();
            $table->unsignedInteger('file_id');
            $table->string('plural_type', 7)->default("cldr");
            $table->string('context', 255)->nullable();
            $table->text('zero')->nullable();
            $table->text('one')->nullable();
            $table->text('two')->nullable();
            $table->text('few')->nullable();
            $table->text('many')->nullable();
            $table->text('other')->nullable();
            $table->string('md5_hash', 32);
            $table->text('references')->nullable();
            $table->text('comment')->nullable();
            $table->string('status', 255)->default("+active");
            $table->boolean('priority');
            $table->unsignedInteger('words');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at');
            $table->unsignedInteger('version');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('original');
    }

}
