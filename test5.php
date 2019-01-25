<?php
    $connect = mysqli_connect("localhost", "beparked", 1234, "beparked");
      //  $qry = "SELECT COUNT(*), Date_Time FROM test_entry_log GROUP BY Date_Time";
        $query = "SELECT Date_Time FROM test_entry_log";
        $query2 = "SELECT Date_Time FROM test_entry_log WHERE Test_Entry_Log_ID = 1";
        $query3 = "SELECT Date_Time FROM test_entry_log ORDER BY Date_Time ASC";
        $query4 = "SELECT *, DATE_FORMAT(added,'%d/%m/%y') as Date FROM test_entry_log ORDER BY Date_Time ASC";
        
       // $result = mysqli_query($connect, $qry);
        $res = mysqli_query($connect, $query);
        //$res = mysqli_query($connect, $query2);
        
      //  $row = mysqli_fetch_row($res);
       // $date = date_create($row[0]);
        
while ($rows = mysqli_fetch_array($res, MYSQLI_ASSOC)){
    //$now1 = strtotime("2018-7-20");
    //$now = date('Y-m-d', $now1);
     date_default_timezone_set('Asia/Manila');
     
     $now1 = strtotime(date('Y-m-d'));
     //$now = date('Y-m-d', $now1);
     $now = date('Y-m-d');
   foreach ($rows as $date){
       $split = explode(" ", $date);
       $d = $split[0];
       $t = $split[1];
       if($d > $now){
           echo $d . '&nbsp;' . "future". '<br>';
       }else if($d < $now){
           echo $d . '&nbsp;' . "past". '<br>';
       }
       

       //echo $d . '<br>';

   }
    //echo $rows[ 'li' ];
}
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
   // echo date_format($date, 'Y-m-d H:i:s');
    // foreach ($date as $d){
    //  $date = date_format($d, 'Y-m-d H:i:s');
    //         echo $d;   
   //    }

    
?>
</body>
</html>

<?php
  //  SQL;
 //   if(!$result2 = $db->query($sql2)){ die('There was an error running the query [' . $db->error . ']');}
 //   echo '<table class="admintable"> <thead>';
 //   echo '<tr><th>Client Names</th><th>Email</th><th>Tel</th><th>Wedding Date</th><th>Date Created</th><th>Start Time</th><th>End Time</th><th>Price</th><th>Location</th><th>Other Info</th><th>Edit</th><th>Delete</th></tr></thead>';
 //   while($row2 = $result2->fetch_assoc()){ 
 //   $weddingdate = $row2['weddingdate'];
 //   $formattedweddingdate = date_format($weddingdate, 'd-m-Y');
 //   echo '<tr><td>'.$row2['name'].'</td><td>'.$row2['email'].'</td><td>'.$row2['tel'].'</td><td style="min-width:70px;">'.$formattedweddingdate.'</td><td style="min-width:70px;">'.$row2['datecreated'].'</td><td>'.$row2['starttime'].'</td><td>'.$row2['endtime'].'</td><td>&pound;'.$row2['price'].'</td><td>'.$row2['location'].'</td><td style="min-width:400px;">'.$row2['otherinfo'].'</td><td><a href="managecalendar.php?&key='.$key.'&editwedding='.$row2['id'].'">Edit</a></td><td><a href="calenderdelete.php?&key='.$key.'&delwedding='.$row2['id'].'">Delete</a></td></tr>';}
 //   echo '</table>';
    ?>