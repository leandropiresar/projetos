<?php 

function mt_slider_custom() {

$mt_slides_autoplay = ot_get_option( 'mt_slides_autoplay', 'on');

if($mt_slides_autoplay == 'on'):

	$mt_autoplay = 1;

else:

	$mt_autoplay = 0;

endif;

$mt_slides_speed = ot_get_option( 'mt_slides_speed', '4000');
$mt_slide_transition = ot_get_option( 'mt_slide_transition', 'fade');

$mt_testim_speed = ot_get_option( 'mt_testim_speed', '4000');
$mt_testim_transition = ot_get_option( 'mt_testim_transition', 'slide');

?>

<script type="text/javascript">
      (function($) {
    "use strict";
	
	$('.flexslider-home').flexslider({
			animation: "<?php echo $mt_slide_transition;?>",
			slideshow: <?php echo $mt_autoplay;?>,
			slideshowSpeed: <?php echo intval($mt_slides_speed);?>,
			animationSpeed: 600,
            controlsContainer: ".flex-container-home",
			directionNav: true,
			controlNav: false,
			useCSS: false
									
					});
                    
   	$('.flexslider-testimonials').flexslider({
			animation: "<?php echo $mt_testim_transition;?>",
			slideshow: true,
			slideshowSpeed: <?php echo intval($mt_testim_speed);?>,
			animationSpeed: 600, 
            smoothHeight: true,
            controlsContainer: ".flex-container",
			directionNav: false,
			controlNav: true,
			useCSS: false
									
					});
           
  })(jQuery);
</script>

<?php
}
add_action( 'wp_footer', 'mt_slider_custom', 30);
?>