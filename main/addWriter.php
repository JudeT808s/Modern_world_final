<?php
require_once 'classes/DBConnector.php';
require_once 'classes/writer_validate.php';


echo "<pre>\$post =";
print_r($_POST);
echo "</pre>";

[$writer, $errors] = writer_validate($_POST);

   
// if(empty($errors)){

    

  try {
    $data = [
        'first_name' => $writer['first_name'],
        'last_name' => $writer['last_name'],
        'link' => $writer['link']
      ];


      echo "<pre>\$data =";
      print_r($data);
      echo "</pre>";
    
      echo "<pre>\$writer =";
      print_r($writer);
      echo "</pre>";
       
      echo "<pre>\$errors =";
      print_r($errors);
      echo "</pre>";

      Post::create('writers', $data);

        

      
      
         header("Location: index.php");

        
    
      
      
  }
   catch (Exception $e) {
    die("Exception: " . $e->getMessage());
  }
    session_start();
        $_SESSION["data"]=$data;
        $_SESSION["errors"] = $errors;
        header("Location: addWriterForm.php");
        
    die("Exception: " . $e->getMessage());
  

?>
  
    

  
