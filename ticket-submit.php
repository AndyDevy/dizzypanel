<?php include 'header.php'; ?>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Support</h2>
        </div>
    </div>
        <div class="col-lg-12">
            <div class="block">
                <div class="title"><strong>Create Ticket</strong></div>
              <!-- Create Ticket Form -->
              <div class="form d-flex align-items-center">
                <center>
                <div class="content">
                    <form class="form" id="login-form" action="includes/ticket-create.inc.php" method="POST">
                        <br>
                        <input class="mr-sm-3 form-control" name="subject" type="text" placeholder="Subject">
                        <br>
                        <input class="mr-sm-3 form-control" name="message" type="text" placeholder="Message">
                        <br>
                        <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                    </form>
                </center>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>


<?php include 'javascript.php'; ?>
