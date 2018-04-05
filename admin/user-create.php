<?php include 'header.php'; ?>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Admin Dashboard</h2>
        </div>
    </div>
        <div class="col-lg-12">
            <div class="block">
                <div class="title"><strong>Create User</strong></div>
              <!-- Craete User Form -->
              <div class="form d-flex align-items-center">
                <center>
                <div class="content">
                    <form class="form" id="login-form" action="includes/signup.inc.php" method="POST">
                        <br>
                        <input class="mr-sm-3 form-control" name="first" type="text" placeholder="First Name">
                        <br>
                        <input class="mr-sm-3 form-control" name="last" type="text" placeholder="Last Name">
                        <br>
                        <input class="mr-sm-3 form-control" name="email" type="email" placeholder="Email">
                        <br>
                        <input class="mr-sm-3 form-control" name="uid" type="text" placeholder="Username">
                        <br>
                        <input class="mr-sm-3 form-control" name="pwd" type="password" placeholder="Password">
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
