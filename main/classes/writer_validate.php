<?php
// Sanitise
function sanitize_input($writer_data){
    $writer_data = trim($writer_data);
    $writer_data= stripcslashes($writer_data);
    $writer_data = htmlspecialchars($writer_data);

    return $writer_data;
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



// Valdation End
    // Error Field
function writer_validate($writer_data){

        $errors= [];
        $writer=[];
    
        if(isset($writer_data['id'])){
            $writer['id'] = $writer_data['id'];
        }
    
        // Validate Name
        if(empty($writer_data["first_name"])){
            $errors["first_name"]= "The name field is required";
        }
    
        else{
            $writer["first_name"]= sanitize_input($writer_data["first_name"]);
            if(!validate_name($writer["first_name"])){
                $errors["first_name"] = "Only letters and spaces are allowed.";
            }
        }
        // Validate Last Name
        if(empty($writer_data["last_name"])){
            $errors["last_name"]= "The name field is required";
        }
    
        else{
            $writer["last_name"]= sanitize_input($writer_data["last_name"]);
            if(!validate_name($writer["last_name"])){
                $errors["last_name"] = "Only letters and spaces are allowed.";
            }
        }
        // Validate Link
        if(empty($writer_data["link"])){
            $errors["link"]= "The website link is required";
        }
    
        else{
            $writer["link"]= sanitize_input($writer_data["link"]);
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
  
  

   