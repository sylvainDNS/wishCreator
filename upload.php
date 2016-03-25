<?php
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fichierCartePrev"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$message = "";
// On vérifie que l'image est une vraie image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fichierCartePrev"]["tmp_name"]);
    if($check !== false) {
        $message .=  "Le fichier est une image - " . $check["mime"] . ". <br>";
        $uploadOk = 1;
    } else {
        $message .=  "Le fichier n'est pas une image. <br>";
        $uploadOk = 0;
    }
}

// Vérification de la taille du fichier
if ($_FILES["fichierCartePrev"]["size"] > 5000000) {
    $message .=  "Le fichier est trop gros.<br>";
    $uploadOk = 0;
}

// Filtrage des formats d'image
if($imageFileType != "jpg") {
    $message .=  "Seuls le format suivant est autorisé :  JPG<br>";
    $uploadOk = 0;
}

// On vérifie que l'upload est possible
if ($uploadOk == 0) {
    $message .=  "Le fichier n'a pas été  téléchargé. <br>";
    // Si tout est ok, on tente l'upload
} else {
    if (move_uploaded_file($_FILES["fichierCartePrev"]["tmp_name"], $target_file)) {
        $message .=  "Le fichier ". basename( $_FILES["fichierCartePrev"]["name"]). " a été  téléchargé. <br>";
    } else {
        $message .=  "Erreur pendant le téléchargement du fichier. <br>";

    }
}

rename('img/'.basename( $_FILES["fichierCartePrev"]["name"]), "img/cartedevoeuxPrev.jpg");

///////////////////////////////////////////////////////////////////////////

$target_file = $target_dir . basename($_FILES["fichierCarteFull"]["name"]);
$uploadOk = 1;

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fichierCarteFull"]["tmp_name"]);
    if($check !== false) {
        $message .=  "Le fichier est une image - " . $check["mime"] . ". <br>";
        $uploadOk = 1;
    } else {
        $message .=  "Le fichier n'est pas une image. <br>";
        $uploadOk = 0;
    }
}

// Vérification de la taille du fichier
if ($_FILES["fichierCarteFull"]["size"] > 5000000) {
    $message .=  "Le fichier est trop gros.<br>";
    $uploadOk = 0;
}

// Filtrage des formats d'image
if($imageFileType != "jpg") {
    $message .=  "Seuls le format suivant est autorisé :  JPG<br>";
    $uploadOk = 0;
}

// On vérifie que l'upload est possible
if ($uploadOk == 0) {
    $message .=  "Le fichier n'a pas été  téléchargé. <br>";
    // Si tout est ok, on tente l'upload
} else {
    if (move_uploaded_file($_FILES["fichierCarteFull"]["tmp_name"], $target_file)) {
        $message .=  "Le fichier ". basename( $_FILES["fichierCarteFull"]["name"]). " a été  téléchargé. <br>";
    } else {
        $message .=  "Erreur pendant le téléchargement du fichier. <br>";

    }
}

rename('img/'.basename( $_FILES["fichierCarteFull"]["name"]), "img/cartedevoeuxFull.jpg");


header('Location: admin.php?&message='.$message);

?>
