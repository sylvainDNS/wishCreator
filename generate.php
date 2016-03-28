<?php
require_once("cas.php");
require_once("ldap/ldap.class.php");

$ldap = new LDAP();
$userdata = $ldap->getuserinfo($login);
$login = strtoupper($login);
$fullname = $userdata[0]['displayname'][0];


// Supprime tous les fichiers du dossier temp ayant plus d'un jour (86400 sec)
function supprimerFichiersVieux(){
    $dossier = new DirectoryIterator('temp/');
    foreach($dossier as $fichier){
        if($fichier->isFile() && !$fichier->isDot() && (time() - $fichier->getMTime() > 86400)){
            unlink($fichier->getPathname());
        }
    }
}

function genImage(){
    try{
        //Création des prérequis Imagick
        $image = new Imagick();
        $draw = new ImagickDraw();
        $pixel = new ImagickPixel('gray');

        //Upload de la carte
        $image->readImage('img/cartedevoeuxFull.jpg');

        //Définition fichier de retour
        $image->setImageFormat('jpg');

        //Choix de la police
        // $draw->setFont('Bookman-DemiItalic');

        //Choix de la couleur du texte
        $draw->setFillColor($_POST['color']);

        //Taille de la police
        $draw->setFontSize(35);

        //Séparation du texte pour éviter le débordement.
        //On stock le texte du formulaire dans une variables
        $output = $_POST['texte'];

        //On éclate le texte dans un tableau en function des espaces
        $arrayWords = explode(' ', $output);

        // On définit le nombre de caractères par lignes
        $maxLineLength = 52;

        // Compteurs
        $currentLength = 0;
        $index = 0;

        foreach($arrayWords as $word)
        {
            // +1 car le mot se verra rajouter un espace.
            $wordLength = strlen($word) + 1;

            //Si la taille actuelle plus celle du mot ne dépasse pas le nombre autorisé par lignes, on l’ajoute
            if(($currentLength + $wordLength) <= $maxLineLength)
            {
                $arrayOutput[$index] .= $word.' ';

                $currentLength += $wordLength;
            }

            //Sinon, on créer une nouvelle ligne
            else
            {
                $index += 1;

                $currentLength = $wordLength;

                $arrayOutput[$index] = $word.' ';
            }
        }

        //On compte le nombre de ligne dans le tableau
        $arr_length = count($arrayOutput);

        //Pour chaque ligne on descend de 50 pixel, et on affiche le texte
        for($i = 0;$i < $arr_length; $i++)
        {
            $num = 100+50*$i;
            $image->annotateImage($draw, 1000, $num , 0, $arrayOutput[$i]);

        }

        $image->writeImage('temp/'.$login.'.jpg');

    }catch (Exception $e){
        echo $e->getMessage();
    }
}

genImage();
supprimerFichiersVieux();

header('Location: visualisation.php');
exit();
