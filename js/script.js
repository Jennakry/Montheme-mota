jQuery(document).ready(function($) {
  // On récupère la Modale 
  var modal = document.getElementById('myModal');

  // On click sur le lien personalisé "Contact"
  var btn = document.getElementById("menu-item-47");

  // Récupère tous les éléments avec la classe 'btn'
  const btn2= document.querySelectorAll('.btn');
  var span = document.getElementsByClassName("close")[0]; 

  // Quand on click sur le lien "Contact", on ouvre la modal
  btn.addEventListener('click', function() {
      modal.style.display = "block";
  });

  btn2.forEach(function(button){
      button.addEventListener('click', function(){
          // Récupère la référence de la photo depuis l'attribut data-reference du bouton cliqué
          var photoReference = this.getAttribute('data-reference');

          // Trouve le champ du formulaire à l'intérieur de la modale où la référence doit être insérée
          var inputRef = modal.querySelector('#photo-reference');
          if (inputRef) {
              inputRef.value = photoReference; // Met à jour la valeur du champ avec la référence de la photo
          }

          modal.style.display = "block";
      });
  });

  // Quand on click sur le bouton "close", on ferme la modal
  span.addEventListener('click', function() {
      modal.style.display = "none";
  });

  // Ajoute un écouteur d'événement de clic sur la fenêtre. 
  // Si l'utilisateur clique en dehors de la modale, la modale se ferme.
  window.addEventListener('click', function(event) {
      if (event.target === modal) {
          modal.style.display = 'none';
      }
  });
});

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

  // Utilisation de JavaScript pur
document.getElementById('contact_btn').addEventListener('click', function() {
  // Récupérez la référence de la photo
  var photoReference = document.querySelector('.photo1').getAttribute('data-reference');
  
  // Définissez la valeur du champ de référence dans le formulaire
  document.getElementById('photo-reference').value = photoReference;
  
  // Affichez la modale
  var modal = document.getElementById('myModal');
  modal.style.display = "block";
});







