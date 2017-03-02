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
/*popup*/
if($(document).width()>500){
$('.choices1').mouseenter(function() {
$(this ).animate({
 height: '+=13px'
},6);
});

$('.choices1').mouseleave(function(){
$(this).animate({
height:'-=13px'
},6);
});

$('.navi>li>a').mouseenter(function() {
$(this).css('background-color', ' #06a5e0');
});
$('.navi>li>a').mouseleave(function() {
$(this).css('background-color', '');
});
}



});



