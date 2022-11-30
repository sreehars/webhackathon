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
    $error = "<p>There were errors in your sign up!</p>".$error;
  }
  else
  {
  $query = "SELECT id  FROM `student_info` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";
  $result = mysqli_query($link, $query);
          if(mysqli_num_rows($result) > 0)
          {
            $error = "That username is already taken!!.";
          }
          else
          {
          $query = "INSERT INTO `student_info`
                    (`username`, `password`)
                    VALUES ('".mysqli_real_escape_string($link, $_POST['username'])."',
                            '".mysqli_real_escape_string($link, $_POST['password'])."' ) ";
                  if(!mysqli_query($link, $query))
                  {
                    $error = "<p> Could not sign up!! Please try again later</p>";
                  }
                  else
                  {
                      header("Location:loginpage.php");
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
         <input type="password" class="input-box" placeholder="your password" name="password" ><br>
       <input type="submit" name="submit" value="Log in!" class="signup-btn">
         <hr>
         <p>Have An Google Account ? <a href="loginpage.php">Log in</a></p>
     </form>
    </div>
 </body>
</html>