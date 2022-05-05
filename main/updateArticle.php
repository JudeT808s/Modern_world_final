<?php
  require_once 'classes/DBConnector.php';
  require_once "classes/article_validate.php";


  [$article_data, $errors] = article_validate($_POST);



  // echo "<pre>\$story =";
  // print_r($story);
  // echo "</pre>";

  // echo "<pre>\$_POST =";
  // print_r($_POST);
  // echo "</pre>";
  
  // echo "<pre>\$data =";
  // print_r($data);
  // echo "</pre>";

  // echo "<pre>\$article =";
  // print_r($article);
  // echo "</pre>";
   
  // echo "<pre>\$article_data =";
  // print_r($article_data);
  // echo "</pre>";
   
  // echo "<pre>\$errors =";
  // print_r($errors);
  // echo "</pre>";
  // echo "<pre>\$errors =";
  // print_r($errors);
  // echo "</pre>";

  try {
     $id = $_GET['id'];
    // $genre = Get::byId('genres', $story->genre_id);
    // $writer = Get::byId('writers', $story->writer_id );
    // $genres = Get::all('genres');
    // $writers = Get::all('writers');

    $data = [
        'id' => $_GET['id'],
        'heading' => $_POST['heading'],
        'title' => $_POST['title'],
        'subtitle' => $_POST['subtitle'],
        'article' => $_POST['article'],
        'date' => $_POST['date'],
        'time' => $_POST['time'],
        'writer_id' => $_POST['writer_id'],
        'genre_id' => $_POST['genre_id']
      ];

      Post::edit('articles', $_GET['id'], $data);
                  
      header("Location: index.php");
      
  } 
  catch (Exception $e) {
    /*
    session_start();
            $_SESSION["data"]=$article_data;
            $_SESSION["errors"] = $errors;
            header("Location: updateArticleForm.php?id=<?= $genre->id ?>");
*/

die("Exception: " . $e->getMessage());
}
?>