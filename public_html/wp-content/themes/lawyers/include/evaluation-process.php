<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require( $parse_uri[0] . 'wp-load.php' );


$recipient = ot_get_option('mt_email_contact');

if ( $recipient == '' ):

$recipient = get_bloginfo('admin_email');

endif;


$name = $_POST['nameeval'];
$email = $_POST['emaileval'];
$subject = $_POST['subjecteval'];
$message = $_POST['messageeval'];

if (isset($_POST['emaileval'])) {	
	
  $ip = getenv('REMOTE_ADDR');
  $host = gethostbyaddr($ip);	
  $mess = "Name: ".$name."\n";
  $mess .= "Email: ".$email."\n";
  $mess .= "Subject: ".$subject."\n";
  $mess .= "Message: ".$message."\n\n";
  $mess .= "IP:".$ip." HOST: ".$host."\n";
  
  $headers = "From: <".$email.">\r\n"; 
  
  if(isset($_POST['url']) && $_POST['url'] == ''){

       $sent = mail($recipient, $subject, $mess, $headers); 
} 

    
} else {
	die('Invalid entry!');
}


?>