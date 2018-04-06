<?php include 'header.php'; ?>
<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Bots</h2>
    </div>
  </div>
    <div class="col-lg-12">
      <div class="block">
        <div class="title"><strong>Your Discord Bot List</strong></div>
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
        <div class="title"><strong>Manage Bot</strong></div>
        <form class="form" id="login-form" action="includes/bot-control.inc.php" method="POST">
          <input type="number" name="id" placeholder="Bot ID">
          <input type="submit" name="submit" value="Manage">
        </form>
      </div>
    </div>
  </div>
</div>
<?php include 'javascript.php'; ?>
