//MODALE//
jQuery(document).ready(function($) {
// Il récupère la Modale 
var modal = document.getElementById('myModal');

// On click sur le lien personalisé "Contact"
var btn = document.getElementById("menu-item-47");
// Récupère tous les éléments avec la classe 'btn'
const btn2= document.querySelectorAll('.btn');
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
 // Ajoute un écouteur d'événement de clic sur la fenêtre. 
 //Si l'utilisateur clique en dehors de la modale, la modale se ferme.
window.addEventListener('click', function(event){
  if (event.target === modal) {
    modal.style.display = 'none';
  }
})

})

//MENU BURGER

      jQuery(function ($) {
        $(function () {
      
      $(".btn-modal").click(function (e) {
        $(".modal__content").toggleClass("animate-modal");
        $(".modal__content").toggleClass("open");
        $(".btn-modal").toggleClass("close");
      });
      $("a").click(function () {
        if ($(".modal__content").hasClass("open")) {
          $(".modal__content").removeClass("animate-modal");
          $(".modal__content").removeClass("open");
          $(".btn-modal").removeClass("close");
        }
      });
    });
  });






