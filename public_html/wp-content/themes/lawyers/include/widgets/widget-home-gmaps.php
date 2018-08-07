<?php
/*
 * Plugin Name: MT - Home: Google Maps
 * Plugin URI: http://www.matchthemes.com
 * Description: Homepage: Display Google Maps
 * Version: 1.0
 * Author: MatchThemes
 * Author URI: http://www.matchthemes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'mt_home_gmaps' );

/*
 * Register widget.
 */
function mt_home_gmaps() {
	register_widget( 'mt_home_gmaps_w' );
}

/*
 * Widget class.
 */
class mt_home_gmaps_w extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function mt_home_gmaps_w() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mt_home_gmaps_w', 'description' => __('Homepage: Display Google Maps', 'match') );

		/* Create the widget. */
		parent::__construct( false, __('MT - Home: Google Maps', 'match'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$gmaps_title = apply_filters('widget_gmaps_title', $instance['gmaps_title']);
		$gmaps_embed = $instance['gmaps_embed'];
		
			 //If the function icl_translate exist, forces the string to register for translation in String Translation.
     if ( function_exists( 'icl_translate' ) ) {
          $gmaps_title = icl_translate( 'wpml_custom', 'wpml_custom_gmaps_title_'. $widget_id, $gmaps_title );
		           
		  }
				
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
	//	if ( $title )
		//	echo $before_title . $title . $after_title;

		/* Display Widget */
		?>
        
     <section id="home-gmaps" class="home-widget margin-t">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?php echo esc_html($gmaps_title); ?></h3>
        </div><!--.col-md-12-->
      </div><!--.row-->
     
     
     <div class="row">   
          
<div class="col-md-12">

        <?php
		if (!empty($gmaps_embed) ): ?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.gomap-1.3.3.min.js"></script>

<div class="video-widget">
<div id="gmap"> </div>
</div>

<script type="text/javascript"> 
				jQuery(document).ready(function($) {
				    
					$("#gmap").goMap({ 
				        markers: [{  
				            address: '<?php echo esc_html($gmaps_embed); ?>', 
							icon: '<?php echo get_template_directory_uri(); ?>/images/pin.png',
							html: ''
				        }],
						disableDoubleClickZoom: true,
						zoom: 15,
						maptype: 'ROADMAP'
				    }); 
					
				});
				</script>

<?php endif; ?>
        
</div><!--.col-md-12-->

</div><!--.row-->    

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
		'gmaps_title' => 'Our Location',
		'gmaps_embed' => stripslashes( '')
			
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
       <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'gmaps_title' )); ?>"><?php _e('Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'gmaps_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'gmaps_title' )); ?>" value="<?php echo esc_attr($instance['gmaps_title']); ?>" style="width:100%;" />
		</p>
        
      <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'gmaps_embed' )); ?>"><?php _e('Add your Address', 'match') ?></label>
			<textarea style="height:100px;width:100%;" id="<?php echo esc_attr($this->get_field_id( 'gmaps_embed' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'gmaps_embed' )); ?>"><?php echo esc_attr($instance['gmaps_embed']); ?></textarea>
		</p>
		
	<?php
	}
}
?>