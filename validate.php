<?php
session_start();
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
        if (isset($_POST['code'])) {

            $connect = mysqli_connect("$server", "$username", "$password", "$database") or
                    die("Please, check your server connection.");

            $code = mysqli_real_escape_string($connect, $_POST['code']);

            $query = "SELECT Status_ID, Code FROM user WHERE Code = '$code'";

            $result = mysqli_query($connect, $query) or die(mysql_error());
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                    $status = $row['Status_ID'];

                    if ($status == 1) {
                        echo "This account is already verified";
                        echo "<br>";
                        echo "<button><a href='ithomepage.php'>OK</a></button>";
                    } else if ($status == 4) {
                        $query1 = "UPDATE user SET Status_ID = '1' WHERE Code = '$code'";
                        $result1 = mysqli_query($connect, $query1) or die(mysql_error());
                        if ($result1) {
                            echo "<br>";
                            echo "Thank you! The account is now verified.";
                            echo "<button><a href='ithomepage.php'>OK</a></button>";
                        } else {
                            echo "Error in verifying user account";
                            echo "<br>";
                            echo "<button><a href='ithomepage.php'>OK</a></button>";
                        }
                    } else {
                        echo "The Account Is Invalid";
                        echo "<br>";
                        echo "<button><a href='ithomepage.php'>OK</a></button>";
                    }
                }
            } else {

                echo "The code is invalid";
                echo "<br>";
                echo "<button><a href='verifyaccount.php'>Try again</a></button>";
                echo "<br>";
                echo "<button><a href='ithomepage.php'>Cancel</a></button>";
            }
        } else {
            echo "The code is already expired!";
            echo "<br>";
            echo "<button><a href='ithomepage.php'>OK</a></button>";
        }
        ?>
    </body>
</html>