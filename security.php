<?php
    include("database.php");

    function security_validate() {
        // Set a default value 
        $status = false;
        
        // Validate
        if(!empty($_POST["Name"]) && !empty($_POST["Email"]) && !empty($_POST["Pnumber"]) && !empty($_POST["Username"]) && !empty($_POST["Password"])) {
            $status = true;
        }
        return $status;
    }

    function security_validateLogin(){
        $status = false;
        if(!empty($_POST["Username"]) and !empty($_POST["Password"])){
        $status = true;
        
        }
        
        return $status;
        
    }

    function security_login() {
        // Set a default value
        $status = false;
        // Validate and sanitize
        $result = security_sanitize();
        // Open connection
        database_connect();
        // Use the connection
        $status = database_verifyUser($result["Username"], $result["Password"]);
             
        // Close connection
        database_close();
        // Check status
        if($status) {
            // Set a cookie
            setcookie("login", "yes");
            
             
        }
        
        return $status;
    }

    function security_addNewUser() {
        // Validate and sanitize.
        $result = security_sanitize();
        // Open connection.
        database_connect();

        // Use connection.
        //
        // We want to make sure we don't add
        //  duplicate values.
        if(!database_verifyUser($result["Username"], $result["Password"])) {
            // Username does not exist.
            // Add a new one.
            database_addUser($result["Username"], $result["Password"]);
        }
        
        // Close connection.
        database_close();
    }

    function security_loggedIn() {
        // Does a cookie exist?
        return isset($_COOKIE["login"]);
    }

    function security_logout() {
        // Set a cookie to the past
        setcookie("login", "yes", time() - 10);
    }

    function security_sanitize() {
        // Create an array of keys username and password
        $result = [
            "Username" => null,
            "Password" => null
        ];

        if(security_validateLogin()) {
            // After validation, sanitize text input.
            $result["Username"] = htmlspecialchars($_POST["Username"]);
            $result["Password"] = htmlspecialchars($_POST["Password"]);
            
        }
        // Return array
        return $result;
    }

    function security_deleteUser(){
        //validates and sanitizes
        $result = security_sanitize();
        
        $status = database_deleteuser($result["Username"], $result["password"]);

        if($status == true){
            echo("User successfully deleted");
        }
        else{
            echo("Enter all data");
        }
    }

    function security_updatePassword(){
         //validates and sanitizes
         $result = security_sanitize();
         
         $status = database_updatePassword($result["Username"],$result["Password"], $_POST["NewPassword"]);
         
         if($status == true){
             echo("Password successfully Updated");
             
         }
         else{
            // echo("Enter all data");
         }
         
    }

    function security_RegEx(){
        $status = false;
        //put the regular expressions here 

    }
?>