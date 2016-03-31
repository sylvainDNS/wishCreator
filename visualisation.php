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
        Voici la carte de vœux que recevront vos contacts. Si elle vous convient, saisissez les coordonnées de vos contacts, puis cliquez sur
        <i>Envoyer</i>, sinon cliquez sur <i>Retour</i>. Vous pouvez aussi choisir de <a href="temp/carteTest.jpg" download title="Cliquez ici pour télécharger la carte de vœux">télécharger</a> l'image.
    </div>

    <div id="visualisation" class="corps">

  		<img id="carte" src="temp/<?php echo $login ?>.jpg" width="808"/>

    </div>

    <div id="saisieMail" class="corps">
        <p><form method="POST" action="mail.php">
            <tr>
                <td><input id="1" type="text" name="mail1" placeholder="destinataire@mail.fr" onblur="verifMail(this)"></td>
                <td><input id="2" type="hidden" name="mail2" placeholder="destinataire@mail.fr" onblur="verifMail(this)"></td>
                <td><input id="3" type="hidden" name="mail3" placeholder="destinataire@mail.fr" onblur="verifMail(this)"></td>
                <td><input id="4" type="hidden" name="mail4" placeholder="destinataire@mail.fr" onblur="verifMail(this)"></td>
                <td><input id="5" type="hidden" name="mail5" placeholder="destinataire@mail.fr" onblur="verifMail(this)"></td>
                <td><input id="6" type="hidden" name="mail6" placeholder="destinataire@mail.fr" onblur="verifMail(this)"></td>
                <td><input id="7" type="hidden" name="mail7" placeholder="destinataire@mail.fr" onblur="verifMail(this)"></td>
                <td><input id="8" type="hidden" name="mail8" placeholder="destinataire@mail.fr" onblur="verifMail(this)"></td>
                <td><input id="9" type="hidden" name="mail9" placeholder="destinataire@mail.fr" onblur="verifMail(this)"></td>
                <td><input id="10" type="hidden" name="mail10" placeholder="destinataire@mail.fr" onblur="verifMail(this)"></td>
            </tr>
            <br>
            <a href="javascript:ajoutMail()" title="Ajouter un destinataire">+</a>
            <br>
            <input type="button" value="Retour" onclick="precedent()">
   			<input type="submit" value="Envoyer">
        </form></p>
    </div>

    <div id="pied_page">
        <ul class="copyright">
			<li>
			    <a href="mailto:sylvain.denyse@etu.univ-nantes.fr?subject=WishCreator">DENYSE Sylvain</a>
			    - <a href="mailto:kylian.naudin@etu.univ-nantes.fr?subject=WishCard_Creator">NAUDIN Kylian</a>
			    - <a href="mailto:alexandre.richard-bonnet@etu.univ-nantes.fr?subject=WishCreator">RICHARD Alexandre</a>
		    </li>
            <li><a href="mailto:service-communication.iutna@univ-nantes.fr?subject=WishCreator">Service Communication et relations entreprises - IUT de Nantes</a></li>
			<li>Années 2015 - 2016</li>
		</ul>
	</div>
</body>
</html>
