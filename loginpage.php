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
											header("Location:index.html");
										}
										else
										{
										$error = "Incorrect password<br>";
                                        header("Location:wrong.html");
										}
									}
							}



					}





 ?>
<div id="error"><?php echo $error; ?></div>
<html lang="en">
<head>   
<title>login page</title>
<link rel="stylesheet" href="loginpagecss.css">
</head>
 <body>
    <div class="sign-up-form">
    <img src="avatar.png">
     <h1>Sign Up Now</h1>
     <form method="post">
         <input type="text" class="input-box" placeholder="your email" name="username">
         <input type="password" class="input-box" placeholder="your password" name="password" >
         <p><span> <input type="checkbox"></span>I Agree To Terms And
         Conditions </p><br>
       <input type="submit" name="submit" value="Log in!" class="signup-btn">
         <hr>
         
         <button type="button" class="google-btn">Sign In With Twitter Account</button>
         <p>Have An Google Account ?<a href="signup.php">Sign in</a></p>		
     </form>
    </div>
 </body>
</html>