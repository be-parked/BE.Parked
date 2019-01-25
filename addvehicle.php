<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
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
            function show() {
                if (document.getElementById('car').checked) {

                    document.getElementById('trplatenumber').style.display = 'block';
                    document.getElementById('trbrand').style.display = 'block';
                    document.getElementById('trmodel').style.display = 'block';
                    document.getElementById('trcolor').style.display = 'block';


                } else if (document.getElementById('motorcycle').checked) {

                    document.getElementById('trplatenumber').style.display = 'block';
                    document.getElementById('trbrand').style.display = 'block';
                    document.getElementById('trmodel').style.display = 'block';
                    document.getElementById('trcolor').style.display = 'block';

                } else if (document.getElementById('bicycle').checked) {

                    document.getElementById('trplatenumber').style.display = 'none';
                    document.getElementById('trbrand').style.display = 'none';
                    document.getElementById('trmodel').style.display = 'block';
                    document.getElementById('trcolor').style.display = 'block';
                }
            }
            ;

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
                    </div>
                    <div class="row">
                        <?php
                        include 'connection.php';
                        $mysql = new mysqllocal();
                        $server = $mysql->server;
                        $username = $mysql->username;
                        $password = $mysql->password;
                        $database = $mysql->database;
                        $connect = mysqli_connect("$server", "$username", "$password", "$database") or
                                die("Please, check your server connection.");

                        if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['middlename']) && isset($_POST['studentID']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['contactnumber1']) && isset($_POST['contactnumber2'])) {
                            ?>

                            <form action="usertype.php" method="post" id="userData" role="form">
                                <div>
                                    <select name="filter" required id="filter" onchange="this.form.submit()">
                                        <option value="1">IT Administrator</option>
                                        <option value="2">Security Administrator</option>
                                        <option value="3">Staff</option>
                                        <option value="4" selected>Student</option>
                                        <option value="5">Guard</option>
                                    </select>
                                </div>
                            </form>
                            <?php
                            $lastname = mysqli_escape_string($connect, $_POST['lastname']);
                            $firstname = mysqli_escape_string($connect, $_POST['firstname']);
                            $middlename = mysqli_escape_string($connect, $_POST['middlename']);
                            $studentID = mysqli_escape_string($connect, $_POST['studentID']);
                            $password = mysqli_escape_string($connect, $_POST['password']);
                            $repassword = mysqli_escape_string($connect, $_POST['repassword']);
                            $number1 = mysqli_escape_string($connect, $_POST['contactnumber1']);
                            $number2 = mysqli_escape_string($connect, $_POST['contactnumber2']);
                            $userrole = "4";


                            if (empty($firstname) || ($firstname == " ")) {
                                echo "First Name Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostudent'>Back</button>";
                            } else if (empty($lastname) || ($lastname == " ")) {
                                echo "Last Name Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostudent'>Back</button>";
                            } else if (empty($middlename) || ($middlename == " ")) {
                                echo "Middle Name Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostudent'>Back</button>";
                            } else if (empty($studentID) || ($studentID == " ")) {
                                echo "Student ID Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostudent'>Back</button>";
                            } else if (empty($password) || ($password == " ")) {
                                echo "Password Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostudent'>Back</button>";
                            } else if (empty($repassword) || ($repassword == " ")) {
                                echo "Re-Enter Password Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostudent'>Back</button>";
                            } else if (empty($number1) || ($number1 == " ")) {
                                echo "Contact Number Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostudent'>Back</button>";
                            } else if (empty($number2) || ($number2 == " ")) {
                                echo "Emergency Number Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostudent'>Back</button>";
                            } else if ((!empty($lastname) && ($lastname != " ")) && (!empty($firstname) && ($firstname != " ")) && (!empty($middlename) && ($middlename != " ")) && (!empty($studentID) && ($studentID != " ")) && (!empty($password) && ($password != " ")) && (!empty($repassword) && ($repassword != " ")) && (!empty($number1) && ($number1 != " ")) && (!empty($number2) && ($number2 != " "))) {

                                $query = "SELECT School_Number_ID From user WHERE School_Number_ID = '$studentID' AND Role_ID ='$userrole'";
                                $result = mysqli_query($connect, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <h3>This account is already in use</h3>

                                    <br>
                                    <button><a href="addstudent.php">OK</a></button>
                                    <?php
                                } else {
                                    ?>
                                    <form action="newstudent.php" method="post" id="userData" role="form">
                                        <div> 
                                            <input type="radio" onclick="javascript:show();" name="vehicle" id="car" value="1">Car<br>
                                            <input type="radio" onclick="javascript:show();" name="vehicle" id="motorcycle" value="2">Motorcycle<br>
                                            <input type="radio" onclick="javascript:show();" name="vehicle" id="bicycle" value="3">Bicycle<br>

                                            <table>
                                                <tr style="text-align:center">

                                                    <td>
                                                        <h3>Car Information</h3>
                                                    </td>
                                                </tr>
                                                <tr style="text-align:right" id="trmake">
                                                    <td>
                                                        <label For="make">Car Make:</label>
                                                        <input type="text" name="make" id="make">
                                                    </td>
                                                </tr>
                                                <tr style="text-align:right" id="trmodel">

                                                    <td>
                                                        <label For="model">Car Model:</label>
                                                        <input type="text" name="model" id="model">
                                                    </td>
                                                </tr>
                                                <tr style="text-align:right" id="trcolor">

                                                    <td>
                                                        <label For="color">Color:</label>
                                                        <input type="text" name="color" id="color">
                                                    </td>
                                                </tr>
                                                <tr style="text-align:right" id="trplatenumber">

                                                    <td>
                                                        <label For="platenumber">Plate Number:</label>
                                                        <input type="text" name="platenumber" id="platenumber">
                                                    </td>
                                                </tr>

                                            </table>
                                            <input type="submit" value="Create">
                                            <input type="text" style="visibility: hidden" name="firstname" value="<?php echo $firstname; ?>">
                                            <input type="text" style="visibility: hidden" name="lastname" value="<?php echo $lastname; ?>">
                                            <input type="text" style="visibility: hidden" name="middlename" value="<?php echo $middlename; ?>">
                                            <input type="text" style="visibility: hidden" name="studentID" value="<?php echo $studentID; ?>">
                                            <input type="text" style="visibility: hidden" name="password" value="<?php echo $password; ?>">
                                            <input type="text" style="visibility: hidden" name="repassword" value="<?php echo $repassword; ?>">
                                            <input type="text" style="visibility: hidden" name="contactnumber1" value="<?php echo $number1; ?>">
                                            <input type="text" style="visibility: hidden" name="contactnumber2" value="<?php echo $cnumber2; ?>">

                                        </div>
                                    </form>
                                    <?php
                                }
                            } else {
                                echo "Invalid Input";
                            }
                        } else if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['middlename']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['contactnumber1']) && isset($_POST['contactnumber2'])) {
                            ?>
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
                            <?php
                            $lastname = mysqli_escape_string($connect, $_POST['lastname']);
                            $firstname = mysqli_escape_string($connect, $_POST['firstname']);
                            $middlename = mysqli_escape_string($connect, $_POST['middlename']);
                            $email = mysqli_escape_string($connect, $_POST['email']);
                            $password = mysqli_escape_string($connect, $_POST['password']);
                            $repassword = mysqli_escape_string($connect, $_POST['repassword']);
                            $number1 = mysqli_escape_string($connect, $_POST['contactnumber1']);
                            $number2 = mysqli_escape_string($connect, $_POST['contactnumber2']);
                            $userrole = "3";



                            if (empty($firstname) || ($firstname == " ")) {
                                echo "First Name Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostaff'>Back</button>";
                            } else if (empty($lastname) || ($lastname == " ")) {
                                echo "Last Name Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostaff'>Back</button>";
                            } else if (empty($middlename) || ($middlename == " ")) {
                                echo "Middle Name Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostaff'>Back</button>";
                            } else if (empty($email) || ($email == " ")) {
                                echo "Email Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostaff'>Back</button>";
                            } else if (empty($password) || ($password == " ")) {
                                echo "Password Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostaff'>Back</button>";
                            } else if (empty($repassword) || ($repassword == " ")) {
                                echo "Re-Enter Password Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostaff'>Back</button>";
                            } else if (empty($number1) || ($number1 == " ")) {
                                echo "Contact Number Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostaff'>Back</button>";
                            } else if (empty($number2) || ($number2 == " ")) {
                                echo "Emergency Number Cannot Be Empty";
                                echo "<br>";
                                echo "<button id='backtostaff'>Back</button>";
                            } else if ((!empty($lastname) && ($lastname != " ")) && (!empty($firstname) && ($firstname != " ")) && (!empty($middlename) && ($middlename != " ")) && (!empty($email) && ($email != " ")) && (!empty($password) && ($password != " ")) && (!empty($repassword) && ($repassword != " ")) && (!empty($number1) && ($number1 != " ")) && (!empty($number2) && ($number2 != " "))) {

                                $query2 = "SELECT Email From user WHERE Email = '$email' AND Role_ID ='$userrole'";
                                $result2 = mysqli_query($connect, $query2);
                                if (mysqli_num_rows($result2) > 0) {
                                    ?>
                                    <h3>This account is already in use</h3>

                                    <br>
                                    <button><a href="addstaff.php">OK</a></button>
                                    <?php
                                } else {
                                    ?>
                                    <form action="newstaff.php" method="post" id="userData" role="form">
                                        <div id="student"> 
                                            <input type="radio" onclick="javascript:show();" name="vehicle" id="car" value="1">Car<br>
                                            <input type="radio" onclick="javascript:show();" name="vehicle" id="motorcycle" value="2">Motorcycle<br>
                                            <input type="radio" onclick="javascript:show();" name="vehicle" id="bicycle" value="3">Bicycle<br>

                                            <table>
                                                <tr style="text-align:center">

                                                    <td>
                                                        <h3>Car Information</h3>
                                                    </td>
                                                </tr>
                                                <tr style="text-align:right" id="trmake">
                                                    <td>
                                                        <label For="make">Car Make:</label>
                                                        <input type="text" name="make" id="make">
                                                    </td>
                                                </tr>
                                                <tr style="text-align:right" id="trmodel">

                                                    <td>
                                                        <label For="model">Car Model:</label>
                                                        <input type="text" name="model" id="model">
                                                    </td>
                                                </tr>
                                                <tr style="text-align:right" id="trcolor">

                                                    <td>
                                                        <label For="color">Color:</label>
                                                        <input type="text" name="color" id="color">
                                                    </td>
                                                </tr>
                                                <tr style="text-align:right" id="trplatenumber">

                                                    <td>
                                                        <label For="platenumber">Plate Number:</label>
                                                        <input type="text" name="platenumber" id="platenumber">
                                                    </td>
                                                </tr>

                                            </table>
                                            <input type="submit" value="Create">
                                            <input type="text" style="visibility: hidden" name="firstname" value="<?php echo $firstname; ?>">
                                            <input type="text" style="visibility: hidden" name="lastname" value="<?php echo $lastname; ?>">
                                            <input type="text" style="visibility: hidden" name="middlename" value="<?php echo $middlename; ?>">
                                            <input type="text" style="visibility: hidden" name="email" value="<?php echo $email; ?>">
                                            <input type="text" style="visibility: hidden" name="password" value="<?php echo $password; ?>">
                                            <input type="text" style="visibility: hidden" name="repassword" value="<?php echo $repassword; ?>">
                                            <input type="text" style="visibility: hidden" name="contactnumber1" value="<?php echo $number1; ?>">
                                            <input type="text" style="visibility: hidden" name="contactnumber2" value="<?php echo $cnumber2; ?>">
                                        </div>
                                    </form>
                                    <?php
                                }
                            } else {
                                echo " Invalid Input";
                            }
                        }
                        ?>
                    </div>
                </div>

                <script>
                    var back = document.getElementById('backtostudent');
                    back.addEventListener('click', function () {
                        document.location.href = 'addstudent.php';
                    });
                </script>
                <script>
                    var back = document.getElementById('backtostaff');
                    back.addEventListener('click', function () {
                        document.location.href = 'addstaff.php';
                    });
                </script>
                </body>
                </html>

