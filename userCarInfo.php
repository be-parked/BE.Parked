<?php ?>
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
                        <h2> Car Info Validation</h2>
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
                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <div class="dropdown">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">Filter</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Filter</a>
                                    <a class="dropdown-item" href="#">Filter</a>
                                    <a class="dropdown-item" href="#">Filter</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    include 'connection.php';
                    $mysql = new mysqllocal();
                    $server = $mysql->server;
                    $username = $mysql->username;
                    $password = $mysql->password;
                    $database = $mysql->database;
                    $connect = mysqli_connect("$server", "$username", "$password", "$database") or die(mysqli_connect_error());
                    $query = "SELECT";
                    ?>

                    <div class="row">
                        <table>
                            <tr class="col">

                            </tr>
                        </table>
                    </div>

                    <!--<div id="linechart_material" style="width: 900px; height: 500px"></div> -->
                    <!--<div class="page-wrapper">
                    </div>-->
                    <div>
                        <br>
                        <h2 align="center">Display Google Line Chart With JSON PHP & MySQL</h2>
                        <div id="line_chart" style="width:100%; height:500px"></div>
                    </div>
                </div>
            </div>

    </body>
</html>