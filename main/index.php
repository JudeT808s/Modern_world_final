<?php
  require_once 'classes/DBConnector.php';

  try {

    //  Get::allOrderBy($articles, $date, $limit = 0, $skip = 0);
              
    $sideArticles = Get::all('articles', 2);
    $topStories = Get::byCategoryOrderBy('Breaking','date DESC', 1);
    $miniArticles = Get::all('articles', 3);
    // $article =  Get::byId('articles');
    // $author = Get::byId('writers', $articles->writer_id );

    //Date
    // function connorsDate($string) {
    //     $formatDate = strtotime($string);
    //     return date('l, j F', $formatDate);
    // }

    //     //Time
    // function connorsTime($string) {
    //     $formatTime = strtotime($string);
    //     return date('g: h a', $formatTime);
    // }

    function mosDateTime($date, $time) {
        return date_format(date_create($date . "T" . $time), 'l, j F - g: i a');
    }
}
   catch (Exception $e) {
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

        <div class="topStory width-8 ">
        <a href= "addWriterForm.php">Add Author </a>

            <div class="heading width-8">
                <?php
             foreach($topStories as $topStory){
                $writer = Get::byId('writers', $topStory->writer_id);
                $genre = Get::byId('genres', $topStory->genre_id);

            ?>
                <h2 class="story-header"><?= $genre->name ?></h1>
                    <hr>
            </div>

            <h1><a href="article.php?id=<?=$topStory->id ?>"><?= $topStory->title ?></a></h1>
            <p class="date"><strong><?= $writer->first_name?> <?= $writer->last_name?></strong> - <?= mosDateTime($topStory->date, $topStory->time) ?>
            <h5><?= $topStory->subtitle ?></h5>
            <div class="nested">
                <div class="width-12">
                    <p> <?= nl2br($topStory->article) ?>
                    
                    </p>



                </div>


            </div>
        </div>
        <?php
             }
    ?>
        <!-- 1 Grid Gap -->
        <div class="width-1"></div>
        <div class="medium width-3">
            <!-- <div class="medium-text p-bottom">
                <h2 class="bottom story-header">Breaking</h2>
                <h4>The Russian threat to invade Ukraine</h4>
                <p class="preview">The series reminded Turks of the age of the great conquests that expanded
                    the Ottoman Empire up to the Russian border.</p>

                <p><strong>Zvi Bar'el</strong> - Feb 10, 2022 -2:51PM</p>
            </div> -->
            <!-- Article loop -->
            
            <?php
                    foreach($sideArticles as $sideArticle){

                        $writer = Get::byId('writers', $sideArticle->writer_id);
                        $genre = Get::byId('genres', $sideArticle->genre_id);
                       
                    
                    ?>
            <div class="medium-text p-bottom">
                <h2 class="bottom story-header"><?= $genre->name ?></h2>
                <hr>
                <h4><a href="article.php?id=<?=$sideArticle->id ?>"><?= $sideArticle->title ?></a></h4>
                <p class="preview"><?= $sideArticle->subtitle ?></p>
                    <div class="writer">
                <p><strong><?= $writer->first_name ?> <?= $writer->last_name ?></strong> - <?= mosDateTime($sideArticle->date, $sideArticle->time) ?>
                </p>
                </div>
            </div>
            <?php

                    }

                    ?>
        </div>


        <!-- <h2 class="bottom">Breaking</h2> -->
        <!-- <hr>
            <h4>Covid pills are easier to find as the omicron surge subsides</h4>
            <p class="preview">The supply of Covid-19 antiviral pills is picking up in the country,
                 state health departments and physicians say, as drug companies like Pfizer churn out more of the treatments.</p>

             <p><strong>Berkeley Lovelace Jr.</strong> - Feb 10, 2022 -2:51PM</p> -->
    
    <?php
                    foreach($miniArticles as $miniArticle){
                        $writer = Get::byId('writers', $miniArticle->writer_id)
                    
                    ?>
    <div class="mini-article width-3">
        <h5><a href="article.php?id=<?=$miniArticle->id?>"><?= $miniArticle->title ?></a></h5>
        <p class= "writer"><strong><?= $writer->first_name?> <?= $writer->last_name?></strong> - <?= mosDateTime($miniArticle->date , $miniArticle->time) ?></p>
    </div>
    <?php
                    }

                    ?>
    <!-- <div class="mini width-3">
        <h5 class="centre">Target lifts mask requirements for Shoppers</h5>
        <p class="centre"><strong>Doha Madani</strong> - Feb 10, 2022 -2:51PM</p>
    </div>
    <div class="mini width-3">
        <h5 class="centre">The philosopher King</h5>
        <p class="centre"><strong> Zack Beauchamp</strong> - Feb. 10, 2022 -2:51 PM
        </p> -->
    </div>
    </div>
</body>

</html>