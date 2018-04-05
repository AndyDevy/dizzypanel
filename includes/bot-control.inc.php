<?php
if (isset($_POST['submit'])) {
  $b_id = $_POST['id'];
  header ("Location: ../control/bot.php?id=$b_id");
}
