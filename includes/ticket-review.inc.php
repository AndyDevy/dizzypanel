<?php
if (isset($_POST['submit'])) {
  $t_id = $_POST['id'];
  header ("Location: ../ticket-review.php?ticket_id=$t_id");
}
