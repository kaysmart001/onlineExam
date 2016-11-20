<html lang="en">
	<head>

		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
				$sql = "SELECT password,student_id FROM user WHERE password = '$password' AND student_id = '$student_id' AND user_type = '$userType'";

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
		<script>
function validateForm() {
    var x = document.forms["myForm"]["cFirstName"].value;
    if (x == null || x == "") {
    	alert("please, select a username");
        return false;
    }
        var id = document.forms["myForm"]["cLastName"].value;
    if (id == null || id == "") {
        alert("please, fill up your full name");
        return false;
    }
    var ut = document.forms["myForm"]["cUserType"].value;
    if (ut == null || ut == "") {
        alert("select a type");
        return false;
    }
    var dd = document.forms["myForm"]["cEmail"].value;
    if (dd=="") {
        alert("please, enter an email id");
        return false;
    }
        var ddd = document.forms["myForm"]["cReEmail"].value;
    if (ddd=="") {
        alert("please, enter your email id again");
        return false;

    }
    var pp = document.forms["myForm"]["cPassword"].value;
    if (pp=="") {
        alert("please, select a password");
        return false;
    }
        var ppp = document.forms["myForm"]["cRePassword"].value;
    if (ppp=="") {
        alert("please, enter your password again");
        return false;
    }
    var sex = document.forms["myForm"]["sex"].value;
    if (!sex) {
        alert("Select Gender");
        return false;
    }
    
    
   }
</script>


<link rel="stylesheet" type="text/css" href="style.css">
		<style>
.clear{
	clear: both;
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
		
		<body>
			<div class="container" id="container">
			  
			<!-- <a href="index.php"><img src="logo.png" height="80px"></a> -->
			<div id="leftText"><font color="white" size="6" face="Comic Sans MS" >Online Examination System</font></div>

	 	
	 		</div>
	 
	 <div class="container" id="topShed"><?php if(!empty($msg)) echo $msg?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;</div>

	<div id="main">
	<div class="container">
	<ul id="topMenuHover">
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="faculty.php">Faculty HomePage</a></li>
  <li><a href="facultyNotice.php">Notice</a></li>
  <!-- <li><a href="login.php">Exam</a></li> -->
  <!-- <li><a href="#result">Result</a></li> -->
  <li style="float:right; border-left: 1px solid #bbb;"><a href="login.php">LOG IN</a></li>
	</ul>
	</div>
	 
	<div id="bmap">
			<div id="map" style="width:300px;height:300px">
			
				<div class = "container">
	<div class="wrapper">
		<form action="login.php" method="post" name="loginForm" class="form-signin">       
		    <font face="helvetica" size="5">Welcome! Please Log In</font>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="student_id" placeholder="Faculty ID" required="" autofocus="" /><br><br>
			  <input type="password" class="form-control" name="password" placeholder="Password" required=""/><br><br>
			  <select name="userType">
						  <option value="faculty">Faculty</option>
			  </select>
			  <br>
			  <input type="submit" style="font-face: 'helvetica'; color: white; background-color:#ff334c;  height:35px; width:190px"; border: 1pt ridge lightgrey" value="Log In">
			 
			   			
		</form>			
	</div>
			</div>
			</div>
			</div>
			<div id="bcreateAccount">
			<div class="col-sm-4" id="createAccount">
				<font face="verdana" size="5">Sign Up || Create A New Account</font> <br><br>
				<form name="myForm" onsubmit="return validateForm()" action="accountCreated.php" method="post">
				<ul class="input-list style-1 clearfix">
          				<ul class="input-list style-2 clearfix">
            			<input type="text" name="cFirstName" placeholder="User Name">
            			<br><br>
            			<input type="text" name="student_id" placeholder="Faculty ID">
            			<br><br>
            			<input type="text" name="cLastName" style='width:93%' placeholder="Full Name">
            			<br><br>
            			<select name="cUserType">
						  <option value="faculty">Faculty</option>

						  <!-- <option value="student">Student</option> -->
		
						  <!-- <option value="faculty">Faculty</option> -->
						</select><br><br>
						
            			<input type="text" name="cEmail" style='width:93%' placeholder="Enter Email">
            			<br><br>
            			<input type="text" name="cReEmail" style='width:93%' placeholder="Re-enter email">
            			<br><br>
            			<input type="password" name="cPassword" style='width:93%' placeholder="New password">
            			<br><br>
            			<input type="password" name="cRePassword" style='width:93%' placeholder="Re-enter New password">
            			<br><br>
            			<font face="verdana" size="2">Gender</font> <input type="radio" name="sex" value="female"><font face="verdana" size="1" color="#333333">Female
            			<input type="radio" name="sex" value="male">Male</font>
						<br>
						</ul>
<br><br>
  <input type="submit" style="font-face: 'helvetica'; color:white; background-color: #900C3F ; height:35px; width:190px" value="Sign Up">
</form>
  <br>
  <font color="grey">__________________________________</font>
			</div>
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

		</body>
</html>