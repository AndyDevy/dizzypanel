<?php include 'header.php'; ?>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-tickettom">Support</h2>
        </div>
    </div>
        <div class="col-lg-12">
            <div class="block">
                <div class="title"><strong>Your Support Tickets</strong></div>
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Subject</th>
                      <th>Sender</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php
                        $id = $_SESSION['u_id'];
                        $sql = "SELECT ticket_id, ticket_subject, ticket_sender, ticket_status FROM tickets;";
                        $result = mysqli_query($conn, $sql);
                        if ($resultCheck = mysqli_num_rows($result) < 1) {
                          echo '<tr>';
                          echo "<td> No support tickets found. </td>";
                          echo '<td> </td>';
                          echo '<td> </td>';
                          echo '<td> </td>';
                          echo '</tr>';
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                          $sender = $row['ticket_sender'];
                          $sql2 = "SELECT user_uid FROM users WHERE user_id = $sender";
                          $result2 = mysqli_query($conn, $sql2);
                          $row2 = mysqli_fetch_assoc($result2);
                          $row['ticket_sender'] = $row2['user_uid'];
                            // Listing all tickets
                            echo '<tr>';
                            foreach ($row as $field) {
                              echo '<td>' . htmlspecialchars($field) . '</td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                  </tbody>
                </table>
                <form class="form" id="login-form" action="includes/ticket-review.inc.php" method="POST">
                  <input type="number" name="id" placeholder="Ticket ID">
                  <input type="submit" name="submit" value="Open Ticket">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'javascript.php'; ?>
