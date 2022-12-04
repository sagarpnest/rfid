<?php
include '_connect.php';

$name = $_FILES["file"]["name"];
//$size = $_FILES['file']['size']
//$type = $_FILES['file']['type']


$tmp_name = $_FILES['file']['tmp_name'];
$c=0;
$i=0;
$filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
               if($c==0)
               {
                    $c++;
               }
               else
               {
                   $id=$getData[0];
                   $fname=$getData[1];
                   $mname=$getData[2];
                   $lname=$getData[3]; 
                   $dob=$getData[4];
                   $pas=$getData[4];
                   $add1=$getData[5];
                   $add2=$getData[6];
                   $add3=$getData[7];
                   $city=$getData[8];
                   $pin=$getData[9];
                   $rfid=$getData[10];
                   $college=$getData[11];
                   $dep=$getData[12];
                   $sem=$getData[13];
                   $div=$getData[14];
                   $email=$getData[15];
                   $gen=$getData[16];
                   $number=$getData[17];
                   $url = $link . $site . "register/student?first_name=" . $fname . "&middle_name=" . $mname. "&last_name=".$lname. "&college_id=".$id. "&date_of_birth=".$dob. "&address_line_1=".$add1. "&address_line_2=".$add2. "&address_line_3=".$add3. "&city=".$city. "&pincode=".$pin. "&gender=".$gen. "&college=".$college. "&rfid_no=".$rfid."&department_id=".$dep. "&email=".$email. "&contact_no=".$number. "&pass=".$pas. "&semester_id=".$sem. "&batch_id=".$div ;
                   $url=str_replace(" ","%20",$url);
                    echo $url;
                    $json = file_get_contents($url);
                    $json = json_decode($json);
                    $res = $json->result;
                    if($res==0)
                    {
                        $i++;
                    }
                    echo "<br>";
                   $c++;
               }
        }
        
    }
    if($c==$i)
    {
        echo '<script>alert("Student has been registerred sucessfully")</script>';
    }
    header('location: multiplestudent.php')
?>