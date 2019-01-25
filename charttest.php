<html>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>

    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

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
?>
    function drawChart(){
        var data = new google.visualization.DataTable();
            data.addColumn('timeofday','Time');
            data.addColumn('number','Probe 1');
            data.addColumn('number','Probe 2');
            data.addColumn('number','Probe 3');
            data.addColumn('number','Probe 4');
        data.addRows([
            <?php
            $query = "SELECT Record_Type, Date_Time FROM test_entry_log WHERE Record_Type = 'In'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0){
            while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $record = $rows['Record_Type'];
                $date = $rows['Date_Time'];
                $split = explode(" ", $date);
                $date1 = $split[0];
                $time1 = $split[1];
                $time3 = date('H,i,s',strtotime($date));
            }
        }
            
            ?>
            
            
            
            [[<?php echo $time3; ?>],270.26,298.40,111.54,228.06],
            [[03,28,42],273.23,190.43,245.69,283.21],
            [[07,26,04],144.33,217.26,206.53,167.68],
            [[12,13,20],153.15,277.23,167.20,240.88]
        ]);


        var options = {
            title: 'Recorded Temperatures',
            legend: { position: 'bottom' },
            width: 900,
            height: 500,
            hAxis: { format: 'hh:mm:ss' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);   
    }
    </script>
</body>
</html>