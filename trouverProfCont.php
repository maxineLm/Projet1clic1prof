<?php
include 'header.php';
require 'Model.php';
$mod= Model::getModel();
$res=$mod->rechercherProfesseur($_POST['matiere'],$_POST['niveau']);
//envoi de l'email
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'apikey';                     // SMTP username
    $mail->Password   = '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';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('maximilien.f.tothe@gmail.com', 'Maximilien Tothe');
    $mail->addAddress('maximilien.f.tothe@gmail.com');     // Add a recipient
    $mail->addAddress('mehdidebbali384@gmail.com');



    // Content
	$body="l'élève ".$_POST['nom']." ".$_POST['prenom']." souhaite un professeur de ".$_POST['matiere']." de niveau ".$_POST['niveau'].".Son adresse est ".$_POST['adresse'].", son numero de téléphone est ".$_POST['num']." et son mail est ".$_POST['mail'].". Voici la liste des professeures enseignant la matiere a ce niveau:<br>";
	foreach($res as $key => $v){
    $body.=$key.':'.$v["nom"].' '.$v["prenom"].' '.$v["adresse"]."<br>";
	}
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Liste des professeur possible pour'.$_POST["nom"];
    $mail->Body    = $body;


    $mail->send();
    echo 'La liste des professeur compatible a été envoyé nous vous recontacterons sous peu';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
/*echo '<ul class=black>';
foreach($res as $key => $v){
    echo '<li>'.$key.':'.$v["nom"].$v["prenom"].$v["adresse"].'</li>';
}
echo '</ul>';
include 'footer.php';*/
?>
