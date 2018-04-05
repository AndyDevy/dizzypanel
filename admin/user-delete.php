<?php include 'header.php'; ?>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Admin Dashboard</h2>
        </div>
    </div>
        <div class="col-lg-12">
            <div class="block">
                <div class="title"><strong>Delete User</strong></div>
                <h3>Delete by ID</h3>
                <form action="includes/delete_id.inc.php" method="POST">
                    <input type="number" name="id" placeholder="ID">
                    <button type="submit" name="submit">Delete</button>
                </form>
                <h3>Delete by Email</h3>
                <form action="includes/delete_email.inc.php" method="POST">
                    <input type="email" name="email" placeholder="Email">
                    <button type="submit" name="submit">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include 'javascript.php'; ?>