<?php 
    include 'header.php'; 
    
    // Flash Notifications
    $code = '';
    if ($_GET) {
      $code = $_GET['create'];
      switch ($code) {
        case 'empty_fields':
        $flash = "You can't leave empty fields!";
        break;
        case 'ip_exists':
        $flash = "A node with that IP address already exists.";
        break;
        case 'success':
        $flash = "Bot created succesfully.";
        break;
        case 'error':
        $flash = "An unexpected error happened.";
        break;
      }
    } else {
      $flash = '';
    }
?>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Admin Dashboard</h2>
        </div>
    </div>
        <div class="col-lg-12">
            <?php
              if ($code == "success") {
                echo '<div class="block" style="background-color: green; color: white;">';
                echo $flash;
                echo '</div>';
              } elseif ($code) {
                echo '<div class="block" style="background-color: red; color: white;">';
                echo $flash;
                echo '</div>';
              }
             ?>
            <div class="block">
                <div class="title"><strong>Create Node</strong></div>
              <!-- Craete User Form -->
              <div class="form d-flex align-items-center">
                <center>
                <div class="content">
                    <form class="form" id="login-form" action="includes/node-create.inc.php" method="POST">
                        <br>
                        <input class="mr-sm-3 form-control" name="ip" type="text" placeholder="IP/Domain">
                        <br>
                        <input class="mr-sm-3 form-control" name="ram" type="number" placeholder="RAM (MB)">
                        <br>
                        <input class="mr-sm-3 form-control" name="bot-limit" type="number" placeholder="Bot Limit">
                        <br>
                        <input class="mr-sm-3 form-control" name="code" type="text" placeholder="Code">
                        <br>
                        <input class="mr-sm-3 form-control" name="locat" type="text" placeholder="Location">
                        <br>
                        <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                    </form>
                </center>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>


<?php include 'javascript.php'; ?>
