var Swipes = new Swiper('.swiper-container', {
    loop: true,
    speed: 800,
    
    allowTouchMove:true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 5000,
      },
 
});

jQuery(document).ready(function() {
    "use strict";
    //  TESTIMONIALS CAROUSEL HOOK
    jQuery('#customers-testimonials').owlCarousel({
        loop: true,
        center: true,
        items: 4,
        margin: 0,
        autoplay: true,
      
        autoplayTimeout: 5000,
        smartSpeed: 450,
        responsive: {
          0: {
            items: 1
          },
          768: {
            items: 2
          },
          1170: {
            items: 4
          }
        }
    });
});
jQuery(document).ready(function(){
  
  $('.like-button').click(function(){
      $(this).toggleClass('is-active');
  });


})
$('.navbar .nav-menu li a').click(function(){
  $('.nav-menu').hide(100);
  $(".fa-bars").removeClass('fa-times');
});

function menuToggle(){
  $('.nav-menu').toggle("slide");
  $(".fa-bars").toggleClass('fa-times');
}

function toggleEye(){
    const password = document.querySelector('#adminPass');
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    $(".fa-eye").toggleClass('fa-eye-slash');
}

//favorites
function manageFav(id,operation){
   if(operation=="add")
   {
     ur="templates/addToFav";
   }
 if(operation=="remove")
   {
     ur="addToFav";
   }

   jQuery.ajax({
    url:ur,
    type:'post',
    data:{id : id,operation:operation},
    success:function(result){
console.log(result);
      msg=jQuery.parseJSON(result);
      if(msg.action=="remove"){
          window.location.href=window.location.href;
      }
      else{

      setTimeout(function() {
        $("#addToFavSuccess").fadeIn(200);
      }, 200);

      setTimeout(function() {
        $("#addToFavSuccess").fadeOut(200);
      }, 1000);
      
      }

      $("#favItems").html(msg.totalItems);


    }

  });

}


















