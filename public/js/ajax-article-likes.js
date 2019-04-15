console.log('JS bien chargé');

const params = {
    url: 'http://blog2.local/api/article/likes/2'
};

// Lancement de l'appel AJAX
$.ajax(params).done(displayNewLikes);

function displayNewLikes(json) {
    // Afficher la nouvelle valeur du nombre de likes
    console.log('Retour de l\'appel AJAX');
}