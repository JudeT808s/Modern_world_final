<?php
  require_once 'classes/DBConnector.php';
  require_once "classes/article_validate.php";


  [$article_data, $errors] = article_validate($_POST);


  echo "<pre>\$data =";
  print_r($data);
  echo "</pre>";

  echo "<pre>\$story =";
  print_r($story);
  echo "</pre>";
   
  echo "<pre>\$article_data =";
  print_r($article_data);
  echo "</pre>";
   
  echo "<pre>\$errors =";
  print_r($errors);
  echo "</pre>";
  echo "<pre>\$errors =";
  print_r($errors);
  echo "</pre>";

  try {
    $data = [
        'heading' => $_POST['heading'],
        'title' => $_POST['title'],
        'subtitle' => $_POST['subtitle'],
        'article' => $_POST['article'],
        'date' => $_POST['date'],
        'time' => $_POST['time'],
        'writer_id' => $_POST['writer_id'],
        'genre_id' => $_POST['genre_id']
      ];

      Post::create('articles', $data);
                  
       header("Location: index.php");
      
  } 

  
  catch (Exception $e) {
    die("Exception: " . $e->getMessage());
  }

  session_start();
  $_SESSION["data"]=$article_data;
  $_SESSION["errors"] = $errors;
  header("Location: addArticleForm.php");
?>