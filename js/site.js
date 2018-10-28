/**
 * Fonctions jQuery du thème
 */
jQuery(document).ready(function($) {

    // Ajout de css sur le widget Fichier de Gutenbert
    $('.wp-block-file a').each(function(index, elem) {
        //console.log(index, elem);
        $(elem).toggleClass("w3-text-theme w3-large");
        $(elem).css('text-decoration', 'none');
        if ($(elem).attr('href').indexOf('.pdf') >= 0) {
            $(elem).prepend('<i class="fa fa-file-pdf-o fa-fw w3-xxlarge w3-margin-right"></i>');
        } else {
            $(elem).prepend('<i class="fa fa-file-o fa-fw w3-xxlarge w3-margin-right"></i>');
        }
        //console.log($(elem).attr('href'));
    });

    // Bouton Edition d'un post
    $('.pbi_edit_post').each(function(index, elem) {
        //console.log(index, elem);
        $(elem).toggleClass("");
        // $(elem).css('text-decoration', 'none');
        $(elem).html('<i class="fa fa-edit fa-fw w3-text-theme w3-large"></i>');
    });

    // Bouton lire la suite
    $('.more-link').each(function(index, elem) {
        //console.log(index, elem);
        $(elem).toggleClass("w3-tag w3-theme-l2");
        //$(elem).css('margin-bottom', '15px');
        $(elem).html('Lire la suite...');
    });

    // Gestion du cookie pbi_private_checked via une cace à cocher
    $('#pbi_private_checked_id').each(function(index, elem) {
        if (isCookie('pbi_private_checked')) {
            $(elem).attr('checked', 'checked');
        } else {
            $(elem).removeAttr('checked');
        }
    });
    $('#pbi_private_checked_id').click(function() {
        if (isCookie('pbi_private_checked')) {
            $(this).removeAttr('checked');
            removeCookie('pbi_private_checked');
        } else {
            $(this).attr('checked', 'checked');
            setCookie('pbi_private_checked', 'checked');
        }
        location.reload();
    });
});

/**
 * setCookie : Enregsitrement d'un cookie
 * @param {string} cname nom du cookie
 * @param {string} cvalue sa valeur
 * @param {int} exdays le nombre de jours avant expiration
 */
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

/**
 * Suppression d'un cookie
 * @param {string} cname nom du cookie
 */
function removeCookie(cname) {
    document.cookie = cname + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
}

/**
 * Obtenir la valeur d'un cookie
 * @param {string} cname nom du cookie
 */
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

/**
 * Est que le cookie existe ?
 * @param {string} cname nom du cookie
 */
function isCookie(cname) {
    var cookie = getCookie(cname);
    if (cookie != "") {
        return true;
    } else {
        return false;
    }
}