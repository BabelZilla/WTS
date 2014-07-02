<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationsversionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $sql = "CREATE TABLE IF NOT EXISTS `translations_version` (
            `id` int(10) NOT NULL,
          `project_id` int(10) NOT NULL,
          `original_id` int(10) DEFAULT NULL,
          `original_file` int(10) NOT NULL,
          `file_id` int(10) NOT NULL,
          `translation_set_id` int(10) DEFAULT NULL,
          `language` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
          `context` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
          `one` text NOT NULL COMMENT '[one]',
          `other` text COMMENT '[other]',
          `two` text COMMENT '[two]',
          `few` text COMMENT '[few]',
          `many` text COMMENT '[many]',
          `zero` text COMMENT '[zero]',
          `md5_hash` varchar(32) DEFAULT NULL,
          `untranslated` tinyint(1) NOT NULL,
          `blank` tinyint(1) NOT NULL,
          `user_id` int(10) DEFAULT NULL,
          `status` varchar(20) NOT NULL DEFAULT 'waiting',
          `created_at` datetime DEFAULT NULL,
          `updated_at` datetime DEFAULT NULL,
          `deleted_at` datetime NOT NULL,
          `warnings` text,
        `version` int(11) NOT NULL,
          `version_comment` varchar(255) NOT NULL,
          `created_by` varchar(255) NOT NULL,
          `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
        DB::select(DB::raw($sql));
        $sql = "ALTER TABLE `translations_version` ADD PRIMARY KEY (`id`,`version`)";
        DB::select(DB::raw($sql));
        $sql = "ALTER TABLE `translations_version` MODIFY `version` int(11) NOT NULL AUTO_INCREMENT";
        DB::select(DB::raw($sql));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('translations_version');
	}

}
