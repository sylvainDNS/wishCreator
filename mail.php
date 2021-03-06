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
    if(isset($_POST['mail']) && is_array($_POST['mail'])) {
        foreach($_POST['mail'] as $i => $str) {
            if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
                $mail->addAddress($str);
            }
        }
    } else {
        die('erreur');
    }

    // AddEmbeddedImage(NOM_DU_FICHIER, CID, TITRE)
    $mail->AddEmbeddedImage('temp/'.$login.'.jpg', 'ma_carte', 'carte');

    // Format HTML
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $mail->Subject = 'Une carte de vœux de la part de '.$fullname.' vous attend.';
    $mail->Body = "Bonjour,<br>".$fullname." a créé pour vous une carte de vœux.<br><img src=\"cid:ma_carte\"/>";

    $mail->send();
}

try{
    envoiMail($fullname, $login);
    header('Location: success.php');
}catch (Exception $e){
    echo $e->getMessage();
}
