<?php
/*
 * Plugin Name: MT - Home: Team 4 Columns
 * Plugin URI: http://www.matchthemes.com
 * Description: Homepage: Display team members in 4 columns
 * Version: 1.0
 * Author: MatchThemes
 * Author URI: http://www.matchthemes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'mt_home_team' );

/*
 * Register widget.
 */
function mt_home_team() {
	register_widget( 'mt_home_team_w' );
}

/*
 * Widget class.
 */
class mt_home_team_w extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function mt_home_team_w() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mt_home_team_w', 'description' => __('Homepage: Display team members in 4 columns', 'match') );

		/* Create the widget. */
		parent::__construct( false, __('MT - Home: Team 4 Columns', 'match'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$team_title = apply_filters('widget_team_title', $instance['team_title']);
		$team_nr_items = $instance['team_nr_items'];
		$team_btn_title = apply_filters('widget_team_btn_title', $instance['team_btn_title']);
		$team_btn_url = apply_filters('widget_team_btn_url', $instance['team_btn_url']);
		
		 //If the function icl_translate exist, forces the string to register for translation in String Translation.
     if ( function_exists( 'icl_translate' ) ) {
          $team_title = icl_translate( 'wpml_custom', 'wpml_custom_team_title_'. $widget_id, $team_title );
		  $team_btn_title = icl_translate( 'wpml_custom', 'wpml_custom_team_btn_title_'. $widget_id, $team_btn_title );
		  $team_btn_url = icl_translate( 'wpml_custom', 'wpml_custom_team_btn_url_'. $widget_id, $team_btn_url );
		           
		  }
				
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
	//	if ( $title )
		//	echo $before_title . $title . $after_title;

		/* Display Widget */
		?>
        
     <section id="meet-lawyers" class="home-widget margin-t">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?php echo esc_html($team_title); ?></h3>
        </div><!--.col-md-12-->
      </div><!--.row-->
        
        <?php 
	$defaults_team = array('post_type' => 'mt_team', 'showposts' => $team_nr_items);
	$team_query = new WP_Query($defaults_team);
	$count_team = 0;
?>
        
<?php if ($team_query -> have_posts()) : while ($team_query -> have_posts()) : $team_query -> the_post();

			$get_item_ID = get_the_ID();

			$mt_team_twitter_url = get_post_meta($get_item_ID, "mt_team_twitter_url", true);
			$mt_team_facebook_url = get_post_meta($get_item_ID, "mt_team_facebook_url", true);
			$mt_team_gplus_url = get_post_meta($get_item_ID, "mt_team_gplus_url", true);
			$mt_team_linkedin_url = get_post_meta($get_item_ID, "mt_team_linkedin_url", true);
			$mt_team_mail = get_post_meta($get_item_ID, "mt_team_mail", true);
						
			if ($count_team % 4 == 0):  ?> <div class="row"> <?php endif; ?>
             
   		  <div class="col-sm-6 col-md-3">
          <div class="lawyer-holder">
          
          <?php if ( has_post_thumbnail($get_item_ID) ){ ?>
          
          <a href="<?php the_permalink(); ?>">

<?php the_post_thumbnail('team-img', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

		</a>

<?php } ?>
          
            <h5 class="lawyer-title"><?php the_title(); ?></h5>
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
              <?php endif; ?>
              
            </ul>
          </div><!--.lawyer-holder-->
        </div><!--.col-md-3-->
        
    <?php $count_team++; if(($count_team % 4) == 0) {?> </div><!--end row--> <?php }?>

<?php endwhile; endif; if(($count_team % 4) == 1 || ($count_team % 4) == 2  || ($count_team % 4) == 3) {?> </div><!--end row--> <?php } ?> 
     
<?php if(!empty($team_btn_url)):?> 

      <div class="view-more-holder">
        <div class="view-more"><a href="<?php echo esc_url($team_btn_url); ?>"><?php echo esc_html($team_btn_title); ?></a></div>
      </div>
      
  <?php endif; ?> 

  </div><!--container-->
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
		'team_title' => 'Meet the Lawyers',
		'team_nr_items' => '4',
		'team_btn_title' => 'View More',
		'team_btn_url' => '',
	
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
       <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'team_title' )); ?>"><?php _e('Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'team_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'team_title' )); ?>" value="<?php echo esc_attr($instance['team_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'team_nr_items' )); ?>"><?php _e('Number of team members:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'team_nr_items' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'team_nr_items' )); ?>" value="<?php echo esc_attr($instance['team_nr_items']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'team_btn_title' )); ?>"><?php _e('Button Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'team_btn_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'team_btn_title' )); ?>" value="<?php echo esc_attr($instance['team_btn_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'team_btn_url' )); ?>"><?php _e('Button URL:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'team_btn_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'team_btn_url' )); ?>" value="<?php echo esc_attr($instance['team_btn_url']); ?>" style="width:100%;" />
		</p>
		
	<?php
	}
}
?>