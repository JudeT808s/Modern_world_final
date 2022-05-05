<?php
session_start();
if(isset($_SESSION["data"]) and isset($_SESSION["errors"])){
    $article_data = $_SESSION["data"];
    $errors = $_SESSION["errors"];
}
else{
    $data = [];
    $errors = [];
}
   



// echo "<pre>\$article =";
// print_r($article);
// echo "</pre>";


 
// echo "<pre>\$data =";
// print_r($data);
// echo "</pre>";
 
// echo "<pre>\$errors =";
// print_r($errors);
// echo "</pre>";

  require_once 'classes/DBConnector.php';

  try {
      
    $genres = Get::all('genres');
    $writers = Get::all('writers');
     $categorys = Get::all('genres');

      
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

    <div class="title form">
        <h1>Add a new Article</h1>
    </div>
    <div class="form width-6">
        <form method="POST" action="addArticle.php">
            <div>
                <!-- Checks whether heading is filled in and echos a value inside the input if an error has occured -->
                <label>Heading</label><br>
                <input id="heading" type="text" name="heading"
                    value="<?php if (isset($article_data["heading"])) echo $article_data["heading"]; ?>">
                <div id="heading_error" class="error">
                    <?php if (isset($errors["heading"])) echo $errors["heading"]; ?>
                </div>
            </div>
            <div>
                <label>Title</label><br>
                <input id="title" type="title" name="title"
                    value="<?php if (isset($article_data["title"])) echo $article_data["title"]; ?>">
                <div id="title_error" class="error">
                    <?php if (isset($errors["title"])) echo $errors["title"]; ?>
                </div>
            </div>
            <div>
                <label>Subtitle</label><br>
                <input id="subtitle" type="subtitle" name="subtitle"
                    value="<?php if (isset($article_data["subtitle"]))  echo $article_data["subtitle"]; ?>">
                <div id="subtitle_error" class="error">
                    <?php if (isset($errors["subtitle"])) echo $errors["subtitle"]; ?>
                </div>
            </div>
            <div>
             <!-- Checks whether heading is filled in and echos  into textarea if an error has occured -->

                <label>Article text</label><br>
                <textarea id="article" name="article" rows="10"
                    cols="97"><?php if (isset($article_data["article"]))echo $article_data["article"];?><?php if (isset($errors["article"])) echo $errors["article"]; ?></textarea>
                <div id="article_error" class="error">

                </div>
            </div>

            <div>
                <label>Date</label><br>
                <input id="date" type="date" name="date"
                    value="<?php if (isset($article_data["date"]))echo $article_data["date"]; ?>">
                <div id="date_error" class="error">
                    <?php if (isset($errors["date"])) echo $errors["date"]; ?>
                </div>
            </div>
            <div>
                <label>Time</label><br>
                <input id="time" type="time" name="time"
                    value="<?php if (isset($article_data["time"])) echo $article_data["time"]; ?>"><?php if (isset($errors["time"])) echo $errors["time"]; ?>
                <div id="time_error" class="error">


                </div>
            </div>
            <div>
             <!-- Checks whether the corresponding writer's id matches up from the database via a loop -->

                <label>Writer</label><br>
                <select id="writer" name="writer_id">

                    <?php foreach($writers as $writer) { ?>

                    <option value="<?= $writer->id ?>"><?= $writer->first_name?> <?= $writer->last_name?>
                        <?php      
     if(isset($article_data["writer"]) && $article_data["writer"] === $writer['id']) echo "selected";

            $writer->id."</option>";
} ?>

                </select>
                <div id="writer_error" class="error"><?php if (isset($errors["writer"])) echo $errors["writer"]; ?>


                </div>

            </div>


            <!-- Resets Writer and Genre error look at webDev -->
            <div>
                <label>Genre</label><br>
                <select id="genre" name="genre_id">

                    <?php foreach($genres as $genre) { ?>

                    <option value="<?= $genre->id ?>"><?= $genre->name?>

                        <?php       
                 if(isset($article_data["genre"]) && $article_data["genre"] === $genre['id']) echo "selected";

                $genre->id."</option>";

 
        } ?>
                </select>
                <div id="genre_error" class="error"><?php if (isset($errors["genre"])) echo $errors["genre"]; ?>

                </div>
            </div>
            <a href="index.php">Cancel</a>
            <button id="submit_btn" type="submit" formaction="addArticle.php">Submit</button>
        </form>
    </div>
    <div class="clear"></div>
    <script src="js/article_validate.js"></script>
</body>

</html>

<?php

if (isset($_SESSION["data"]) and isset($_SESSION["errors"])){
    unset($_SESSION["data"]);
    unset($_SESSION["errors"]);
    
}
?>