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
		header('Location: KinectWeb/index.php');
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
			header('Location: KinectWeb/index.php');
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
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>

    <!-- Side Menu -->
    <a id="menu-toggle" href="#" class="btn btn-primary btn-lg toggle"><i class="fa fa-bars"></i></a>
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
        <li class="sidebar-brand"><a href="#">Virtual Sifu</a></li>
        <li><a href="#top">Home</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
      </ul>
    </div>
    <!-- /Side Menu -->
  
    <!-- Full Page Image Header Area -->
    <div id="top" class="header">
      <div class="container">
      <div class="starter-template">
        <h1 style="color: #FFF">
          VIRTUAL SIFU
        </h1>
        <p class="lead">
          
          <br>
		  <br>
          
        </p>
        <div class="row">
		<div class="col-md-10">
		<div class="col-md-3">
		 <?php if (isset($succ)) echo "<div class=\"alert alert-success\">".$succ."</div>" ?>
		  <?php if (isset($err)) echo "<div class=\"alert alert-danger\">".$err."</div>" ?>
		   </div>
		   
		   </div>
		   <div class="col-md-3">
			<div>
				<form method="post">
				  <div class="form-group">
					<label style="color: #FFF">
					  Email
					</label>
					<input type="text" name="email" class="form-control">
				  </div>
				  <div class="form-group">
					<label style="color: #FFF">
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
             <p style="color: #FFF">No account? <a href="register.php">Register</a></p>
			  <p style="color: #FFF">Forgot? <a href="reset.php">Reset your password</a>.</p>
          </div>
          <div class="col-md-9">
            <h3 style="color: #FFF">
             
            </h3>
			<br><br>
            <p style="color: #FFF">
              
            </p>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- /Full Page Image Header Area -->
 
    <!-- Callout -->
    <div class="callout">
      <div class="vert-text">
        <h1>Virtual Sifu</h1>
      </div>
    </div>
    <!-- /Callout -->

    <!-- Portfolio -->
    <div id="portfolio" class="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 text-center">
            <h2>Our Work</h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-2 text-center">
            <div class="portfolio-item">
              <a href="#"><img class="img-portfolio img-responsive" src="img/portfolio-1.jpg"></a>
              <h4>Earth Dragon</h4>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="portfolio-item">
              <a href="#"><img class="img-portfolio img-responsive" src="img/portfolio-2.jpg"></a>
              <h4>Panther</h4>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-2 text-center">
            <div class="portfolio-item">
              <a href="#"><img class="img-portfolio img-responsive" src="img/portfolio-5.jpg"></a>
              <h4>Tiger</h4>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="portfolio-item">
              <a href="#"><img class="img-portfolio img-responsive" src="img/portfolio-4.jpg"></a>
              <h4>Boa</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Portfolio -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Custom JavaScript for the Side Menu and Smooth Scrolling -->
    <script>
        $("#menu-close").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });
    </script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
        });
    </script>
    <script>
      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
            || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
    </script>

  </body>

</html>