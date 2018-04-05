<?php
include 'header.php';
include 'includes/dbh.inc.php';
// Getting user's rank
$uid = $_SESSION['u_uid'];
$sql = "SELECT user_rank FROM users WHERE user_uid='$uid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$userRank = $row['user_rank'];
$u_id = $_SESSION['u_id'];
$t_id = $_GET['ticket_id'];

// Check if ticket exists
$sql = "SELECT * FROM tickets WHERE ticket_id = $t_id;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if ($resultCheck == 0) {
  header("Location: support.php?error=no_ticket");
  exit();
} else {
  // Process ID and sender to see if it has permission
  $t_sender = $row['ticket_sender'];
  if ($t_sender == $u_id || $userRank > 0) {
    $ticket = true;
  } else {
    header("Location: support.php?error=no_perm");
  }
}

// Check if ticket is closed
$sql = "SELECT ticket_status FROM tickets WHERE ticket_id = $t_id;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Support</h2>
    </div>
  </div>
    <div class="col-lg-12">
      <div class="block">
        <div class="title"><strong>Ticket #
          <?php
            if ($ticket = true) {
              echo $t_id;
            }
          ?>
        </strong></div>
        <div class="title" style="font-size: -5%;"><strong>Subject:
          <?php
            $sql = "SELECT ticket_subject FROM tickets WHERE ticket_id = $t_id;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $subj = $row['ticket_subject'];
            echo $subj;
          ?>
        </strong></div>
        <div class="title"><strong>Status:
          <?php
            $sql = "SELECT ticket_status FROM tickets WHERE ticket_id = $t_id;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $status = $row['ticket_status'];
            echo $status;
            if ($status == 'Open' || $status == 'Answered by Staff' || $status == 'Answered by User') {
              $numStatus = 1;
            } elseif ($status == 'Closed') {
              $numStatus = 0;
            }
          ?>
        </strong></div>
        <p>
          <?php
            $id = $_SESSION['u_id'];
            $sql = "SELECT msg_sender, msg_content, msg_time FROM messages WHERE msg_ticket = $t_id;";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $sender = $row['msg_sender'];
              $sql2 = "SELECT user_uid FROM users WHERE user_id = $sender";
              $result2 = mysqli_query($conn, $sql2);
              $row2 = mysqli_fetch_assoc($result2);
              echo '<div class="block" style="background-color: #585a5f;">';
              echo '<strong style="color: #ff0c0c;">' .  $row2['user_uid'] . '</strong> @ ' . $row['msg_time'] . '<br>';
              echo $row['msg_content'];
              echo '</div>';
            }
          ?>
        </p>
        <hr>
        <?php
          if ($numStatus == 1) {
            include 'includes/ticket-options.inc.php';
            exit();
          } elseif ($numStatus == 0) {
            echo '<div class="title"><strong>This ticket is closed.</strong></div>';
            exit();
          }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include 'javascript.php'; ?>
