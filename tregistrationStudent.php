
<html>
	<head>
				<div class="container" id="container">
			  
			<div class="container" id="leftText"><font color="white" size="6" face="Comic Sans MS" >Online Examination System</font></div>
	 	
	 </div>

	 <!-- <div id="main"> -->
	 <div class="container" id="topShed"><p align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;</p></div>

	
	<div>
	<ul id="topMenuHover">
  <li><a class="active" href="index.php">Home</a></li>
  <li><a class="active" href="student.php">My Dashboard</a></li>
  <li><a href="notice.php">Notice</a></li>
  <!-- <li><a href="registration.php">Pre-Registration</a></li> -->
  <li style="float:right; border-left: 1px solid #bbb;"><a href="logout.php">LOG OUT</a></li>
	</ul>
	</div>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<?php

			include 'connect.php';
			session_start();
		
			$password = $_SESSION['password'];
			$userName =  $_SESSION['user_name'];
			$std_id_session = $_SESSION['student_id'];
			$major = $_SESSION['major'];
			$minor = $_SESSION['minor'];
			$semester = "Spring 2016";


			//echo "std session pass: ".$password." id: ".$std_id_session." name: ".$userName;

			if(!isset($_SESSION['password'])){
			header("LOCATION: login.php");
			//echo "you have to login first";
			}


			if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$sql_select = "select * from course";
			$result_select = mysql_query($sql_select);



			
			if (!empty($_POST['check_box'])) {
			
			$cb = $_POST['check_box'];
			$i=0;
			$course[0] = null;
			$course[1] = null;
			$course[2] = null;
			$course[3] = null;
			$course[4] = null;
			$course[5] = null;
			$count = 0;
			foreach ($cb as $check_box){
			
				$course_taken[$i] = $check_box;
				$course[$i] = $course_taken[$i];

				//echo "course: ".$course[$i];
				$i=$i+1;
				$count = $count+1;
			}

			
			
				if($count<3 || $count>6){
				?>
				<script type="text/javascript"> 
    			alert("Please Take at least 3 courses OR 6 courses maximum "); 
    			//history.back(); 
  				</script> 

			<?php }
			else {
			
				//echo $course[1]." ".$course[2]." ".$course[1]." ";
				
			$ssqqll = "SELECT * from course WHERE cid = '$course[0]' || cid = '$course[1]' || cid = '$course[2]' ||cid = '$course[3]' || cid = '$course[4]' || cid = '$course[5]'";

			$rreess=mysql_query($ssqqll); ?>

			<div id="notice" style="overflow-x:auto;">
			<center><font face="calibri" size="4" color="green">REGISTRATION HAS ALREADY DONE SUCCESSFULLY</font></center>
	<br>
		<table border="0" width="100%">

		<tr>
			<th>Sl</th>
			<th>COURSE ID</th>
			<th>SECTION</th>
			<th>COURSE NAME</th>
			<th>CREDIT HOUR</th>
			<th>CLASS TIME</th>

		</tr>
		<?php
		$sl =1;
			while ($row = mysql_fetch_row($rreess)) {
				$cids['cid'] = "$row[0]\n"; 
           		$cnames['name']="$row[1]\n";
           		$ccredits['credit']="$row[2]\n";
           		$sections['section']="$row[3]\n";
           		$times['time']="$row[4]\n";
           		//echo $cnames['name'];
           		?>
	
		<tr>
			<td><?php echo $sl ?></td>
			<td><?php echo $cids['cid'] ?></td>
			<td><?php echo $cnames['name'] ?></td>
			<td><?php echo $ccredits['credit'] ?></td>
			<td><?php echo $sections['section'] ?></td>
			<td><?php echo $times['time'] ?></td>
		</tr>
			<?php
			$sl = $sl+1; } ?>
		</table>
</div>
			<?php

			$sql_insert = "insert into student(sid,name,major,minor,semester,course1,course2,course3,course4,course5,course6) values('$std_id_session','$userName','$major','$minor','$semester','$course[0]','$course[1]','$course[2]','$course[3]','$course[4]','$course[5]')";
			mysql_query($sql_insert);
			
			
			//echo count($cnames['name']); echo count($ccredits['credit']); echo count($sections['section']); echo count($times['time']);
			
			?>
				<script type="text/javascript"> 
    			alert("Registration has already done Successfully !!! "); 
    			//history.back();
  				</script>
  				

			<?php

			//header("LOCATION: registration.php");
		}

		

		} //end of post check box check if empty or not

		
		} //end of server post method


	?>

		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
		body{
			background-color: white;
		}
		input[type=text] {
    width: 95%;
    padding: 6px 5px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}
input[type=submit] {
    width: 25%;
    background-color: #4CAF50;
    color: white;
    padding: 3px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=text]:focus {
    border: 3px solid #555;
}
.clear{
	clear: both;
}
table {
    border-collapse: collapse;
    /*width: 100%;*/
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color:#eaecee}

th {
    background-color: #4CAF50;
    color: white;
}
.colorgraph {
  height: 7px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}

#notice {
        /*float: right;*/
    padding: 10px;
    border: 5px solid gray;
    border-radius: 5px;
    background-color: #f2f2f2;
}

		</style>
	</head>
		<title>IUB</title>
		

		<body>
		<br>
		<div id="notice">
			<?php //if($_SERVER['REQUEST_METHOD'] == 'POST'){
				echo "Logged in as ".$userName."<br>"."ID: ".$std_id_session."<br>"."Major: ".$major."<br>"."Minor: ".$minor;
			//}
			?>
			</div>
			<br>
		<center><font face="helvetica" size="5">STUDENT REGISTRATION</font></center>

		
		<div class="container">
		
			


			<form action="tregistrationStudent.php" method="post">
			<hr class="colorgraph">
			<input type="submit" name="loadCourse" value="Load/Register">
			<!-- <input style= "visibility:hidden;" type="submit" name="loadCourse" value="Load Courses"> -->
			<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){ ?>
		
		<div style="overflow-x:auto;">
		<table border="0" width="100%">
		<tr>
			<th>Select</th>
			<th>Course Id</th>
			<th>Course Name</th>
			<th>Course Credit</th>
			<th>Day / Time</th>
			<th>Section</th>
		</tr>
		<?php while($list = mysql_fetch_assoc($result_select)){?>
		<tr>

			<td>  <input type="checkbox" name="check_box[]" value="<?php echo $list['cid']; ?>"> </td>
			<td><?php echo $list['cid']; ?></td>
			<td><?php echo $list['cname']; ?></td>
			<td><?php echo $list['ccredit']; ?></td>
			<td><?php echo $list['time_day']; ?></td>
			<td><?php echo $list['section']; ?></td>
		</tr>
		<?php } ?>
		</table>
		</div>
		<hr class="colorgraph">
		<input type="submit" method="post" name="regSubmit" value="Register">	
		</form>
		
		<?php } ?>
		</body>
		</div>

		<div class="container" id="footer">
	 		<div class="container" id="bottomShed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;</div>
	 		<div id="footerText"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&copy; IUB, Online Examination System</div>
	 	</div>
</html>