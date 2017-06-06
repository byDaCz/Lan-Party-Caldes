<?php 

$para  = 'bydacz@gmail.com'; 
$asunto = $_REQUEST['asunto']; 
$message = $_REQUEST['nom'] . " - " . $_REQUEST['message'];

 



$header = "	From: mailbox / "; 
$header .= "X-Mailer: PHP/" . phpversion() . " / "; 
$header .= "Mime-Version: 1.0 rn"; 
$header .= "Content-Type: text / plain"; 

//$message = "Missatge enviat per mi"; 
//$para = 'bydacz@gmail.com'; 
//$asunto=$contacte; 

mail($para, $asunto, utf8_decode($message), $header); 

echo 'MISSATGE ENVIAT'; 
echo $para;
echo $asunto;
echo $message;
?> 