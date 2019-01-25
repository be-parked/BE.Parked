<?php

session_start();
if (isset($_SESSION['email'])) {
    session_destroy();
    header("Location: sampleLogin.php");
}else{
    header("Location: sampleLogin.php");
}
?>