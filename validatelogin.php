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
        if (isset($_POST['email']) && isset($_POST['password'])) {


            $connect = mysqli_connect("$server", "$username", "$password", "$database") or
                    die("Error");
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = mysqli_real_escape_string($connect, $_POST['password']);
            if (empty($email) || $email == " ") {
                echo "Email cannot be empty";
                echo "<br>";
                echo "<button id='back'>Back</button>";
            } else if (empty($password) || $password == " ") {
                echo "Password cannot be empty";
                echo "<br>";
                echo "<button id='back'>Back</button>";
            } else if (!empty($email) && $email != " " && !empty($password) && $password != " "){

                $query = "SELECT Role_ID, Status_ID, Email, Password FROM user WHERE Email = '$email' AND Password = '$password'";
                $result = mysqli_query($connect, $query) or die("There is a problem connecting to server");
                if (mysqli_num_rows($result) > 0) {


                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        // extract($row);
                        // $_SESSION['role'] = $row['Role_ID'];
                        if ($row['Role_ID'] == "1") {
                            if ($row['Status_ID'] == "1") {
                                $_SESSION['email'] = $email;
                                $_SESSION['role'] = $row['Role_ID'];
                                header("Location: ithomepage.php");
                            } else if ($row['Status_ID'] == "4") {
                                echo "The account is not verified";
                                echo "<br>";
                                echo "<button><a href='sampleLogin.php'>OK</a></button>";
                            } else {
                                echo "Invalid Email or Password!";
                                echo "<br>";
                                echo "<button><a href='sampleLogin.php'>Back</a></button>";
                            }
                        } else if ($row['Role_ID'] == "2") {

                            if ($row['Status_ID'] == "1") {
                                $_SESSION['email'] = $email;
                                $_SESSION['role'] = $row['Role_ID'];
                                header("Location: sechomepage.php");
                            } else if ($row['Status_ID'] == "4") {
                                echo "The account is not verified";
                                echo "<br>";
                                echo "<button><a href='sampleLogin.php'>OK</a></button>";
                            } else {
                                echo "Invalid Email or Password!";
                                echo "<br>";
                                echo "<button><a href='sampleLogin.php'>Back</a></button>";
                            }
                        } else if ($row['Role_ID'] == "3" || $row['Role_ID'] == "4" || $row['Role_ID'] == "5" || $row['Role_ID'] == "5") {
                            echo "Invalid Email or Password!";
                            echo "<br>";
                            echo "<button><a href='sampleLogin.php'>Back</a></button>";
                        } else {
                            echo "Invalid Email or Password!";
                            echo "<br>";
                            echo "<button><a href='sampleLogin.php'>Back</a></button>";
                        }
                    }
                } else {
                    echo "Invalid Email or Password!";
                    echo "<br>";
                    echo "<button><a href='sampleLogin.php'>Back</a></button>";
                }
            } else {
                echo "Invalid Input!";
                echo "<br>";
                echo "<button><a href='sampleLogin.php'>Back</a></button>";
            }
        }
        ?>
        <script>
            var btn = document.getElementById('back');
            btn.addEventListener('click', function () {
                document.location.href = 'sampleLogin.php';
            });
        </script>
    </body>
</html>