<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
<?php
include 'connect.php';
session_start();
		
			$password = $_SESSION['password'];
			$userName =  $_SESSION['user_name'];
			$std_id_session = $_SESSION['student_id'];
			$major = $_SESSION['major'];
			$minor = $_SESSION['minor'];
			$semester = "Spring 2016";
			
			

			if(!isset($_SESSION['password'])){
			header("LOCATION: login.php");
			//echo "you have to login first";
			}

	$sql = "SELECT * FROM student where sid='$std_id_session'";
	$result_select = mysql_query($sql);

	//$i = 1;
?>
</head>

<title>REGISTRATION || IUB</title>
		
			<div class="container" id="container">
			  
			<div class="container" id="leftText"><font color="white" size="6" face="Comic Sans MS" >Online Examination System</font></div>
	 	
	 </div>

	 <!-- <div id="main"> -->
	 <div class="container" id="topShed"><p align="right"><?php if(!empty($msg)) echo $msg?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
		<body>
		<br><br>
		<center><font face="helvetica" size="5">STUDENT ENROLLED COURSES</font></center>
		
		<div class="container">
		<br>
			<div id="notice">
			<?php //if($_SERVER['REQUEST_METHOD'] == 'POST'){
				echo "Logged in as ".$userName."<br>"."ID: ".$std_id_session."<br>"."Major: ".$major."<br>"."Minor: ".$minor;
			//}
			?>
			</div>
			<br>

			<div style="overflow-x:auto;">
	<center><font face="calibri" size="4" color="green">Enrolled Courses</font></center>
	<br>
	<form action="courseDesc.php">
		<table border="0" width="100%">

		<tr>
			<th>Sl</th>
			<th>Course Id</th>
			<th>Course Description</th>
		</tr>
		<?php
		 while($list = mysql_fetch_assoc($result_select)){?>

		<tr>
			<td>1.</td>
			<td><?php echo $list['course1']; ?></td>
			<td><input type="submit" method="post" value="SHOW"></td>
		</tr>
		<tr>
			<td>2.</td>
			<td><?php echo $list['course2']; ?></td>
			<td><input type="submit" method="post" value="SHOW"></td>
		</tr>
		<tr>
			<td>3.</td>
			<td><?php echo $list['course3']; ?></td>
			<td><input type="submit" method="post" value="SHOW"></td>
		</tr>
		<?php if ($list['course4']!="") { ?>
		<tr>
			<td>4.</td>
			<td><?php echo $list['course4']; ?></td>
			<td><input type="submit" method="post" value="SHOW"></td>
		</tr>
		<?php } 
		?>
		<?php if ($list['course5']!="") { ?>
		<tr>
			<td>5.</td>
			<td><?php echo $list['course5']; ?></td>
			<td><input type="submit" method="post" value="SHOW"></td>
		</tr>
		<?php } 
		?>
		<?php if ($list['course6']!="") { ?>
		<tr>
			<td>6.</td>
			<td><?php echo $list['course6']; ?></td>
			<td><input type="submit" method="post" value="SHOW"></td>
		</tr>
		<?php } 	
			 } 
		?>
		</table>
		</form>
		</div>

		<hr class="colorgraph">
</div>
</body>
</html>

