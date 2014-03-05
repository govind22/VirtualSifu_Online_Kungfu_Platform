<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include('../config.php');

if (!$user->authenticated)
{
	header('Location: ../signin.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Virtual Sifu</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<style>
	.dropdown-submenu{position:relative;}
.dropdown-submenu>.dropdown-menu{top:0;left:100%;margin-top:-6px;margin-left:-1px;-webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;}
.dropdown-submenu:hover>.dropdown-menu{display:block;}
.dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:#cccccc;margin-top:5px;margin-right:-10px;}
.dropdown-submenu:hover>a:after{border-left-color:#ffffff;}
.dropdown-submenu.pull-left{float:none;}.dropdown-submenu.pull-left>.dropdown-menu{left:-100%;margin-left:10px;-webkit-border-radius:6px 0 6px 6px;-moz-border-radius:6px 0 6px 6px;border-radius:6px 0 6px 6px;}
	</style>
	
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
          <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> Virtual Sifu</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dragons & Animals<b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
				 
   <li class="dropdown-submenu">
    <a tabindex="-1" href="#">Sub Earth Dragon</a>
    <ul class="dropdown-menu">
    
      <li><a tabindex="-1" href="#">Panther</a></li>
	  <li><a tabindex="-1" href="#">Python</a></li>
    </ul>
  </li>
  
   <li class="dropdown-submenu">
    <a tabindex="-1" href="#">Celestial Dragon</a>
    <ul class="dropdown-menu">
      <li><a tabindex="-1" href="#">Cobra</a></li>
	  <li><a tabindex="-1" href="#">Leopard</a></li>
    </ul>
  </li>
  
  <li class="dropdown-submenu">
    <a tabindex="-1" href="Earth-DragonForm.php">Earth Dragon</a>
    <ul class="dropdown-menu">
      <li><a tabindex="-1" href="#">Boa Form</a></li>
	   <li class="dropdown-submenu">
        <a href="#">Tiger Form</a>
        <ul class="dropdown-menu">
        	<li><a href="Tiger-KickingSubforms1-4.php">Kicking Form</a></li>
        	<li><a href="#">Wrist Form</a></li>
        </ul>
      </li>
    </ul>
  </li>
  
              </ul>
            </li>
          <li><a href="portfolio-2-col.php">Principles</a></li>
		  <li><a href="contact.php">Contact</a></li>
		  
		  
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="404.php">404</a></li>
              </ul>
            </li>
			
			  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user->username ?><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="performance.php">Performance</a></li>
                <li><a href="../index.php?action=logout">Log Out</a></li>
              </ul>
            </li>
			
			
			
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
	