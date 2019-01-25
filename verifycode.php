<?php
session_start();
$admin = $_SESSION['email'];
?>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    </head>
    <body>
        <?php
        include 'connection.php';
        $mysql = new mysqllocal();
        $server = $mysql->server;
        $username = $mysql->username;
        $password = $mysql->password;
        $database = $mysql->database;
        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (isset($_POST['user'])) {
            $userrole = $_POST['role'];
            if ($userrole == 4) {

                $studentID = $_POST['user'];

                $query = "SELECT School_Number_ID, Status_ID, Code FROM usertest WHERE School_Number_ID = '$studentID' AND Role_ID = '$userrole'";
                $result = mysqli_query($connect, $query) or die(mysqli_error());

                if ($row = mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        if ($rows['Status_ID'] == 1) {
                            echo "This account is already verified!";
                            echo "<br>";
                            echo "<button><a href='verifyaccount.php'>Back</a></button>";
                        } else if ($rows['Status_ID'] == 4) {
                            $code = $rows['Code'];
                            echo "<form action='validate.php' method='POST'>";
                            echo "<input type='text' name='code' id='code'>";
                            echo "<input type='submit' value='Verify'>";
                            echo "</form>";
                            echo "<br>";
                            echo "<button><a href='verifycode.php?code=$code'>Resend Verification Code</a></button>";
                        } else {
                            echo "The School ID is invalid!";
                        }
                    }
                } else {
                    echo "The School ID is not registered!";
                    echo "<br>";
                    echo "Do you want to register?";
                    echo "<br>";
                    echo "<button><a href='additadmin.php'>Yes</a></button>";
                    echo "<button><a href='verifyaccount.php'>No</a></button>";
                }
            } else if ($userrole == 1 || $userrole == 2 || $userrole == 3 || $userrole == 5) {



                $email = $_POST['user'];

                $query2 = "SELECT Email, Status_ID, Code FROM usertest WHERE Email = '$email' AND Role_ID = '$userrole'";
                $result2 = mysqli_query($connect, $query2) or die(mysqli_error());

                if ($row2 = mysqli_num_rows($result2) > 0) {
                    while ($rows2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                        if ($rows2['Status_ID'] == 1) {
                            echo "This account is already verified!";
                            echo "<br>";
                            echo "<button><a href='verifyaccount.php'>Back</a></button>";
                        } else if ($rows2['Status_ID'] == 4) {
                            $code = $rows2['Code'];

                            echo"<form action='validate.php' method='POST'>";
                            echo "<input type='text' name='code' id='code'>";
                            echo "<input type='submit' value='Verify'>";
                            echo "</form>";
                            echo "<br>";
                            echo "<button><a href='verifycode.php?code=$code'>Resend Verification Code</a></button>";
                        } else {
                            echo "The email is invalid!";
                        }
                    }
                } else {
                    echo "The email is not registered!";
                    echo "<br>";
                    echo "Do you want to register?";
                    echo "<br>";
                    echo "<button><a href='additadmin.php'>Yes</a></button>";
                    echo "<button><a href='verifyaccount.php'>No</a></button>";
                }
            }
        } else if (!isset($_POST['email']) && !isset($_POST['schoolID']) && isset($_GET['code'])) {
            $code = $_GET['code'];
            echo" <form action='validate.php' method='POST'>";
            echo "<input type='text' name='code' id='code>";
            echo "<input type='submit' value='Verify'>";
            echo "</form>";
            echo "<br>";
            echo "<button><a href='verifycode.php?code=$code'>Resend Verification Code</a></button>";
        } else {
            echo "Invalid Input!";
        }
        ?>
    </body>
</html>