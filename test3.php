

<?php
    $connect = mysqli_connect("localhost", "beparked", 1234, "beparked");
      //  $qry = "SELECT COUNT(*), Date_Time FROM test_entry_log GROUP BY Date_Time";
        $query = "SELECT Date_Time FROM test_entry_log";
        $query2 = "SELECT Date_Time FROM test_entry_log WHERE Test_Entry_Log_ID = 1";
        
       // $result = mysqli_query($connect, $qry);
        $res = mysqli_query($connect, $query);
        //$res = mysqli_query($connect, $query2);
        $row = mysqli_fetch_array($res);
        $date = date_create($row[0]);
        
      //  while($rows = mysqli_fetch_array($res))
       // {
            
        //    $d = new DateTime($rows);
        
      //  $date = $d->format('m/d/y');
        
       // 
       
      //  $d = new DateTime($result);
        
       // $date = $d->format('m/d/y');
      //  foreach ($rows as $date){
       //     $timestamp = ($date->my_datetime);
       // }
      //  $timestamp = strtotime($rows->my_datetime);
        
       // }
        ?>
<html>
<head>

</head>
<body>
    
    <?php 
  //  foreach($date as $dates){
   // echo $dates . "<br>";
   // echo date("Y,m,d", $d);
    //}
    
   //echo date("Y,m,d H:i:s", $timestamp);
   // echo date("Y,m,d H:i:s", $date);
    echo date_format($date, 'Y-m-d H:i:s');
    
?>
</body>
</html>