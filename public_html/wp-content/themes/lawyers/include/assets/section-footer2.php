<?php 

	$mt_social_facebook_url = ot_get_option( 'mt_social_facebook_url');
	$mt_social_twitter_url = ot_get_option( 'mt_social_twitter_url');
	$mt_social_gplus_url = ot_get_option( 'mt_social_gplus_url');
	$mt_social_linkedin_url = ot_get_option( 'mt_social_linkedin_url'); 
	$mt_social_youtube_url = ot_get_option( 'mt_social_youtube_url'); 
	$mt_social_vimeo_url = ot_get_option( 'mt_social_vimeo_url');
	
	$mt_footer_copy = ot_get_option( 'mt_footer_copy'); 
		
?>

<footer id="footer-var2">
  <div id="footer-content">
    <div class="container">
     <div class="row">
     
     <div class="col-md-4">
	<div class="foo-block">
	<?php dynamic_sidebar('footer-one'); ?>
	</div><!--end foo-block-->
	</div><!--end col-md-4-->
    
    <div class="col-md-4">
	<div class="foo-block">
	<?php dynamic_sidebar('footer-two'); ?>
	</div><!--end foo-block-->
	</div><!--end col-md-4-->
    
    <div class="col-md-4">
	<div class="foo-block">
	<?php dynamic_sidebar('footer-three'); ?>
	</div><!--end foo-block-->
	</div><!--end col-md-4-->
 
     </div><!--.row-->
  
   
      <ul class="footer-social alignc"> 
         <?php if (!empty($mt_social_facebook_url) ): ?>
                       <li><a href="<?php echo esc_url($mt_social_facebook_url);?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <?php endif; ?>
              
         <?php if (!empty($mt_social_twitter_url) ): ?>
                       <li><a href="<?php echo esc_url($mt_social_twitter_url);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <?php endif; ?>
        
        
       <?php if (!empty($mt_social_gplus_url) ): ?>
                       <li><a href="<?php echo esc_url($mt_social_gplus_url);?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <?php endif; ?>
              
        <?php if (!empty($mt_social_linkedin_url) ): ?>
                       <li><a href="<?php echo esc_url($mt_social_linkedin_url);?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              <?php endif; ?>
              
        <?php if (!empty($mt_social_youtube_url) ): ?>
                       <li><a href="<?php echo esc_url($mt_social_youtube_url);?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
              <?php endif; ?>
              
         <?php if (!empty($mt_social_vimeo_url) ): ?>
                       <li><a href="<?php echo esc_url($mt_social_vimeo_url);?>" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
              <?php endif; ?>
              
      </ul>
      <p class="foo-copyright alignc"><?php echo esc_html($mt_footer_copy); ?></p>
    </div>
    <!--.container-->
  </div>
  <!-- end footer-content-->
</footer>