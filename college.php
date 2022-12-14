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
    <title>College</title>
   
    <!-- CSS -->
    <link href="college\css\college.css" rel="stylesheet" type="text/css" />
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
            <li><a href="building.php">Building</a></li></ul>
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
      <span class="text">Add College</span>
    </div>
  </section> 
    
<div class="card">
<form method="post" action="#">
<input type="Text" placeholder="collegename" name="cname"	>
<input type="Text" placeholder="university" name="university">
<input type="Text" placeholder="Address line 1" name="add"	>
<input type="Text" placeholder="Address line 2" name="add2"	> 
<input type="Text" placeholder="Address line 3" name="add3">
<input type="Text" placeholder="city" name="city"	>
<input type="Text" placeholder="pincode" name="pin"	></td>

<input type="Submit" value="Save" id="btn1" name="save">

</form>
</div>
  
<script src="script.js"></script>
<script src="script.js"></script>
<div class="footer">
 
@All right reserved by TES | ????t?? 

</div>

</body>
</html>

<?php

  if(isset($_REQUEST['save']) ){

    $cname=$_REQUEST['cname'];
    $university=$_REQUEST['university'];
    $add=$_REQUEST['add'];
    $add2=$_REQUEST['add2'];
    $add3=$_REQUEST['add3'];
    $city=$_REQUEST['city'];
    $pin=$_REQUEST['pin'];
    $url = $link . $site . "register/college?college_name=".$cname."&university_name=".$university."&address_line_1=".$add."&address_line_2=".$add2."&address_line_3=".$add3."&city=".$city."&pincode=".$pin;
    $url=str_replace(" ","%20",$url);
    $json = file_get_contents($url);
    $json = json_decode($json);
    $res = $json->result;
  
    if($res == 0){
        echo '<script>alert("Classroom has been registerred sucessfully")</script>';
    }else{
        echo '<script>alert("Classroom was not register")</script>';
    }

  }  
?>
