 /*for home slider*/
	   $('.homeslider-inner').slick({
	 dots: true,
	 infinite: true,
	 autoplay: true,
	autoplaySpeed: 3000,
	 arrows: true,
	 speed: 1500

	});
	/*for home slider*/

 /*for testimonial*/
	   $('.testimonial-slider').slick({
	 dots: false,
	 infinite: true,
	 autoplay: true,
	autoplaySpeed: 3000,
	 arrows: false,
	 speed: 1500

	});
	/*for testi end*/

	$('.featured-slider').slick({
	 centerMode: true,
	 slidesToShow: 1,
	 focusOnSelect: true,
	 responsive: [
	   {
	     breakpoint: 768,
	     settings: {
	       arrows: false,
	       centerMode: true,
	       slidesToShow: 1
	     }
	   },
	   {
	     breakpoint: 480,
	     settings: {
	       arrows: false,
	       centerMode: true,
	       slidesToShow: 1
	     }
	   }
	 ]
	});


	/**/
	$('.product-slider').slick({
	 slidesToShow: 4,
	 focusOnSelect: true,
	 responsive: [
	   {
	     breakpoint: 768,
	     settings: {
	       arrows: false,
	       centerMode: false,
	       slidesToShow: 1
	     }
	   },
	   {
	     breakpoint: 480,
	     settings: {
	       arrows: false,
	       centerMode: false,
	       slidesToShow: 1
	     }
	   }
	 ]
	});
	/**/
	/**/
	$('.client-slider').slick({
	 slidesToShow: 5,
	 focusOnSelect: true,
	 responsive: [
	   {
	     breakpoint: 768,
	     settings: {
	       arrows: false,
	       centerMode: false,
	       slidesToShow: 1
	     }
	   },
	   {
	     breakpoint: 480,
	     settings: {
	       arrows: false,
	       centerMode: false,
	       slidesToShow: 1
	     }
	   }
	 ]
	});
	/**/

	   /*for fixed header shrink*/
	   $(window).scroll(function() {
	           if ($(document).scrollTop() > 50) {
	               $('header').addClass('shrink');
	           }
	           else {
	               $('header').removeClass('shrink');
	           }
	       });
	   /*for fixed header shrink end*/

	       /*for dummy header start*/
	       $(document).ready(function(){
	           var hheight= $("header").height();
	           $("#dummyheader").height(hheight);

						 $('.fancybox').fancybox({
		 				 	animationEffect: "fade"
	 					});
	       });
	   /*for dummy header end*/

	   /**/

	   $('#forgotpassword').on('show.bs.modal', function () {

			$('#login-modal').modal('hide');
			$('body').removeClass('modal-open');


});
$('#forgotpassword').on('shown.bs.modal', function () {
	$('body').addClass('modal-open');
});
$('#login-modal').on('shown.bs.modal', function () {
	$('body').addClass('modal-open');
});
$('#login-modal').on('show.bs.modal', function () {
		   //alert();
		   
			
			$('body').removeClass('modal-open');
			$('body').addClass('modal-open');
			try{
			$('#forgotpassword').modal('hide');
			}catch(err){}
});


// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top - 120
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);

          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable

          };
        });
      }
    }
  });


	function loginform($urll,$acts,$stats,$lodlnk)
    {
		
		//return false;
		$('#'+$acts).parsley().validate();

		if ($('#'+$acts).parsley().isValid())  {
		//if ($('#'+$acts).valid()) {
			var email = $("#username").val();
			var pwd = $("#loginpassword").val();
			//alert(email+" "+pwd);
			$("button").attr('disabled',false);
			/*
			var m_data = new FormData();
			var formdatas = $("#"+$acts).serializeArray();
			$.each( formdatas, function( key, value ) {
				 m_data.append( value.name, value.value);
			});
			*/
			
			$.ajax({
				url        : $urll,
				method     : 'POST',
				dataType   : 'json',   
				data       : 'email='+email+'&pwd='+pwd,
				beforeSend: function() {
					//alert("responseb");
					//loading();
				},
				success: function(response){
					
					  
					if(response.rslt == "1"){
						
						$("#"+$acts)[0].reset();
						if(response.wishlist =='wishlist'){
							addtowishlist(response.pid,response.minqty);
							$(location).attr('href', response.url);
						}
						
						else if(response.url !=''){
						  $(location).attr('href', response.url);		
						}	
						else{
						$(location).attr('href', $lodlnk); 
						}						
					}
					else if(response.rslt == "2"){
						var upmsg="Seems you have not registered with us! Kindly Sign Up";
						swal("We are Sorry!",upmsg, "warning");
						
					}
					
					else{
						var othmsg = "oops errors!!!";
						swal("We are Sorry!", othmsg, "warning");
					}

					//unloading();
					//$("button").attr('disabled',false);
					

				},
				error: function(jqXHR, textStatus, errorThrown){
					//alert(textStatus);
				}
			});
		}
	}
	
