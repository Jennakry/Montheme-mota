jQuery(document).ready(function($) {
  let page = 1;
  const perPage = 8; // Nombre de photos à charger par page
  let allPhotosLoaded = false;
  let categoriesPhotos = '';
  let formats = '';
  let tri = '';
  const totalPhotos = 16;

  // Gestionnaire d'événement pour les changements de filtres
  $('#filter-category, #filter-format, #filter-tri').on('change', function() {
    page = 1;
    allPhotosLoaded = false;
    categoriesPhotos = $('#filter-category').val();
    formats = $('#filter-format').val();
    tri = $('#filter-tri').val();
    loadMorePhotos();
  });

  // Gestionnaire d'événement pour le bouton "Charger plus"
  $('#load-more').on('click', function() {
    if (!allPhotosLoaded) {
      page++;
      loadMorePhotos();
    }
  });

  function loadMorePhotos() {
    const data = {
      'action': 'filter_photos',
      'nonce': frontendajax.nonce,
      'categories_photos': categoriesPhotos,
      'formats': formats,
      'tri': tri,
      'page': page
    };

    $('#load-more').text("Chargement...").prop("disabled", true);

    $.ajax({
      type: 'POST',
      url: frontendajax.ajaxurl,
      data: data,
      success: function(response) {
        if (page === 1) {
          $('.gallery').html(response);
        } else {
          $('.gallery').append(response);
        }

        if (page * perPage >= totalPhotos) {
          allPhotosLoaded = true;
          $('#load-more').text("Toutes les photos chargées").prop("disabled", true);
        } else {
          $('#load-more').text("Charger plus").prop("disabled", false);
        }
      },
      error: function(errorThrown) {
        console.log(errorThrown);
        $('#load-more').text("Erreur").prop("disabled", false);
      }
    });
  }
});



