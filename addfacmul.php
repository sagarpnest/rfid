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
                   $add=$getData[5];
                   $add2=$getData[6];
                   $add3=$getData[7];
                   $city=$getData[8];
                   $pin=$getData[9];
                   $gen=$getData[10];
                   $college=$getData[11];
                   $email=$getData[12];
                   $number=$getData[13];
                   $dep=$getData[14];
                   $join=$getData[15];
                   $quali=$getData[16];
                   $deg=$getData[17];
                   $url = $link . $site . "register/faculty?first_name=".$fname."&middle_name=".$mname."&last_name=".$lname."&college_id=".$id. "&date_of_birth=".$dob."&address_line_1=".$add."&address_line_2=".$add2. "&address_line_3=".$add3. "&city=".$city. "&pincode=".$pin. "&gender=".$gen. "&college=".$college. "&email=".$email. "&contact_no=".$number. "&password=".$pas. "&department_id=".$dep."&join_date=".$join."&qualification=".$quali."&designation=".$deg;
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
        echo '<script>alert("Faculty has been registerred sucessfully")</script>';
    }
    header('location: multiplefaculty.php')?>