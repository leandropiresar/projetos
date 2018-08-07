<?php
/*
 * Plugin Name: MT - Home: Practice Areas 4 Col
 * Plugin URI: http://www.matchthemes.com
 * Description: Homepage: Display Practice Areas Items 4 Col
 * Version: 1.0
 * Author: MatchThemes
 * Author URI: http://www.matchthemes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'mt_home_practice_areas' );

/*
 * Register widget.
 */
function mt_home_practice_areas() {
	register_widget( 'mt_home_practice_areas_w' );
}

/*
 * Widget class.
 */
class mt_home_practice_areas_w extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function mt_home_practice_areas_w() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mt_home_practice_areas_w', 'description' => __('Homepage: Display Practice Areas Items 4 Col', 'match') );

		/* Create the widget. */
		parent::__construct( false, __('MT - Home: Practice Areas 4 Col', 'match'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$practice_title = apply_filters('widget_practice_title', $instance['practice_title']);
		$practice_nr_items = $instance['practice_nr_items'];
		$practice_btn_title = apply_filters('widget_practice_btn_title', $instance['practice_btn_title']);
		$practice_btn_url = apply_filters('widget_practice_btn_url', $instance['practice_btn_url']);
		
		 //If the function icl_translate exist, forces the string to register for translation in String Translation.
     if ( function_exists( 'icl_translate' ) ) {
          $practice_title = icl_translate( 'wpml_custom', 'wpml_custom_practice_title_'. $widget_id, $practice_title );
		  $practice_btn_title = icl_translate( 'wpml_custom', 'wpml_custom_practice_btn_title_'. $widget_id, $practice_btn_title );
		  $practice_btn_url = icl_translate( 'wpml_custom', 'wpml_custom_practice_btn_url_'. $widget_id, $practice_btn_url );
		           
		  }
				
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
	//	if ( $title )
		//	echo $before_title . $title . $after_title;

		/* Display Widget */
		?>
        
     <section id="practice-areas" class="home-widget margin-t">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?php echo esc_html($practice_title);?></h3>
        </div><!--.col-md-12-->
      </div><!--.row-->
        
        <?php 
	$defaults = array('post_type' => 'mt_practice_areas', 'showposts' => $practice_nr_items);
	$practice_area_query = new WP_Query($defaults);
	$count = 0;

$mt_practice_items_display = ot_get_option( 'mt_practice_items_display');

?>
        
<?php if ($practice_area_query -> have_posts()) : while ($practice_area_query -> have_posts()) : $practice_area_query -> the_post();

			$get_ID = get_the_ID();

			$mt_practice_icon = get_post_meta($get_ID, "mt_practice_icon", true);
			$mt_practice_on_off = get_post_meta($get_ID, "mt_practice_on_off", true);
			$mt_practice_url = get_post_meta($get_ID, "mt_practice_url", true);
			
			if(empty($mt_practice_on_off)) $mt_practice_on_off = 'off';	
			
			if ($count % 4 == 0): ?> <div class="row"> <?php endif; ?>
             
        <div class=" col-sm-6 col-md-3">
          <div class="practice-item"><a href="<?php if( $mt_practice_on_off == 'on'): echo esc_url($mt_practice_url); else: the_permalink(); endif; ?>" <?php if( ($mt_practice_items_display == 'mt_practice_items_display_modal') && ( $mt_practice_on_off == 'off' ) ): ?> data-toggle="modal" data-target="#myModal" <?php endif; ?> >
            <div class="practice-icon"><?php echo '<i class="fa '.esc_attr($mt_practice_icon).'"></i>';?></div>
            <h5 class="practice-title"><?php the_title();?></h5>
            </a></div><!--.practice-item-->
        </div><!--.col-md-3-->
        
    <?php $count++; if(($count % 4) == 0) {?> </div><!--end row--> <?php }?>

<?php endwhile; endif; if(($count % 4) == 1 || ($count % 4) == 2  || ($count % 4) == 3) {?> </div><!--end row--> <?php } ?> 
     
     <?php if(!empty($practice_btn_url)):?> 

      <div class="view-more-holder">
        <div class="view-more"><a href="<?php echo esc_url($practice_btn_url); ?>"><?php echo esc_html($practice_btn_title); ?></a></div>
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
		'practice_title' => 'Practice Areas',
		'practice_nr_items' => '4',
		'practice_btn_title' => 'View More',
		'practice_btn_url' => '',
	
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
       <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'practice_title' )); ?>"><?php _e('Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'practice_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'practice_title' )); ?>" value="<?php echo esc_attr($instance['practice_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'practice_nr_items' )); ?>"><?php _e('Number of practice items:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'practice_nr_items' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'practice_nr_items' )); ?>" value="<?php echo esc_attr($instance['practice_nr_items']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'practice_btn_title' )); ?>"><?php _e('Button Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'practice_btn_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'practice_btn_title' )); ?>" value="<?php echo esc_attr($instance['practice_btn_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'practice_btn_url' )); ?>"><?php _e('Button URL:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'practice_btn_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'practice_btn_url' )); ?>" value="<?php echo esc_attr($instance['practice_btn_url']); ?>" style="width:100%;" />
		</p>
		
	<?php
	}
}
?>