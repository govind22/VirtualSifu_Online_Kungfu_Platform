<?php

session_start();

include('config.php');

function random_string()
{
  $s = "";
  $c = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

  for ($i=0; $i<12; $i++)
    $s .= $c[rand(0, strlen($c))];

  return $s;
}

if (isset($post->form_action) && $post->type == "change")
{
	$token = $db->clean($post->token);

	$sql = sprintf("
		SELECT ID, user FROM tokens
		WHERE token='%s'",
		$token
	);

	$result = $db->query($sql);

	if ($db->num_rows($result) > 0)
	{
		$row = $db->fetch_array($result);
		$db->query("DELETE FROM tokens WHERE ID=".$row['ID']);

		$sql = sprintf("
			UPDATE minty_users
			SET password='%s'
			WHERE ID=%d",
			hash('whirlpool', $post->new_password),
			$row['user']
		);

		$db->query($sql);
	}
	else
	{
		$err = "Invalid reset token.";
	}
}

else if (isset($post->form_action) && $post->type == "send")
{
	$sql = sprintf("
		SELECT ID from minty_users
		WHERE email='%s'",
		$db->clean($post->email)
	);

	$result = $db->query($sql);

	if ($db->num_rows($result) > 0)
	{
		$row = $db->fetch_array($result);
		$token = random_string();

		$sql = sprintf("
		  INSERT INTO tokens
		  (token, user, date)
		  VALUES ('%s', '%s', NOW())",
		  $token,
		  $row['ID']
		);

		$db->query($sql);

		$msg = sprintf("You are receiving this email because a password reset was requested for your account.\n
			If you have not requested a password reset, ignore this email message.\n\n
			You can reset your password by clicking here: \n
			%s/reset.php?token=%s
			",
			M_ENV_SITE_URL,
			$token
		);

		$headers = $headers = 'From: admin@ureginadpp.ca' . "\r\n" .
		'Reply-To: admin@ureginadpp.ca' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		mail($post->email, "Password reset", $msg, $headers);
	}
	else
	{
		$err = "User not found.";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="description" content="<?php echo $config->meta_description ?>">
    <meta name="keywords" content="<?php echo $config->meta_keywords ?>">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
    <title>
      Virtual Sifu
    </title>
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
  
    <!-- Full Page Image Header Area -->
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
        </div> </div>         
		 <div class="col-md1 col-md4 col-md-4" style="display: block;">
			  <div>
				<form action="reset.php" method="post">
				<?php
				if (isset($get->token))
				{ ?>
				<div class="form-group">
					<label style="color: #FFF">
					  New Password
					</label>
					<input type="password" name="new_password" class="form-control">
				</div>
				<input type="hidden" name="type" value="change" />
				<input type="hidden" name="token" value="<? echo $get->token ?>" />
				<button type="submit" class="btn btn-primary" name="form_action">Reset</button>
				<?php
				}
				else if (isset($post->form_action))
				{ ?>
				<p style="color: #FFF">Action performed.</p>
				<?php
				}
				else
				{ ?>
				<p style="color: #FFF">Enter your email address below and you will receive a message with a link allowing you to change your password.</p>
				<div class="form-group">
					<label style="color: #FFF">
					  Email
					</label>
					<input type="text" name="email" class="form-control">
				</div>
				<input type="hidden" name="type" value="send" />
				<button type="submit" class="btn btn-primary" name="form_action">Reset</button>
				<?php
				} ?>
				
				</form>
			  </div>
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