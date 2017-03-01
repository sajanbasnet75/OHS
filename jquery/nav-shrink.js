$(document).ready(function(){
   $(window).scroll(function(){
      if($(document).scrollTop()>160){
         $('.navbar').addClass('navbar-fixed-top').css("background-color", "white");
         $('.navbar-nav').removeClass('navi');
         $('.logoimg').hide();
         $('.brand-text').html('OHS');
           
        }
      else{
	      $('.navbar').removeClass('navbar-fixed-top').css("background-color", "");;
	       $('.navbar-nav').addClass('navi');
	        $('.logoimg').removeClass('logo-brand');
          $('.brand-text').html('');
           $('.logoimg').show();
          }
    });

  


});



