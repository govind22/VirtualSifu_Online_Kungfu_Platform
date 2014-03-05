<?php
// Defaults
if ($_POST['db_server'] == "") $_POST['db_server'] = "localhost";

$status = "";
$succ = "<span style=\"color:green\">Done!</span><br />";
$fail = "<span style=\"color:red\">Failed.</span><br />";
$err = false;

// Validation
foreach ($_POST as $p)
{
	if ($p == "") $err = "You left a field blank. Please press the back button and try again.";
}

// Placeholders
if (!$err)
{
	$f = file_get_contents("../config.php");
	
	$f = str_replace("DB_SERVER_PLACEHOLDER", $_POST['db_server'], $f);
	$f = str_replace("DB_USER_PLACEHOLDER", $_POST['db_user'], $f);
	$f = str_replace("DB_PASSWORD_PLACEHOLDER", $_POST['db_password'], $f);
	$f = str_replace("DB_NAME_PLACEHOLDER", $_POST['db_name'], $f);
	
	/*
	if ($_POST['subdirectory'] == "/") $f = str_replace("SITE_ROOT_PLACEHOLDER", "\$_SERVER[\"DOCUMENT_ROOT\"]", $f);
	else str_replace("SITE_ROOT_PLACEHOLDER", "\$_SERVER[\"DOCUMENT_ROOT\"].\"".$_POST['subdirectory']."\"", $f);
	
	if ($_POST['subdirectory'] == "/") $f = str_replace("SITE_URL_PLACEHOLDER", "\"http://\".\$_SERVER[\"HTTP_HOST\"]", $f);
	else str_replace("SITE_URL_PLACEHOLDER", "\"http://\".\$_SERVER[\"HTTP_HOST\"].\"".$_POST['subdirectory']."\"", $f);
	*/
	
	if (!file_put_contents("../config.php", $f))
	{
		$msg .= "Writing config file... ".$fail;
		$err = "Unable to open config.php for writing. Try changing permissions.";
	}
	else
	{
		$msg .= "Writing config file... ".$succ;
		require('../config.php');
	}
}

// SQL
if (!$err)
{
	if ($mysql_err)
	{
		$msg .= "Checking database connection... ".$fail;
		$err = $mysql_err;
	}
	else
	{
		$msg .= "Checking database connection... ".$succ;
		
		$sql_file = (M_ENV_SITE_ROOT."bootstrap_site/install/install.sql");
		$file_handle = fopen($sql_file, 'r+'); 
		$contents = fread($file_handle, filesize($sql_file)); 
		$cont = preg_split("/;/", $contents); 

		foreach($cont as $query)
		{
			$result = @mysql_query($query); 
		} 
		
		fclose($file_handle);
		
		$msg .= "Running SQL queries... ".$succ;
	}
}

// Settings inserts
if (!$err)
{
	$sql = sprintf(
		"INSERT INTO minty_users 
		(username, password, email, super) 
		VALUES ('admin', '%s', '', 1)",
		hash('whirlpool', $post->admin_password)
	);
		
	$db->query($sql);
	
	$sql = sprintf(
		"INSERT INTO minty_config 
		(name, value) 
		VALUES ('site_title', '%s')",
		$db->clean($post->site_title)
	);
		
	$db->query($sql);
	
	$sql = sprintf(
		"INSERT INTO minty_config 
		(name, value) 
		VALUES ('meta_description', '%s')",
		$db->clean($post->meta_description)
	);
		
	$db->query($sql);
	
	$sql = sprintf(
		"INSERT INTO minty_config 
		(name, value) 
		VALUES ('meta_keywords', '%s')",
		$db->clean($post->meta_keywords)
	);
		
	$db->query($sql);
	
	$msg .= "Creating settings... ".$succ;
}

?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
    </title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"
    rel="stylesheet">
  </head>
  
  <body>
    <div class="container">
      <div class="jumbotron">
        <?php 
		if (!$err)
		{ ?>
		<h1>Installation complete.</h1>
		<p><strong>PLEASE DELETE THE ENTIRE /install/ FOLDER FROM THE SERVER.</strong></p>
		<p>Click <a href="<?php echo M_ENV_SITE_URL ?>">here</a> to continue.</p>
		<?php 
		}
		else
		{ ?>
		<h1>There was a problem during installation.</h1>
		<p><?php echo $err ?></p>
		<?php
		} ?>
      </div>
	  <p><?php echo $msg ?></p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  </body>

</html>