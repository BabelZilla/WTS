<?php

//
// NOTE Migration Created: 2014-06-10 19:03:45
// --------------------------------------------------

class Create4WtsDatabase
{
//
// NOTE - Make changes to the database.
// --------------------------------------------------

    public function up()
    {

//
// NOTE -- fbf_comments
// --------------------------------------------------

        Schema::create('fbf_comments', function ($table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('commentable_id');
            $table->string('commentable_type', 255);
            $table->unsignedInteger('user_id');
            $table->text('comment');
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
        });


//
// NOTE -- original
// --------------------------------------------------

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


//
// NOTE -- original_file
// --------------------------------------------------

        Schema::create('original_file', function ($table) {
            $table->increments('file_id')->unsigned();
            $table->string('file_name', 255);
            $table->string('file_path', 255);
            $table->string('file_md5', 32)->nullable();
            $table->string('iniRef', 255);
            $table->string('status', 20)->default("unchanged");
            $table->unsignedInteger('parent_id')->nullable()->unsigned();
            $table->boolean('type_id')->unsigned();
            $table->unsignedInteger('project_id')->unsigned();
            $table->boolean('active')->default("1");
            $table->boolean('is_virtual');
            $table->unsignedInteger('string_count');
            $table->dateTime('created_at')->default("0000-00-00 00:00:00");
            $table->dateTime('updated_at')->nullable()->default("0000-00-00 00:00:00");
        });


//
// NOTE -- original_file_content
// --------------------------------------------------

        Schema::create('original_file_content', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('file_id');
            $table->unsignedInteger('project_id');
            $table->mediumtext('content');
            $table->string('hash', 32)->nullable();
            $table->string('status', 20);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });


//
// NOTE -- original_version
// --------------------------------------------------

        Schema::create('original_version', function ($table) {
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
            $table->increments('version');
            $table->string('version_comment', 255);
            $table->string('created_by', 255);
            $table->timestamp('created_time')->default("CURRENT_TIMESTAMP");
        });


//
// NOTE -- profiles
// --------------------------------------------------

