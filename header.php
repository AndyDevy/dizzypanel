<?php
    session_start();
    // Checks if user is logged in
    if (!isset($_SESSION['u_id'])) {
        header("Location: index.php");
    }
    // Getting the avatar image from gravatar
    $email = $_SESSION['u_email'];
    $default = 'https://www.gravatar.com/avatar';
    $size = 60;
    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    // Getting the user's rank
    include 'includes/dbh.inc.php';
    $uid = $_SESSION['u_uid'];
    $sql = "SELECT user_rank FROM users WHERE user_uid='$uid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $userRank = $row['user_rank'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DizzyPanel (0.1.3)</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><!--[endif]-->
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header"><a href="index.php" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dizzy</strong><strong>Panel</strong> v0.1.3</div>
                    <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>P</strong> v0.1.3</div></a>
                <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>

                </ul>
                </li>
                </ul>
            </div>
    </nav>
</header>
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo $grav_url; ?>" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
                <h1 class="h5"><?php echo $_SESSION['u_uid']; ?></h1>
                <p><?php echo $_SESSION['u_email']; ?></p>
            </div>
        </div><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li><a href="dashboard.php"> <i class="icon-home"></i>Home </a></li>
            <li><a href="bots.php"> <i class="icon-grid"></i>Bots </a></li>
            <li><a href="account.php"> <i class="fa fa-bar-chart"></i>Account </a></li>
            <li><a href="support.php"><i class="fa fa-bar-chart"></i>Support </a></li>
        </ul>
            <?php
                if ($userRank > 0) {
                    echo '<ul class="list-unstyled">';
                    echo '<span class="heading">Admin </span>';
                    echo '<li><a href="admin/user-manage.php"> <i class="fa fa-bar-chart"></i>Manage Users</a></li>';
                    echo '<li><a href="admin/bot-manage.php"> <i class="fa fa-bar-chart"></i>Manage Bots</a></li>';
                    echo '<li><a href="admin/node-manage.php"> <i class="fa fa-bar-chart"></i>Manage Nodes</a></li>';
                    echo '<li><a href="admin/ticket-manage.php"> <i class="fa fa-bar-chart"></i>Manage Tickets</a></li>';
                    echo '<li><a href="admin/home.php"> <i class="fa fa-bar-chart"></i>Placeholder</a></li>';
                }
            ?>
            <li><a href="logout.php"> <i class="icon-logout"></i>Log Out </a></li>
    </nav>
