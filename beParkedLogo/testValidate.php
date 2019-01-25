<?php
session_start();
?>
<html>
    <head>

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        
        <?php  
        
        
        $connect = mysqli_connect("localhost", "beparked", "1234", "beparked") or
                die("Please, check your server connection.");
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $query = "SELECT Email, Last_Name, Password FROM user
WHERE Email like '$email' " .
                "AND Password like ('" . $_POST['password'] . "')";
        $result = mysqli_query($connect, $query) or die(mysql_error());
        if (mysqli_num_rows($result) == 1) {                   
                    $_SESSION['email'] = $email;
                    
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
               // extract($row);
                $_SESSION['usertype'] = $row['Last_Name'];
                if($row['Last_Name'] == "2")
                {
                header("Location: admintest2.php");
                }else{
                    header("Location: admintest2.php");
                }
            } 
           // $_SESSION['userID'] = "SELECT userID FROM user WHERE email like '" . $email . "'";
        } else {
            
            
            ?>
    <center><h2>
            <span style="color:red">Invalid Email address and/or Password</span><i class="fa fa-exclamation-triangle"></i></h2><br>
            Not registered?
            <a href="registration.php">Click here</a> to register.<br><br><br>
            Want to Try again<br>
            <a href="login2.php">Click here</a> to try login again.<br>
            </center>
            <?php
        }
        ?>
    </body>
</html>