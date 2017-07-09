var offset;//for video;
$(document).ready(function(){
/*for ask a  question */
$('.include_symptom').hide();
$('.symptom_button').on('click', function(event) {
$(this).slideUp('slow');
$('.include_symptom').slideDown('slow');
}); /*end*/

/*for answering a  question */
$('.provide_box').hide();
$('.answer_button').on('click', function(event) {
$(this).slideUp('slow');
$('.provide_box').slideDown('slow');
}); /*end*/

/*popup*/
if($(window).width()>768){
   $('.main-nav').data('size','big');
   //for video....<
   $('#newsVideos').on('play', function() {
   $('.scroll-video').data('status','played');
});

$('#newsVideos').on('pause', function() {
   $('.scroll-video').data('status','paused');
});
//....>
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

   $('.main-nav').addClass('navbar-fixed-top').css('background-color', 'rgba(204, 218, 225, 0.9)');
   $('.main-header').hide();

   }
$('.video-button').hide();//this is for video

$('.video-button').on('click',function(){
  $('.scroll-video').removeClass('stick-video');
  $(this).hide();
  $('#newsVideos').each(function () { 
    this.pause() 
  });
});

var videoBox=$('.scroll-video');
var top=videoBox.offset().top;
offset = Math.floor( top + (videoBox.outerHeight()/ 2 ) );

   
});



$(window).scroll(function(){
     if($(document).scrollTop()>0){
      if($('.main-nav').data('size') == 'big')
        {
        $('.logoimg').slideUp('500');
            $('.main-nav').data('size','small').addClass('navbar-fixed-top').css('background-color', 'rgba(255, 255, 255, .6)');
        $('.main-nav').animate({
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
 

$(window)

.on('load',function(){
})
.on('scroll',function(){  
 console.log(offset);

     if($(window).scrollTop()>offset){
      if($('.scroll-video').data('status') == 'played')
        {   $('.scroll-video').data('status','paused').addClass('stick-video');
            $('.video-button').show();
        }
      }
    else
    {
        if($('.scroll-video').data('status') == 'paused')
        { $('.scroll-video').removeClass('stick-video').data('status','played');
         $('.video-button').hide();
        }
      } 

});
