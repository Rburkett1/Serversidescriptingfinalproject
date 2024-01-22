<!DOCTYPE html>
<head>
    <title>Portfolio-1</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
  <body>
    <div class = "container">

<?php
include("security.php");
/*
$Name = $_POST["Name"];
$Uname = $_POST["Username"];
$Pass = $_POST["Password"];
$Npass = $_POST["NewPassword"];


if(!empty($Uname) and !empty($Npass) and !empty($Name) and !empty($Pass)){
    if(security_validateLogin()){
     //checking if they exist in database
     //problem with security_Login
        security_updatePassword();
        }
        else{
            include("error.php");  
            echo("got here");     
        }
    }

else{
    include("error.php");
}
*/
security_updatePassword();
?>
<button><a href = "index.html">Back</a></button>  
</div>
</body>
</html>