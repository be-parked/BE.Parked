<html>
    <head>
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
        
        date_default_timezone_set('Asia/Manila');
        $current_date = date("Y-m-d");
        $query = "SELECT Record_Type, Date_Time FROM activity_log WHERE Activity_ID = '1'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0){
            while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $record = $rows['Record_Type'];
                $date = $rows['Date_Time'];
                $split = explode(" ", $date);
                $date1 = $split[0];
                $time1 = $split[1];
                $time2 = time("H:i:s", strtotime($date));
                $time3 = date('H,i,s',strtotime($date));
            }
        }
        echo $date;
        echo "<br>";
        echo $time1;
        echo "<br>";
        echo $time2;
        echo "<br>";
        echo $time3;
                ?>

    </body>
</html>