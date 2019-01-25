<?php
session_start();
?>
<html>
    <head>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    
    </head>
    <body>
        <?php
        
        //if(isset($_SESSION['email']) == false){
        
        $user = $_POST["filter"];
        if ($user == "1"){
            header("Location: additadmin.php");
        }
        else if ($user == "2"){
            header("Location: addsecadmin.php");
        }
        else if ($user == "3"){
            header("Location: addstaff.php");
        }
        else if ($user == "4"){
            header("Location: addstudent.php");
        }
        else if ($user == "5"){
            header("Location: addguard.php");
        }

?>
    </body>
</html>