
<html>
	<head>
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

			//echo "std session pass: ".$password." id: ".$userName." name: ".$std_id_session." full name: ".$fullName;

			if(!isset($_SESSION['password'])){
			header("LOCATION: login.php");
			//echo "you have to login first";
}

			if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$sql_select = "select * from course";
			$sql = "select * from user";
			$result_select = mysql_query($sql_select);
		}


	?>

		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
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
    background-color:#4CAF50;
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

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
#notice {
        /*float: right;*/
    padding: 10px;
    border: 5px solid gray;
    border-radius: 5px;
    background-color: #f2f2f2;
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
ul.tab li a:focus, .active {
    background-color: #C70039;
}
		</style>
	</head>
		<title>IUB</title>
		
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
  <li><a href="home.php">Home</a></li>
  <li><a class="active" href="faculty.php">Faculty Dashboard</a></li>
  <li><a href="facultyNotice.php">Faculty Notice</a></li>
  <li><a href="facultyExam.php">Exam Settings</a></li>
  <!-- <li><a href="registration.php">Pre-Registration</a></li> -->
  <li style="float:right; border-left: 1px solid #bbb;"><a href="logout.php">LOG OUT</a></li>
	</ul>
	</div>

		<body>

		<div class="container">

		<br><br>
			
			<form action="registrationStudent.php" method="post">
			<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){ ?>
		<table border="1" width="100%">
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
			<th>  <input type="checkbox" name="<?php $cname; ?>" value="<?php $cid; ?>"> </th>
			<th><?php echo $list['cid']; ?></th>
			<th><?php echo $list['cname']; ?></th>
			<th><?php echo $list['ccredit']; ?></th>
			<th><?php echo $list['time_day']; ?></th>
			<th><?php echo $list['section']; ?></th>
			
		</tr>
		<?php } ?>
		</table>
		<form action="registration.php">
		<input type="submit" name="regSubmit" value="Register">
		</form>
		<?php } ?>
		</form>

		<div class="container" id="notice">
		<font face="helvetica" size="5">Faculty Dashboard</font>
		<hr class="colorgraph">

		<form action="facultyNotice.php" method="post">
		<input type="submit" value="Notice">
		</form>
		
		
		<form action="facultyExam.php">
		<input type="submit" value="Exam Settings">
		</form>
		
		
		</div>

		</body>
		<br>
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