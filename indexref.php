<?php
		$error="";
					if(array_key_exists("submit",$_POST))
					{
							$link = mysqli_connect("localhost","root","","test");
							if(mysqli_connect_error())
							{
								die("Database connection Error");
							}
							if(!$_POST['username'])
							{
								$error.="A Username is required<br>";
							}
							if(!$_POST['password'])
							{
								$error.="A Password is required<br>";
							}
							if($error != "")
							{
								$error = "<p>There were errors in your Log in!</p>".$error;
							}
							else
							{
									$query = "SELECT * FROM `student_info` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."'";
									$result = mysqli_query($link, $query);
									$row = mysqli_fetch_array($result);
									if(array_key_exists("id", $row))
									{
										if($_POST['password'] == $row['password'])
										{
											header("Location:store.html");
										}
										else
										{
										$error = "Incorrect password<br>";
										}
									}
							}



					}





 ?>
<div id="error"><?php echo $error; ?></div>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<html lang="en-us">
	<link rel="stylesheet" href="login.css">
</head>
<body>
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR919U9j6RTCwscvicuW012sC1kJatdYgswDwtqOvwbLLp9r53IWN8kMQr0LVZ85wTfqFM&usqp=CAU" alt="avatarimage">
    <form method="post">
        <div><br>
            <label>Username</label><br>
            <input type="text" placeholder="Enter Username" name="username"> <br>
            <label>Password</label><br>
            <input type="password" placeholder="Enter Password" name="password"><br><br>
            <input type="submit" name="submit" value="Log in!" style="background-color:red;height:25px;width:60px;"><br><br>
              <a href="password.html" >Forgot password?</a>
            <input type="checkbox" checked="checked" style="font-size: 50px;">Remember me
            <p>Need an account?<a href="index.php">Sign up</a></p>
        </div>
    </form>
</body>
</html>