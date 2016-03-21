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
                <td id="logoGauche"><a href="http://www.univ-nantes.fr/" title="Retour à la page d'accueil de l'Université de Nantes"><img src="http://www.univ-nantes.fr/images/logo.png?new=2012050301" alt="Site de l'Université"></a></td>
                <td id="titre"><a href="editor.php" title="Accueil">WishCreator</a></td>
                <td id="logoDroite"><a href="http://www.iutnantes.univ-nantes.fr/" title="Retour à la page d'accueil de l'IUT de Nantes"><img src="http://www.iutnantes.univ-nantes.fr/images/logos/iutNantes.jpg?v=20150403" alt="Site de l'IUT"></a></td>
            </tr>
        </table>
    </div>

    <?php
    if($login == 'E145252H' || $login == 'mbrunet')
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

    <div class="corps">
        Félicitation ! Votre carte de vœux a bien été envoyé. Merci de nous avoir fait confiance.</br>
        <a href="index.html">Cliquez ici</a> pour réaliser une nouvelle carte de vœux.
    </div>

    <div id="pied_page">
        <ul class="copyright">
			<li>
			    <a href="mailto:sylvain.denyse@etu.univ-nantes.fr?subject=WishCard Creator">DENYSE Sylvain</a>
			    - <a href="mailto:kylian.naudin@etu.univ-nantes.fr?subject=WishCard Creator">NAUDIN Kylian</a>
			    - <a href="mailto:alexandre.richard-bonnet@etu.univ-nantes.fr?subject=WishCard Creator">RICHARD Alexandre</a>
		    </li>
            <li><a href="mailto:service-communication.iutna@univ-nantes.fr?subject=WishCreator">Service Communication et relations entreprises - IUT de Nantes</a></li>
			<li>Années 2015 - 2016</li>
		</ul>
	</div>
</body>
</html>
