jQuery(document).ready(function($) {

//MODALE//

// Get the modal
var modal = document.getElementById('myModal');

// On click sur le lien personalisé "Contact"
var btn = document.getElementById("menu-item-47");

const btn2= document.querySelectorAll('.btn');

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





