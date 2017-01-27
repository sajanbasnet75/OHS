$(document).ready(function(){
   $(window).scroll(function(){
      if($(document).scrollTop()>120){
         $('.navbar').addClass('navbar-fixed-top');
         $('.navbar-nav').removeClass('navi');
         $('.logoimg').addClass('logo-brand');
         $('.brand-text').html('OHS');

        }
      else{
	      $('.navbar').removeClass('navbar-fixed-top');
	       $('.navbar-nav').addClass('navi');
	        $('.logoimg').removeClass('logo-brand');
          $('.brand-text').html('');

          }
    });
});