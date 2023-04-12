<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$studusn = $_POST['studusn'];
		$ccode = $_POST['ccode'];
        $total = $_POST['total'];
        $present = $_POST['present'];

		$query = "update attendance set Total_classes = '$total', Classes_present = '$present' where USN = '$studusn' and Course_code = '$ccode'";
		$result = mysqli_query($con, $query);
        if($result){
            echo "<p>successfully updated</p>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Attendance</title>
</head>
<style type="text/css">
	body {
  padding: 0;
  margin: 0;
  background-color: black;
}
	#text{
		color:grey;
		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}
	.textinfo{
		font-size:15;
		color: rgb(219, 219, 219);
	}

	#button{

		padding: 10px;
		width: 160px;
		color: white;
		background-color: rgb(46, 84, 199);
		border: none;
	}

	#box{

		background-color: rgba(0,0,0,0);
		margin: auto;
		width: 300px;
		padding: 20px;
		body {
  		padding: 0;
  		margin: 0;
  		background-color: black;
}
	}
.block {
  position: relative;
  margin: 10% auto 0;
  width: 33%;
  height: 600px;

  background: linear-gradient(0deg, black, rgb(46, 45, 45));
}
.glow::before,.glow::after {
  content: " ";
  position: absolute;
  left: -5px;
  top: -5px;
  background: linear-gradient(
    45deg,
    #e6fb04,
    #ff666f,
    #00ff66,
    #00fff0,
    #ff00ff,
    #ff0099,
    #6e0dd6,
    #ff3300,
    #099fff
  );
  background-size: 400%;
  width: calc(100% + 10px);
  height: calc(100% + 10px);
  z-index: -1;
  animation: animate 20s linear infinite;
}

@keyframes animate {
  0% {
    background-position: 0 0;
  }
  50% {
    background-position: 400% 0;
  }
  100% {
    background-position: 0 0;
  }
}
.log:hover{
            color: #fc053b;
        }
        .log{
		color:white;
		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
        background: #333;
	}
	</style>
<body>
<div class="block glow">
	<div id="box">
<form method="post">
	<div style="font-size: 20px;margin: 10px;color: white;text-align:center;">Update Student Attendance</div>
			<p class="textinfo">Enter student USN :</p>
			<input id="text" type="text" name="studusn"><br><br>
			<p class="textinfo">Enter Course Code :</p>
			<input id="text" type="text" name="ccode"><br><br>
			<p class="textinfo">Enter Total Number :</p>
			<input id="text" type="text" name="total"><br><br>
			<p class="textinfo">Enter Number of classes Attended :</p>
			<input id="text" type="text" name="present"><br><br>
			<input id="button" type="submit" value="Update attendance"><br><br>
			<a href="adminindex.php" type="button" class="log">Go back</a><br><br>
		</form>
		</div>
	</div>
</body>
</html>