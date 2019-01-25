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

                            <form action="newguest.php" method="post" id="userData" role="form">
                                <div id="student"> 
                                    <input type="radio" name="vehicle" value="1">Car<br>
                                    <input type="radio" name="vehicle" value="2">Motorcycle<br>
                                    <input type="radio" name="vehicle" value="3">Bicycle<br>
                                    <table>
                                        <tr style="text-align:center">
                                            <td>
                                                <h3>Personal Information</h3>
                                            </td>
                                            <td>
                                                <h3>Car Information</h3>
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="firstname">First Name:</label>
                                                <input type="text" name="firstname" id="firstname">
                                            </td>
                                            <td>
                                                <label For="make">Car Make:</label>
                                                <input type="text" name="make" id="make">
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="lastname">Last Name:</label>
                                                <input type="text" name="lastname" id="lastname">
                                            </td>
                                            <td>
                                                <label For="model">Car Model:</label>
                                                <input type="text" name="model" id="model">
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="middlename">Middle Name:</label>
                                                <input type="text" name="middlename" id="middlename">
                                            </td>
                                            <td>
                                                <label For="color">Color:</label>
                                                <input type="text" name="color" id="color">
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="schoolID">School ID Number:</label>
                                                <input type="number" name="schoolID" id="schoolID">
                                            </td>
                                            <td>
                                                <label For="platenumber">Plate Number:</label>
                                                <input type="text" name="platenumber" id="platenumber">
                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="password">Password:</label>
                                                <input type="password" name="password" id="password">
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="repassword">Retype Password:</label>
                                                <input type="password" name="repassword" id="repassword">
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="contactnumber1">Contact Number:</label>
                                                <input type="text" name="contactnumber1" id="contactnumber1">
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr style="text-align:right">
                                            <td>
                                                <label For="contactnumber2">Emergency Number:</label>
                                                <input type="text" name="contactnumber2" id="contactnumber2">
                                            </td>
                                            <td>

                                            </td>
                                        </tr>

                                    </table>
                                    <input type="submit" value="Create">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "Session expired! Please re-login";
            echo "<br>";
            echo "<button><a href='sampleLogin.php'>Login</a></button>";
        }
        ?>
        <script>
            var btn = document.getElementById('back');
            btn.addEventListener('click', function () {
                document.location.href = 'announcement.php';
            });
        </script>
        <script src="vendor/jquery/jquery.min.js"></script>
    </body>
</html>
