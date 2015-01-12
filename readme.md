# BabelZilla WTS

The **Web Translation System** (WTS) is software that powers the localization and translation site [babelzilla.org](http://www.babelzilla.org). WTS allows Mozilla extension authors to upload their localized extensions for translation into other languages, and allows volunteer translators to view, edit, and update translations.

## Installation

1. Clone the repository:  
	`git clone https://github.com/BabelZilla/WTS.git wts/`

1. Open the wts directory in a terminal:  
	`cd wts`

1. Run `composer update`

1. Get a cup of coffee while composer installs the dependencies.

	Your folder structure should now be similar to the one below:

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

**Things that needs to be done before you start the installer:**

1. Change permissions of the storage & config folder (webserver needs write access)     
1. Copy the content of the public folder to your webroot (e.g. htdocs, you can change this in bootstrap/path.php)     
1. Create the following folders (webserver needs write access)    

	|-upload    
	|---temp    
	|-uploads    
	|---projects     
	|---repos    

You can change the paths in config/wts.php     

**If you prefer another folder structure:** change the paths in `index.php`.

Now you're ready to run the install script: http://www.yourdomain.com/install    



## Links
* [Babelzilla.org](http://www.babelzilla.org)
* [Babelzilla FAQ](http://www.babelzilla.org/index.php?option=com_content&task=category&sectionid=3&id=7&Itemid=25) (in English, with links to other languages)
* [Babelzilla Wiki](http://babelwiki.babelzilla.org/index.php?title=Main_Page)
