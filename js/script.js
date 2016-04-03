function transcript() {
<<<<<<< HEAD
=======
    var txt = document.getElementById("contenu");

>>>>>>> e1c0585d2172ac002ab38a0597d42ac94024a827
    $('#leTexte').val($('#contenu').html());
}

function ajoutMail() {
    var newMail = $('<li><input type="text" name="mail[]" placeholder="destinataire@mail.fr" onblur="verifMail(this)"></li>');
    $('#mails').append(newMail);
}

function precedent() {
    document.location.href="editor.php";
<<<<<<< HEAD
}

function surligne($champ, erreur) {
	if(erreur) {
        // console.log(champ);
        $champ.css('background-color', '#ff7c7c');
    } else {
        $champ.css('background-color', 'transparent');
    }
}

=======
}

function surligne($champ, erreur) {
	if(erreur) {
        // console.log(champ);
        $champ.css('background-color', '#ff7c7c');
    } else {
        $champ.css('background-color', 'transparent');
    }
}

>>>>>>> e1c0585d2172ac002ab38a0597d42ac94024a827

function verifMail(champ) {
    var $champ = $(champ);
    var value = $champ.val();

        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,3}$/;
        if(!regex.test(value)) {
            // erreur
            surligne($champ, true);
            return false;
        } else {
            // pas d'erreur
            surligne($champ, false);
            return true;
        }
}

$('form').on('submit', function(e) {
    e.preventDefault();

    var erreur = false;
    var auMoinsUneValide = false;
    var mails = $('input[name="mail[]"]');

    $.each(mails, function(key, input) {
        if($(input).val() != '') {
            if(verifMail($(input))) {
                auMoinsUneValide = true;
            } else {
                erreur = true;
            }
        }
    });

    if(!erreur && auMoinsUneValide) {
        this.submit();
    } else {
        alert("Vous devez remplir correctement les adresses mail !");
    }

});
