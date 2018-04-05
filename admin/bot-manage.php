<?php
include 'header.php';

// Flash notifications
$code = $_GET['delete'];
switch ($code) {
  case 'no_bot':
  $flash = "That bot doesn't exist.";
  break;
  case 'success':
  $flash = "Bot deleted succesfully";
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
      <div class="title"><strong>Bot Management</strong></div>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Owner ID</th>
              <th>Name</th>
              <th>Language</th>
              <th>Node</th>
            </tr>
          </thead>
          <tbody>
                <?php
                // Getting the Variables
                include '../includes/dbh.inc.php';
                $sql = "SELECT bot_id, bot_owner, bot_name, bot_lang, bot_node FROM bots;";
                    $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    // Listing all users
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
        <div class="title"><strong>Manage Bot</strong></div>
        <form class="form" id="login-form" action="includes/bot-control.inc.php" method="POST">
          <input type="number" name="id" placeholder="Bot ID">
          <input type="submit" name="submit" value="Manage">
        </form>
        </div>
            <div class="col-lg-2 col-md-4"><a href="admin/bot-create.php" class="d-block megamenu-button-link bg-success"><center><strong>Create Bot</strong></center></a></div>
            <div class="col-lg-2 col-md-4"><a href="admin/bot-delete.php" class="d-block megamenu-button-link bg-success"><center><strong>Delete Bot</strong></center></a></div>
        </div>
    </div>
</div>
<?php include 'javascript.php'; ?>
