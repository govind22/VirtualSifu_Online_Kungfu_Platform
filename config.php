<?php

// Database server, username, password, and database name.

define('M_DATABASE_SERVER', "localhost");
define('M_DATABASE_USER', "root");
define('M_DATABASE_PASSWORD', "nakuln73");
define('M_DATABASE_NAME', "virtualsifu");

// Paths

define('M_ENV_SITE_ROOT', $_SERVER["DOCUMENT_ROOT"]."/virtualsifu/");
define('M_ENV_SITE_URL', "http://".$_SERVER["HTTP_HOST"]."/virtualsifu/");
//define(M_ENV_SITE_ROOT, SITE_ROOT_PLACEHOLDER);
//define(M_ENV_SITE_URL, SITE_URL_PLACEHOLDER);

// Autoload classes
function __autoload($classname)
{
	require(M_ENV_SITE_ROOT.'include/'.$classname.'.class.php');
}

// An alternative
//array_walk(glob('./include/*.class.php'),create_function('$v,$i', 'return require_once($v);')); 

// Open database

$mysql_err = false;
$db = new sql();

if(!$db->connect(M_DATABASE_SERVER, M_DATABASE_USER, M_DATABASE_PASSWORD, M_DATABASE_NAME))
{
	$mysql_err = "Could not connect to database.";
}

// Represents all post and get variables

$post = new post($db);
$get = new get($db);

// Initialize current admin user

$user = new user($db);

// Initialize config object

$config = new config($db);

?>