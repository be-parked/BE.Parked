<?php
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['role'])){
    $admin = $_SESSION['email'];
    $role = $_SESSION['role'];
    if($role == 1){
        header("Location: ithomepage.php");
    }
    else if($role == 2){
        header("Location: sechomepage.php");
    }
}
?>