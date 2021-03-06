<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$CI =& get_instance();
$active_group = $CI->config->item('env');
$active_record = TRUE;

$db['dev']['hostname'] = "localhost";
$db['dev']['username'] = "ci";
$db['dev']['password'] = "ci";
$db['dev']['database'] = "ci";
$db['dev']['dbdriver'] = "mysql";
$db['dev']['dbprefix'] = "";
$db['dev']['pconnect'] = TRUE;
$db['dev']['db_debug'] = TRUE;
$db['dev']['cache_on'] = FALSE;
$db['dev']['cachedir'] = "";
$db['dev']['char_set'] = "utf8";
$db['dev']['dbcollat'] = "utf8_general_ci";

$db['live']['hostname'] = "localhost";
$db['live']['username'] = "ci";
$db['live']['password'] = "ci";
$db['live']['database'] = "ci";
$db['live']['dbdriver'] = "mysql";
$db['live']['dbprefix'] = "";
$db['live']['pconnect'] = TRUE;
$db['live']['db_debug'] = FALSE;
$db['live']['cache_on'] = FALSE;
$db['live']['cachedir'] = "";
$db['live']['char_set'] = "utf8";
$db['live']['dbcollat'] = "utf8_general_ci";

/* End of file database.php */
/* Location: ./system/application/config/database.php */
