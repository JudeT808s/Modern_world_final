<?php
// Sanitise
function sanitize_input($article_data){
    $article_data = trim($article_data);
    $article_data= stripcslashes($article_data);
    $article_data = htmlspecialchars($article_data);

    return $article_data;
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

    function article_validate($article_data){

        $errors= [];
        $story=[];
    
        if(isset($article_data['id'])){
            $story['id'] = $article_data['id'];
        }
    
        // Validate Heading
        if(empty($article_data["heading"])){
            $errors["heading"]= "The heading field is required";
        }
    
        else{
            $story["heading"]= sanitize_input($article_data["heading"]);
            if(!validate_name($story["heading"])){
                $errors["heading"] = "Only letters, spaces and numbers are allowed.";
            }
        }
        // Validate Last Name
        if(empty($article_data["title"])){
            $errors["title"]= "The title field is required";
        }
    
        else{
            $story["title"]= sanitize_input($article_data["title"]);
            if(!validate_text($story["title"])){
                $errors["title"] = "Only letters, spaces and numbers are allowed.";
            }
        }
        // Validate subtitle
        if(empty($article_data["subtitle"])){
            $errors["subtitle"]= "The website subtitle is required";
        }
    
        else{
            $story["subtitle"]= sanitize_input($article_data["subtitle"]);
            if(!validate_text($story["subtitle"])){
                $errors["subtitle"] = "Invalid subtitle format";
            }
        }
        // Validate article
        if(empty($article_data["article"])){
            $errors["article"]= "The website article is required";
        }
    
        else{
            $story["article"]= sanitize_input($article_data["article"]);
            if(!validate_text($story["article"])){
                $errors["article"] = "I have no idea how you did this wrong";
            }
        }
        // Validate date
        if(empty($article_data["date"])){
            $errors["date"]= "The date is required";
        }
    
        else{
            $story["date"]= sanitize_input($article_data["date"]);
            if(!isValidDate($story["date"])){
                $errors["date"] = "Invalid date format";
            }
        }
        // Validate time
        if(empty($article_data["time"])){
            $errors["time"]= "The time is required";
        }
    
        else{
            $story["time"]= sanitize_input($article_data["time"]);
            if(!validate_time($story["time"])){
                $errors["time"] = "Invalid time format";
            }
        }
        
        // Validate writer
    if(empty($article_data["writer_id"])){
        $errors["writer_id"]= "The writer field is required";
    }

    else{
        $story["writer_id"]= sanitize_input($article_data["writer"]);
    }
        // Validate genre
    if(empty($article_data["genre_id"])){
        $errors["genre_id"]= "The genre field is required";
    }

    else{
        $story["genre_id"]= sanitize_input($article_data["genre"]);
    }
    
        
    
    
        return[
            $story,
            $errors
        ];
    }
  
  






?>