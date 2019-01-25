<?php
    $connect = mysqli_connect("localhost", "beparked", 1234, "beparked");
    $query = "SELECT (Date_Time) a datetime ORDER BY Date_Time DESC, Record_Type, count(*) as number FROM test_entry_log GROUP BY Record_Type";
    $qry = "SELECT COUNT(*), Date_Time FROM test_entry_log GROUP BY Date_Time";
    $result = mysqli_query($connect, $query);
    $rows = array();
    $table = array();
    
    $table['cols'] = array(
        array(
            'label' => 'Date Time',
            'type' => 'datetime'
        ),
        array(
            'label' => 'Record_Type',
            'type' => 'number'
        )
    );
    while ($row = mysqli_fetch_array($result))
    {
        $sub_array = array();
        $datetime = explode(".", $row["datetime"]);
        $sub_array[] = array(
            "v" => 'Date(' . $datetime[0]. '000)'
        );
        $sub_array[] = array(
            "v" => $row["Record_Type"]
        );
        $rows[] = array(
            "c" => $sub_array
        );
    }
    $table['rows'] = $rows;
    $jsonTable = json_encode($table);
?>
<html>
    <head>
        
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
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['Line', 'corechart']});
            google.charts.setOnLoadCallback(drawChart);
            
            function drawChart()
            {
                var data = new google.visualization.DataTable();
                <?php echo $jsonTable; ?>);
                        
                var options :{
                    title: 'Record Type',
                    legend:{position:'bottom'}
                };
                var chart = new google.charts.LineChart(document.getElementById('line_chart'));
                
                chart.draw(data, options);
            }
            
            
     //       function drawChart(){
     //                 var data = new google.visualization.DataTable();
    //  data.addColumn('number', 'In');
    //  data.addColumn('number', 'Out');
    //  while($row = mysqli_fetch_arra($result))
    //        while($row = mysqli_fetch_arra($result))
     //       {
    //  data.addRows([
     //     [50, "[".$row["number"]."],"],
    //      [100, "[".$row["number"]."],"],
     //     [150, "[".$row["number"]."],"],
    //      [200, "[".$row["number"]."],"],
     //     [250, "[".$row["number"]."],"],
    //      [300, "[".$row["number"]."],"],
     //     [350, "[".$row["number"]."],"],
     //     [400, "[".$row["number"]."],"],
     //     
     // ])
  //}
      

     // var options = {
     //   chart: {
     //     title: 'Number of park entry',
          //subtitle: 'in millions of dollars (USD)'
       // },
     //   width: 900,
    //    height: 500
     // };

   //   var chart = new google.charts.Line(document.getElementById('linechart_material'));

   //   chart.draw(data, google.charts.Line.convertOptions(options));
   // }
        </script>
        <title></title>
        <style>
                .page-wrapper
                {
                        width:1000px;
                        margin:0 auto;
                }
        </style>
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
      <div class="col-md-10">
        <h1>Parking Status</h1>
        <h2>Parking Status</h2>
        <!--<div id="linechart_material" style="width: 900px; height: 500px"></div> -->
        <div class="page-wrapper">
            <br>
            <h2 align="center">Display Google Line Chart With JSON PHP & MySQL</h2>
            <div id="line_chart" style="width:100%; height:500px"></div>
      </div>
    </div>
  </div>

</body>
</html>