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
                            if (isset($_POST['email'])) {
                                $role = $_POST['role'];
                                $email = mysqli_real_escape_string($connect, $_POST['email']);
                                $query = "SELECT Email, Role_ID, Status_ID FROM user WHERE Email = '$email' AND Role_ID = '$role'";
                                $result = mysqli_query($connect, $query);
                                if ($row = mysqli_num_rows($result) > 0) {
                                    while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $status = $rows['Status_ID'];
                                        if ($status == 1) {
                                            ?>

                                            <form action="newchangepassword.php" method="POST">
                                                <label for="oldpassword">Old Password: </label>
                                                <input type="password" id="oldpassword" name="oldpassword">
                                                <br>
                                                <label for="newpassword">New Password: </label>
                                                <input type="password" id="newpassword" name="newpassword">
                                                <br>
                                                <label for="renewpassword">Re-Enter Password: </label>
                                                <input type="password" id="renewpassword" name="renewpassword">
                                                <br>
                                                <input type="text" style="visibility: hidden" id="role" name="role" value="<?php echo $role; ?>">
                                                <input type="text" style="visibility: hidden" id="user" name="user" value="<?php echo $email; ?>">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                            <?php
                                        } else if ($status == 3) {
                                            echo "This account is no longer valid";
                                            echo "<br>";
                                            echo "<button><a href='ithomepage.php'>Home</a></button>";
                                        } else if ($status == 4) {
                                            echo "The account is not yet activated";
                                            echo "<br>";
                                            echo "<button><a href='ithomepage.php'>Home</a></button>";
                                        } else {
                                            echo "Invalid Email";
                                            echo "<br>";
                                            echo "<button><a href='ithomepage.php'>Home</a></button>";
                                        }
                                    }
                                } else {
                                    echo "Invalid Email";
                                    echo "<br>";
                                    echo "<button><a href='ithomepage.php'>Home</a></button>";
                                }
                            } else if (isset($_POST['schoolID'])) {
                                $role = $_POST['role'];
                                $id = mysqli_real_escape_string($connect, $_POST['schoolID']);
                                $query = "SELECT School_Number_ID, Role_ID, Status_ID FROM user WHERE School_Number_ID = '$id' AND Role_ID = '$role'";
                                $result = mysqli_query($connect, $query);
                                if ($row = mysqli_num_rows($result) > 0) {
                                    while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $status = $rows['Status_ID'];
                                        if ($status == 1) {
                                            ?>

                                            <form action="newchangepassword.php" method="POST">
                                                <label for="oldpassword">Old Password: </label>
                                                <input type="password" id="oldpassword" name="oldpassword">
                                                <br>
                                                <label for="newpassword">New Password: </label>
                                                <input type="password" id="newpassword" name="newpassword">
                                                <br>
                                                <label for="renewpassword">Re-Enter Password: </label>
                                                <input type="password" id="renewpassword" name="renewpassword">
                                                <br>
                                                <input type="text" style="visibility: hidden" id="role" name="role" value="<?php echo $role; ?>">
                                                <input type="text" style="visibility: hidden" id="user" name="user" value="<?php echo $id; ?>">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                            <?php
                                        } else if ($status == 2) {
                                            echo "This student is already an allumni";
                                            echo "<br>";
                                            echo "<button><a href='ithomepage.php'>Home</a></button>";
                                        } else if ($status == 4) {
                                            echo "The account is not yet activated";
                                            echo "<br>";
                                            echo "<button><a href='ithomepage.php'>Home</a></button>";
                                        } else {
                                            echo "Invalid ID";
                                            echo "<br>";
                                            echo "<button><a href='ithomepage.php'>Home</a></button>";
                                        }
                                    }
                                } else {
                                    echo "Invalid ID";
                                    echo "<br>";
                                    echo "<button><a href='ithomepage.php'>Home</a></button>";
                                }
                            } else {

                                if (isset($_GET['role']) && isset($_GET['user'])) {
                                    $role = $_GET['role'];
                                    if ($role == 4) {
                                        $id = $_GET['user'];
                                        $query = "SELECT School_Number_ID, Role_ID, Status_ID FROM user WHERE School_Number_ID = '$id' AND Role_ID = '$role'";
                                        $result = mysqli_query($connect, $query);
                                        if ($row = mysqli_num_rows($result) > 0) {
                                            while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                $status = $rows['Status_ID'];
                                                if ($status == 1) {
                                                    ?>

                                                    <form action="newchangepassword.php" method="POST">
                                                        <label for="oldpassword">Old Password: </label>
                                                        <input type="password" id="oldpassword" name="oldpassword">
                                                        <br>
                                                        <label for="newpassword">New Password: </label>
                                                        <input type="password" id="newpassword" name="newpassword">
                                                        <br>
                                                        <label for="renewpassword">Re-Enter Password: </label>
                                                        <input type="password" id="renewpassword" name="renewpassword">
                                                        <br>
                                                        <input type="text" style="visibility: hidden" id="role" name="role" value="<?php echo $role; ?>">
                                                        <input type="text" style="visibility: hidden" id="user" name="user" value="<?php echo $id; ?>">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                    <?php
                                                } else if ($status == 2) {
                                                    echo "This student is already an allumni";
                                                    echo "<br>";
                                                    echo "<button><a href='ithomepage.php'>Home</a></button>";
                                                } else if ($status == 4) {
                                                    echo "The account is not yet activated";
                                                    echo "<br>";
                                                    echo "<button><a href='ithomepage.php'>Home</a></button>";
                                                } else {
                                                    echo "Invalid ID";
                                                    echo "<br>";
                                                    echo "<button><a href='ithomepage.php'>Home</a></button>";
                                                }
                                            }
                                        } else {
                                            echo "Invalid ID";
                                            echo "<br>";
                                            echo "<button><a href='ithomepage.php'>Home</a></button>";
                                        }
                                    } else if ($role == 1 || $role == 2 || $role == 3 || $role == 5) {

                                        $email = $_GET['user'];
                                        $query = "SELECT Email, Role_ID, Status_ID FROM user WHERE Email = '$email' AND Role_ID = '$role'";
                                        $result = mysqli_query($connect, $query);
                                        if ($row = mysqli_num_rows($result) > 0) {
                                            while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                $status = $rows['Status_ID'];
                                                if ($status == 1) {
                                                    ?>

                                                    <form action="newchangepassword.php" method="POST">
                                                        <label for="oldpassword">Old Password: </label>
                                                        <input type="password" id="oldpassword" name="oldpassword">
                                                        <br>
                                                        <label for="newpassword">New Password: </label>
                                                        <input type="password" id="newpassword" name="newpassword">
                                                        <br>
                                                        <label for="renewpassword">Re-Enter Password: </label>
                                                        <input type="password" id="renewpassword" name="renewpassword">
                                                        <br>
                                                        <input type="text" style="visibility: hidden" id="role" name="role" value="<?php echo $role; ?>">
                                                        <input type="text" style="visibility: hidden" id="user" name="user" value="<?php echo $email; ?>">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                    <?php
                                                } else if ($status == 3) {
                                                    echo "This email is no longer valid";
                                                    echo "<br>";
                                                    echo "<button><a href='ithomepage.php'>Home</a></button>";
                                                } else if ($status == 4) {
                                                    echo "The account is not yet activated";
                                                    echo "<br>";
                                                    echo "<button><a href='ithomepage.php'>Home</a></button>";
                                                } else {
                                                    echo "Invalid Email";
                                                    echo "<br>";
                                                    echo "<button><a href='ithomepage.php'>Home</a></button>";
                                                }
                                            }
                                        } else {
                                            echo "Invalid Email";
                                            echo "<br>";
                                            echo "<button><a href='ithomepage.php'>Home</a></button>";
                                        }
                                    } else {
                                        echo "Invalid Input";
                                        echo "<br>";
                                        echo "<button><a href='ithomepage.php'>Home</a></button>";
                                    }
                                } else {
                                    echo "Invalid Input";
                                    echo "<br>";
                                    echo "<button><a href='ithomepage.php'>Home</a></button>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>