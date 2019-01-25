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
        
        $user = $_POST['filter'];
        if ($user == "1"){
            header("Location: verifyaccountitadmin.php");
        }
        else if ($user == "2"){
            header("Location: verifyaccountsecadmin.php");
        }
        else if ($user == "3"){
            header("Location: verifyaccountstaff.php");
        }
        else if ($user == "4"){
            header("Location: verifyaccountstudent.php");
        }
        else if ($user == "5"){
            header("Location: verifyaccountguard.php");
        }

?>
    </body>
</html>