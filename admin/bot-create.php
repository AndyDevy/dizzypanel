<?php
include 'header.php';

// Flash notifications
$code = $_GET['create'];
switch ($code) {
  case 'empty_fields':
  $flash = "Some fields are required, you can't leave them blank!";
  break;
  case 'node_false':
  $flash = "That node doesn't exist.";
  break;
  case 'owner_false':
  $flash = "There's no user with that user ID";
  break;
  case 'success':
  $flash = "Bot created succesfully!";
  break;
  case 'error':
  $flash = "There was an error creating your bot";
  break;
  default:
  $flash = '';
  break;
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
              if ($code != '' && $code != 'success') {
                echo '<div class="block" style="background-color: #ff0c0c; color: white;">';
                echo $flash;
                echo '</div>';
              } elseif ($code == 'success') {
                echo '<div class="block" style="background-color: green; color: white;">';
                echo $flash;
                echo '</div>';
              }
            ?>
            <div class="block">
                <div class="title"><strong>Create Bot</strong></div>
              <!-- Create Bot Form -->
              <div class="form d-flex align-items-center">
                <center>
                <div class="content">
                    <form class="form" id="login-form" action="includes/bot-create.inc.php" method="POST">
                        <br>
                        <input class="mr-sm-3 form-control" name="owner" type="number" placeholder="Owner ID">
                        <br>
                        <input class="mr-sm-3 form-control" name="name" type="text" placeholder="Name">
                        <br>
                        <input class="mr-sm-3 form-control" name="desc" type="text" placeholder="Description">
                        <br>
                        <input class="mr-sm-3 form-control" name="lang" type="text" placeholder="Language">
                        <br>
                        <input class="mr-sm-3 form-control" name="node" type="number" placeholder="Node">
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
