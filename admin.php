<!DOCTYPE html>
<head>
    <title>Admin</title>  
    <link rel="stylesheet" href="styles/styles.css">  
</head>
<body>
<div class="adminview2">       
        <h1>current orders</h1>
        
    </div>  
    <div class = "adminview2">   
        <?php
        // session_start();
        include("database.php");
        //connecting to database
        database_connect();
        //getting the data from database and displaying it for admin  
        
        
        database_adminView();
        
        
        ?>
        <br><br><button><a href = "index.html">Back</a></button>   
</div>
</body>
</html>