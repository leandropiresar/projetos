<?php
/*
 * Plugin Name: MT - Home: Testimonials
 * Plugin URI: http://www.matchthemes.com
 * Description: Homepage: Display Testimonials
 * Version: 1.0
 * Author: MatchThemes
 * Author URI: http://www.matchthemes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'mt_home_testimonials' );

/*
 * Register widget.
 */
function mt_home_testimonials() {
	register_widget( 'mt_home_testimonials_w' );
}

/*
 * Widget class.
 */
class mt_home_testimonials_w extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function mt_home_testimonials_w() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mt_home_testimonials_w', 'description' => __('Homepage: Display Testimonials', 'match') );

		/* Create the widget. */
		parent::__construct( false, __('MT - Home: Testimonials', 'match'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$testimonials_title = apply_filters('widget_title', $instance['testimonials_title']);
		$testimonials_nr_items = $instance['testimonials_nr_items'];
		
		 //If the function icl_translate exist, forces the string to register for translation in String Translation.
     if ( function_exists( 'icl_translate' ) ) {
          $testimonials_title = icl_translate( 'wpml_custom', 'wpml_custom_testimonials_title_'. $widget_id, $testimonials_title );
		           
		  }
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
	//	if ( $title )
		//	echo $before_title . $title . $after_title;

		/* Display Widget */
		?>
        
    <section id="testimonials-home" class="home-widget margin-t">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?php echo esc_html($testimonials_title); ?></h3>
          
          <div class="flex-container">
          <div class="flexslider flexslider-testimonials">
            <ul class="slides">
            
            <?php 
	$defaults_testimonials = array('post_type' => 'mt_testimonials', 'showposts' => $testimonials_nr_items);
	$testimonials_query = new WP_Query($defaults_testimonials);

	 if ($testimonials_query -> have_posts()) : while ($testimonials_query -> have_posts()) : $testimonials_query -> the_post();

			$get_item_ID = get_the_ID();

			$mt_testimonial_client_name = get_post_meta($get_item_ID, "mt_testimonial_client_name", true);
			$mt_testimonial_client_company = get_post_meta($get_item_ID, "mt_testimonial_client_company", true);
			$mt_testimonial_client_img = get_post_meta($get_item_ID, "mt_testimonial_client_img", true);
			
			$content = get_the_content();
			
	    ?>
              <li>
                <div class="row">
                  <div class="col-sm-8 col-md-8">
                    <div class="testimonial-desc">
                      <h5><i class="fa fa-quote-left fa-2x pull-left"></i><?php echo $content; ?></h5>
                    </div><!--.testimonial-desc-->
                  </div><!--.col-md-8-->
                  <div class="col-sm-4 col-md-4">
                    <div class="testimonial-client alignc"> <img src="<?php echo esc_url($mt_testimonial_client_img); ?>" alt=""/>
                      <p><strong><?php echo $mt_testimonial_client_name; ?></strong> <?php echo esc_html($mt_testimonial_client_company); ?></p>
                    </div><!--.testimonial-client-->
                  </div><!--.col-md-4-->
                </div><!--.row-->
              </li>
              
             <?php endwhile;endif; ?> 
         
            </ul>
          </div><!-- flexslider-->
           </div><!--flex-container-->
        </div><!--.col-md-12-->
      </div><!--.row-->
    </div><!--.container-->
  </section><!--#testimonials-home-->
        
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
		'testimonials_title' => 'Testimonials',
		'testimonials_nr_items' => '3'
	
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
       <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'testimonials_title' )); ?>"><?php _e('Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'testimonials_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'testimonials_title' )); ?>" value="<?php echo esc_attr($instance['testimonials_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'testimonials_nr_items' )); ?>"><?php _e('Number of testimonials:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'testimonials_nr_items' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'testimonials_nr_items' )); ?>" value="<?php echo esc_attr($instance['testimonials_nr_items']); ?>" style="width:100%;" />
		</p>
       
	<?php
	}
}
?>