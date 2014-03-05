<?php

session_start();

include('../config.php');

if (!$user->authenticated || $user->super != 1)
{
	header('Location: ../index.php');
	die();
}

if (isset($get->del) && is_numeric($get->del) && $get->del > 0)
{
	$db->query("DELETE FROM minty_users WHERE ID=".$get->del);
}

$u = $db->query("SELECT * FROM minty_users WHERE ID > 0");

?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
      Starter Template for Bootstrap
    </title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
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
        <div class="row">
          <div class="col-md1 col-md10 col-md-10" style="display: block;">
            <h3>
              Users
            </h3>
            <table class="table">
              <tbody>
                <tr>
                  <th>
                    #
                  </th>
				  <th>
					Name
				  </th>
                  <th>
                    Email
                  </th>
                  <th style="width:80px">
                  </th>
                </tr>
				<?php
				while ($row = $db->fetch_array($u))
				{
					echo "<tr><td>".$row['ID']."</td><td>".$row['username']."</td><td>".$row['email']."</td><td><a href=\"index.php?del=".$row['ID']."\" class=\"btn btn-danger btn-xs\">Delete</a></td></tr>";
				}
				?>
              </tbody>
            </table>
          </div>
          <div class="col-md2 col-md-2" style="display: block;">
            <a href="../index.php?action=logout" class="btn btn-danger">Log Out</a>
          </div>
        </div>
      </div>
    </div>
	
	<!-- modal dialog -->
	<div class="modal" id="viewModal">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  <h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
			  
			</div>
		  </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
    <!-- /.container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js">
    </script>
  </body>

</html>