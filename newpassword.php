<?php
session_start();

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
    </head>
    <body>
        <?php
        if ($role == 1) {
            ?>

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
                            <h3 class="row">Welcome, IT Administrator</h3>
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
                                    <a href="ithomepage.php" class="list-group-item list-group-item-action list-group-item-primary" style="border: 0px">Admin Home</a>
                                    <a href="additadmin.php" class="list-group-item list-group-item-action list-group-item-primary" style="border: 0px">Add User Account</a>
                                    <a href="verifyaccount.php" class="list-group-item list-group-item-action list-group-item-primary" style="border: 0px">Verify User Account</a>
                                    <a href="changepassword.php" class="list-group-item list-group-item-action list-group-item-primary" style="border: 0px">Change User Password</a>
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
                            <?php
                            include 'connection.php';
                            $mysql = new mysqllocal();
                            $server = $mysql->server;
                            $username = $mysql->username;
                            $password = $mysql->password;
                            $database = $mysql->database;
                            $connect = mysqli_connect("$server", "$username", "$password", "$database") or
                                    die("Please, check your server connection.");

                            if (isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['repassword'])) {
                                $oldpassword = mysqli_real_escape_string($connect, $_POST['oldpassword']);
                                $newpassword = mysqli_real_escape_string($connect, $_POST['newpassword']);
                                $repassword = mysqli_real_escape_string($connect, $_POST['repassword']);
                                if (empty($oldpassword) || ($oldpassword == " ")) {
                                    echo "Old Password Cannot Be Empty";
                                    echo "<br>";
                                    echo "<button id='back'>Back</button>";
                                } else if (empty($newpassword) || ($newpassword == " ")) {
                                    echo "New Password Cannot Be Empty";
                                    echo "<br>";
                                    echo "<button id='back'>Back</button>";
                                } else if (empty($repassword) || ($repassword == " ")) {
                                    echo "Re-entered password does not match!";
                                    echo "<br>";
                                    echo "<button id='back'>Back</button>";
                                } else if ((!empty($oldpassword) && ($oldpassword != " ")) && (!empty($newpassword) && ($newpassword != " ")) && (!empty($repassword) && ($repassword != " "))) {

                                    $query = "SELECT Password FROM user WHERE Email = '$admin' AND (Role_ID ='$role' AND Password = '$oldpassword')";

                                    $result = mysqli_query($connect, $query);
                                    if (mysqli_num_rows($result) > 0) {

                                        if ($newpassword != $repassword) {
                                            echo "Re-entered password does not match!";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        } else {
                                            $query1 = "UPDATE user SET Password = '$newpassword' WHERE Email = '$admin' AND Role_ID = '$role'";
                                            $result1 = mysqli_query($connect, $query1);
                                            if ($result1) {
                                                echo "Your have successfully changed your password!";
                                                echo "<br>";
                                                echo "<button id='ok'>ok</button>";
                                            }
                                        }
                                    } else {
                                        echo "your existing password does not match";
                                        echo "<br>";
                                        echo "<button id='back'>Back</button>";
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>



                <?php
            } else if ($role == 2) {
                ?>

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
                                        <a href="#" class="list-group-item list-group-item-action list-group-item-primary" style="border: 0px">Assign Guest</a>
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
                                <?php
                                include 'connection.php';
                                $mysql = new mysqllocal();
                                $server = $mysql->server;
                                $username = $mysql->username;
                                $password = $mysql->password;
                                $database = $mysql->database;
                                $connect = mysqli_connect("$server", "$username", "$password", "$database") or
                                        die("Please, check your server connection.");

                                if (isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['repassword'])) {
                                    $oldpassword = mysqli_real_escape_string($connect, $_POST['oldpassword']);
                                    $newpassword = mysqli_real_escape_string($connect, $_POST['newpassword']);
                                    $repassword = mysqli_real_escape_string($connect, $_POST['repassword']);
                                    if (empty($oldpassword) || ($oldpassword == " ")) {
                                        echo "Old Password Cannot Be Empty";
                                        echo "<br>";
                                        echo "<button id='back'>Back</button>";
                                    } else if (empty($newpassword) || ($newpassword == " ")) {
                                        echo "New Password Cannot Be Empty";
                                        echo "<br>";
                                        echo "<button id='back'>Back</button>";
                                    } else if (empty($repassword) || ($repassword == " ")) {
                                        echo "Re-entered password does not match!";
                                        echo "<br>";
                                        echo "<button id='back'>Back</button>";
                                    } else if ((!empty($oldpassword) && ($oldpassword != " ")) && (!empty($newpassword) && ($newpassword != " ")) && (!empty($repassword) && ($repassword != " "))) {

                                        $query = "SELECT Password FROM user WHERE Email = '$admin' AND (Role_ID ='$role' AND Password = '$oldpassword')";

                                        $result = mysqli_query($connect, $query);
                                        if (mysqli_num_rows($result) > 0) {

                                            if ($newpassword != $repassword) {
                                                echo "Re-entered password does not match!";
                                                echo "<br>";
                                                echo "<button id='back'>Back</button>";
                                            } else {
                                                $query1 = "UPDATE user SET Password = '$newpassword' WHERE Email ='$admin' AND Role_ID = '$role'";
                                                $result1 = mysqli_query($connect, $query1);
                                                if ($result1) {
                                                    echo "Your have successfully changed your password!";
                                                    echo "<br>";
                                                    echo "<button id='ok'>ok</button>";
                                                }
                                            }
                                        } else {
                                            echo "your existing password does not match";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                    <?php
                } else {
                    echo "Session Expired";
                    echo "<br>";
                    echo "Please Re-Login: ";
                    echo "<button><a href='sampleLogin.php'>Login</a></button>";
                }
                ?>
                <script>
                    var back = document.getElementById('back');
                    back.addEventListener('click', function () {
                        document.location.href = 'password.php';
                    });
                </script>
                <script>
                    var ok = document.getElementById('ok');
                    ok.addEventListener('click', function () {
                        document.location.href = 'returnhome.php';
                    });
                </script>
                </body>
                </html>

