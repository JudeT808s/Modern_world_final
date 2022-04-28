<?php
// session_start();
// if(isset($_SESSION["data"]) and isset($_SESSION["errors"])){
//     $article_data = $_SESSION["data"];
//     $errors = $_SESSION["errors"];
// }
// else{
//     $article_data = [];
//     $errors = [];
// }
   

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

  require_once 'classes/DBConnector.php';

  try {
    $story = Get::byId('articles', $_GET['id']);
    $genre = Get::byId('genres', $story->genre_id);
    $writer = Get::byId('writers', $story->writer_id );
    $genres = Get::all('genres');
    $writers = Get::all('writers');
      
  } 
  catch (Exception $e) {
    die("Exception: " . $e->getMessage());
  }
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
    <title>Add Article</title>
</head>
<body>
    <div class="width-6">
        <h1>Add a new Article</h1>
        <form method="POST" action="addArticle.php">
            <div>
            <label>Heading</label><br>
            <input id= "heading"type="text" name= "heading"            
            value= '<?php  echo $story->heading; ?>'/>
    </div>
            <div>
            <label>Title</label><br>
            <input id="title"type="title" name= "title"
            value= '<?php  echo $story->title; ?>'/>

            
    </div>
            <div>
            <label>Subtitle</label><br>
            <input id="subtitle"type="subtitle" name= "subtitle"
                        value= '<?php  echo nl2br($story->article) ?>; ?>'/>

            
    </div>
            <div>
            <label>Article text</label><br>
            <textarea id="article"name="article" rows="10" cols= "40"><?php echo $story->article; ?>
</textarea>
            
    </div>
</div>
            
            <div>
            <label>Date</label><br>
            <input id="date"type="date" name= "date"
                        value= '<?php  echo $story->date; ?>'/>

            <?php if (isset($article_data["date"])) echo $article_data["date"]; ?>
            <div id="date_error" class="error">
                <?php if (isset($errors["date"])) echo $errors["date"]; ?>
    </div>
</div>
            <div>
            <label>Time</label><br>
            <input id="time"type="time" name= "time"
                        value= '<?php  echo $story->time; ?>'/>

            
            
    </div>
     <div>
            <label>Writer</label><br>
            <select id="writer" name="writer_id">
            <option value="<?=  $writer->id ?>" selected><?= $writer->first_name?> <?= $writer->last_name?></option>
            <?php foreach($writers as $writer) { ?>

                <option value="<?= $writer->id ?>"><?= $writer->first_name?> <?= $writer->last_name?>

<?php      

            $writer->id."</option>";
} ?>

            </select>
          
            

</div>



            
            <div>
            <label>Genre</label><br>
            <select id="genre" name="genre_id">
            <option value="<?=  $genre->id ?>" selected><?= $genre->name?></option>
            <?php foreach($genres as $genre) { ?>

                <option value="<?= $genre->id ?>"><?= $genre->name?>
                
                <?php       
                 if(isset($article_data["genre"]) && $article_data["genre"] === $genre['id']) echo "selected";

                $genre->id."</option>";

 
        } ?>
            </select>
          

    </div>
    </div>
    <a href="index.php">Cancel</a>
    <button id= "update_btn"
     type="submit" formaction= "updateArticle.php?id=<?=$story->id ?>">Update</button>
    <button id= "delete_btn">Delete</button>
    </form>   
    </div>
    <div class="clear"></div>
</body>
</html>

<?php

