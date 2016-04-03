<?php

$PATH = ".authaccess";

function isAdmin($login){
    // r : lecture seule
    $fichierAuth = fopen($GLOBALS["PATH"], 'r');
    if($fichierAuth) {
        while (($ligne = fgets($fichierAuth)) !== false) {
            $ligne = rtrim($ligne, "\r\n");
            if ($login == $ligne){
                fclose($fichierAuth);
                return true;
            }
        }

        fclose($fichierAuth);
        return false;
    } else {
        echo "<b>Error : </b>Admin file not found.";
    }
}

function addAdmin($login){
    // a : écriture seule, si le fichier n'existe pas il est créé
	if(!isAdmin()){
		$fichierAuth = fopen($GLOBALS["PATH"], 'a');

		fputs($fichierAuth, $login);
		fputs($fichierAuth, "\n");

		fclose($fichierAuth);

		return "L'administrateur ".$login." a été ajouté.";
	}else{
		return $login." est déjà administrateur."
	}
}

function delAdmin($login){
    $fichierAuth = file_get_contents($GLOBALS["PATH"]);
    $nbLigne = substr_count($fichierAuth, "\n");

    if($nbLigne >= 2){
        $login .= "\n";
        $str = listAdmin();
        if (($key = array_search($login, $str)) !== false) {
            file_put_contents($GLOBALS["PATH"], str_replace($login, "", file_get_contents($GLOBALS["PATH"])));

            return "L'administrateur ".$login." a été supprimé.";
        } else{
            return "L'administrateur ".$login." n'existe pas";
        }
    }else{
        return "<b>Erreur : </b> il ne peut pas y avoir moins de 1 administrateur.";
    }
}

function listAdmin(){
    // r : lecture seule
    $fichierAuth = fopen($GLOBALS["PATH"], 'r');
    if($fichierAuth) {
        $str = array();
        while (($ligne = fgets($fichierAuth)) !== false) {
            array_push($str, $ligne);
        }

        fclose($fichierAuth);
        return $str;
    } else {
        echo "<b>Error : </b>Admin file not found.";
    }
}


if(isset($_POST["login"]) && isset($_POST["choix"])){

    $login = strtoupper($_POST["login"]);

	if($login != ""){
		if($_POST["choix"] == "add"){
			$message = addAdmin($login);
		}elseif ($_POST["choix"] == "del") {
			$message = delAdmin($login);
		}
	}else{
		$messsage = "Le login n'existe pas.";
	}

    header('Location: admin.php?&message='.$GLOBALS["message"]);
}
