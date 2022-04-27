<?php
session_start();
if(isset($_SESSION["data"]) and isset($_SESSION["errors"])){
    $writer_data = $_SESSION["data"];
    $errors = $_SESSION["errors"];
}
else{
    $writer_data = [];
    $errors = [];
}
   

echo "<pre>\$data =";
print_r($data);
echo "</pre>";

echo "<pre>\$writer =";
print_r($writer);
echo "</pre>";
 
echo "<pre>\$errors =";
print_r($errors);
echo "</pre>";

require_once 'classes/DBConnector.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Writer</title>
</head>
<body>
    <div class="width-6">
        <h1>Add a new Writer</h1>
        <form method="POST" action="addWriter.php">
            <div>
            <label>First Name</label><br>
            <input id= "first_name"type="text" name= "first_name"/>
            <?php if (isset($writer_data["first_name"])) echo $writer_data["first_name"]; ?>
            <div id="first_name_error" class="error">
                <?php if (isset($errors["first_name"])) echo $errors["first_name"]; ?>
    </div>
</div>
            <div>
            <label>Last Name</label><br>
            <input id= "last_name"type="text" name= "last_name"/>
            <?php if (isset($writer_data["last_name"])) echo $writer_data["last_name"]; ?>
            <div id="last_name_error" class="error">
                <?php if (isset($errors["last_name"])) echo $errors["last_name"]; ?>
    </div>
</div>
            <div>
            <label>Link</label><br>
            <input id= "link"type="text" name= "link"/>
            <?php if (isset($writer_data["link"])) echo $writer_data["link"]; ?>
            <div id="link_error" class="error">
                <?php if (isset($errors["link"])) echo $errors["link"]; ?>
    </div>
    </div>
    <a href="index.php">Cancel</a>
    <button id= "submit_btn"
     type="submit" formaction= "addWriter.php">Submit</button>
    </form>
    </div>
    <div class="clear"></div>
    <!-- <script src="js/writer_validate.js"></script> -->
</body>
</html>


<?php

if (isset($_SESSION["data"]) and isset($_SESSION["errors"])){
    unset($_SESSION["data"]);
    unset($_SESSION["errors"]);
    
}
?>