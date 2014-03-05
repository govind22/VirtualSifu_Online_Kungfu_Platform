<?php

session_start();

include('config.php');

function validate($post)
{
	if ($post->email == "") return "Email field is required.";
	if ($post->name == "") return "Name field is required.";
	if ($post->password == "") return "Password field is required.";
	
	if ($_SESSION['captcha'] != $post->captcha) return "Captcha incorrect, please try again.";
	if (!filter_var($post->email, FILTER_VALIDATE_EMAIL)) return "That email address is invalid.";
	
	return false;
}

if (isset($post->form_action))
{
	$v = validate($post);

	if ($v === false)
	{
		$sql = sprintf("
			SELECT ID FROM minty_users 
			WHERE email='%s'",
			$db->clean($post->email)
		);
		
		$result = $db->query($sql);
		
		if ($db->num_rows($result) == 0)
		{
			$sql = sprintf("
				INSERT INTO minty_users 
				(username, email, password, super) 
				VALUES ('%s', '%s', '%s', 0)",
				$db->clean($post->name),
				$db->clean($post->email),
				hash('whirlpool', $post->password)
			);
			
			$result = $db->query($sql);
			include("tblinsert.php");  // update all tables with new user id
			
			$succ = "Account created Try to <a href=\"index.php\">log in</a>";
		}
		else
		{
			$err = "That email address is already registered to an account.";
		}
	}
	else
	{
		$err = $v;
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
        <li class="sidebar-brand"><a href="index.php">Virtual Sifu</a></li>
        <li><a href="index.php">Home</a></li>
		 <li><a href="signin.php">Sign In</a></li>
        
      </ul>
    </div>
    <!-- /Side Menu -->
	<div id="top" class="header">
    <div class="container">
      <div class="starter-template">
       <h1 style="color: #FFF">
          VIRTUAL SIFU
        </h1>
        <p class="lead">
          
          <br>
          
        </p>
        <div class="row">
		<div class="col-md-10">
		<div class="col-md-3">
		  <?php if ($succ) echo "<div class=\"alert alert-success\">".$succ."</div>" ?>
		  <?php if ($err) echo "<div class=\"alert alert-danger\">".$err."</div>" ?>
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
                    Name
                  </label>
                  <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                  <label style="color: #FFF">
                    Password
                  </label>
                  <input type="password" name="password" class="form-control">
                </div>
				<div class="form-group">
					<label style="color: #FFF">
					 Human?
					</label>
					<img src="captcha.php" /><br /></br>
					<input type="text" name="captcha" class="form-control">
				</div>
                <button type="submit" class="btn btn-success" name="form_action">
                  Register
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-9">
            <h3>
             
            </h3>
            <p>
              
			  </p>
          </div>
        </div>
      </div>
    </div>
	</div>
    <!-- /.container -->
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