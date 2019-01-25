<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
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

        $userrole = "6";
        //status for active

        $status = "1";

        $firstname = mysqli_escape_string($connect, $_POST['firstname']);

        $lastname = mysqli_escape_string($connect, $_POST['lastname']);
        $middlename = mysqli_escape_string($connect, $_POST['middlename']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $contactnumber1 = mysqli_escape_string($connect, $_POST['contactnumber1']);
        $contactnumber2 = mysqli_escape_string($connect, $_POST['contactnumber2']);

        $vehicletype = mysqli_real_escape_string($connect, $_POST['vehicle']);
        $make = mysqli_escape_string($connect, $_POST['make']);
        $model = mysqli_escape_string($connect, $_POST['model']);
        $color = mysqli_escape_string($connect, $_POST['color']);
        $platenumber = mysqli_escape_string($connect, $_POST['platenumber']);
        date_default_timezone_set('Asia/Manila');
        $current_date = date("Y-m-d");

        $query = "INSERT INTO user (Role_ID, Status_ID, Last_Name, First_Name, Middle_Name, Email, Password, "
                . "Contact_Number1, Contact_Number2, Register_Date) VALUE ('$userrole', '$status', '$lastname', '$firstname', '$middlename',"
                . "'$email', '" . $_POST['password'] . "', '$contactnumber1', '$contactnumber2', '$current_date') ";
        $result = mysqli_query($connect, $query) or die(mysqli_error());
        if ($result) {

            $query2 = "SELECT User_ID FROM user WHERE Email = '$email' AND Role_ID ='$userrole'";
            $result2 = mysqli_query($connect, $query2);
            if (mysqli_num_rows($result2) > 0) {
                while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                    $userID = $row['User_ID'];

                    $query3 = "INSERT INTO vehicle (Vehicle_Type_ID, User_ID, Vehicle_Color, Vehicle_Model,"
                            . "Vehicle_Make, Vehicle_Plate_Number) VALUE ('$vehicletype', '$userID', '$color', '$model',"
                            . "'$make', '$platenumber')";

                    $result3 = mysqli_query($connect, $query3);
                    if ($result3) {
                        echo "The guest is successfully added";
                        echo "<button><a href='addguest.php'>Add More</a></button>";
                        echo "<button><a href='sechomepage.php'>Home</a></button>";
                    }
                }
            }
        } else {
            echo "There is an error adding the guest";
        }
        ?>

    </body>
</html>