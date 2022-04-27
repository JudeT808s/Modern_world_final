<?php

require_once 'classes/DBConnector.php';
require_once 'classes/writer_validate.php';


[$writer, $errors] = writer_validate($_POST);

   
// if(empty($errors)){
  echo "<pre>\$data =";
  print_r($data);
  echo "</pre>";

  echo "<pre>\$writer =";
  print_r($writer);
  echo "</pre>";
   
  echo "<pre>\$errors =";
  print_r($errors);
  echo "</pre>";
    

  try {
    $data = [
        'first_name' => $writer['first_name'],
        'last_name' => $writer['last_name'],
        'link' => $writer['link']
      ];

      Post::create('writers', $data);

        
         header("Location: index.php");

        
    
      
      
  } catch (Exception $e) {
    session_start();
        $_SESSION["data"]=$writer;
        $_SESSION["errors"] = $errors;
        header("Location: addWriterForm.php");
        
    die("Exception: " . $e->getMessage());
  }
// }
  
    

  
