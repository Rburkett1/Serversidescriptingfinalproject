<?php
    // Global connection
    $connection = null;

    function database_connect() {
        // Use the global connection
        
        global $connection;

        // Server
        $server = "localhost";
        // Username
        $username = "root";
        
        $password = "root";
        // Database
        $database = "Online_orders";

        /////////////////////////////////

        if($connection == null) { 
            $connection = mysqli_connect($server, $username, $password, $database);
        }
        
    }
       function database_adduser($name,$email,$Pnumber,$Username,$password){
         global $connection;

         if($connection != null){
             
            // Insert username and hashed password
            $password = password_hash($password, PASSWORD_DEFAULT);          
            //  mysqli_query($connection, "INSERT Name, Email, Pnumber, Uname, password INTO customer_info");
            $results = mysqli_query($connection, "INSERT INTO CustomerInfo
                                    (Name, Email, Pnumber, Username, Password) 
                                    VALUES ('{$name}','{$email}','{$Pnumber}','{$Username}','{$password}');"); 
                                    echo("got heree");  
         }
        }

        function database_addorder($apps,$entree,$dessert){
            global $connection;
   
            if($connection != null){      
                
               $results = mysqli_query($connection, "INSERT INTO CustomerOrders 
                                       ( Apps, Entree, Dessert) 
                                       VALUES ('{$apps}','{$entree}','{$dessert}');");   
                                       echo("got heree");  
            }
            
           }

        function database_adminView() {
            global $connection;
            
            if($connection != null) {
            
                $query = "SELECT id, Name, Email, Pnumber FROM CustomerInfo";
                $results = mysqli_query($connection, $query);

                $query = "SELECT id, Apps, Entree, Dessert FROM CustomerOrders";
                $orderResults = mysqli_query($connection, $query);
   
                echo("<table><tbody>");
                    echo("<tr>");
                       echo("<td  class ='admintable'>");
                       
                       echo("order number  ");
                       
                       echo("</td>");
                    
                       echo("<td  class ='admintable'>");
                       echo(" Name ");
                       echo("</td>");
                    
                       echo("<td  class ='admintable'>");
                       echo(" Email ");
                       echo("</td>");
                    
                       echo("<td  class ='admintable'>");
                       echo(" Phone number ");
                       echo("</td>");
                       
                       echo("<td  class ='admintable'>");
                       echo(" Appetizer");
                       echo("</td>");
                    
                       echo("<td  class ='admintable'>");
                       echo(" Entree ");
                       echo("</td>");
                    
                       echo("<td  class ='admintable'>");
                       echo(" Dessert ");
                       echo("</td>");
                       
                    echo("</tr>");
                    
                    
                    
                while($row = mysqli_fetch_assoc($results)) {
                    $orderRow = mysqli_fetch_assoc($orderResults);
                    
                    echo("<tr>");
                    //order number
                    echo("<td  class ='admintable'>");
                    echo($row['id']);
                    echo("</td>");
                    //name
                    echo("<td class ='admintable'>");
                    echo($row['Name']);
                    echo("</td>");
                    //email
                    echo("<td class ='admintable'>");
                    echo($row["Email"]);
                    echo("</td>");
                    //Phone Number 
                    echo("<td class ='admintable'>");
                    echo($row["Pnumber"]);
                    echo("</td>");

                    if($orderRow){
                        echo("<td  class ='admintable'>");
                        echo($orderRow['Apps']);
                        echo("</td>");
                           
                        echo("<td class ='admintable'>");
                        echo($orderRow['Entree']);
                        echo("</td>");
                           
                        echo("<td class ='admintable'>");
                        echo($orderRow["Dessert"]);
                        echo("</td>");
                    }       
                    echo("</tr>");    
                }
                echo("</tbody></table>");
            }
        }
    
    function database_verifyUser($Username, $password) {
        // Use the global connection
        global $connection;

        // Create a default value
        $status = false;

        if($connection != null) {
            // Use WHERE expressions to look for username
            $results = mysqli_query($connection, "SELECT Password FROM CustomerInfo WHERE Username = '{$Username}';");            
            // mysqli_fetch_assoc() returns either null or row data
            $row = mysqli_fetch_assoc($results);
            // If $row is not null, it found row data.
            if($row != null) {
                // Verify password against saved hash
                if(password_verify($password, $row["Password"])) {
                    $status = true;
                }
            }
        }
        

        return $status;
    }

    function database_close() {
        // user global connection
        global $connection;

        if($connection != null) {
            mysqli_close($connection);
        }
    }

    function database_deleteuser($username, $password){
        global $connection;
        $status = false;
        //calling to verify user exists 
        database_connect();
        if(database_verifyUser($username, $password)){
            //deletes password if it exits in database
            echo("deleting user");
           // $sql = "DELETE FROM users WHERE username ='{$username}';";
           $results = mysqli_query($connection, "DELETE FROM CustomerInfo WHERE Username ='{$username}';");  
           $status = true; 
        }  
        else{
            echo("can not delete user");
        }  
        return $status;
    }

    function database_updatePassword($Username, $password, $newpassword){
        global $connection;
        $status = false;
        database_connect();
        if(database_verifyUser($Username, $password)){
            echo("Password Updated!");
            $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);

            $results = mysqli_query($connection, "UPDATE CustomerInfo SET Password = '{$newpassword}' WHERE Username = '{$Username}';");  
            $status = true; 
        }
        else{
            echo("Current username/password combination not reconized");
        }
    }
?>