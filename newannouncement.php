<?php
session_start();
if (isset($_SESSION['email'])) {
    $admin = $_SESSION['email'];
    $role = $_SESSION['role'];
    ?>
    <html>
        <head>

            <meta charset="UTF-8">
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <!-- Popper JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

            <link href="adminCSS.css" rel="stylesheet" type="text/css"/>    


            <title></title>
            <style>
                .page-wrapper
                {
                    width:1000px;
                    margin:0 auto;
                }
            </style>
        </head>
        <body>
            <nav class="navbar navbar-expand-sm">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="navbar-brand py-0" href="3">
                                <img src="beParkedLogo/be.Parked Logo.png" width="max" height="120" alt="">
                            </a>
                        </li>
                        <li>
                            <h1 class="row">BE.Parked Parking System</h1>
                            <h3 class="row">Welcome, Security Administrator</h3>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 well" style="background-color:#B8DAFF">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <h2>
                                    <span>Admin&nbsp;Menu</span>
                                </h2>

                                <!--https://www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_list_group_link&stacked=h-->
                                <!--https://getbootstrap.com/docs/4.0/components/list-group/-->

                                <div class="list-group">
                                    <a href="sechomepage.php" class="list-group-item list-group-item-action list-group-item-primary" style="border: 0px">Admin Home</a>
                                    <a href="carlog.php" class="list-group-item list-group-item-action list-group-item-primary" style="border: 0px">View Car Logs</a>
                                    <a href="announcement.php" class="list-group-item list-group-item-action list-group-item-primary" style="border: 0px">Manage Announcement</a>
                                    <a href="userCarInfo.php" class="list-group-item list-group-item-action list-group-item-primary" style="border: 0px">User Car Info Validation</a>
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-primary" style="border: 0px">Parking Tickets/Stickers</a>
                                    <a href="logout.php" class="list-group-item list-group-item-action list-group-item-primary" style="border: 0px">Logout</a>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">

                        <div class="page-wrapper">
                            <div class="col text-right">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Account
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="profile.php">Profile</a>
                                        <a class="dropdown-item" href="password.php">Password</a>
                                        <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <?php
                            include 'connection.php';
                            $mysql = new mysqllocal();
                            $server = $mysql->server;
                            $username = $mysql->username;
                            $password = $mysql->password;
                            $database = $mysql->database;

                            $connect = mysqli_connect("$server", "$username", "$password", "$database");

                            $query = "SELECT User_ID FROM user WHERE Email = '$admin'";
                            $result = mysqli_query($connect, $query) or die(mysqli_error());

                            if ($result) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    $user = $row['User_ID'];
                                    $title = mysqli_real_escape_string($connect, $_POST['title']);
                                    $details = mysqli_real_escape_string($connect, $_POST['details']);
                                    date_default_timezone_set('Asia/Manila');
                                    $startdate = mysqli_real_escape_string($connect, $_POST['startdate']);
                                    $enddate = mysqli_real_escape_string($connect, $_POST['enddate']);
                                    $date = date("m-d-Y H:i:s");
                                    if (($enddate < $startdate) || ($enddate == $startdate)) {
                                        echo "The ending date must be in advance";
                                        echo "<br>";
                                        echo "<button><a href='addannouncement.php'>Back</a></button>";
                                    } else if ($startdate > $date) {
                                        $status = 2;

                                        $query1 = "INSERT INTO announcement (User_ID, Announcement_Title, Announcement_Description,"
                                                . "Announcement_Status, Announcement_Start, Announcement_End) Values('$user', '$title', "
                                                . "'$details', '$status', '$startdate', '$enddate')";

                                        $result1 = mysqli_query($connect, $query1);
                                        if ($result1) {
                                            echo "The announcement has successfully posted";
                                            echo "<br>";
                                            echo "Do you want to create another announcement? ";
                                            echo "<button><a href='addannouncement.php'>Add More</a></button>";
                                            echo "<button><a href='announcement.php'>Back</a></button>";
                                        } else {
                                            echo "Ecountered a problem in adding new announcement!";
                                        }
                                    }
                                }
                            } else {
                                echo "Unable to connect to database";
                            }
                        } else {
                            echo "Session expired! Please re-login";
                            echo "<br>";
                            echo "<button><a href='sampleLogin.php'>Login</a></button>";
                        }
                        ?>







                    </div>
                </div>
            </div>
    </body>
</html>
