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
		  <? if ($succ) echo "<div class=\"alert alert-success\">".$succ."</div>" ?>
		  <? if ($err) echo "<div class=\"alert alert-danger\">".$err."</div>" ?>
          <div class="col-md1 col-md4 col-md-4" style="display: block;">
			  <div class="well">
				<form action="reset.php" method="post">
				<?php
				if (isset($get->token))
				{ ?>
				<div class="form-group">
					<label>
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
				<p>Action performed.</p>
				<?php
				}
				else
				{ ?>
				<p>Enter your email address below and you will receive a message with a link allowing you to change your password.</p>
				<div class="form-group">
					<label>
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
    <!-- /.container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js">
    </script>
  </body>

</html>