# BabelZilla WTS

The **Web Translation System** (WTS) is software that powers the localization and translation site [babelzilla.org](http://www.babelzilla.org). WTS allows Mozilla extension authors to upload their localized extensions for translation into other languages, and allows volunteer translators to view, edit, and update translations.

## Requirements

1. [MySQL](https://www.mysql.com/)
1. [PHP](http://php.net/)
1. The following PHP extensions must be installed and enabled in `php.ini`:
	1. curl
	1. mbstring
	1. openssl (used by Composer, below)
1. [PHP Composer](https://getcomposer.org/) - [see download instructions here](https://getcomposer.org/download/)

## Installation

1. If you haven't already, install and configure MySQL on your system. You should create a user account that will have read and write access to your database.

1. Create a MySQL database for WTS to use. You can do this on the command line - e.g.:
	`mysql -u admin -p -e "create database wts_db;"`

1. Clone the WTS code repository:  
	`git clone https://github.com/BabelZilla/WTS.git wts/`

1. Open the wts directory in a terminal:  
	`cd wts`

1. Run `composer update`

1. Get a cup of coffee while composer installs the dependencies.

	Your folder structure should now be similar to the one below:

	```
	|-htdocs  
	|-wts  
	|---app  
	|-----classes  
	|-----cldr_cache  
	|-----commands  
	|-----config  
	|-----controllers  
	|-----database  
	|-----lang  
	|-----models  
	|-----other  
	|-----start  
	|-----storage  
	|-----tests  
	|-----views  
	|---bootstrap  
	|---public  
	|-----packages  
	|-----themes  
	|-------babelzilla  
	|-------installer  
	|---vendor
	```

1. Change permissions on the `app/config` and `app/storage` folders so your webserver has write access
1. Copy the *contents* of the `public` folder to your webroot - i.e. copy all of the files inside `public`, but not the `public` folder itself. (e.g. `htdocs`. You can change this in `bootstrap/paths.php`). The files should sit in the base webroot directory - e.g. `htdocs/index.php`.
1. At the same level as your base webroot folder (e.g. `htdocs`) create the following folders:

	```
	|-upload    
	|---temp    
	|-uploads    
	|---projects     
	|---repos    
	```
	Your webserver will need write access to these folders also.

	Your folder structure should now look like this:

	```
	|-htdocs  
	|-wts  
	|---app  
	|-----classes  
	|-----cldr_cache  
	|-----commands  
	|-----config  
	|-----controllers  
	|-----database  
	|-----lang  
	|-----models  
	|-----other  
	|-----start  
	|-----storage  
	|-----tests  
	|-----views  
	|---bootstrap  
	|---public  
	|-----packages  
	|-----themes  
	|-------babelzilla  
	|-------installer    
	|---vendor
	|-upload    
	|---temp    
	|-uploads    
	|---projects     
	|---repos  
	```

	You can change the paths in `app/config/wts.php`.  
	**If you prefer another folder structure:** change the paths in `public/index.php`.

1. Run the install script by visiting the following URL: http://www.yourdomain.com/install . The WTS system will redirect you to the start of the installation pages.
	1. You should see a page that says "Welcome to the WTS Installer!".
	1. Click the "Install from scratch" or "Upgrade" buttons and follow the instructions.

	**Troubleshooting:** If you get a blank page or a 404 error after visiting the URL, something is wrong. Check to see if your web server is set to allow redirects; if not this will interfere with WTS installation.



## Links
* [Babelzilla.org](http://www.babelzilla.org)
* [Babelzilla FAQ](http://www.babelzilla.org/index.php?option=com_content&task=category&sectionid=3&id=7&Itemid=25) (in English, with links to other languages)
* [Babelzilla Wiki](http://babelwiki.babelzilla.org/index.php?title=Main_Page)
