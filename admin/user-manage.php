<?php
include 'header.php';

// Flash Notifications
// Checks what the case is
if ($_GET['create']) {
  $code = $_GET['create'];
  switch ($code) {
    case 'empty_fields':
    $flash = "All fields are mandatory";
    break;
    case 'invalid':
    $flash = "Some characters are not allowed";
    break;
    case 'email_not_valid':
    $flash = "That email address is not valid";
    break;
    case 'user_taken':
    $flash = "That username is taken";
    break;
    case 'success':
    $flash = "User created succesfully";
    break;
    default:
    $flash = '';
    break;
  }
} elseif ($_GET['delete']) {
  $code = $_GET['delete'];
  switch ($code) {
    case 'success':
    $flash = "User deleted succesfully.";
    break;
    case 'no_user':
    $flash = "There's no user with that info in the database.";
    break;
    default:
    $flash = '';
    break;
  }
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
      <div class="title"><strong>User Management</strong></div>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Userrname</th>
            </tr>
          </thead>
          <tbody>
                <?php
                // Getting the Variables
                include '../includes/dbh.inc.php';
                $sql = "SELECT user_id, user_first, user_last, user_email, user_email, user_uid FROM users;";
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
            </div>
            <div class="col-lg-2 col-md-4"><a href="admin/user-create.php" class="d-block megamenu-button-link bg-success"><center><strong>Create User</strong></center></a></div>
            <div class="col-lg-2 col-md-4"><a href="admin/user-delete.php" class="d-block megamenu-button-link bg-success"><center><strong>Delete User</strong></center></a></div>
        </div>
    </div>
</div>
<?php include 'javascript.php'; ?>
