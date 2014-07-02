<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginalversionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $sql = "CREATE TABLE IF NOT EXISTS `original_version` (
                  `id` int(10) NOT NULL,
                  `project_id` int(10) DEFAULT NULL,
                  `file_id` int(10) NOT NULL,
                  `plural_type` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cldr',
                  `context` varchar(255) DEFAULT NULL,
                  `zero` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
                  `one` text,
                  `two` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
                  `few` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
                  `many` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
                  `other` text,
                  `md5_hash` varchar(32) NOT NULL,
                  `references` text,
                  `comment` text,
                  `status` varchar(255) NOT NULL DEFAULT '+active',
                  `priority` tinyint(4) NOT NULL DEFAULT '0',
                  `words` int(5) NOT NULL,
                  `created_at` datetime DEFAULT NULL,
                  `updated_at` datetime NOT NULL,
                  `version` int(11) NOT NULL,
                  `version_comment` varchar(255) NOT NULL,
                  `created_by` varchar(255) NOT NULL,
                  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
        DB::select(DB::raw($sql));
        $sql = "ALTER TABLE `original_version` ADD PRIMARY KEY (`id`,`version`)";
        DB::select(DB::raw($sql));
        $sql = "ALTER TABLE `original_version` MODIFY `version` int(11) NOT NULL AUTO_INCREMENT";
        DB::select(DB::raw($sql));

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('original_version');
	}

}
