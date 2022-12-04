<?php
if(isset($_REQUEST['college_id'])) {
    $coun_id = $_REQUEST['college_id'];
    $url="https://77d2-219-91-196-101.ngrok.io/RFID_Attendance_API_war_exploded/web/get-departments?college_id=".$coun_id;
    $json = file_get_contents($url);
    $array = json_decode($json); 
    $c=count($array->departments);
    $i=0;
    while($i<$c)
    {
      echo "<option value='". $array->departments[$i]->department_id. "'>" . $array->departments[$i]->department_name."</option>";
      $i++;
    }
  } 
?>