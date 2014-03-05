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
			include("tblinsert.php");
			
			$succ = "Account created! Try to <a href=\"index.php\">log in</a>";
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
		  <?php if ($succ) echo "<div class=\"alert alert-success\">".$succ."</div>" ?>
		  <?php if ($err) echo "<div class=\"alert alert-danger\">".$err."</div>" ?>
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
                    Name
                  </label>
                  <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                  <label>
                    Password
                  </label>
                  <input type="password" name="password" class="form-control">
                </div>
				<div class="form-group">
					<label>
					 Human?
					</label>
					<img src="captcha.php" /><br />
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
              Hello!
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