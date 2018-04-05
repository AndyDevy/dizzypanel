<?php
include 'header.php';
// Getting user's rank
$uid = $_SESSION['u_uid'];
$sql = "SELECT user_rank FROM users WHERE user_uid='$uid'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if (!resultCheck < 1) {
    if ($row = mysqli_fetch_assoc($result)) {
        $userRank = $row['user_rank'];
    }
}
$bot_id = $_GET['id'];
include '../includes/dbh.inc.php';
$sql = "SELECT bot_name FROM bots WHERE bot_id = $bot_id;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck < 1) {
  header("Location: ../dashboard.php?error=no_bot");
} else {
  $row= mysqli_fetch_assoc($result);
  $bot_name = $row['bot_name'];
  $sql = "SELECT bot_owner FROM bots WHERE bot_id = $bot_id;";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $owner_id = $row['bot_owner'];
  $user_id = $_SESSION['u_id'];
  if ($owner_id != $user_id && $userRank < 1) {
    header("Location: ../dashboard.php?error=no_perm");
    exit();
  }
}
?>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Now Controlling: <?php echo $bot_name; ?></h2>
        </div>
    </div>
        <div class="col-lg-12">
          <div class="block">
              <div class="title"><strong>Basic Actions</strong></div>
              <a href="control/bot.php?id=<?php echo $bot_id ?>&action=start"><button type="button" name="start">Start</button></a>
              <a href="control/bot.php?id=<?php echo $bot_id ?>&action=restart"><button type="button" name="restart">Restart</button></a>
              <a href="control/bot.php?id=<?php echo $bot_id ?>&action=stop"><button type="button" name="stop">Stop</button></a>
              <a href="control/bot.php?id=<?php echo $bot_id ?>&action=kill"><button type="button" name="kill">Kill</button></a>
              <hr>
              <div class="title"><strong>Bot Details</strong></div>
              <?php
                // Getting all details
                $sql = "SELECT * FROM bots WHERE bot_id = $bot_id;";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $bot_owner = $row['bot_owner'];
                // Getting bot's owner username
                $sql2 = "SELECT user_uid FROM users WHERE user_id = $bot_owner;";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
              ?>
              <strong>ID: </strong> <?php echo $row['bot_id'] . '<br>'; ?>
              <strong>Name: </strong> <?php echo $row['bot_name'] . '<br>'; ?>
              <strong>Node: </strong> <?php echo $row['bot_node'] . '<br>'; ?>
              <strong>Language: </strong> <?php echo $row['bot_lang'] . '<br>'; ?>
              <strong>Owner: </strong> <?php echo $row2['user_uid']; ?>
              <hr>
              <div class="title"><strong>Files and Console</strong></div>
              <a href="control/bot.php?id=<?php echo $bot_id ?>&section=console"><button type="button" name="console">Go to Console</button></a>
              <a href="control/bot.php?id=<?php echo $bot_id ?>&section=files"><button type="button" name="files">Go to FTP details</button></a>
          </div>
        </div>
    </div>
</div>
<?php include 'javascript.php'; ?>
