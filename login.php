<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$loginid = $_POST['loginid'];
		$password = $_POST['password'];

		if(!empty($loginid) && !empty($password))
		{
			//read from database
			$query = "select * from logindetails where loginid = '$loginid'";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);					
					if($user_data['password'] === $password)
					{
						if($user_data['loginid'] == 'Admin'){
							$_SESSION['loginid'] = $user_data['loginid'];
							header("Location: adminindex.php");
							die;
						}
						else{
						$_SESSION['loginid'] = $user_data['loginid'];
						header("Location: index.php");
						die;
						}
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

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
		width: 100px;
		color: white;
		background-color: rgb(46, 84, 199);
		border: none;
		margin-right:50px;
	}
	#button2{

		padding: 9px;
		padding-left:25px;
		padding-right:25px;
		width: 150px;
		color: white;
		background-color: rgb(46, 84, 199);
		border: none;
		margin-left:50px;
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


	</style>
<div class="block glow">
	<div id="box">
		
		<form method="post">
			<div style="font-size: 38px;color: rgb(219, 219, 219);text-align:center">Login</div>
			<p class="textinfo">Enter Login ID:</p>
			<input id="text" type="text" name="loginid"><br><br>
			<p class="textinfo">Enter Password:</p>
			<input id="text" type="password" name="password"><br><br>
			<input id="button" type="submit" value="Login">
			<a type="button" style="text-decoration:none;" href="signup.php" id="button2">Signup</a><br><br>
		</form>
	</div>
	</div>
</body>
</html>