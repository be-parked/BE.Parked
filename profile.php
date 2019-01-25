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
                                    $query = "SELECT Last_Name, First_Name, Middle_Name, Contact_Number1, Contact_Number2 FROM user WHERE Email = '$admin' AND Role_ID = '$role'";
                                    $result = mysqli_query($connect, $query);

                                    if ($result) {
                                        while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            $lastname = $rows['Last_Name'];
                                            $firstname = $rows['First_Name'];
                                            $middlename = $rows['Middle_Name'];
                                            $number1 = $rows['Contact_Number1'];
                                            $number2 = $rows['Contact_Number2'];
                                        }
                                    }
                                    ?>
                                    <table>
                                        <tr style="text-align:center">
                                            <td>
                                                <h3>Personal Information</h3>
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="firstname">First Name:</label>
                                            </td>
                                            <td style="text-align:center">
                                                <span name="firstname"><?php echo $firstname; ?></span>
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="lastname">Last Name:</label>
                                            </td>
                                            <td style="text-align:center">
                                                <span name="lastname"><?php echo $lastname; ?></span>
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="middlename">Middle Name:</label>
                                            </td>
                                            <td style="text-align:center">
                                                <span name="middlename"><?php echo $middlename; ?></span>
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="contactnumber1">Contact Number:</label>
                                            </td>
                                            <td style="text-align:center">
                                                <span name="contactnumber1"><?php echo $number1; ?></span>
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="contactnumber2">Emergency Number:</label>
                                            </td>
                                            <td style="text-align:center">
                                                <span name="contactnumber2"><?php echo $number2; ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                    <button id="edit">Edit Profile</button>

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
                                    $query = "SELECT Last_Name, First_Name, Middle_Name, Contact_Number1, Contact_Number2 FROM user WHERE Email = '$admin' AND Role_ID = '$role'";
                                    $result = mysqli_query($connect, $query);

                                    if ($result) {
                                        while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            $lastname = $rows['Last_Name'];
                                            $firstname = $rows['First_Name'];
                                            $middlename = $rows['Middle_Name'];
                                            $number1 = $rows['Contact_Number1'];
                                            $number2 = $rows['Contact_Number2'];
                                        }
                                    }
                                    ?>
                                    <table>
                                        <tr style="text-align:center">
                                            <td>
                                                <h3>Personal Information</h3>
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="firstname">First Name:</label>
                                            </td>
                                            <td style="text-align:center">
                                                <span name="firstname"><?php echo $firstname; ?></span>
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="lastname">Last Name:</label>
                                            </td>
                                            <td style="text-align:center">
                                                <span name="lastname"><?php echo $lastname; ?></span>
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="middlename">Middle Name:</label>
                                            </td>
                                            <td style="text-align:center">
                                                <span name="middlename"><?php echo $middlename; ?></span>
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="contactnumber1">Contact Number:</label>
                                            </td>
                                            <td style="text-align:center">
                                                <span name="contactnumber1"><?php echo $number1; ?></span>
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="contactnumber2">Emergency Number:</label>
                                            </td>
                                            <td style="text-align:center">
                                                <span name="contactnumber2"><?php echo $number2; ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                    <button id="edit">Edit Profile</button>

                                </div>
                            </div>
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
        } else {
            echo "Session Expired";
            echo "<br>";
            echo "Please Re-Login: ";
            echo "<button><a href='sampleLogin.php'>Login</a></button>";
        }
        ?>
        <script>
            var btn = document.getElementById('edit');
            btn.addEventListener('click', function () {
                document.location.href = 'editprofile.php';
            });
        </script>
    </body>
</html>