<?php
require_once("cas.php");
require_once("ldap/ldap.class.php");
require_once("lib/class.phpmailer.php");

$ldap = new LDAP();
$userdata = $ldap->getuserinfo($login);
$login = strtoupper($login);
$fullname = $userdata[0]['displayname'][0];

function envoiMail($fullname, $login){
    $mail = new PHPMailer();

    // Sylvain Denyse -> sylvain.denyse
    $sender = strtolower($fullname);
    $sender = str_replace(' ', '.', $sender);

    // Expéditeur
    $mail->setFrom($sender.'@univ-nantes.fr', $fullname);

    // Destinataire
    for ($i = 1 ; $i <= 10 ; $i += 1){
        if($_POST["mail".$i] != ""){
<<<<<<< HEAD
            $mail->addAddress($_POST["mail".$i]);
=======
            if (filter_var($_POST["mail".$i], FILTER_VALIDATE_EMAIL)) {
                $mail->addAddress($_POST["mail".$i]);
            }
>>>>>>> 86c6917da4fa92958c8ab8a62fcc51c88f9851e2
        }
    }

    // AddEmbeddedImage(NOM_DU_FICHIER, CID, TITRE)
<<<<<<< HEAD
    $mail->AddEmbeddedImage('temp/'.$login.'.jpg', 'ma_carte', 'carte');
=======
    $mail->AddEmbeddedImage($login.'.jpg', 'ma_carte', 'carte');
>>>>>>> 86c6917da4fa92958c8ab8a62fcc51c88f9851e2

    // Format HTML
    $mail->isHTML(true);

<<<<<<< HEAD
    $mail->CharSet = 'UTF-8';

    $mail->Subject = 'Une carte de vœux de la part de '.$fullname.' vous attend.';
    $mail->Body = "Bonjour,<br>".$fullname." a créé pour vous une carte de vœux.<br><img src=\"cid:ma_carte\"/>";
=======

    $mail->Subject = 'Une carte de vœux de la part de '.$fullname.' vous attend.';
    $mail->Body = "Bonjour,<br>".$fullname." a créé pour vous une carte de vœux.<br><img src='cid:ma_carte'/>";
>>>>>>> 86c6917da4fa92958c8ab8a62fcc51c88f9851e2

    $mail->send();
}

try{
    envoiMail($fullname, $login);
    header('Location: success.php');
}catch (Exception $e){
    echo $e->getMessage();
}

?>
