<?php
/*
 * Plugin Name: MT - Home: One Team Member
 * Plugin URI: http://www.matchthemes.com
 * Description: Homepage: Display One Team Member
 * Version: 1.0
 * Author: MatchThemes
 * Author URI: http://www.matchthemes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'mt_home_one_member' );

/*
 * Register widget.
 */
function mt_home_one_member() {
	register_widget( 'mt_home_one_member_w' );
}

/*
 * Widget class.
 */
class mt_home_one_member_w extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function mt_home_one_member_w() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mt_home_one_member_w', 'description' => __('Homepage: Display One Team Member', 'match') );

		/* Create the widget. */
		parent::__construct( false, __('MT - Home:  One Team Member', 'match'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$one_member_title = apply_filters('widget_one_member_title', $instance['one_member_title']);
		$one_member_name = $instance['one_member_name'];
		$one_member_btn_title = apply_filters('widget_one_member_btn_title', $instance['one_member_btn_title']);
		$one_member_btn_url = apply_filters('widget_one_member_btn_url', $instance['one_member_btn_url']);

		
		 //If the function icl_translate exist, forces the string to register for translation in String Translation.
     if ( function_exists( 'icl_translate' ) ) {
          $one_member_title = icl_translate( 'wpml_custom', 'wpml_custom_one_member_title_'. $widget_id, $one_member_title );
		  $one_member_btn_title = icl_translate( 'wpml_custom', 'wpml_custom_one_member_btn_title_'. $widget_id, $one_member_btn_title );
		  $one_member_btn_url = icl_translate( 'wpml_custom', 'wpml_custom_one_member_btn_url_'. $widget_id, $one_member_btn_url );
		           
		  }
				
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
	//	if ( $title )
		//	echo $before_title . $title . $after_title;

		/* Display Widget */
		?>
        
     <section id="meet-one-lawyer" class="home-widget margin-t">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?php echo esc_html($one_member_title); ?></h3>
        </div><!--.col-md-12-->
      </div><!--.row-->
     
     
     <div class="row">   
        <?php 
	$defaults_team = array('post_type' => 'mt_team', 'name' => $one_member_name);
	$team_query = new WP_Query($defaults_team);
	
	?>
        
<?php if ($team_query -> have_posts()) : while ($team_query -> have_posts()) : $team_query -> the_post();

			$get_item_ID = get_the_ID();

			$mt_team_twitter_url = get_post_meta($get_item_ID, "mt_team_twitter_url", true);
			$mt_team_facebook_url = get_post_meta($get_item_ID, "mt_team_facebook_url", true);
			$mt_team_gplus_url = get_post_meta($get_item_ID, "mt_team_gplus_url", true);
			$mt_team_linkedin_url = get_post_meta($get_item_ID, "mt_team_linkedin_url", true);
			$mt_team_mail = get_post_meta($get_item_ID, "mt_team_mail", true);
						
			   
	    ?>
             
    
<div class="col-md-12">

<div class="home-lawyer margin-t32">

<div class="row">

<div class=" col-sm-6 col-md-6">

<div class="lawyer-img">
<?php if ( has_post_thumbnail($get_item_ID) ){ ?>

<?php the_post_thumbnail('team-img', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

<?php } ?>
          
</div>
</div><!--.col-md-6-->

<div class=" col-sm-6 col-md-6">

<div class="lawyer-bio">

<ul class="lawyer-social">
<?php if (!empty($mt_team_twitter_url) ): ?>
              		  <li><a href="<?php echo esc_url($mt_team_twitter_url);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
             <?php endif; ?>
             
             <?php if (!empty($mt_team_facebook_url) ): ?>
                       <li><a href="<?php echo esc_url($mt_team_facebook_url);?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <?php endif; ?>
              
				<?php if (!empty($mt_team_gplus_url) ): ?>
	              <li><a href="<?php echo esc_url($mt_team_gplus_url);?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
    	          <?php endif; ?>
              
              <?php if (!empty($mt_team_linkedin_url) ): ?>
                       <li><a href="<?php echo esc_url($mt_team_linkedin_url);?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              <?php endif; ?>

              
              <?php if (!empty($mt_team_mail) ): ?>
             		 <li><a href="mailto:<?php echo esc_html($mt_team_mail);?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
              <?php endif; ?></ul>

<div class="lawyer-desc">
<?php the_content(); ?>
</div><!--.lawyer-desc-->

</div><!--.lawyer-bio-->

</div><!--.col-md-6-->

</div><!--.row-->

</div><!--.lawyer-->

</div><!--.col-md-12-->

<?php endwhile; endif; ?> 

</div><!--.row-->   

	<?php if(!empty($one_member_btn_url)):?> 

      <div class="view-more-holder">
        <div class="view-more"><a href="<?php echo esc_url($one_member_btn_url); ?>"><?php echo esc_html($one_member_btn_title); ?></a></div>
      </div>
      
  <?php endif; ?> 
      
    </div><!--.container-->
  </section>
    
	
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'one_member_title' => 'Meet Lawyer',
		'one_member_name' => '',
		'one_member_btn_title' => 'View More',
		'one_member_btn_url' => '',
	
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
       <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'one_member_title' )); ?>"><?php _e('Main Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'one_member_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'one_member_title' )); ?>" value="<?php echo esc_attr($instance['one_member_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'one_member_name' )); ?>"><?php _e('Member Name( one that you added in the Team Custom Posts ):', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'one_member_name' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'one_member_name' )); ?>" value="<?php echo esc_attr($instance['one_member_name']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'one_member_btn_title' )); ?>"><?php _e('Button Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'one_member_btn_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'one_member_btn_title' )); ?>" value="<?php echo esc_attr($instance['one_member_btn_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'one_member_btn_url' )); ?>"><?php _e('Button URL:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'one_member_btn_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'one_member_btn_url' )); ?>" value="<?php echo esc_attr($instance['one_member_btn_url']); ?>" style="width:100%;" />
		</p>
		
	<?php
	}
}
?>