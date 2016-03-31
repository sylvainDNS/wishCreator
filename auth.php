<?php


function isAdmin($login){
    $fichierAuth = fopen('priv/.authAccess', 'r');
    if($fichierAuth) {
        while (($ligne = fgets($fichierAuth)) !== false) {
            if ($login == $ligne){
                // fclose($fichierAuth);
                echo "true";
            }

            var_dump($ligne);
            var_dump($login);
            // echo "<br>";
        }

        // var_dump($ligne);
        fclose($fichierAuth);
        echo "false";
    } else {
        echo("<b>Error</b><br>Admin file not found.");
    }
}

isAdmin("E145252H");
