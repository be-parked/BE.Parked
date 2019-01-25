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

                                    <?php
                                    include 'connection.php';
                                    $mysql = new mysqllocal();
                                    $server = $mysql->server;
                                    $username = $mysql->username;
                                    $password = $mysql->password;
                                    $database = $mysql->database;
                                    $connect = mysqli_connect("$server", "$username", "$password", "$database") or
                                            die("Please, check your server connection.");
                                    ?>
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
                                    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['middlename']) && isset($_POST['contactnumber1']) && isset($_POST['contactnumber2'])) {
                                        $lastname = $_POST['lastname'];
                                        $firstname = $_POST['firstname'];
                                        $middlename = $_POST['middlename'];
                                        $number1 = $_POST['contactnumber1'];
                                        $number2 = $_POST['contactnumber2'];
                                        if (empty($firstname) || ($firstname == " ")) {
                                            echo "First Name Cannot Be Empty";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        } else if (empty($lastname) || ($lastname == " ")) {
                                            echo "Last Name Cannot Be Empty";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        } else if (empty($middlename) || ($middlename == " ")) {
                                            echo "Middle Name Cannot Be Empty";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        } else if (empty($number1) || ($number1 == " ")) {
                                            echo "Contact Number Cannot Be Empty";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        } else if (empty($number2) || ($number2 == " ")) {
                                            echo "Emergency Number Cannot Be Empty";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        } else if ((!empty($lastname) && ($lastname != " ")) && (!empty($firstname) && ($firstname != " ")) && (!empty($middlename) && ($middlename != " ")) && (!empty($number1) && ($number1 != " ")) && (!empty($number2) && ($number2 != " "))) {

                                            $query2 = "UPDATE user SET Last_Name = '$lastname', First_Name = '$firstname', Middle_Name = '$middlename', Contact_Number1 = '$number1', Contact_Number2 = '$number2' WHERE Email = '$admin' AND Role_ID = '$role'";
                                            $result2 = mysqli_query($connect, $query2);

                                            if ($result2) {
                                                echo "Your information has successfully updated";
                                                echo "<br>";
                                                echo "<button id='ok'>OK</button>";
                                            }
                                        }
                                    } else {
                                        echo "Invalid Input";
                                        echo "<br>";
                                        echo "<button id='back'>Back</button>";
                                    }
                                    ?>


                                </div>
                            </div>
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

                                    <!--https://www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_list_group_link&stacked=h-->
                                    <!--https://getbootstrap.com/docs/4.0/components/list-group/-->

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
                                <div class="page-wrapper">

                                    <?php
                                    include 'connection.php';
                                    $mysql = new mysqllocal();
                                    $server = $mysql->server;
                                    $username = $mysql->username;
                                    $password = $mysql->password;
                                    $database = $mysql->database;
                                    $connect = mysqli_connect("$server", "$username", "$password", "$database") or
                                            die("Please, check your server connection.");
                                    ?>
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
                                    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['middlename']) && isset($_POST['contactnumber1']) && isset($_POST['contactnumber2'])) {
                                        $lastname = $_POST['lastname'];
                                        $firstname = $_POST['firstname'];
                                        $middlename = $_POST['middlename'];
                                        $number1 = $_POST['contactnumber1'];
                                        $number2 = $_POST['contactnumber2'];
                                        if (empty($firstname) || ($firstname == " ")) {
                                            echo "First Name Cannot Be Empty";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        } else if (empty($lastname) || ($lastname == " ")) {
                                            echo "Last Name Cannot Be Empty";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        } else if (empty($middlename) || ($middlename == " ")) {
                                            echo "Middle Name Cannot Be Empty";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        } else if (empty($number1) || ($number1 == " ")) {
                                            echo "Contact Number Cannot Be Empty";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        } else if (empty($number2) || ($number2 == " ")) {
                                            echo "Emergency Number Cannot Be Empty";
                                            echo "<br>";
                                            echo "<button id='back'>Back</button>";
                                        } else if ((!empty($lastname) && ($lastname != " ")) && (!empty($firstname) && ($firstname != " ")) && (!empty($middlename) && ($middlename != " ")) && (!empty($number1) && ($number1 != " ")) && (!empty($number2) && ($number2 != " "))) {

                                            $query2 = "UPDATE user SET Last_Name = '$lastname', First_Name = '$firstname', Middle_Name = '$middlename', Contact_Number1 = '$number1', Contact_Number2 = '$number2' WHERE Email = '$admin' AND Role_ID = '$role'";
                                            $result2 = mysqli_query($connect, $query2);

                                            if ($result2) {
                                                echo "Your information has successfully updated";
                                                echo "<br>";
                                                echo "<button id='ok'>OK</button>";
                                            }
                                        }
                                    } else {
                                        echo "Invalid Input";
                                        echo "<br>";
                                        echo "<button id='back'>Back</button>";
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
            <?php
        }
        ?>
        <script>
            var ok = document.getElementById('ok');
            ok.addEventListener('click', function () {
                document.location.href = 'returnhome.php';
            });
        </script>
        <script>
            var back = document.getElementById('back');
            back.addEventListener('click', function () {
                document.location.href = 'editprofile.php';
            });
        </script>
    </body>
</html>