<?php
include("security.php");
$name = $_POST["Name"];
$email = $_POST["Email"];
$Pnumber = $_POST["Pnumber"];
$Uname = $_POST["Username"];
$password = $_POST["Password"];


if(security_validate()){
    database_connect(); 
    database_adduser($name,$email,$Pnumber,$Uname,$password);
    echo("<div class = 'container'>");
    echo("Welcome ".$Uname);
    echo("</div>");
    include("menu.html");
}
else{
  include("error.php");
}

?>