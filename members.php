<?php

session_start();

include('config.php');

if (!$user->authenticated)
{
	header('Location: index.php');
	die();
}

?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $config->meta_description ?>">
    <meta name="keywords" content="<?php echo $config->meta_keywords ?>">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
    <title>
      <?php echo $config->site_title ?>
    </title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  </head>
  
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="#">Home</a>
            </li>
            <li>
              <a href="#about">About</a>
            </li>
            <li>
              <a href="#contact">Contact</a>
            </li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
      <div class="starter-template">
        <h1>
          This is a Basic Template for Your Site
        </h1>
        <p class="lead">
          Just replace the content and tweak the layout if you want.
          <br>
          The register and login functions are all done for you.
        </p>
        <div class="row">
          <div class="col-md-10">
            <h3>
              This is Top Secret Content, Just for Members
            </h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
              non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
          <div class="col-md-2">
            <p>
              Welcome, <?php echo $user->username ?>.
            </p>
            <a href="index.php?action=logout" class="btn btn-danger">Log Out</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js">
    </script>
  </body>

</html>