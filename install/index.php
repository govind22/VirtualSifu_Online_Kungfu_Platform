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
	<form action="do.php" method="post">
    <div class="container">
      <div class="jumbotron">
        <h1>
          Minty Installer
        </h1>
        <p>
          Complete the fields below and click the install button.
        </p>
        <div>
          Default values are provided in grey.
        </div>
        <p>
        </p>
        <p>
		  <input type="submit" class="btn btn-primary btn-lg" value="Install" />
        </p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Database Information
              </h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label>
                  MySQL Server
                </label>
                <input type="text" class="form-control" name="db_server" placeholder="localhost">
              </div>
              <div class="form-group">
                <label>
                  MySQL Username
                </label>
                <input type="text" class="form-control" name="db_user">
              </div>
              <div class="form-group">
                <label>
                  MySQL Password
                </label>
                <input type="password" class="form-control" name="db_password">
              </div>
              <div class="form-group">
                <label>
                  MySQL Database Name
                </label>
                <input type="text" class="form-control" name="db_name">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Admin Account
              </h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label>
                  Password
                </label>
                <input type="password" name="admin_password" class="form-control">
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                Site Settings
              </h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label>
                  Website Title
                </label>
                <input type="text" class="form-control" name="site_title">
              </div>
              <div class="form-group">
                <label>
                  Meta Description
                </label>
                <input type="text" class="form-control" name="meta_description">
              </div>
              <div class="form-group">
                <label>
                  Meta Keywords
                </label>
                <input type="text" class="form-control" name="meta_keywords">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<form action="do.php" method="post">
  </body>

</html>