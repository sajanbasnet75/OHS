 $(document).ready(function(){
	$('a.opt1').on('click',function(){
        $.ajax('booking.php',{
        
        

        beforeSend:function(){
          $('.mybanner').addClass('loader');
        },
        success:function(data){
            $('.mybanner').html(data).removeClass('container-fluid').removeClass('loader').removeClass('mybanner').addClass("book-banners").addClass('bg-color');
         }
                          

        });
      });


	});

