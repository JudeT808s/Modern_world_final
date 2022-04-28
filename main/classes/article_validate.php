<?php
// Sanitise
function sanitize_input($article){
    $article = trim($article);
    $article= stripcslashes($article);
    $article = htmlspecialchars($article);

    return $article;
}
// Sanitise end




// Validation

function validate_name($name){
    $pattern = "/^[a-zA-Z' ]*$/";
    return preg_match($pattern, $name) === 1;
}
/*
    // function validate_link($link){
    //     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
    //   }
    // }
    */
    function validate_link($link){
    $pattern=  "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
    return preg_match($pattern, $link) === 1;
         }


    function validate_text($text){
        $pattern=  "/^[0-9a-zA-Z-', ]*$/";
        return preg_match($pattern, $text) === 1;
    }

        //  function validate_date($date) {
        //     $pattern = '/^([0-9]{4})\\-([0-9]{2})\\-([0-9]{2})$/';
        //      $matches = array(); 
        //      $valid = (preg_match($pattern, $date, $matches) === 1);
        //       if ($valid) {
        //     $valid = (checkdate($matches[2], $matches[3], $matches[1]));
        //     }
        //     return $valid;
        //     }

        function validate_genre($_genre){
            try{ 
                $genres = Get::all('genres');
            $genreArray = []; 
            if(!$genres){
                throw new Exception("No genres from the database found");
            }
        }catch (Exception $e) {
               die("Exception: " . $e->getMessage());
             }

             foreach($genres as $genre){ 
               array_push($genreArray, $genre->id);
            } 

            return in_array($_genre, $genreArray);
        }


        function validate_writer($_writer){
        //     try{
        //     $writers = Get::all('writers');
        //     $writerArray = []; 
        //     if(!$writers){
        //         throw new Exception("No writers from the database found");
        //     }
        // }catch (Exception $e) {
        //        die("Exception: " . $e->getMessage());
        //      }

        //      foreach($writers as $writer) { 
        //        array_push($writerArray, $writer->first_name,$writer->last_name,);
        //  } 
         
        //  if(in_array($writer, $writerArray)){
        //     $errors["writer"]= "Not a writer";

        //  }
        // }
        try{ 
            $writers = Get::all('genres');
        $writerArray = []; 
        if(!$writers){
            throw new Exception("No writers from the database found");
        }
    }catch (Exception $e) {
           die("Exception: " . $e->getMessage());
         }

         foreach($writers as $writer){ 
           array_push($writerArray, $writer->id);
        } 

        return in_array($_writer, $writerArray);
    }

        

         function validate_time($time) {
            $pattern = '/^[0-1]{1}[0-9]{1}|[2]{1}[0-3]{1}):[0-5]{1}[0-9]{1}$/';
        return preg_match($pattern, $time) === 1;
            }

            function isValidDate(string $date, string $format = 'd-m-Y'): bool
{
    $dateObj = DateTime::createFromFormat($format, $date);
    return $dateObj && $dateObj->format($format) == $date;
}



// Valdation End

    //Article Validate

    function article_validate($article){

        $errors= [];
        $data=[];
    
        if(isset($article['id'])){
            $story['id'] = $article['id'];
        }
    
        // Validate Heading
        if(empty($article["heading"])){
            $errors["heading"]= "The heading field is required";
        }
    
        else{
            $story["heading"]= sanitize_input($article["heading"]);
            if(!validate_name($story["heading"])){
                $errors["heading"] = "Only letters, spaces and numbers are allowed.";
            }
        }
        // Validate Last Name
        if(empty($article["title"])){
            $errors["title"]= "The title field is required";
        }
    
        else{
            $story["title"]= sanitize_input($article["title"]);
            if(!validate_text($story["title"])){
                $errors["title"] = "Only letters, spaces and numbers are allowed.";
            }
        }
        // Validate subtitle
        if(empty($article["subtitle"])){
            $errors["subtitle"]= "The website subtitle is required";
        }
    
        else{
            $story["subtitle"]= sanitize_input($article["subtitle"]);
            if(!validate_text($story["subtitle"])){
                $errors["subtitle"] = "Invalid subtitle format";
            }
        }
        // Validate article
        if(empty($article["article"])){
            $errors["article"]= "The website article is required";
        }
    
        else{
            $story["article"]= sanitize_input($article["article"]);
            if(!validate_text($story["article"])){
                $errors["article"] = "I have no idea how you did this wrong";
            }
        }
        // Validate date
        if(empty($article["date"])){
            $errors["date"]= "The date is required";
        }
    
        else{
            $story["date"]= sanitize_input($article["date"]);
            if(!isValidDate($story["date"])){
                $errors["date"] = "Invalid date format";
            }
        }
        // Validate time
        if(empty($article["time"])){
            $errors["time"]= "The time is required";
        }
    
        else{
            $story["time"]= sanitize_input($article["time"]);
            
        }
        
        // // // Validate writer
         if(!validate_writer($article["writer_id"])){
             $errors["writer"] = "Not a writer";
         }
    else{
        $story["writer_id"]= sanitize_input($article["writer"]);
    }
        // // Validate genre
         if(!validate_genre($article["genre_id"])){
             $errors["genre"] = "Not a genre";
         }

    else{
        $story["genre_id"]= sanitize_input($article["genre"]);
    }
    
        
    
    
        return[
            $article,
            $errors
        ];
    }
  
  






?>