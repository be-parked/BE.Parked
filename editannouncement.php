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
                        <div class="row">
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
                        </div>

                        <div class="page-wrapper">
                            <br>
                            <?php
                            include 'connection.php';
                            $mysql = new mysqllocal();
                            $server = $mysql->server;
                            $username = $mysql->username;
                            $password = $mysql->password;
                            $database = $mysql->database;
                            ?>
                            <div style="text-align: right">
                                <button><a href="addannouncement.php">CREATE NEW</a></button>
                            </div>
                            <?php
                            date_default_timezone_set('Asia/Manila');
                            $now = date('Y-m-d');
                            $connect = mysqli_connect("$server", "$username", "$password", "$database");

                            $announcementID = $_GET['announcementID'];

                            $query = "SELECT Announcement_Title, Announcement_Description, Announcement_Start, Announcement_End FROM announcement WHERE Announcement_Status = '1' AND Announcement_ID = '$announcementID'";
                            $result = mysqli_query($connect, $query) or die(mysqli_error());
                            if (mysqli_num_rows($result) > 0) {

                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    $title = $row['Announcement_Title'];
                                    $description = $row['Announcement_Description'];
                                    $start = date('Y-m-d', strtotime($row['Announcement_Start']));
                                    $end = date('Y-m-d', strtotime($row['Announcement_End']));
                                    //$start1 = strtotime('Y-m-d', $start);
                                    //$end1 = strtotime('Y-m-d', $end);


                                    echo "<form action='newchangeannouncement.php' method='POST'>";
                                    echo "<input type='text' style='width: 350px' name='title' value='$title'>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<textarea style='width: 400px;height: 250px' name='details' id='details''>$description</textarea>";
                                    echo "<br>";
                                    echo "Starting date of this announcement: <b>$start</b>       ";
                                    echo "Ending date of this announcement: <b> $end </b>";
                                    echo "<br>";
                                    echo "<label for='startdate'>Starting Date</label>";
                                    echo "<input type='date' name='startdate'>";
                                    echo "<label for='enddate'>Ending Date</label>";
                                    echo "<input type='date' name='enddate'>";

                                    echo "<button type='submit' class='btn btn-primary'>Update</button>";
                                    echo "<button type='button' id='back' class='btn'>Back</button>";
                                    echo "<input type='text' style='width: 350px; visibility:hidden;' name='announcementID' value='$announcementID'>";
                                    echo "</form>";
                                }
                            } else {
                                echo "Can Not Find The Announcement";
                                echo "<br>";
                                echo "<button id='back'>Back</button>";
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
        </div>
        <script>
            var btn = document.getElementById('back');
            btn.addEventListener('click', function () {
                document.location.href = 'announcement.php';
            });
        </script>
    </body>
</html>