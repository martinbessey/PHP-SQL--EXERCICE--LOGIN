<?php
session_start();
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in model</title>
</head>
<body>

<h1>Please sign in</h1>
   <form method="post" action="login.php" class="flex column ycenter ">                
        <input type="email" name="email" id="email" placeholder="your email..." required>
                
        <input type="password" name="password" id="password" placeholder="your password..." required>
                
        <input type="password" name="verifpassword" id="password" placeholder="confirm your password..." required>
                
        <input type="hidden" name="token">
                
        <input type="submit" value="Sign In"> 
   </form>
                 
</body>
</html>

