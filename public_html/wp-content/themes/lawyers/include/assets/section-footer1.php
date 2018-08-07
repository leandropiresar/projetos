<?php $mt_footer_title = ot_get_option( 'mt_footer_title'); 
	$mt_footer_subtitle = ot_get_option( 'mt_footer_subtitle'); 
	$mt_footer_copy = ot_get_option( 'mt_footer_copy'); 


	$mt_social_facebook_url = ot_get_option( 'mt_social_facebook_url');
	$mt_social_twitter_url = ot_get_option( 'mt_social_twitter_url');
	$mt_social_gplus_url = ot_get_option( 'mt_social_gplus_url');
	$mt_social_linkedin_url = ot_get_option( 'mt_social_linkedin_url'); 
	$mt_social_youtube_url = ot_get_option( 'mt_social_youtube_url'); 
	$mt_social_vimeo_url = ot_get_option( 'mt_social_vimeo_url'); 
		
?>

<footer id="footer-var1">
  <div id="footer-content">
    <div class="container">
      <h3 class="footer-title alignc"><?php echo esc_html($mt_footer_title); ?></h3>
      <h5 class="footer-subtitle alignc"><?php echo esc_html($mt_footer_subtitle); ?></h5>
      <div class="row">
        <div class="col-md-12">
          <div id="evaluation-form-holder">
            <form method="post" id="evaluation-form" action="<?php echo get_template_directory_uri();?>/include/evaluation-process.php">
              <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-2">
                  <p>
                    <input type="text" name="nameeval" class="contact-field" placeholder="<?php _e('Name', 'match')?>" />
                  </p>
                  <p>
                    <input type="text" name="emaileval" class="contact-field" placeholder="<?php _e('Email', 'match')?>" />
                  </p>
                  <p>
                    <input type="text" name="subjecteval" class="contact-field" placeholder="<?php _e('Subject', 'match')?>" />
                  </p>
                  
                  <p class="antispam">Leave this empty: <input type="text" name="url" /></p>
                  
                </div>
                <!--.col-md-4-->
                <div class="col-sm-6 col-md-4">
                  <p>
                    <textarea name="messageeval" id="msg-evaluation" rows="4" placeholder="<?php _e('Tell us about your case', 'match')?>"></textarea>
                  </p>
                  <p class="evaluation-btn">
                    <input type="submit" value="<?php _e('Submit message', 'match')?>" id="submit-evaluation" />
                  </p>
                </div>
                <!--.col-md-4-->
              </div>
              <!--.row-->
            </form>
          </div>
          <!-- end evaluation-form-holder-->
          <div id="output-evaluation" class="alignc"></div>
        </div>
        <!--.col-md-12-->
      </div>
      <!--.row-->
  
   
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