function forgetpassword($urll,$acts,$lodlnk)	
{
    	$('#'+$acts).parsley().validate();

		if ($('#'+$acts).parsley().isValid())  {
		
			
			var emails = $('#'+$acts).val();
			
			//$("button").attr('disabled',false);
		
			
			$.ajax({
				url        : $urll,
				method     : 'POST',
				dataType   : 'json',   
				data       : 'emails='+emails,
				beforeSend: function() {
					//alert("responseb");
					//loading();
				},
				success: function(response){
					
					 // alert(response.rslt);
					if(response.rslt == "1"){
					
						var sucmsg = "Password Reset link has been sent to your email address, Kindly check Inbox or Spam!";
						//swal("Success!",sucmsg, "success");
						//$("#"+$acts).val('');
						//$(location).attr('href', $lodlnk);
                        swal({
						title: "Success!",
						text: sucmsg,
						type: "success",
						confirmButtonText: "OK"
						},
						function(isConfirm){
							if (isConfirm) {
								$("#"+$acts).val('');
								$(location).attr('href', $lodlnk);
					    }
					});
                        						
					}
					else if(response.rslt == "2"){
						var upmsg="Invalid Email ID";
						swal("Error",upmsg, "warning");
						
					}


				},

			});
		}

}

function loginform($urll,$acts,$stats,$lodlnk)
    {
		

		//return false;
		$('#'+$acts).parsley().validate();

		if ($('#'+$acts).parsley().isValid())  {
		//if ($('#'+$acts).valid()) {
			var email = $("#username").val();
			var pwd = $("#loginpassword").val();
			//alert(email+" "+pwd);
			$("button").attr('disabled',false);
			/*
			var m_data = new FormData();
			var formdatas = $("#"+$acts).serializeArray();
			$.each( formdatas, function( key, value ) {
				 m_data.append( value.name, value.value);
			});
			*/
			
			$.ajax({
				url        : $urll,
				method     : 'POST',
				dataType   : 'json',   
				data       : 'email='+email+'&pwd='+pwd,
				beforeSend: function() {
					//alert("responseb");
					//loading();
				},
				success: function(response){
					
					  
					if(response.rslt == "1"){
						
						$("#"+$acts)[0].reset();
						if(response.wishlist =='wishlist'){
							addtowishlist(response.pid,response.minqty);
							$(location).attr('href', response.url);
						}
						else if(response.type =='Downloadpdfcatalog'){
							$(location).attr('href', response.urldpc);
						}
						else if(response.url !=''){
						  $(location).attr('href', response.url);		
						}	
						else{
						$(location).attr('href', $lodlnk); 
						}						
					}
					else if(response.rslt == "2"){
						var upmsg="Try again or click Forgot password to reset it";
						swal("We are Sorry!",upmsg, "warning");
						
					}
					
					else{
						var othmsg = "oops errors!!!";
						swal("We are Sorry!", othmsg, "warning");
					}

					//unloading();
					//$("button").attr('disabled',false);
					

				},
				error: function(jqXHR, textStatus, errorThrown){
					//alert(textStatus);
				}
			});
		}
	}
	
function forgetpassword($urll,$acts,$lodlnk)	
{
    	$('#'+$acts).parsley().validate();

		if ($('#'+$acts).parsley().isValid())  {
		
			
			var emails = $('#'+$acts).val();
			
			//$("button").attr('disabled',false);
		
			
			$.ajax({
				url        : $urll,
				method     : 'POST',
				dataType   : 'json',   
				data       : 'emails='+emails,
				beforeSend: function() {
					//alert("responseb");
					//loading();
				},
				success: function(response){
					
					 // alert(response.rslt);
					if(response.rslt == "1"){
						
						var sucmsg = "A link has been sent to your email address to reset the password.";
						//swal("Success!",sucmsg, "success");
						//$("#"+$acts).val('');
						//$(location).attr('href', $lodlnk);
                        swal({
						title: "Success!",
						text: sucmsg,
						type: "success",
						confirmButtonText: "OK"
						},
						function(isConfirm){
							if (isConfirm) {
								$("#"+$acts).val('');
								$(location).attr('href', $lodlnk);
					    }
					});
                        						
					}
					else if(response.rslt == "2"){
						var upmsg="Invalid email";
						swal("We are Sorry!",upmsg, "warning");
						
					}


				},

			});
		}

}
