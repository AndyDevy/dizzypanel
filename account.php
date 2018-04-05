<?php include 'header.php'; ?>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Account</h2>
        </div>
    </div>
        <div class="col-lg-12">
            <div class="block">
                <div class="title"><strong>Change Password</strong></div>
                <form action="includes/changepwd.inc.php" method="POST">
                    <input type="password" name="oldPwd" placeholder="Old Password">
                    <input type="password" name="newPwd" placeholder="New Password">
                    <button type="submit" name="submit">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'javascript.php'; ?>
