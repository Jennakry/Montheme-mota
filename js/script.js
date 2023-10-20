jQuery(document).ready(function($) {

//MODALE//

// Get the modal
var modal = document.getElementById('myModal');

// On click sur le lien personalisé "Contact"
var btn = document.getElementById("menu-item-47");

const btn2= document.querySelectorAll('.myBtn');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

// Quand on click, on ouvre la modal
btn.addEventListener('click' , function() {
    modal.style.display = "block";
}) ;
btn2.forEach(function(button){
  button.addEventListener('click', function(){
    modal.style.display = "block";
  })
})
window.addEventListener('click', function(event){
  if (event.target === modal) {
    modal.style.display = 'none';
  }
})

})

//FILTRE ET TRI//

jQuery(document).ready(function($) {
  $('#filtrer').on('click', function() {
    var catID = $('.custom-select select[name="categorie"]').val();
    var formatID = $('.custom-select-format select[name="format"]').val();

    // Effectuez la requête AJAX en utilisant catID et formatID comme données à envoyer au serveur.
    $.ajax({
      url: ajaxurl, // URL de l'action AJAX
      type: 'POST',
      data: {
        action: 'tri_par_categorie_et_format',
        cat_id: catID,
        format_id: formatID
      },
      success: function(response) {
        // Mettez à jour l'interface utilisateur avec les résultats de la requête
      }
    });
  });
});

// Lire plus


let currentPage = 1; // Numéro de la page initiale
$('#load-more').on('click', function() {
  currentPage++; // 

  $.ajax({
    type: 'POST',
    url: '/mota/wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'weichie_load_more',
      paged: currentPage,
    },
    success: function (res) {
      $('.publication-list').append(res);
    }
  });
});


//HEADER MOBILE

icons.addEventListener('click'), ()  => {
nav.classList.toggle("active")
}

// window.onload=function(){
//     var bouton = document.getElementById('btnMenu');
//     var nav = document.getElementById('nav');
//     bouton.onclick = function(e){
//         if(nav.style.display=="block"){
//             nav.style.display="none";
//         }else{
//             nav.style.display="block";
//         }
//     };
// };
  
// const burgerButton = document.querySelector('#btnMenu');
// const navigation = document.querySelector('.menu-mobile');


// burgerButton.addEventListener('click', toggleNav);

// function toggleNav () {
//   burgerButton.classList.toggle("active");
//   navigation.classList.toggle("active");
// }

