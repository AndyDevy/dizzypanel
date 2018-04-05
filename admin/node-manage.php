<?php include 'header.php'; ?>
<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-nodetom">Admin Dashboard</h2>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Node Management</strong></div>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>IP/Domain</th>
              <th>RAM</th>
              <th>Active Bots</th>
              <th>Bot Limit</th>
              <th>Code</th>
              <th>Location</th>
            </tr>
          </thead>
          <tbody>
            <?php
              // Getting the Variables
              include '../includes/dbh.inc.php';
              $sql = "SELECT node_id, node_ip, node_ram, node_bots, node_limit, node_code, node_locat FROM nodes;";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)){
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
            </div>
            <div class="col-lg-2 col-md-4"><a href="admin/node-create.php" class="d-block megamenu-button-link bg-success"><center><strong>Create Node</strong></center></a></div>
            <div class="col-lg-2 col-md-4"><a href="admin/node-delete.php" class="d-block megamenu-button-link bg-success"><center><strong>Delete Node</strong></center></a></div>
        </div>
    </div>
</div>
<?php include 'javascript.php'; ?>
