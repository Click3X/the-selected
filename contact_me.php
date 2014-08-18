<?php
// CONTACT ME PHP
// PAGE USED TO COLLECT DATA FROM 'the selected' FORM
// AND THEN SEND EMAIL DESIGNATED BY: $to_email var

if($_POST)
{
    //RECIPIENT EMAIL, REPLACE WITH OWN EMAIL HERE
    $to_email       = "charliekuldip@gmail.com";
    
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        
        $output = json_encode(array( //create JSON data
            'type'=>'error', 
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    } 
    
    //Sanitize input data using PHP filter_var().
    $user_name      = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
    $user_email     = filter_var($_POST["user_email"], FILTER_SANITIZE_EMAIL);
    $message        = filter_var($_POST["msg"], FILTER_SANITIZE_STRING);
    
    //additional php validation
    if(strlen($user_name)<4){ // If length is less than 4 it will output JSON error.
        $output = json_encode(array('type'=>'error', 'text' => 'Name is too short or empty!<button id="result-btn" class="result-btn">Ok</button>'));
        die($output);
    }
    if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
        $output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!<button id="result-btn" class="result-btn">Ok</button>'));
        die($output);
    }
    if(strlen($message)<3){ //check emtpy message
        $output = json_encode(array('type'=>'error', 'text' => 'Too short message! Please enter something.<button id="result-btn" class="result-btn">Ok</button>'));
        die($output);
    }
    
    //email body
    $message_body = $message."\r\n\r\n-".$user_name."\r\nEmail : ".$user_email;
    
    //proceed with PHP email.
    $headers = 'From: '.$user_name.'' . "\r\n" .
    'Reply-To: '.$user_email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    // hard code subject
    $subject = "Mail from the SELECTED!";
    
    $send_mail = mail($to_email, $subject, $message_body, $headers);
    
    if(!$send_mail)
    {
        //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.<button id="result-btn" class="result-btn">Ok</button>'));
        die($output);
    }else{
        // $output = json_encode(array('type'=>'message', 'text' => '<span class="bold">Hi '.$user_name .', Thank you for your inquiry to The Selected.</span><br>We will be in touch soon.<button id="result-btn" class="result-btn">Ok</button>'));
        $output = json_encode(array('type'=>'message', 'text' => '<span class="bold">Thank you for your inquiry to The Selected.</span><br>We will be in touch soon.<button id="result-btn" class="result-btn">Ok</button>'));
        die($output);
    }
}
?>