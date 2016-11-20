<html>
	<head>
	<?php
	include "connect.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$cname=$_POST["cname"];
			$cid=$_POST["cid"];
			$ccredit=$_POST["ccredit"];

			$sql = "insert into course(cname,cid,ccredit) values('$cname','$cid','$ccredit')";
			mysql_query($sql);

			echo "Added Successfully";
		}

		$sqlView = "SELECT * FROM course";
		$result = mysql_query($sqlView);





	?>
	</head>
	<h1>ADD COURSE</h1>
	<form action="course.php" method="post">

	<table>
		<tr>
		<td>Course Name:</td>
		<td><input type="text" name="cname" size="20" /></td>
		</tr>
		
		<tr>
		<td>Course ID:</td>
		<td><input type="text" name="cid" size="20" /></td>
		</tr>

		<tr>
		<td>Course Credit:</td>
		<td><input type="text" name="ccredit" size="20" /></td>
		</tr>

		</table>
		<br><br><br>
		<input type="submit" value="submit" />
		<input type="reset" value="clear" />

	</form>
</html>