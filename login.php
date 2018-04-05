<?php
  // Flash notifications
  $code = $_GET['login'];
  switch ($code) {
    case 'empty':
    $flash = "You can't leave empty fields!";
    break;
    case 'incorrect':
    $flash = "Incorrect username/password combination.";
    break;
    case 'error':
    $flash = "There was an error logging in.";
    break;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DizzyPanel - Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/zlh.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Log In</h1>
                  </div>
                  <p>Please use the credentials that were sent to your e-mail to log in.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="login-form" action="includes/login.inc.php" method="POST">
                    <div class="form-group">
                      <input id="login-username" type="text" name="uid" required="" class="input-material">
                      <label for="login-username" class="label-material">Username</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="pwd" required="" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div><button id="login-button" type="submit" name="submit">Log In</button>
                  </form>
                  <?php
                  if ($code) {
                    echo '<div class="block" style="background-color: #ff0c0c; color: white;">';
                    echo $flash;
                    echo '</div>';
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Copyright 2017 DizzyPanel. All Rights Reserved.</p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
<?php include 'javascript.php'; ?>
