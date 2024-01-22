
<?php  

include("security.php");
$Uname = $_POST["Username"];
$Pass = $_POST["Password"];

if(security_loggedin()){
    
    include("menu.html");
    
}
else{
    if(!empty($Uname) and !empty($Pass)){
        if(security_validateLogin()){
        //checking if they exist in database
        //problem with security_Login
            if(security_login()){
                //if both are true then logs in
                echo("<div class = 'container'>");
                echo("Welcome ".$Uname);
                echo("</div>");
                include("menu.html");
            
            }
            else{
                include("error.php");       
            }
        }
    }
    else{
        include("error.php");
    }
}
?>

   