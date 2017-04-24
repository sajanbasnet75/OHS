 $('.main-nav').data('size','medium');
   $(window).scroll(function(){
       if($(document).scrollTop() > 10)
    {
        if($('.main-nav').data('size') == 'medium')
        {
            $('.logoimg').slideUp('slow');
            
            $('.main-nav').data('size','small').addClass('navbar-fixed-top');
            $('.main-nav').stop().animate({
                height:'40px',
            },1000);
            $('.nav-pills').removeClass('navi');   
       }
    }
    else
    {
        if($('.main-nav').data('size') == 'small')
        {
            $('.main-nav').data('size','big').removeClass('navbar-fixed-top');
            $('.main-nav').stop().animate({
                height:'100px'
            },1000);
         $('.logoimg').slideDown('slow');
         $('.nav-pills').addClass('navi');   
       }  
    }
    });

 $(function(){
    $('.main-nav').data('size','big');
});

$(window).scroll(function(){
    if($(document).scrollTop() > 0)
    {
        if($('.main-nav').data('size') == 'big')
        {
            $('.main-nav').data('size','small');
            $('.main-nav').stop().animate({
                height:'40px'
            },600);
        }
    }
    else
    {
        if($('.main-nav').data('size') == 'small')
        {
            $('.main-nav').data('size','big');
            $('.main-nav').stop().animate({
                height:'100px'
            },600);
        }  
    }
});