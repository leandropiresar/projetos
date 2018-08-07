<?php
/*
Template Name: Home

*/
?>

<?php get_header(); ?>

<?php $mt_slider_on_off = ot_get_option( 'mt_slider_on_off', 'on');

	if($mt_slider_on_off == 'on'):
 ?>

<section id="slider-home">
<div class="flex-container-home">
    <div class="flexslider flexslider-home">
    <ul class="slides">
    
     <?php
	    $mt_slides = ot_get_option( 'mt_slides', array() ); 
		
		if(!empty($mt_slides)) :
                                                
		foreach( $mt_slides as $mt_slide ) {      
		
		?>
        
        <li>
        	<?php if(!empty($mt_slide['mt_slide_url'])) : ?> 
            
            <a href="<?php echo esc_url($mt_slide['mt_slide_url']); ?>">
            
            <?php endif; ?>
        
         <img src="<?php echo esc_url($mt_slide['mt_slide_image']); ?>" alt="" />
          <div class="flex-caption">
            <h2><?php echo $mt_slide['mt_caption_title']; ?></h2>
            <h4><?php echo $mt_slide['mt_caption_subtitle']; ?></h4>
          </div>
          
          <?php if(!empty($mt_slide['mt_slide_url'])) : ?> 
            
            </a>
            
		  <?php endif; ?>
            
          </li>
    
	<?php  }//end foreach 
	
		endif;
	 ?>	
    
    </ul>
    </div><!-- flexslider-->
    </div><!-- flex-container-->
  </section><!--slider-home-->
  
<?php endif;?> 

	<?php 	/* Widgetized homepage, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage') ) : ?>
			
	<?php endif; ?>
   
</div><!--end main-->    
    
<?php 

$mt_practice_items_display = ot_get_option( 'mt_practice_items_display');

if($mt_practice_items_display == 'mt_practice_items_display_modal'):

 ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">
   <div class="modal-content">
  
   </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

</div><!-- /.modal -->

<?php endif; ?>

<?php get_footer(); ?>