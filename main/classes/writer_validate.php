<?php
// Sanitise
function sanitize_input($writer){
    $writer = trim($writer);
    $writer= stripcslashes($writer);
    $writer = htmlspecialchars($writer);

    return $writer;
 }
// Sanitise end




// // Validation
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

         function validate_date($date) {
            $pattern = '/^([0-9]{4})\\-([0-9]{2})\\-([0-9]{2})$/';
             $matches = array(); 
             $valid = (preg_match($pattern, $date, $matches) === 1);
              if ($valid) {
            $valid = (checkdate($matches[2], $matches[3], $matches[1]));
            }
            return $valid;
            }

         function validate_time($time) {
            $pattern = '/^[0-1]{1}[0-9]{1}|[2]{1}[0-3]{1}):[0-5]{1}[0-9]{1}$/';
        return preg_match($pattern, $time) === 1;
            }



// // Valdation End
    // Error Field
function writer_validate($writer){
        $errors= [];
        $data=[];
    
        // if(isset($writer['id'])){
        //     $writer['id'] = $writer['id'];
        // }
    
        // Validate Name
        if(empty($writer["first_name"])){
            $errors["first_name"]= "The name field is required";
        }
    
        else{
            $writer["first_name"]= sanitize_input($writer["first_name"]);
            if(!validate_name($writer["first_name"])){
                $errors["first_name"] = "Only letters and spaces are allowed.";
            }
        }
        // Validate Last Name
        if(empty($writer["last_name"])){
            $errors["last_name"]= "The name field is required";
        }
    
        else{
            $writer["last_name"]= sanitize_input($writer["last_name"]);
            if(!validate_name($writer["last_name"])){
                $errors["last_name"] = "Only letters and spaces are allowed.";
            }
        }
        // Validate Link
        if(empty($writer["link"])){
            $errors["link"]= "The website link is required";
        }
    
        else{
            $writer["link"]= sanitize_input($writer["link"]);
            if(!validate_link($writer["link"])){
                $errors["link"] = "Invalid website format";
            }
        }
        
    
    
        return[
            $writer,
            $errors
        ];
    }


    ?>
  
  

   