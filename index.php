<?php

/*
|---------------------------------------------------------------
| PHP ERROR REPORTING LEVEL
|---------------------------------------------------------------
|
| By default CI runs with error reporting set to ALL.  For security
| reasons you are encouraged to change this when your site goes live.
|
*/
error_reporting(E_ALL);

/*
|---------------------------------------------------------------
| SYSTEM FOLDER NAME
|---------------------------------------------------------------
|
| This variable must contain the name of your "system" folder.
| Include the path if the folder is not in the same  directory
| as this file.
|
| NO TRAILING SLASH!
|
*/

	$system_folder = "system";

/*
|---------------------------------------------------------------
| APPLICATION FOLDER NAME
|---------------------------------------------------------------
|
| If you want this front controller to use a different "application"
| folder then the default one you can set its name here. 
| The folder can also be relocated anywhere on your server.  For 
| more info please see the user guide:
| http://www.codeigniter.com/user_guide/general/managing_apps.html
|
|
| NO TRAILING SLASH!
|
*/

	$application_folder = "application";

/*
|===============================================================
| 	END OF USER CONFIGURABLE SETTINGS
|===============================================================
*/

// Let's attempt to determine the full-server path to the "system"
// folder in order to reduce the possibility of path problems.
if (function_exists('realpath') AND @realpath(dirname(__FILE__)) !== FALSE)
{
	$system_folder = str_replace("\\", "/", realpath(dirname(__FILE__))).'/'.$system_folder;
}

// Is the $aplication variable blank?  If so, we'll assume the folder is called "application"
if ($application_folder == '')
{
	$application_folder = 'application';
}

// Some versions of PHP don't support the E_STRICT constant so we'll
// explicitly define it so that it will be available to the Exception class
if ( ! defined('E_STRICT'))
{
	define('E_STRICT', 2048);
}

// Define a few constants that we use througout the framework.
// EXT		- contains the file extension.  Typically ".php"
// FCPATH	- contains the full server path to THIS file.
// SELF		- contains the name of THIS file.
// BASEPATH	- contains the full server path to the "system" folder
// APPPATH	- contains the full server path to the "application" folder

define('EXT', '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
define('FCPATH', __FILE__);
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', $system_folder.'/');

if ( ! is_dir($application_folder))
{
	define($application_folder.'/');
}
else
{
	define('APPPATH', BASEPATH.$application_folder.'/');
}

// Load the front controller and away we go!....
require_once BASEPATH.'codeigniter/CodeIgniter'.EXT;
?>