<?php

include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email_tmp = mysqli_real_escape_string($conn,$_POST['email']);
    $password_tmp = mysqli_real_escape_string($conn,$_POST['password']); 
      
    $sql = "SELECT * FROM users WHERE email = '$email_tmp' and password = '$password_tmp'";
      
    $result = mysqli_query($conn,$sql);
      
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
    $active = $row['active'];
      
    $count = mysqli_num_rows($result);
      
    if($count == 1) 
    {
        session_register("email_tmp");
        $_SESSION['login_user'] = $email_tmp;         
        header("location: welcome.php");
    }
    else 
    {
        $error = "Your Login Name or Password is invalid";
    }
}
mysqli_close($conn);
?>

<html>
   
   <head>
      <title>Login Page</title>
   </head>

    <style type="text/css">
        
        body
        { 
            font: 16px sans-serif; 
        }

        input
        {
            font-weight:bold;
            font-size:14px;
            background-color: #FFFFFF;
        }    
    </style>
    
   <div  align = "center">
   <body bgcolor = "#FFFFFF">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

            <form action = "" method = "post">
                 
            <label>Email:<br></label><input type = "text" name = "email" class = "box"/><br /><br />
                 
            <label>Password:<br></label><input type = "password" name = "password" class = "box" /><br/><br />
                 
            <input type = "submit" value = " Sign in "/><br />

            </form>                         
    </body>
    </div>
</html>