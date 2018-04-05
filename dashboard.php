<?php
include 'header.php';

// Flash Notifications
$code = '';
if ($_GET) {
  $code = $_GET['login'];
  switch ($code) {
    case 'success':
    $flash = "Logged in succesfully.";
    break;
  }
} else {
  $flash = '';
}
?>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
        </div>
    </div>
        <div class="col-lg-12">
          <?php
          if ($code) {
            echo '<div class="block" style="background-color: green; color: white;">';
            echo $flash;
            echo '</div>';
          }
          ?>
          <div class="block">
              <div class="title"><strong>Your Account Details</strong></div>
              <p><strong>User #: </strong>
                <?php
                  // Echoing the user's id
                  echo $_SESSION['u_id'];
                ?>
              </p>
              <p><strong>Name: </strong>
                <?php
                  // Echoing the user's name
                  echo $_SESSION['u_first'].' '.$_SESSION['u_last'];
                ?>
              </p>
              <p><strong>Email: </strong>
                <?php
                  // Echoing the user's email
                  echo $_SESSION['u_email'];
                ?>
              </p>
              <p><strong>Username: </strong>
                <?php
                  // Echoing the user's username
                  echo $_SESSION['u_uid'];
                ?>
              </p>
              <p><strong>Password: </strong> <a href="account.php">Change</a></p>
              <hr>
              <div class="title"><strong>Your Discord Bots</strong></div>
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Node</th>
                  </tr>
                </thead>
                <tbody>
                      <?php
                      $id = $_SESSION['u_id'];
                      // Getting the Variables
                      include 'includes/dbh.inc.php';
                      $sql = "SELECT bot_id, bot_name, bot_desc, bot_node FROM bots WHERE bot_owner=$id;";
                      $result = mysqli_query($conn, $sql);
                      if ($resultCheck = mysqli_num_rows($result) < 1) {
                        echo '<tr>';
                        echo "<td> You've got no bots assigned. </td>";
                        echo '<td> </td>';
                        echo '<td> </td>';
                        echo '</tr>';
                      }
                      while ($row = mysqli_fetch_assoc($result)) {
                        // Listing all bots from the user
                        echo '<tr>';
                        foreach ($row as $field) {
                          echo '<td>' . htmlspecialchars($field) . '</td>';
                        }
                        echo '</tr>';
                      }
                      ?>
                </tbody>
              </table>
              <hr>
              <div class="title"><strong>Your Support Tickets</strong></div>
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                      <?php
                      $id = $_SESSION['u_id'];
                      // Getting the Variables
                      include 'includes/dbh.inc.php';
                      $sql = "SELECT ticket_id, ticket_subject, ticket_status FROM tickets WHERE ticket_sender=$id;";
                      $result = mysqli_query($conn, $sql);
                      if ($resultCheck = mysqli_num_rows($result) < 1) {
                        echo '<tr>';
                        echo "<td> You've got no support tickets. </td>";
                        echo '<td> </td>';
                        echo '<td> </td>';
                        echo '</tr>';
                      }
                      while ($row = mysqli_fetch_assoc($result)) {
                        // Listing all tickets from the user
                        echo '<tr>';
                        foreach ($row as $field) {
                          echo '<td>' . htmlspecialchars($field) . '</td>';
                        }
                        echo '</tr>';
                      }
                      ?>
                </tbody>
              </table>
          </div>
        </div>
    </div>
</div>
<?php include 'javascript.php'; ?>
