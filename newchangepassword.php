<?php
session_start();
$admin = $_SESSION['email'];
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

                            <!--https://www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_list_group_link&stacked=h-->
                            <!--https://getbootstrap.com/docs/4.0/components/list-group/-->

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

                            <?php
                            include 'connection.php';
                            $mysql = new mysqllocal();
                            $server = $mysql->server;
                            $username = $mysql->username;
                            $password = $mysql->password;
                            $database = $mysql->database;
                            $connect = mysqli_connect("$server", "$username", "$password", "$database") or
                                    die("Check your server connection.");

                            $role = $_POST['role'];
                            if ($role == 4) {
                                $id = $_POST['user'];
                                $oldpassword = mysqli_real_escape_string($connect, $_POST['oldpassword']);
                                $newpassword = mysqli_real_escape_string($connect, $_POST['newpassword']);
                                $renewpassword = mysqli_real_escape_string($connect, $_POST['renewpassword']);
                                $query = "SELECT Password FROM user WHERE School_Number_ID = '$id' AND (Role_ID = '$role' AND Password = '$oldpassword')";
                                $result = mysqli_query($connect, $query);
                                if ($row = mysqli_num_rows($result) > 0) {
                                    if ($newpassword == $renewpassword) {
                                        $query2 = "UPDATE user SET Password = '$newpassword' WHERE Email = '$email' AND (Role_ID = '$role' AND Password = '$oldpassword')";
                                        $result2 = mysqli_query($connect, $query2);
                                        if ($result2) {
                                            echo "You Have Successfully Changed Your Password!";
                                            echo "<button><a href='ithomepage.php'>Home</a></button>";
                                        }
                                    } else {
                                        echo "Re-Entered Password Does Not Match!";
                                        echo "<button><a href='validateoldpassword.php?role=$role&user=$id'>Back</a></button>";
                                    }
                                } else {
                                    echo "Existing Password Does Not Match!";
                                    echo "<button><a href='validateoldpassword.php?role=$role&user=$id'>Back</a></button>";
                                }
                            } else if ($role == 1 || $role == 2 || $role == 3 || $role = 5) {
                                $email = $_POST['user'];
                                $oldpassword = mysqli_real_escape_string($connect, $_POST['oldpassword']);
                                $newpassword = mysqli_real_escape_string($connect, $_POST['newpassword']);
                                $renewpassword = mysqli_real_escape_string($connect, $_POST['renewpassword']);
                                $query3 = "SELECT Password FROM user WHERE Email = '$email' AND (Role_ID = '$role' AND Password = '$oldpassword')";
                                $result3 = mysqli_query($connect, $query3);
                                if ($row = mysqli_num_rows($result3) > 0) {
                                    if ($newpassword == $renewpassword) {
                                        $query4 = "UPDATE user SET Password = '$newpassword' WHERE Email = '$email' AND (Role_ID = '$role' AND Password = '$oldpassword')";
                                        $result4 = mysqli_query($connect, $query4);
                                        if ($result4) {
                                            echo "You Have Successfully Changed Your Password!";
                                            echo "<button><a href='ithomepage.php'>Home</a></button>";
                                        }
                                    } else {
                                        echo "Re-Entered Password Does Not Match!";
                                        echo "<button><a href='validateoldpassword.php?role=$role&user=$email'>Back</a></button>";
                                    }
                                } else {
                                    echo "Existing Password Does Not Match!";
                                    echo "<button><a href='validateoldpassword.php?role=$role&user=$email'>Back</a></button>";
                                }
                            } else {
                                echo "Invalid Input!";
                                echo "<br>";
                                echo "<button><a href='ithomepage.php'>Home</a></button>";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>