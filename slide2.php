<!DOCTYPE html>
<html>
<head>
  
  <head>
  
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

    $sqlsub = "SELECT subid FROM subject";
    $resultsub = mysql_query($sqlsub);

    while($liss = mysql_fetch_assoc($resultsub)){
      $subjct_id = $liss['subid'];
    }
    
    ?>

</head>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
body {font-family: "Lato", sans-serif;}

ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: #C70039;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
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

</style>

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
  <li><a href="index.php">Home</a></li>
  <li><a href="student.php">Student Homepage</a></li>
  <li><a href="notice.php">Notice</a></li>
  <li><a class="active" href="exam.php">Exam</a></li>
  <li style="float:right; border-left: 1px solid #bbb;"><a href="logout.php">LOG OUT</a></li>
  </ul>
  </div>
  <br><br>

<body>

<?php
        
        if (isset($_POST['subject'])){
          //session_start();
        $subjct_id = $_POST['subject'];
        $_SESSION['sub_id'] = $_POST['subject'];
        echo "Your Selected Course: ".$_SESSION['sub_id'];

      
        //$qid = $_POST['qid'];

        $sqlqu = "SELECT * FROM question WHERE subid ='$subjct_id'";
        $rrres =mysql_query($sqlqu);
      //}
      //if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
      ?>


        <form action="result.php" method="post">
        <ul class="tab">

  <li><a href="exam.php" class="tablinks" onclick="openCity(event, 'London')">QUESTIONS</a></li>
  <!-- <li><a href="slide2.php#2" class="tablinks" onclick="openCity(event, 'Paris')">Q2</a></li>
  <li><a href="slide2.php#3" class="tablinks" onclick="openCity(event, 'Tokyo')">Q3</a></li> -->
</ul><br>

    <table border="0" width="100%">
    <tr>
      <th>Question</th>
      <th>Option A</th>
      <th>Option B</th>
      <th>Option C</th>
      <th>Option D</th>
      <!-- <th>CA</th> -->
    </tr>
    <?php while($list = mysql_fetch_assoc($rrres)){?>
    <tr>
      <td><?php echo $list['question']; ?></td>
      <td><div class="radio"><input required = "required" type="radio" name="ans['<?php echo $list['qid'] ?>']" value="a"><?php echo "  ".$list['op1']; ?></div></td>
      <td><div class="radio"><input required = "required" type="radio" name="ans['<?php echo $list['qid'] ?>']" value="b"><?php echo "  ".$list['op2']; ?></div></td>
      <td><div class="radio"><input required = "required" type="radio" name="ans['<?php echo $list['qid'] ?>']" value="c"><?php echo "  ".$list['op3']; ?></div></td>
      <td><div class="radio"><input required = "required" type="radio" name="ans['<?php echo $list['qid'] ?>']" value="d"><?php echo "  ".$list['op4']; ?></div></td> 
    </tr>
    <?php


        }
     //} ?>

     </table>
     <input type="submit" name="submit" value="SUBMIT">
     <?php }
     $_SESSION['sub_id'] = $subjct_id;
     ?>

</form>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

     
</body>
</html>

