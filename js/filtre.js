jQuery(document).ready(function($) {

  console.log('filtre.js loaded');

  // Initialisation de la variable de pagination
  let page = 1;

  // Gestionnaire d'événement pour les changements de filtres
  $('#filter-category, #filter-format, #filter-tri').on('change', function() {
    // Réinitialisation de la pagination à chaque changement de filtre
    page = 1;

    // Récupération des valeurs des filtres
    const categoriesPhotos = $('#filter-category').val();
    const formats = $('#filter-format').val();
    const tri = $('#filter-tri').val();

    // Envoi de la requête AJAX pour filtrer les photos
    sendAjaxRequest(categoriesPhotos, formats, tri, page);
  });

  // Gestionnaire d'événement pour le bouton "Charger plus"
  $('#load-more').on('click', function() {
    console.log('Load more clicked');
    // Incrémentation de la pagination pour charger les éléments suivants
    page++;

    console.log('Charging more, current page:', page);
    // Récupération des valeurs des filtres
    const categoriesPhotos = $('#filter-category').val();
    const formats = $('#filter-format').val();
    const tri = $('#filter-tri').val();

    // Envoi de la requête AJAX pour charger plus de photos
    sendAjaxRequest(categoriesPhotos, formats, tri, page);
  });

  // Fonction pour envoyer une requête AJAX
  function sendAjaxRequest(categoriesPhotos, formats, tri, page) {
    // Construction des données à envoyer
    const data = {
      'action': 'filter_photos',
      'nonce': frontendajax.nonce, // Utilisation du nonce ajouté dans le PHP
      'categories_photos': categoriesPhotos,
      'formats': formats,
      'tri': tri,
      'page': page
    };

    // Modification du bouton pour indiquer un état de chargement
    $('#load-more').text("Chargement...").prop("disabled", true);

    // Envoi de la requête
    $.ajax({
      type: 'POST',
      url: frontendajax.ajaxurl,
      data: data,
      success: function(response) {
        // Mise à jour de la galerie avec les nouvelles photos
        if(page === 1) {
          $('.gallery').html(response); // Si c'est la première page, remplace le contenu
        } else {
          $('.gallery').append(response); // Sinon, ajoute au contenu existant
        }
        // Modification du bouton après le chargement des données
        $('#load-more').text("Charger plus").prop("disabled", false);
      },
      error: function(errorThrown) {
        console.log(errorThrown);
        // Afficher un message d'erreur ou une action de repli
        $('#load-more').text("Erreur").prop("disabled", false);
      }
    });
  }

});
