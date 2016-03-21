<?php
require_once("cas.php");
require_once("ldap/ldap.class.php");

$ldap = new LDAP();
$userdata = $ldap->getuserinfo($login);
$login = strtoupper($login);
$fullname = $userdata[0]['displayname'][0];

function envoiMail($fullname, $login){
    $sujet = 'Une carte de vœux de la part de '.$fullname.' vous attend.';
    $message = "Bonjour,<br>".$fullname." a créé pour vous une carte de vœux. Ouvrez la pièce jointe pour la visionner.";
    $destinataire = $_POST["mail1"];
    // for ($i = 1 ; $i <= 10 ; $i += 1){
    //     if($_POST["mail".$i] != ""){
    //         $destinataire .= $_POST["mail".$i].",";
    //     }
    // }
    // echo $destinataire;

    $sender = strtolower($fullname);
    $sender = str_replace(' ', '.', $sender);

    $headers = "From: \"".$fullname."\"<".$sender."@univ-nantes.fr>\n";
    $headers .="Reply-To: <".$sender."@univ-nantes.fr>\n";
    $headers .= "Content-Type: text/html; charset=\"utf-8\"";
    try{
        mail($destinataire,$sujet,$message,$headers);
    }catch (Exception $e){
        echo $e->getMessage();
    }
}

envoiMail($fullname, $login);
header('Location: success.php');

?>
