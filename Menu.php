<!DOCTYPE html>
<head>
    <title>Portfolio-1</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
  <body>
    <div class = "container">

<?php

include("database.php");
if(!empty($_POST["Apps"]) && !empty($_POST["Entree"]) && !empty($_POST["Dessert"])){
  $Apps = $_POST["Apps"];
  $Entree = $_POST["Entree"];
  $Dessert = $_POST["Dessert"];
  $time = (rand(10,100));


  echo("<b>Your current order is:</b><br>" .$Apps ." for your appetizer<br>" .$Entree. " for your entree<br>" .$Dessert. " for your dessert<br><br>");
  echo("<br><br>");
  echo("your order will be ready in ". $time . " minites");
  database_connect(); 
  database_addorder($Apps,$Entree,$Dessert);
}

else{
  echo("please try agian");
}


?>
 <br><br><button><a href = "menu.html">Back</a></button>   
 <br><button><a href = "index.html">Home</a></button>   
</div>
</body>
</html>