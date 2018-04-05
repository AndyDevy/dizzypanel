<?php include 'header.php'; ?>
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Admin Dashboard</h2>
        </div>
    </div>
        <div class="col-lg-12">
            <div class="block">
                <div class="title"><strong>Delete Bot</strong></div>
                <form action="includes/bot-delete.inc.php" method="POST">
                    <input type="number" name="id" placeholder="ID">
                    <button type="submit" name="submit">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include 'javascript.php'; ?>
