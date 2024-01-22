
<?php
 $admin_user = $_POST["admin_user"];
 $admin_pass = $_POST["admin_pass"];
 
 //if user logs in on admin page with the correct username and password..... 
   if(($admin_user =="admin") && ($admin_pass == "admin")){
     //....They get connected to a page to view current orders
      include("admin.php");
        
            $adminLogin = True;            
    }
    else{
        include("error.php");
        $adminLogin = False;
        
      return $adminLogin;  
    }

?>