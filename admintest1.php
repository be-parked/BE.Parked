<?php
$connect = mysqli_connect("localhost", "beparked", 1234, "beparked");
$query = "SELECT Date_Time FROM test_entry_log";
$result = mysqli_query($connect, $query);

while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    foreach ($rows as $date) {
        $split = explode(" ", $date);
        $d = $split[0];
        $t = $split[1];
        // echo $d . '<br>';
    }
}

$query2 = "SELECT Record_Type, COUNT(*) FROM test_entry_log WHERE Building_ID = 1 GROUP BY Date(Date_Time)";
$result2 = mysqli_query($connect, $query2);

$connect3 = mysqli_connect("localhost", "beparked", 1234, "beparked");
$query3 = "SELECT Record_Type, COUNT(*) FROM test_entry_log GROUP BY Record_Type";
$result3 = mysqli_query($connect3, $query3);
?>
<html>
    <head>
        <title></title>
        <script type="text/javascript" src="http://gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['In', 'Number'],
<?php
while ($rows = mysqli_fetch_array($result2)) {
    echo "['" . $rows['Record_Type'] . "', " . $rows['COUNT(*)'] . "]";
}
?>
                ]);
            }
            var options = {
                title: 'Number of Cars'
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        </script>


        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <link href="adminCSS.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>


        <nav class="navbar navbar-expand-sm">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="navbar-brand py-0" href="3">
                            <img src="beParkedLogo/be.Parked Logo.png" width="max" height="120" alt="">
                        </a>
                    </li>
                    <li>
                        <h1 class="row">BE.Parked Parking System</h1>
                        <h3 class="row">Welcome, Security Administrator</h3>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-2 well">
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <h2>
                                Admin Menu
                            </h2>
                            <ul>
                                <li><a href="#">Admin Home</a></li>
                                <li><a href="#">View Car Logs</a></li>
                                <li><a href="#">Manage Announcements</a></li>
                                <li><a href="#">User Car Info Validation</a></li>
                                <li><a href="#">Parking Tickets/Stickers</a></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="piechart" style="width:900px; height:500px;"></div>
            </div>
        </div>
        <?php
        ?>
    </body>
</html>
