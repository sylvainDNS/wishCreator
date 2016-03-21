<?php
require_once("cas.php");
require_once("ldap/ldap.class.php");

$ldap = new LDAP();
$userdata = $ldap->getuserinfo($login);
$login = strtoupper($login);
$fullname = $userdata[0]['displayname'][0];

?>

<html>
<head>
    <title>WishCreator v2</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <script src="js/script.js"></script>
</head>
<body>
    <div id="header">
        <table>
            <tr>
                <td id="logoGauche"><a href="http://www.univ-nantes.fr/" title="Retour à la page d'accueil de l'Université de Nantes"><img src="img/logoUN.png" alt="Site de l'Université"></a></td>
                <td id="titre"><a href="editor.php" title="Accueil">WishCreator</a></td>
                <td id="logoDroite"><a href="http://www.iutnantes.univ-nantes.fr/" title="Retour à la page d'accueil de l'IUT de Nantes"><img src="img/logoIUT.png" height="120" alt="Site de l'IUT"></a></td>
            </tr>
        </table>
    </div>

    <?php
    if($login == 'E145252H' || $login == 'MBRUNET')
    {
        ?>
        <div id="admin">
            <a href="admin.php" title="Page d'administration">Administration</a>
        </div>
        <?php
    }
    ?>


    <div id="deconnexion">
        <a href="logout.php" title="Se déconnecter">Déconnexion</a>
    </div>

    <?php
    if(!isset($_GET["message"]))
    {
    ?>
    <div class="corps">
        Bonjour <?php echo $fullname ?> ! Nous espérons que vous allez bien. Passez une agréable journée ;)
    </div>
    <?php
}else{
    ?>
    <div class="corps">
    <?php
    echo $_GET["message"];
    ?>
    </div>
    <?php
}
    ?>
    <div class="corps">
        <form class="" action="upload.php" method="post" enctype="multipart/form-data">
            Sélectionnez l'image de la carte de vœux (dans son intégralité) à importer sur le serveur :<br>
            <input type="file" name="fichierCarteFull" id="fichierCarte"><br><br>

            Sélectionnez l'image de la carte de vœux (seulement la zone d'édition) à importer sur le serveur :<br>
            <input type="file" name="fichierCartePrev" id="fichierCarte"><br><br>

            <input type="submit" value="Charger l'image" name="submit">
        </form>
    </div>

<div id="pied_page">
    <ul class="copyright">
        <li>
            <a href="mailto:sylvain.denyse@gmail.com?subject=WishCard Creator">DENYSE Sylvain</a>
            - <a href="mailto:kylian.naudin@etu.univ-nantes.fr?subject=WishCard Creator">NAUDIN Kylian</a>
            - <a href="mailto:alexandre.richard-bonnet@etu.univ-nantes.fr?subject=WishCard Creator">RICHARD Alexandre</a>
        </li>
        <li><a href="mailto:service-communication.iutna@univ-nantes.fr?subject=WishCreator">Service Communication et relations entreprises - IUT de Nantes</a></li>
        <li>Années 2015 - 2016</li>
    </ul>
</div>
</body>
</html>
