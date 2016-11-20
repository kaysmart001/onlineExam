
<html>
	<head>
	<?php

		include 'connect.php';

		$sqlsub = "SELECT subid FROM subject";
		$resultsub = mysql_query($sqlsub);

	?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
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

		</style>

		<?php
		include 'connect.php';


		?>
	</head>
		<title>IUB</title>
		
		<body>
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
  <li><a href="faculty.php">Faculty Homepage</a></li>
  <li><a href="facultyNotice.php">Faculty Notice</a></li>
  <li><a href="facultyExam.php">Exam Settings</a></li>
  <li style="float:right; border-left: 1px solid #bbb;"><a href="logout.php">LOG OUT</a></li>
	</ul>
	</div>
		<body>
		<br><br><br><br><br>
		<div class = "container" id="notice">
	<div class="wrapper">
		       
		    <h3 class="form-signin-heading">Manage Tests</h3>
			  <hr class="colorgraph">
			  <form action="testmng.php" method="post">
			  	
			  		<select name="sub_id" value="subject_id">
			  			<?php 

			  			 while($list = mysql_fetch_assoc($resultsub)){ ?>

			  			<option value="<?php echo $list['subid'] ?>">
			  			<?php echo $list['subid'];
			  			 ?>
			  			</option>
			  			<?php
			  				$sub = $list['subid'];
			  			} ?>
			  		</select>
			  		<input type="text" class="form-control" name="test_id" placeholder="Test ID" required="" autofocus="" />
			  		<input type="text" class="form-control" name="test_name" placeholder="Test Name" required="" autofocus="" />
			  		<input type="text" class="form-control" name="test_desc" placeholder="Test Description" required="" autofocus="" />

			  		<input type="text" class="form-control" name="total_question" placeholder="Total Question" required="" autofocus="" />
			  		<input type="text" class="form-control" name="test_duration" placeholder="Duration(in minutes)" required="" autofocus="" />
			  		<input type="text" class="form-control" name="test_secret" placeholder="SET Test Secret Code" required="" autofocus="" />
			  		
			  		<input type="submit" name="addSubject" value="ADD TEST">
			  		
			  		<?php

			  		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			  		 $test_id = $_POST['test_id']." ";
			  		 $test_name = $_POST['test_name']." ";
			  		 $test_desc = $_POST['test_desc']." ";
			  		 $total_question = $_POST['total_question']." ";
			  		 $test_duration = $_POST['test_duration']." ";
			  		 $test_secret = $_POST['test_secret']." ";
			  		 $subject_id = $_POST['sub_id'] ;

			  		$sqll = "insert into test values('$test_id','$test_name','$test_desc','$total_question','$test_duration','$test_secret','$subject_id')";
			  		mysql_query($sqll);

			  		echo "  Test Settings Updated SUCCESSFULLY";

			  	}

			  	?>
			  </form>
			    
	</div>
</div>
<br><br><br><br><br>
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