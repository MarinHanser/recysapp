
<?php
ini_set( 'display_errors', 1 );
ini_set("SMTP", "thijskamphuis.nl");
ini_set("sendmail_from", "project@thijskamphuis.nl");

error_reporting( E_ALL );
$from = "project@thijskamphuis.nl";
$to = "thijs.kamphuis25@gmail.com";
$subject = "Checking PHP mail";
$message = "PHP mail works just fine";
$headers = "From:" . $from;
if(mail($to,$subject,$message, $headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}
?>


