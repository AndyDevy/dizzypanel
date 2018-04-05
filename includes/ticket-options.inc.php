<div class="title"><strong>Reply to this ticket</strong></div>
<form class="form" id="login-form" action="includes/ticket-reply.inc.php?ticket_id=
<?php
  echo $t_id;
?>
" method="POST" style="margin-bottom: 2.5%;">
  <input type="text" name="message" placeholder="Message">
  <input type="submit" name="submit" value="Submit">
</form>
<div class="title"><strong>Close this ticket</strong></div>
<form class="form" id="login-form" action="includes/ticket-close.inc.php?ticket_id=
<?php
  echo $t_id;
?>
" method="POST">
  <input type="submit" name="submit" value="Close">
</form>
