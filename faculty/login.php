<!DOCTYPE html>
<html>
<head>
<?php 
include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
				//$userName = $_POST["userName"];
				$student_id = $_POST["student_id"]; //echo "id: ".$student_id;
			 	$password = $_POST["password"]; //echo "pass: ".$password;
			 	$userType = $_POST["userType"]; //echo "type: ".$userType;

			 	if(empty($student_id) || empty($password) || empty($userType)){

				$msg = "Please Enter user id, password or user type";
			}
			 	
			else{
				//$password = md5($password);
				$sql = "SELECT * FROM user WHERE password = '$password' AND student_id = '$student_id' AND user_type = '$userType'";
				$result=mysql_query($sql);
				$count=mysql_num_rows($result);

				if($result = mysql_query($sql)){
					if($count == 0){
						$msg = "Invalid user ID or password ";//.$student_id." pass ".$password." type ".$user_type ;
					}
					else{
						$user = mysql_fetch_array($result);
						session_start();
						$_SESSION['student_id'] = $user['student_id'];
						$_SESSION['password'] = $user['password'];
						$_SESSION['user_name'] = $user['user_name'];
						$_SESSION['major'] = $user['major'];
						$_SESSION['minor'] = $user['minor'];
						
					if($userType=="student"){
						header("Location: student.php");
					}
					if($userType=="faculty"){
						header("Location: faculty.php");
					}

					}
				}
			}
		}
?>

	<title>Faculty Login</title>
	<!-- Latest compiled and minified CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style type="text/css">
		.wrapper {    
	margin-top: 80px;
	margin-bottom: 20px;
}
.msgx{
	float: right;
	padding-bottom: 20px;
	padding-top: 20px;
}
.form-signin {
  max-width: 420px;
  padding: 20px 38px 66px;
  margin: 0 auto;
  background-color: #eee;
  border: 3px dotted rgba(0,0,0,0.1);  
  }

.form-signin-heading {
  text-align:center;
  margin-bottom: 30px;
}

.form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
}

input[type="text"] {
  margin-bottom: 0px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

input[type="password"] {
  margin-bottom: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
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
	</style>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<div class="container" id="container">
<div class="container" id="leftText"><font color="white" size="6" face="Comic Sans MS" >Online Examination System</font></div>
	 	
	 </div>

	 <div id="main">
	 <div class="container" id="topShed"><p align="right"><?php if(!empty($msg)) echo $msg?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;</p></div>

	
	<div>
	<ul id="topMenuHover">
  <li><a class="active" href="home.php">Home</a></li>
  <li><a class="active" href="faculty.php">Faculty HomePage</a></li>
  <li><a href="FacultyNotice.php">Notice</a></li>
  <!-- <li><a href="registration.php">Pre-Registration</a></li> -->
  <!-- <li><a href="#examQuery">Exam</a></li> -->
  <!-- <li><a href="#result">Result</a></li> -->
  <!-- <li style="float:right; border-left: 1px solid #bbb;"><a href="logout.php">LOG OUT</a></li> -->
	</ul>
	</div>
<body>
	<div class = "container">
	<div class="wrapper">
		<form action="login.php" method="post" name="loginForm" class="form-signin">       
		    <h3 class="form-signin-heading">Welcome! Please Sign In</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="student_id" placeholder="Faculty ID" required="" autofocus="" />
			  <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
			  <select name="userType">
						  <option value="faculty">Faculty</option>
			  </select>
			  <div id="msgx">
			  <br>
			  <?php if(!empty($msg)) echo $msg ?>
			  </div>
			  <br>
			  <center><input type="submit" style="font-face: 'helvetica'; color: white; background-color:#ff334c;  height:35px; width:190px"; border: 0pt ridge lightgrey" value="Log In"></center>
			 
			   			
		</form>			
	</div>
</div>
</body>
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
