<?php
  require_once 'classes/DBConnector.php';

  try {

    //  Get::allOrderBy($articles, $date, $limit = 0, $skip = 0);
              
    // $suggestedArticles = Get::byCategoryOrderBy('Breaking','date DESC', 4);
    // $story = Get::byId('articles', $_GET['id']);
    $genre = Get::byId('genres', $_GET['id']);
    $story = Get::byCategory($genre->name)[0];
     $main = Get::byCategory($genre->name, 1);

//       echo "<pre>\$genre =";
//   print_r($genre);
//   echo "</pre>";
//     echo "<pre>\$story =";
//   print_r($story);
//   echo "</pre>";
    // $topStory = Get::byCategoryOrderBy('Breaking','date DESC', 1);
    // $genre = Get::byId('genres', $story->genre_id);
    $categorys = Get::all('genres');
    $sideArticles = Get::byCategoryOrderBy($genre->name,'date DESC', 4);
     $suggestedArticles = Get::all('articles', 3);

    

    $writer = Get::byId('writers', $story->writer_id );

    function mosDateTime($date, $time) {
        return date_format(date_create($date . "T" . $time), 'l, j F - g: i a');
    }
      
  } catch (Exception $e) {
    die("Exception: " . $e->getMessage());
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">

    
    
   
    <div class="home box width-1"><a href= "http://localhost/iadt-cc-Y1/modern_world/reimagined-goggles/main/"><h3>home</h3></a></div>
    <?php foreach($categorys as $category) { ?>
        <!-- <div class="genre width-1 "> -->
        <div class="nav-bar box width-1">
        <h3><a href="genre.php?id=<?= $category->id ?>"><?= $category->name?></a></li></h3>
        </div> 
        <!-- </div> -->
<?php } ?>

        <div class="mainStory width-8 ">
            <div class="heading width-8">
                <h2 class="story-header"><?= $story->heading ?></h1>
                    <hr>
            </div>
            
            <h1><a href="article.php?id=<?=$story->id ?>"><?= $story->title ?></a></h1>
            <p class="date"><strong><?= $writer->first_name?> <?= $writer->last_name?></strong> - <?= mosDateTime($story->date , $story->time) ?></p>
            <h5><?= $story->subtitle ?></h5>
            <div class="nested">
                <div class="width-12">
                    <p> <?= nl2br($story->article) ?>

                    </p>
                </div>


            </div>
        </div>


        <!-- Mini Related Bar-->
        <div class="Related width-4">
            <h2>Related Stories</h2>
            <!-- <hr> -->
            <?php
                    foreach($sideArticles as $counter=> $sideArticle){
                        $writer = Get::byId('writers', $sideArticle->writer_id);
                    
                    ?>
            <div class="side-article width-3">
            <h2 class="side-header"><?= $sideArticle->heading ?></h2>
                <h5><a href="article.php?id=<?=$sideArticle->id ?>"><?= $sideArticle->title ?></a></h5>
                <p class="preview"><?= $sideArticle->subtitle ?></p>
                <p class="writer"><strong><?= $writer->first_name?> <?= $writer->last_name?></strong> - <?= mosDateTime($sideArticle->date,  
                     $sideArticle->time) ?></p>

<?php
                     if($counter !== 1){
                         ?>
                     <hr>
            </div>
            <?php
                    }
                }
                    ?>
        </div>
            </div>

        <!--Suggested Stories-->
            <!-- <div class="mini-article">
                <h2>Related Stories</h2>
                <hr>
            </div> -->

            <?php
                    foreach($suggestedArticles as  $suggestedArticle){
                        $writer = Get::byId('writers', $suggestedArticle->writer_id);
                    
                    ?>
            <div class="mini-article width-4">


                <h5><a href="article.php?id=<?=$suggestedArticle->id ?>"><?= $suggestedArticle->title ?></a></h5>
                <p class="writer"><strong><?= $writer->first_name?> <?= $writer->last_name?></strong> -
                    <?= mosDateTime($suggestedArticle->date ,
                     $suggestedArticle->time) ?></p>

                    
            </div>
            <?php
                    
                 }

                    ?>
    </div>
</body>

</html>