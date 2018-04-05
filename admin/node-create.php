<?php include 'header.php'; ?>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Admin Dashboard</h2>
        </div>
    </div>
        <div class="col-lg-12">
            <div class="block">
                <div class="title"><strong>Create Bot</strong></div>
              <!-- Craete User Form -->
              <div class="form d-flex align-items-center">
                <center>
                <div class="content">
                    <form class="form" id="login-form" action="includes/node-create.inc.php" method="POST">
                        <br>
                        <input class="mr-sm-3 form-control" name="ip" type="text" placeholder="IP/Domain">
                        <br>
                        <input class="mr-sm-3 form-control" name="ram" type="number" placeholder="RAM (MB)">
                        <br>
                        <input class="mr-sm-3 form-control" name="bot-limit" type="number" placeholder="Bot Limit">
                        <br>
                        <input class="mr-sm-3 form-control" name="code" type="text" placeholder="Code">
                        <br>
                        <input class="mr-sm-3 form-control" name="locat" type="text" placeholder="Location">
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
