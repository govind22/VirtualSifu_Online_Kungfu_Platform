<?php
error_reporting(0); 
session_start();


include('config.php');

if ($get->action == "logout")
{
	$user->deauthenticate();
	$succ = "You have logged out.";
}

if ($user->authenticated)
{
 
	if ($user->super == 1)
	{
		header('Location: admin/index.php');
	}
	else
	{
	   if(isset($_SESSION['url'])) {
	           $url=$_SESSION['url'];
              header("Location: $url");
			  }
	   else
		header('Location: kinectweb/index.php');
	}
}

if (isset($post->form_action))
{
	if ($post->email == "admin") $post->email = "";

	if ($user->login($post->email, $post->password))
	{
		if ($user->super == 1)
		{
			header('Location: admin/index.php');
		}
		else
		{
			header('Location: kinectweb/index.php');
		}
	}
	else
	{
		$err = "Bad email or password.";
	}
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
    <link href="kinectweb/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="kinectweb/css/modern-business.css" rel="stylesheet">
    <link href="kinectweb/font-awesome/css/font-awesome.min.css" rel="stylesheet">
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
    <a tabindex="-1" href="#">Earth Dragon</a>
    <ul class="dropdown-menu">
      <li><a tabindex="-1" href="#">Boa Form</a></li>
	   <li class="dropdown-submenu">
        <a href="#">Tiger Form</a>
        <ul class="dropdown-menu">
        	<li><a href="#">Kicking Form</a></li>
        	<li><a href="#">Wrist Form</a></li>
        </ul>
      </li>
    </ul>
  </li>
  
              </ul>
            </li>
          
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="faq.php">FAQ</a></li>
              </ul>
            </li>	
			
			 <li>
              <a href="contact.php">Contact</b></a>
              
            </li>	
			
			 <li>
              <a href="index.php">Sign In</b></a>
              
            </li>	
			
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
	
	 <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=   Virtual Sifu');"></div>
            <div class="carousel-caption">
			
             <h4><strong>A Website to Master the Cosmic Dragon Form</strong></h4>           
		   </div>
          </div>
          <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=   Virtual Sifu');"></div>
            <div class="carousel-caption">
			
             <h4><strong>A Website to Master the Cosmic Dragon Form</strong></h4>           
		   </div>
          </div>
          <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=   Virtual Sifu');"></div>
            <div class="carousel-caption">
			
             <h4><strong>A Website to Master the Cosmic Dragon Form</strong></h4>           
		   </div>
          </div>
    </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="icon-next"></span>
        </a>
  </div>
  
	  <div class="container">
      <div class="starter-template">
        <div class="row">
		  <?php if (isset($succ)) echo "<div class=\"alert alert-success\">".$succ."</div>" ?>
		  <?php if (isset($err)) echo "<div class=\"alert alert-danger\">".$err."</div>" ?>
          <div class="col-md-3">
			<div class="well">
				<form method="post">
				  <div class="form-group">
					<label>
					  Email
					</label>
					<input type="text" name="email" class="form-control">
				  </div>
				  <div class="form-group">
					<label>
					  Password
					</label>
					<input type="password" name="password" class="form-control">
				  </div>
				  <button type="submit" class="btn btn-primary" name="form_action">
					Login
				  </button>
				</form>
			</div>
              <hr>
              <p>No account? <a href="register.php">Register</a></p>
			  <p>Forgot? <a href="reset.php">Reset your password</a>.</p>
          </div>
          <div class="col-md-9">
            <h3>
              Hello!
            </h3>
            <p>
              This website is a nice platform to learn Martial arts through the Feedback & Recommendation of Virtual Sifu at every step.
              It is an exciting journey to Master Cosmic dragon. In this journey you will get dozens of badges, detailed explanation.
              Virtual Sifu helps you to find very minute details of every move and will recommend you drills and principles to improve or master the particular form.			  
            </p>
          </div>
		   <div class="col-md-9">
		  <div class="alert alert-info">
            <strong>Heads Up!</strong> If you are using a Microsoft Kinect for Windows (says "Kinect" and not "Xbox 360" on the front) you must <a href="http://www.microsoft.com/en-us/kinectforwindows/develop/" class="alert-link"> download drivers from Microsoft</a> and get the plug-in only from <a href="http://zigfu.com/en/downloads/browserplugin/" class="alert-link">Zigfu</a>
         </div>
		   </div>
        </div>
      </div>
    </div>
	  <script src="kinectweb/js/jquery.js"></script>
    <script src="kinectweb/js/bootstrap.js"></script>
    <script src="kinectweb/js/modern-business.js"></script>
  </body>

</html>