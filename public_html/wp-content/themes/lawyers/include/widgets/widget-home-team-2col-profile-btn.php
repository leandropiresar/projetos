<?php
/*
 * Plugin Name: MT - Home: Team 2 Col w/ Profile Btn
 * Plugin URI: http://www.matchthemes.com
 * Description: Homepage: Display team members in 2 columns each with profile button
 * Version: 1.0
 * Author: MatchThemes
 * Author URI: http://www.matchthemes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'mt_home_team_2col_profile' );

/*
 * Register widget.
 */
function mt_home_team_2col_profile() {
	register_widget( 'mt_home_team_2col_profile_w' );
}

/*
 * Widget class.
 */
class mt_home_team_2col_profile_w extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function mt_home_team_2col_profile_w() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mt_home_team_2col_profile_w', 'description' => __('Homepage: Display team members in 2 columns each with profile button', 'match') );

		/* Create the widget. */
		parent::__construct( false, __('MT - Home: Team 2 Col w/ Profile Btn', 'match'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$team_title = apply_filters('widget_team_title', $instance['team_title']);
		$team_nr_items = $instance['team_nr_items'];
				
		 //If the function icl_translate exist, forces the string to register for translation in String Translation.
     if ( function_exists( 'icl_translate' ) ) {
          $team_title = icl_translate( 'wpml_custom', 'wpml_custom_team_title_'. $widget_id, $team_title );
		           
		  }
				
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
	//	if ( $title )
		//	echo $before_title . $title . $after_title;

		/* Display Widget */
		?>
        
     <section id="meet-lawyers-2col" class="home-widget margin-t">
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
						
			if ($count_team % 2 == 0): ?> <div class="row"> <?php endif; ?>
             
         <div class="col-md-6">
          <div class="lawyer-holder">
          
          <?php if ( has_post_thumbnail($get_item_ID) ){ ?>
          
          <a href="<?php the_permalink(); ?>">

<?php the_post_thumbnail('team-img', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

		</a>

<?php } ?>

		
          
            <h5 class="lawyer-title"><?php the_title(); ?></h5>
    	
        <?php the_excerpt(); ?>
        
        <div class="view-more margin-t32"><a href="<?php the_permalink(); ?>"><?php _e('View Profile', 'match') ?></a></div>
    		
          </div><!--.lawyer-holder-->
        </div><!--.col-md-6-->
        
      <?php $count_team++; if(($count_team % 2) == 0) {?> </div><!--end row--> <?php }?>

<?php endwhile; endif; if(($count_team % 2) == 1 ) {?> </div><!--end row--> <?php } ?> 

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
		'team_title' => 'Meet the Lawyers',
		'team_nr_items' => '2'
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
        
	<?php
	}
}
?>