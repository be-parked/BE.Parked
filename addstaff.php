<?php
if(isset($_SESSION['email']) && isset($_SESSION['role'])){
    $admin = $_SESSION['email'];
    $role = $_SESSION['role'];
}
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

        <script src="js.js" type="text/javascript"></script>

        <script>

        </script>

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
                            <h2>Create User Account</h2>
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

                        <form action="usertype.php" method="post" id="userData" role="form">
                            <div>
                                <select name="filter" required id="filter" onchange="this.form.submit()">
                                    <option value="1">IT Administrator</option>
                                    <option value="2">Security Administrator</option>
                                    <option value="3" selected>Staff</option>
                                    <option value="4">Student</option>
                                    <option value="5">Guard</option>
                                </select>
                            </div>
                        </form>
                        <form action="newstaff.php" method="post" id="userData" role="form">
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
                                            <label For="modelId">Car Model:</label>
                                            <input type="text" name="studentmodel" id="modelID">
                                        </td>
                                    </tr>
                                    <tr style="text-align:right">
                                        <td>
                                            <label For="middlename">Middle Name:</label>
                                            <input type="text" name="middlename" id="middlename">
                                        </td>
                                        <td>
                                            <label For="modelId">Color:</label>
                                            <input type="text" name="studentcolor" id="colorID">
                                        </td>
                                    </tr>
                                    <tr style="text-align:right">
                                        <td>
                                            <label For="email">Email:</label>
                                            <input type="text" name="email" id="email">
                                        </td>
                                        <td>
                                            <label For="platenumberID">Plate Number:</label>
                                            <input type="text" name="studentplatenumber" id="platenumberID">
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


                        <!--<div id="linechart_material" style="width: 900px; height: 500px"></div> -->
                    </div>

                </div>

                </body>
                </html>

