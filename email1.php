<?php

$mail = new PHPMailer(true);

// Send mail using Gmail
if($send_using_gmail){
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "jaydudhatnk@gmail.com"; // GMAIL username
    $mail->Password = "dudhatpassword"; // GMAIL password
}
$email= "jaydudhatnk@gmail.com"; 
$email_from= "jaydudhatnk@gmail.com"; 
$name= "jaydudhatnk@gmail.com"; 
$name_from= "jaydudhatnk@gmail.com"; 
// Typical mail data
$mail->AddAddress($email, $name);
$mail->SetFrom($email_from, $name_from);
$mail->Subject = "My Subject";
$mail->Body = "Mail contents";

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    // Something went bad
    echo "Fail :(";
}

?>