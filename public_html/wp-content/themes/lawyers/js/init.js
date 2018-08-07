/*
 * Lawyers - WP Theme
 *
 * Author: www.matchthemes.com
 *
 */
 
(function($) {
    "use strict";
	
	$(".gal-img a[rel^='prettyPhoto']").prettyPhoto({
						animation_speed: 'normal',
						autoplay_slideshow: true,
						slideshow: 3000
					});
	
	
$('.faq-section').hide();
$('h5.faq-title:first').addClass('active').next().show();

$('h5.faq-title').on('click', function(){

  if( $(this).next().is(':hidden') ) {
  
  $('h5.faq-title').removeClass('active').next().slideUp(); 
  $(this).toggleClass('active').next().slideDown();
  
  } else {
   $('h5.faq-title').removeClass('active').next().slideUp();
 }
  return false; 
 });

$('#myModal').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
$(this).find('.modal-body').html('');
});

$(".scrollup").hide();
     $(window).on('scroll', function() {
         if ($(this).scrollTop() > 400) {
             $('.scrollup').fadeIn();
         } else {
             $('.scrollup').fadeOut();
         }
     });

$("a.scrolltop[href^='#']").on('click', function(e) {
   e.preventDefault();
   var hash = this.hash;
   $('html, body').stop().animate({scrollTop:0}, 1000, 'easeOutExpo');

});

//fluid width videos

$('.blog-post-single, .custom-page-template').fitVids({customSelector: "iframe[src^='https://w.soundcloud.com']"});

})(jQuery);