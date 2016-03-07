var i = 1;

function transcript(){
    var txt = document.getElementById("contenu");
    
    document.getElementById("leTexte").value = txt.innerText;
}

function ajoutMail(){
    i +=1;
    document.getElementById(i).type = "text";
}