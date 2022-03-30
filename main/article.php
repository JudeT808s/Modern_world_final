<?php
  require_once 'classes/DBConnector.php';

  try {

    //  Get::allOrderBy($articles, $date, $limit = 0, $skip = 0);
              
    $sideArticles = Get::byCategory('Commerce', 2);
    $story = Get::byId('articles', $_GET['id']);
    $writer = Get::byId('writers', $story->writer_id );
    // $writer = Get::byId('writers', $topStories->writer_id );
      
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


<div class="mainStory width-8 ">
    <div class="heading width-8">
        <h2 class="story-header"><?= $story->name ?></h1>
            <hr>
    </div>

    <h1><?= $story->title ?></h1>
    <p class="date"><strong><?= $writer->first_name?> <?= $writer->last_name?></strong> - <?= $story->date ?>
        -<?= $story->time ?></p>
    <h5><?= $story->subtitle ?></h5>
    <div class="nested">
        <div class="width-12">
            <p> <?= $story->article ?>
            
            </p>
        </div>


    </div>
</div>


    <!-- Mini Related Bar-->
    <div class="Related width-3">
        <h2>Related Stories</h2>
        <hr>
    <?php
                    foreach($miniArticles as $miniArticle){
                        $writer = Get::byId('writers', $miniArticle->writer_id);
                    
                    ?>
    <div class="mini-article width-3">
        <hr>
        <h5><?= $miniArticle->title ?></h5>
        <p><strong><?= $writer->first_name?> <?= $writer->last_name?></strong> - <?= $miniArticle->date ?> - <?= $miniArticle->time ?></p>
    </div>
    <?php
                    }

                    ?>
     </div>

     <!--Suggested Stories-->
     <?php
                    foreach($miniArticles as $miniArticle){
                        $writer = Get::byId('writers', $miniArticle->writer_id);
                    
                    ?>
    <div class="mini-article width-4">
        
        <h5><?= $miniArticle->title ?></h5>
        <p><strong><?= $writer->first_name?> <?= $writer->last_name?></strong> - <?= $miniArticle->date ?> - <?= $miniArticle->time ?></p>
    </div>
    <?php
                    }

                    ?>
     </div>
</body>
</html>