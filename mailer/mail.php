<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                                 
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'sabagh5844@gmail.com';                           
    $mail->Password   = 'pdszxkikijbfemzh';                        
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                   
    
    //Content format
    $mail->isHTML(true);
    $mail->CharSet = "UTF-8"; 

?>

