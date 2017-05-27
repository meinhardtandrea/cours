<?php

 
	 $destinataire=$_POST['email_dest'];
	 $email='d.sidd.projet@gmail.com';
	 $expediteur=$_POST['email'];
	 $to = $destinataire.','.$email;
	 $subject = $_POST['realname'].' partage avec vous: "'. $_POST['title'].'"';
	 $message=$_POST['comments'];
	 $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     $headers .= 'From: '.$expediteur.'' . "\r\n" . 'Reply-To: '.$expediteur.'' . "\r\n" . 'X-Mailer: PHP/' . phpversion();            
	 $lien = $_POST['lien'];


     mail($to, $subject,$message, $headers);	 
	 

	Header('Location: '.$lien);

?>


