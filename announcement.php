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
                            <div>
                                <button><a href="addannouncement.php">CREATE NEW</a></button>
                            </div>
                            <?php
                            date_default_timezone_set('Asia/Manila');
                            $now = date('Y-m-d');
                            $connect = mysqli_connect("$server", "$username", "$password", "$database");
                            $queryfuture = "UPDATE announcement SET Announcement_Status = '1' WHERE Announcement_Status ='2' AND (Announcement_Start < '" . $now . "' AND '" . $now . "' < Announcement_End)";
                            $result = mysqli_query($connect, $queryfuture);

                            $querypast = "UPDATE announcement SET Announcement_Status = '3' WHERE Announcement_Status ='1' AND '" . $now . "' > Announcement_End";
                            $result2 = mysqli_query($connect, $querypast);


                            $query = "SELECT Announcement_ID, Announcement_Title, Announcement_Description FROM announcement WHERE Announcement_Status = '1'";
                            $result3 = mysqli_query($connect, $query) or die(mysqli_error());
                            if (mysqli_num_rows($result3) > 0) {
                                echo "<table>";
                                while ($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                                    $announcementID = $row['Announcement_ID'];
                                    echo "<tr>";
                                    echo "<td style='padding:10px;'><h2>Title: " . $row['Announcement_Title'] . "</h2></td>";
                                    echo "<td style='padding:10px;'><a href='editannouncement.php?announcementID=$announcementID'>Edit</a></td>";
                                    echo "<td style='padding:10px;'><a href='removeannouncement.php?announcementID=$announcementID'>Remove</a></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td style='padding:10px;'><p>Details: " . $row['Announcement_Description'] . "</p></td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>
                                <br>
                                <div>
                                    <div class="dropdown">
                                        <input type="button" onClick="window.print()" value="Print Announcement"/>
                                    </div>
                                </div>
                                <?php
                            } else {
                                echo "There are no announcement yet";
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

    </body>
</html>