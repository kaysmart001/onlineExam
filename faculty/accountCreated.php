<html>
	<head>
		<?php

		include 'connect.php';

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$cFirstName = $_POST["cFirstName"];
			$fullName = $_POST["cLastName"];
			$cUserType = $_POST["cUserType"];
			$cEmail = $_POST["cEmail"];
			$cReEmail = $_POST["cReEmail"];
			$cPassword =$_POST["cPassword"];
			$cRePassword = $_POST["cRePassword"];
			$student_id = $_POST["student_id"];
			$major = $_POST["major_signup"];
			$minor = $_POST["minor_signup"];
			
			$sql = "insert into user(user_name,user_type,password,email,student_id,full_name,major,minor) values('$cFirstName','$cUserType','$cPassword','$cEmail','$student_id','$fullName','$major','$minor')";



			mysql_query($sql);
			$msg="Account Created Successfully";
			
			header("Location: login.php");
		}
			
			
		?>
	</head>
		<title>IUB | Welcome</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
.clear{
	clear: both;
}
		</style>
		
	 	<font face="Comic Sans MS">ACCOUNT CREATED SUCCESSFULLY</font>
	 	<br><br><br>
	 	<font face="Comic Sans MS">Go <a href="index.php">Home</a> to log in</font>
	 	<br><br><br>

	 </center>	 
	 <div id="footer">
	 		<div id="footerText">&copy; IUB, Online Examination System</div>
	 	</div>

		</body>
</html>