console.log('test');

jQuery(document).ready(function($) {


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
// Lire plus

let currentPage = 1;
$('#load-more').on('click', function() {
  currentPage++; // Do currentPage + 1, because we want to load the next page

  $.ajax({
    type: 'POST',
    url: '/wp-admin/admin-ajax.php',
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

});