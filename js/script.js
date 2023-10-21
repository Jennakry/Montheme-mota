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

// On récupere les éléments select
const categoriesSelect = document.getElementById("categories");
const formatsSelect = document.getElementById("formats");
const datesSelect = document.getElementById("dates");

// Écouteurs d'événements pour détecter les changements dans les menus déroulants
categoriesSelect.addEventListener("change", updateOptions);
formatsSelect.addEventListener("change", updateOptions);
datesSelect.addEventListener("change", updateOptions);

// Fonction pour mettre à jour les options en fonction des sélections
function updateOptions() {
    // Récupérer les valeurs sélectionnées
    const selectedCategory = categoriesSelect.value;
    const selectedFormat = formatsSelect.value;
    const selectedDate = datesSelect.value;

    // Mettre à jour les options des autres menus en fonction des sélections
    // Par exemple, vous pouvez ajouter des conditions ici pour filtrer les options en fonction des sélections.

    // Exemple : Si "Mariage" est sélectionné dans Catégories, masquez "Portrait" dans Formats.
    if (selectedCategory === "1") {
        formatsSelect.querySelector("option[value='2']").style.display = "none";
    } else {
        formatsSelect.querySelector("option[value='2']").style.display = "block";
    }
    // Ajoutez des conditions similaires pour les autres filtres.

    // Réinitialisez les menus déroulants aux options par défaut après les mises à jour.
    categoriesSelect.value = "0";
    formatsSelect.value = "0";
    datesSelect.value = "0";
}

// Réinitialisez les options des menus déroulants au chargement de la page.
updateOptions();



// Lire plus

let currentPage = 1; // Numéro de la page initiale
jQuery('#load-more').on('click', function() {

  $.ajax({
    type: 'POST',
    url: '/mota/wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'load_more_posts',
      page: currentPage,
    },
    success: function (res) {
      $('.photo1').append(res);
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

