<?php
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role'])){
    $admin = $_SESSION['email'];
    $role = $_SESSION['role'];
}
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
        $connect = mysqli_connect("$server", "$username", "$password", "$database") or
                die("Please, check your server connection.");
        //role number for itadmin
        //$roleID = "1";
        $userrole = "2";
        //status for active
        // $statusID = "1";
        $status = "4";

        $firstname = mysqli_escape_string($connect, $_POST['firstname']);

        $lastname = mysqli_escape_string($connect, $_POST['lastname']);
        $middlename = mysqli_escape_string($connect, $_POST['middlename']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $contactnumber1 = mysqli_escape_string($connect, $_POST['contactnumber1']);
        $contactnumber2 = mysqli_escape_string($connect, $_POST['contactnumber2']);

        date_default_timezone_set('Asia/Manila');
        $current_date = date("Y-m-d");
        $my_date = ($current_date);



        $query1 = "SELECT Email From user WHERE Email = '$email' AND Role_ID ='$userrole'";
        $result1 = mysqli_query($connect, $query1);
        if (mysqli_num_rows($result1) > 0) {
            ?>
            <h3>This account is already in use</h3>

            <br>
            <button><a href="addsecadmin.php">OK</a></button>
            <?php
        } else {


            $rand = rand(1, 999999);

            echo "<br>";

//$code = (string)$rand;
            $count = strlen($rand);

            if ($count == 6) {
                $code = $rand;
            } else if ($count == 5) {
                $code = "0" . $rand;
            } else if ($count == 4) {
                $code = "00" . $rand;
            } else if ($count == 3) {
                $code = "000" . $rand;
            } else if ($count == 2) {
                $code = "0000" . $rand;
            } else if ($count == 1) {
                $code = "00000" . $rand;
            }

            //$query = "SELECT Code FROM usertest";
            $query2 = "INSERT INTO user (Role_ID, Status_ID, Last_Name, First_Name, Middle_Name, Email, Password, "
                    . "Contact_Number1, Contact_Number2, Code, Register_Date) VALUE ('$userrole', '$status', '$lastname', '$firstname', '$middlename',"
                    . "'$email', '" . $_POST['password'] . "', '$contactnumber1', '$contactnumber2', '$code', '$my_date') ";

            $result = mysqli_query($connect, $query2) or die(mysql_error());
            if ($result) {
                $message = "
                BE.Parked:
                
                This your verification code:
                $code
                
            ";

                mail($email, "Confirmation Email", $message, "From: gomarckevin@gmail.com");

                echo "A code has been sent to your email for verification!";
            }
            ?>

            <form action="validate.php" method="POST">
                <input type="text" name="code" id="code">
                <input type="submit" value="Verify">

            </form>

            <?php
        }
        ?>





    </body>
</html>