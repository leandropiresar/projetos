<?php
/*
 * Plugin Name: MT - Home: One Video
 * Plugin URI: http://www.matchthemes.com
 * Description: Homepage: Display One Video - YouTube or Vimeo
 * Version: 1.0
 * Author: MatchThemes
 * Author URI: http://www.matchthemes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'mt_home_one_video' );

/*
 * Register widget.
 */
function mt_home_one_video() {
	register_widget( 'mt_home_one_video_w' );
}

/*
 * Widget class.
 */
class mt_home_one_video_w extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function mt_home_one_video_w() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mt_home_one_video_w', 'description' => __('Homepage: Display One Video - YouTube or Vimeo', 'match') );

		/* Create the widget. */
		parent::__construct( false, __('MT - Home:  One Video', 'match'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$one_video_title = apply_filters('widget_one_video_title', $instance['one_video_title']);
		$one_video_embed = $instance['one_video_embed'];
		
			 //If the function icl_translate exist, forces the string to register for translation in String Translation.
     if ( function_exists( 'icl_translate' ) ) {
          $one_video_title = icl_translate( 'wpml_custom', 'wpml_custom_one_video_title_'. $widget_id, $one_video_title );
		           
		  }
				
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
	//	if ( $title )
		//	echo $before_title . $title . $after_title;

		/* Display Widget */
		?>
        
     <section id="one-video" class="home-widget margin-t">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?php echo esc_html($one_video_title); ?></h3>
        </div><!--.col-md-12-->
      </div><!--.row-->
     
     
     <div class="row">   
          
<div class="col-md-12">

	<div class="video-widget">
    
    	<?php if(!empty($one_video_embed)) echo wp_oembed_get(esc_url($one_video_embed)); ?>
        
	</div>

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
		'one_video_title' => 'Video',
		'one_video_embed' => ''			
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
       <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'one_video_title' )); ?>"><?php _e('Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'one_video_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'one_video_title' )); ?>" value="<?php echo esc_attr($instance['one_video_title']); ?>" style="width:100%;" />
		</p>
        
      <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'one_video_embed' )); ?>"><?php _e('Add YouTube / Vimeo URL', 'match') ?></label>
			<textarea style="height:100px;width:100%;" id="<?php echo esc_attr($this->get_field_id( 'one_video_embed' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'one_video_embed' )); ?>"><?php echo esc_attr($instance['one_video_embed']); ?></textarea>
		</p>
		
	<?php
	}
}
?>