        Schema::create('profiles', function ($table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('user_id');
            $table->string('provider', 255);
            $table->string('identifier', 255);
            $table->string('webSiteURL', 255)->nullable();
            $table->string('profileURL', 255)->nullable();
            $table->string('photoURL', 255)->nullable();
            $table->string('displayName', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('firstName', 255)->nullable();
            $table->string('lastName', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('language', 255)->nullable();
            $table->string('age', 255)->nullable();
            $table->string('birthDay', 255)->nullable();
            $table->string('birthMonth', 255)->nullable();
            $table->string('birthYear', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('emailVerified', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('region', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('zip', 255)->nullable();
            $table->string('username', 255)->nullable();
            $table->string('coverInfoURL', 255)->nullable();
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
        });


//
// NOTE -- project
// --------------------------------------------------

        Schema::create('project', function ($table) {
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
            $table->text('description')->nullable();
            $table->text('webapp_manifest')->nullable();
            $table->unsignedInteger('parent_project_id')->nullable();
            $table->string('source_language', 20);
            $table->string('source_url_template', 255)->nullable();
            $table->unsignedInteger('topic_id')->nullable();
            $table->boolean('active')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });


//
// NOTE -- project_maintainer
// --------------------------------------------------

        Schema::create('project_maintainer', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('user_id');
        });


//
// NOTE -- project_type
// --------------------------------------------------

        Schema::create('project_type', function ($table) {
            $table->increments('project_type_id')->unsigned();
            $table->string('project_type', 64)->unique();
        });


//
// NOTE -- project_xpifile
// --------------------------------------------------

        Schema::create('project_xpifile', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->unique();
            $table->string('filename', 200);
            $table->dateTime('added_date');
            $table->unsignedInteger('user_id')->nullable();
        });


//
// NOTE -- sessions
// --------------------------------------------------

        Schema::create('sessions', function ($table) {
            $table->increments('id', 255);
            $table->text('payload');
            $table->unsignedInteger('last_activity');
        });


//
// NOTE -- spdx_license_list
// --------------------------------------------------

        Schema::create('spdx_license_list', function ($table) {
            $table->increments('license_list_pk');
            $table->unsignedInteger('wts_key');
            $table->text('license_identifier');
            $table->text('license_fullname');
            $table->text('license_matchname_1')->nullable();
            $table->text('license_matchname_2')->nullable();
            $table->text('license_matchname_3')->nullable();
            $table->text('license_text');
        });


//
// NOTE -- ta_auth_tokens
// --------------------------------------------------

        Schema::create('ta_auth_tokens', function ($table) {
            $table->increments('auth_identifier');
            $table->increments('public_key', 96);
            $table->increments('private_key', 96);
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
        });


//
// NOTE -- translation
// --------------------------------------------------

        Schema::create('translation', function ($table) {
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
            $table->string('md5_hash', 32);
            $table->boolean('untranslated');
            $table->boolean('blank');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('status', 20)->default("waiting");
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at');
            $table->text('warnings')->nullable();
            $table->unsignedInteger('version');
        });


//
// NOTE -- translation_file
// --------------------------------------------------

        Schema::create('translation_file', function ($table) {
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


//
// NOTE -- translation_file_content
// --------------------------------------------------

        Schema::create('translation_file_content', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('file_id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('translationset_id');
            $table->mediumtext('content');
            $table->string('hash', 32)->nullable();
            $table->string('status', 20);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });


//
// NOTE -- translation_set
// --------------------------------------------------

        Schema::create('translation_set', function ($table) {
            $table->increments('translationset_id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('status', 15);
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('project_id')->nullable();
            $table->string('locale', 10)->nullable();
            $table->boolean('open');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });


//
// NOTE -- translation_suggestion
// --------------------------------------------------

        Schema::create('translation_suggestion', function ($table) {
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


//
// NOTE -- translations_version
// --------------------------------------------------

        Schema::create('translations_version', function ($table) {
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
            $table->string('md5_hash', 32)->nullable();
            $table->boolean('untranslated');
            $table->boolean('blank');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('status', 20)->default("waiting");
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at');
            $table->text('warnings')->nullable();
            $table->increments('version');
            $table->string('version_comment', 255);
            $table->string('created_by', 255);
            $table->timestamp('created_time')->default("CURRENT_TIMESTAMP");
        });


//
// NOTE -- translationset_member
// --------------------------------------------------

        Schema::create('translationset_member', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('translationset_id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('user_id');
            $table->string('language', 8);
            $table->string('permissions', 1)->default("t");
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });


//
// NOTE -- user
// --------------------------------------------------

        Schema::create('user', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('username', 255);
            $table->bigInteger('role_id');
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('confirmation_code', 255);
            $table->boolean('confirmed');
            $table->string('remember_token', 255);
            $table->dateTime('last_login');
            $table->mediumtext('settings');
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
        });


//
// NOTE -- userlanguage
// --------------------------------------------------

        Schema::create('userlanguage', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('language', 10);
            $table->unsignedInteger('level');
        });


//
// NOTE -- userprofile
// --------------------------------------------------

        Schema::create('userprofile', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name', 100);
            $table->string('given_name', 100);
            $table->string('title', 100);
            $table->string('website', 100);
            $table->string('twitter', 100);
        });


//
// NOTE -- users
// --------------------------------------------------

        Schema::create('users', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('username', 255);
            $table->bigInteger('role_id');
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('confirmation_code', 255);
            $table->boolean('confirmed');
            $table->string('remember_token', 255);
            $table->dateTime('last_login');
            $table->mediumtext('settings');
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
        });


    }

//
// NOTE - Revert the changes to the database.
// --------------------------------------------------

    public function down()
    {

        Schema::drop('fbf_comments');
        Schema::drop('original');
        Schema::drop('original_file');
        Schema::drop('original_file_content');
        Schema::drop('original_version');
        Schema::drop('profiles');
        Schema::drop('project');
        Schema::drop('project_maintainer');
        Schema::drop('project_type');
        Schema::drop('project_xpifile');
        Schema::drop('sessions');
        Schema::drop('spdx_license_list');
        Schema::drop('ta_auth_tokens');
        Schema::drop('translation');
        Schema::drop('translation_file');
        Schema::drop('translation_file_content');
        Schema::drop('translation_set');
        Schema::drop('translation_suggestion');
        Schema::drop('translations_version');
        Schema::drop('translationset_member');
        Schema::drop('user');
        Schema::drop('userlanguage');
        Schema::drop('userprofile');
        Schema::drop('users');

    }
}