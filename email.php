<?php

                $data=$_GET['id'];
                ini_set("SMTP","ssl://smtp.gmail.com");
                ini_set("smtp_port","587");
                $to = $data;
                $from = "jaydudhatnk@gmail.com";
                $subject = "Your Confirmation Code is here";
                 
                $message = "
                <html>
                <head>
                </head>
                <body>
                <div style='width:70%;display:block;margin:auto;background-color:#26a69a;box-shadow:1px 1px 50px #26a69a;border-radius:5px'>
                    <h2 style='text-align:center;color:white;font-family: Oswald, sans-serif;'>Blog website Email verification</h2>
                    <p style='font-family: Oswald, sans-serif;text-align:center;color:white'>Hello ,<br><b>Your account activation Link is http://localhost/blog/succ.php?id1=$data</b>  
                </div>
                </body>
                </html>";
                $headers = "From: jaydudhatnk@gmail.com\r\n";
                $headers .= "Reply-To: jaydudhatnk@gmail.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $mail = mail($to, $subject, $message, $headers);
                if ($mail){
                    header("location:login.php");
                    echo "<script type='text/javascript'>alert('Successfully Registered and Email has been send for verification');</script>";
                     
                }
                else{
                    $SESSION['notice'] = "Error Occured : cannot send email to your Email-ID. Again register yourself";
                    
                }
            

 


?>

