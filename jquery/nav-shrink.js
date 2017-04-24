$(document).ready(function(){
/*popup*/
if($(window).width()>500){
   $('.main-nav').data('size','big');

$('.choices1').mouseenter(function() {
$(this ).animate({
 height: '+=13px'
},-12);
});

$('.choices1').mouseleave(function(){
$(this).animate({
height:'-=13px'
},-12);
});


$('.navi>li>a').mouseenter(function() {
$(this).css('background-color', ' #06a5e0');
});
$('.navi>li>a').mouseleave(function() {
$(this).css('background-color', '');
});
}
else{

   $('.main-nav').addClass('navbar-fixed-top').css('background-color', 'rgba(255, 255, 255, 0.9)');
   $('.main-header').hide();

   }
});


$(window).scroll(function(){
     if($(document).scrollTop()>0){
      if($('.main-nav').data('size') == 'big')
        {
        $('.logoimg').slideUp('500');
            $('.main-nav').data('size','small').addClass('navbar-fixed-top').css('background-color', 'rgba(255, 255, 255, .6)');
        $('.main-nav').stop().animate({
                height:'58px',
            },1000);
            $('.nav-pills').removeClass('navi');   
            $('.brand-text').html('OHS').slideDown(1300);
        }
     }
else
    {
        if($('.main-nav').data('size') == 'small')
        {
         $('.main-nav').data('size','big').removeClass('navbar-fixed-top').css('background', '');
          $('.main-nav').stop().animate({
                height:'120px'
            },1000);
            $('.logoimg').slideDown('500');
         $('.nav-pills').addClass('navi');   
         $('.brand-text').slideUp(-13);


  
        }
      } 
});





