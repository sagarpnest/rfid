<?php
 include '_connect.php';
 if(!(isset($_SESSION['username'])))
 {
     $_SESSION['loggedin']=false;
     header('location:login.php');
  //echo $_SESSION['status'];
 }
?>

<html>
<head>
    
<meta charset="utf-8" />
    <title>Add Student</title>
   
    <!-- CSS -->
    <link href="showattendance\css\student.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css\style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	    td   {text-align: center;}  
    </style>

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
            <li><a href="building.php">Building</a></li>
        
        </ul>
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
      <span class="text">Show attendance</span>
    </div>
  </section> 
<div class="box">
    <form method="post" action="#">
        <input type="text" placeholder="Faculty id" id="id" name="id" required>
        <input type="Submit" value="Search" id="btn" name="search">
    </form>

</div>
<div class="show">
<?php
        if(isset($_REQUEST['search']))
        {
            $id=$_REQUEST['id'];
        echo"Faculty Id: ".$id;
        
?>    
<br/>
<br/>
    <table border="1px">
        
    <?php
            echo
            "<tr>
            <th>Subject code</th>
            <th>Subject Name</th>
            <th>Semester</th>
            <th>Lecture Planned</th>
            <th>Taken lecture</th>
            <th>Percentage</th>
            </tr>";
        $url =$link . $site . "get-faculty-attendance-data?college_id=".$id;
        $json = file_get_contents($url);
        $array = json_decode($json);
        $c=$array->subject_count;
        
        $i=0;
        while($i<$c)
        {
            echo"<tr>
            <td>". $array->subjects[$i]->code ."</td>
            <td>". $array->subjects[$i]->name . "</td>
            <td>". $array->subjects[$i]->semester . "</td>
            <td>". $array->subjects[$i]->total ."</td>
            <td>". $array->subjects[$i]->present ."</td>
            <td>". $array->subjects[$i]->percent ."%</td>
            </tr>";;
            $i++;
         }
       
    ?>
    </table>
    <br/>
    <?php
        echo " Total Lecture Gross Attendance-".$array->total_percent."%";
    }
    ?>
</div>   
    
    </table>
</div>
<script src="script.js"></script>
<div class="footer">
 
@All right reserved by TES | ßétä 

</div>   
</body>
</html>
