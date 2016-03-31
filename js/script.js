var i = 1;

function transcript(){
    var txt = document.getElementById("contenu");

    document.getElementById("leTexte").value = txt.innerText;
}

function ajoutMail(){
    i +=1;
    document.getElementById(i).type = "text";
}

function precedent(){
    document.location.href="editor.php";
}

function surligne(champ, erreur){
	if(erreur)
		champ.style.backgroundColor = "#ff7c7c";
	else
		champ.style.backgroundColor = "";
}

function verifMail(champ){
	var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,3}$/;
	if(!regex.test(champ.value)){
		surligne(champ, true);
		return false;
	}else {
		surligne(champ, false);
		return true;
	}
}
