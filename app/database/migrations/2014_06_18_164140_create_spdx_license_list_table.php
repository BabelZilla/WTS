<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpdxLicenseListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('spdx_license_list', function($table) {
            $table->increments('license_list_pk');
            $table->unsignedInteger('wts_key');
            $table->text('license_identifier');
            $table->text('license_fullname');
            $table->text('license_matchname_1')->nullable();
            $table->text('license_matchname_2')->nullable();
            $table->text('license_matchname_3')->nullable();
            $table->text('license_text');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('spdx_license_list');
	}

}
