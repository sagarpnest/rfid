<?php
 include '_connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add Student</title>
   
    <!-- CSS -->
    <link href="css\addstudent.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css\style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <style>
	 body {background-color: #E4E9F7;}
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
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
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
          <li><a href="updatestudent.php">Update Student Profile</a></li>
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
          <li><a href="showstd.php">Student Attendance</a></li>
          <li><a href="#">Faculty Attendance</a></li>
          <li><a href="#">Update Attendance</a></li>
        </ul>
      </li>
      
	   <li>
        <a href="#">
				<i class='bx bx-table'></i>
          <span class="link_name">Timetable</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="timetable.html">Timetable</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="name-job">
        <div class="profile_name">Sir</div>
        <div class="job">Admin</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>
 <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Add Student</span>
    </div>
  </section> 
    
<div class="detail">
<form method="post" action="#">
<table align="center">
<tr>
	<td><div id="id">Student id:</div></td>
	<td><input type="Text" id="idtext" name="sid"	></td>
	<td><div id="rfid">Rfid Card No.:</div></td>
	<td><input type="text" id="rfidtext" name="rfid"></td>
</tr>
<tr>
	<td><div id="name">First Name:</div></td>
	<td><input type="Text" id="nametext" name="fname"></td>  
  <td><div id="colname">College Name:</div></td>
	<td><select id="college_id_internal" name="college">
  <option disabled selected>Select</option>
   <?php
   $url = $link . $site . "get-colleges";
    $json = file_get_contents($url);
    $array = json_decode($json);
    $c=count($array->colleges);
      $i=0;
      while($i<$c)
      {
        echo "<option value='". $array->colleges[$i]->college_id. "'>" . $array->colleges[$i]->college_name ."</option>";
        $i++;
      }
      
?>

	</select></td>
</tr>
<td><div id="sname">Middle Name:</div></td>
	<td><input type="Text" id="snametext" name="mname"></td>
	<td><div id="dep">Department:</div></td>
	<td><select id="deptext" name="dep" >
  <option disabled selected>Select</option>
    <?php
        $url="https://77d2-219-91-196-101.ngrok.io/RFID_Attendance_API_war_exploded/web/get-departments?college_id=1";
        $json = file_get_contents($url);
        $array = json_decode($json); 
        $c=count($array->departments);
        $i=0;
        while($i<$c)
        {
          echo "<option value='". $array->departments[$i]->department_id. "'>" . $array->departments[$i]->department_name."</option>";
          $i++;
        }
    ?>    
  </select>
  </td>
	
</tr>
<td><div id="lname">Last Name:</div></td>
	<td><input type="Text" id="lnametext" name="lname"></td>
	<td><div id="sem">Semester:</div></td>
	<td><select id="semtext" name="sem">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	</select></td>
</tr>
<tr>
	<td><div id="dob">Date of Birth</div></td>
	<td><input type="date" id="dobtext" name="dob"></td>
	<td><div id="divi">Division:</td></div>
	<td><td><select id="divitext" name="div">
	<option value="A1">A1</option>
	<option value="B1">B1</option>
	<option value="C1">C1</option>
	<option value="D1">D1</option>
	<option value="A2">A2</option>
	<option value="B2">B2</option>
	<option value="C2">C2</option>
	<option value="D2">D2</option>
	</select></td></td>
</tr>
<tr>
	<td><div id="add">Address line1:</div></td>
	<td><input type="text" id="addtext"  name="add"></td>
	<td><div id="email">Email id:</div></td>
	<td><input type="email" id="emailtext" name="eid"></td>
</tr>
<tr>	
<td><div id="add2">Address line2:</div></td>
	<td><input type="text" id="add2text"  name="add2"></td>
  <td><div id="gen">Gender:</td></div>
	<td><td><select id="gentext" name="gen">
	<option value="male">Male</option>
	<option value="female">Female</option>
	<option value="other">Other</option>
	</select></td></td>
</tr>
<tr>
	<td><div id="add3">Address line3:</div></td>
	<td><input type="Text" id="add3text" name="add3"></td>
	<td><div id="number">Contact No.:</div></td>
	<td><input type="Text" id="numbertext" name="contact"></td>
</tr>
<tr>
	<td><div id="city">City:</div></td>
	<td><input type="Text" id="citytext" name="city"></td>
  <td><div id="pin">Pin code:</div></td>
	<td><input type="Text" id="pintext" name="pin"></td>  
</tr>
</table>
<input type="Submit" value="Save" id="btn1" name="save">
<input type="button" value="Clear" id="btn2">
</form>
</div>
  
<script src="script.js"></script>
<div class="footer">
 
  <p>@All right reserved by  Team Ant-In-Et | Beta		<img src="footer.png" class="footerimg">
</p>

</div>

</body>
</html>
<?php

  if(isset($_REQUEST['save']) ){

    $college_id=$_REQUEST['sid'];
    $rfid=$_REQUEST['rfid'];
    $fname=$_REQUEST['fname'];
    $mname=$_REQUEST['mname'];
    $lname=$_REQUEST['lname'];
    $dob=$_REQUEST['dob'];
    $pas=$_REQUEST['dob'];
    $add=$_REQUEST['add'];
    $add2=$_REQUEST['add2'];
    $add3=$_REQUEST['add3'];
    $pin=$_REQUEST['pin'];
    $city=$_REQUEST['city'];
    if(isset($_REQUEST['college']) )
    {
        $college=$_REQUEST['college'];
    }
    $dep=$_REQUEST['dep'];
    if(isset($_REQUEST['sem']) )
    {
      $sem=$_REQUEST['sem'];
    } 
    if(isset($_REQUEST['div']) )
    {
      $div=$_REQUEST['div'];
    } 
    $email=$_REQUEST['eid'];
    $contact=$_REQUEST['contact'];
    if(isset($_REQUEST['gen']) )
    {
      $gen=$_REQUEST['gen'];
    }
    $url = $link . $site . "register/student?first_name=" . $fname . "&middle_name=" . $mname. "&last_name=".$lname. "&college_id=".$college_id. "&date_of_birth=".$dob. "&address_line_1=".$add. "&address_line_2=".$add2. "&address_line_3=".$add3. "&city=".$city. "&pincode=".$pin. "&gender=".$gen. "&college=".$college. "&rfid_no=".$rfid. "&email=".$email. "&contact_no=".$contact. "&pass=".$pas. "&semester_id=".$sem. "&batch_id=".$div ;
    $url=str_replace(" ","%20",$url);

    $json = file_get_contents($url);
    $json = json_decode($json);
    $res = $json->result;
  
    if($res == 0){
        echo '<script>alert("Student has been registerred sucessfully")</script>';
    }else{
        echo '<script>alert("Student was not register")</script>';
    }

  }
?>