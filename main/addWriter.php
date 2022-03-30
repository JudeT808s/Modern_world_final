<?php
  require_once 'classes/DBConnector.php';

  try {
    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'link' => $_POST['link']
      ];

      Post::create('writers', $data);

      header("Location: index.php");
      
  } catch (Exception $e) {
    die("Exception: " . $e->getMessage());
  }
?>