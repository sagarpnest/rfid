<?php
 include '_connect.php';
 if(!(isset($_SESSION['username'])))
 {
     $_SESSION['loggedin']=false;
     header('location:login.php');
  //echo $_SESSION['status'];
 }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Rfidscaner</title>
   
    <!-- CSS -->
    <link href="rfidscanner\css\building.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css\style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
</head>

<body>


<div class="sidebar close">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">Charusat</span>
    </div>
    <ul class="nav-links">
        <li>
        <a href="dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="dashboard.php">Dashboard</a></li>
        </ul>
        </li>
        <li>
        <div class="iocn-link">
            <a href="#">
            <i class='bx bxs-user-circle'></i>
            <span class="link_name">Student</span>
            </a>
            <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Student</a></li>
            <li><a href="addstudent.php">Add Single Student</a></li>
            <li><a href="multiplestudent.php">Add Multiple Student</a></li>
            <!--<li><a href="updatestudent.php">Update Student Profile</a></li>-->
        </ul>
        </li>
        <li>
        <div class="iocn-link">
            <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Faculty</span>
            </a>
            <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Faculty</a></li>
            <li><a href="addfaculty.php">Add Single Faculty</a></li>
            <li><a href="multiplefaculty.php">Add Multiple Faculty</a></li>
            <!--<li><a href="#">Update Faculty Profile</a></li>-->
        </ul>
        </li>
        <li>
        <div class="iocn-link">
            <a href="#">
            <i class='bx bx-line-chart' ></i>
            <span class="link_name">Attendance</span>
            </a>
            
            <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
            <li><a class="link_name" href="#">Attendance</a></li>
            <li><a href="stdattendance.php">Student Attendance</a></li>
            <li><a href="facultyattendance.php">Faculty Attendance</a></li>
            <!--<li><a href="#">Update Attendance</a></li>-->
        </ul>
        </li>
        
        <li>
        <div class="iocn-link">
        <a href="#">
                <i class='bx bx-table'></i>
            <span class="link_name">Other</span>
        </a>
        <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
        <li><a href="timetable.php">Timetable</a></li>
            <li><a href="classroom.php">Classroom</a></li>
            <li><a href="rfidscan.php">Rfidscaner</a></li>
            <li><a href="college.php">College</a></li>
            <li><a href="building.php">Building</a></li> </ul>
        </li>

        <li>
        <a href="logout.php">
        <i class='bx bx-log-out' ></i>
            <span class="link_name">Logout</span>
        </a>
        <ul class="sub-menu blank">
            <li><a class="link_name" href="logout.php">Logout</a></li>
        </ul>
        </li>
    
        <li>
    <div class="profile-details">
        <div class="name-job">
        <div class="profile_name">Sir</div>
        <div class="job">Admin</div>
        </div>
       
    </div>
    </li>
    </ul>
</div>
 <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Mac address</span>
    </div>
  </section> 
    
<div class="card">
<form method="post" action="#">
<input type="Text" placeholder="macid" name="macid"	>
<input type="Text" placeholder="userid" name="uid"	>
<select id="roomidtext" name="roomid">
    <option >Select Room</option>
    <?php
        $url= $link . $site . "get-room-details?";
        $json = file_get_contents($url);
        $array = json_decode($json); 
        $c=count($array->classes);
        $i=0;
        while($i<$c)
        {
          echo "<option value='". $array->classes[$i]->room_id. "'>" . $array->classes[$i]->building_name."(".$array->classes[$i]->room_name.")</option>";
          $i++;
        }
    ?>
    </select>

<input type="Submit" value="Save" id="btn1" name="save">

</form>
</div>
  
<script src="script.js"></script>
<div class="footer">
 
@All right reserved by TES | ßétä 

</div>

</body>
</html>

<?php
    
  if(isset($_REQUEST['save']) ){
    $macid=$_REQUEST['macid'];
    $uid=$_REQUEST['uid'];
    if(isset($_REQUEST['roomid']) )
    {
      $roomid=$_REQUEST['roomid'];
    }
    $url = $link . $site . "register/rfid-scanner?mac_address=".$macid."&user_id=".$uid."&room_id=".$roomid;
    $url=str_replace(" ","%20",$url);

    $json = file_get_contents($url);
    $json = json_decode($json);
    $res = $json->result;
  
    if($res == 0){
        echo '<script>alert("Registerred sucessfully")</script>';
    }elseif($res == -1){
        echo '<script>alert("internal error")</script>';
    }elseif($res == -2){
        echo '<script>alert("room_id is wrong")</script>';
    }elseif($res == -3){
        echo '<script>alert("user_id is wrong")</script>';
    }elseif($res == -4){
        echo '<script>alert("mac_address is wrong")</script>';
    }else{
        echo '<script>alert("Server is slow")</script>';
    }
    
  }
?>
