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

