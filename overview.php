<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user_data['username']; ?>'s Overview</title>
    <style type="text/css">
	body {
  padding: 0;
  margin: 0;
  background-color: #333;
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
		width: 100px;
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
  height: 400px;

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
</head>
<body>
    <?php
        $query = "select * from student where USN = '$user_data[USN]'";
        $res = mysqli_query($con,$query);
        $user_info = mysqli_fetch_assoc($res);
    ?>
    <div class="block glow">
	<div id="box">
    <p class="textinfo">Student Name : <?php echo $user_info['Name'];?></p>
    <p class="textinfo">USN : <?php echo $user_info['USN'];?></p>
    <p class="textinfo">Semester : <?php echo $user_info['Semester'];?></p>
    <p class="textinfo">Section : <?php echo $user_info['Section'];?></p>
    <p class="textinfo">Branch : <?php echo $user_info['Branch'];?></p>
    <p class="textinfo">Batch : <?php echo $user_info['Batch'];?></p>
    <p class="textinfo">Email : <?php echo $user_info['email'];?></p>
    <p class="textinfo">Phone : <?php echo $user_info['phone'];?></p>
    <p class="textinfo">Address : <?php echo $user_info['address'];?></p>
    <a href="index.php" type="button" class="log">Back to menu</a>
    </div>
	</div>
</body>
</html>