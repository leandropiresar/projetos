<?php
/*
 * Plugin Name: MT - Home: 3 Feature Boxes
 * Plugin URI: http://www.matchthemes.com
 * Description: Homepage: Display 3 Featured Boxes
 * Version: 1.0
 * Author: MatchThemes
 * Author URI: http://www.matchthemes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'mt_home_3_feature_boxes' );

/*
 * Register widget.
 */
function mt_home_3_feature_boxes() {
	register_widget( 'mt_home_3_feature_boxes_w' );
}

/*
 * Widget class.
 */
class mt_home_3_feature_boxes_w extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function mt_home_3_feature_boxes_w() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mt_home_3_feature_boxes_w', 'description' => __('Homepage: Display 3 Feature Boxes', 'match') );

		/* Create the widget. */
		parent::__construct( false, __('MT - Home: 3 Feature Boxes', 'match'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$feature3_title = apply_filters('widget_feature3_title', $instance['feature3_title']);
		$feature3_box1_title = apply_filters('widget_feature3_box1_title', $instance['feature3_box1_title']);
		
		$feature3_box1_icon = $instance['feature3_box1_icon'];
		
		
		
		
		$feature3_box1_text = apply_filters('widget_feature3_box1_text', $instance['feature3_box1_text']);
		$feature3_box2_title = apply_filters('widget_feature3_box2_title', $instance['feature3_box2_title']); 
		$feature3_box2_icon = $instance['feature3_box2_icon'];
		$feature3_box2_text = apply_filters('widget_feature3_box2_text', $instance['feature3_box2_text']);
		$feature3_box3_title = apply_filters('widget_feature3_box3_title', $instance['feature3_box3_title']);
		$feature3_box3_icon = $instance['feature3_box3_icon'];
		$feature3_box3_text = apply_filters('widget_feature3_box3_text', $instance['feature3_box3_text']);
		
		//If the function icl_translate exist, forces the string to register for translation in String Translation.
	    if ( function_exists( 'icl_translate' ) ) {
        $feature3_title = icl_translate( 'wpml_custom', 'wpml_custom_feature3_title_'. $widget_id, $feature3_title );
		$feature3_box1_title = icl_translate( 'wpml_custom', 'wpml_custom_feature3_box1_title_'. $widget_id, $feature3_box1_title );
		$feature3_box1_text = icl_translate( 'wpml_custom', 'wpml_custom_feature3_box1_text_'. $widget_id, $feature3_box1_text );
		$feature3_box2_title = icl_translate( 'wpml_custom', 'wpml_custom_feature3_box2_title_'. $widget_id, $feature3_box2_title );
		$feature3_box2_text = icl_translate( 'wpml_custom', 'wpml_custom_feature3_box2_text_'. $widget_id, $feature3_box2_text );
		$feature3_box3_title = icl_translate( 'wpml_custom', 'wpml_custom_feature3_box3_title_'. $widget_id, $feature3_box3_title );
		$feature3_box3_text = icl_translate( 'wpml_custom', 'wpml_custom_feature3_box3_text_'. $widget_id, $feature3_box3_text );
			}
					
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
	//	if ( $title )
		//	echo $before_title . $title . $after_title;

		/* Display Widget */
		?>
        
     <section id="feature-boxes-3" class="home-widget margin-t">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        
          <h3 class="section-title"><?php echo esc_html($feature3_title);?></h3>
        </div><!--.col-md-12-->
      </div><!--.row-->
      
      <div class="row">

		<div class="col-md-4">
		<div class="inside-process">
         <div class="circle-icon"><?php echo '<i class="fa '.esc_attr($feature3_box1_icon).'"></i>';?></div>
         <h5 class="circle-title margin-b32"><?php echo esc_html($feature3_box1_title);?></h5>
         
         <p><?php echo esc_html($feature3_box1_text);?></p>
         </div><!--.inside-process-->

		</div><!--.col-md-4-->
        
        <div class="col-md-4">
		<div class="inside-process">
         <div class="circle-icon"><?php echo '<i class="fa '.esc_attr($feature3_box2_icon).'"></i>';?></div>
         <h5 class="circle-title margin-b32"><?php echo esc_html($feature3_box2_title);?></h5>
         
         <p><?php echo esc_html($feature3_box2_text);?></p>
         </div><!--.inside-process-->

		</div><!--.col-md-4-->
        
        <div class="col-md-4">
		<div class="inside-process">
         <div class="circle-icon"><?php echo '<i class="fa '.esc_attr($feature3_box3_icon).'"></i>';?></div>
         <h5 class="circle-title margin-b32"><?php echo esc_html($feature3_box3_title);?></h5>
         
         <p><?php echo esc_html($feature3_box3_text);?></p>
         </div><!--.inside-process-->

		</div><!--.col-md-4-->

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
		'feature3_title' => 'Our Process',
		'feature3_box1_title' => '',
		'feature3_box1_icon' => 'fa-comments',
		'feature3_box1_text' => '',
		'feature3_box2_title' => '',
		'feature3_box2_icon' => 'fa-eye',
		'feature3_box2_text' => '',
		'feature3_box3_title' => '',
		'feature3_box3_icon' => 'fa-money',
		'feature3_box3_text' => ''
	
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
       <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'feature3_title' )); ?>"><?php _e('Main Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'feature3_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feature3_title' )); ?>" value="<?php echo esc_attr($instance['feature3_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'feature3_box1_title' )); ?>"><?php _e('Box 1 Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'feature3_box1_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feature3_box1_title' )); ?>" value="<?php echo esc_attr($instance['feature3_box1_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'feature3_box1_icon' )); ?>"><?php _e('Box 1 Icon (for more info visit http://fortawesome.github.io/Font-Awesome/icons/ ):', 'match') ?></label>
            
            	<textarea style="height:25px;width:100%;" id="<?php echo esc_attr($this->get_field_id( 'feature3_box1_icon' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feature3_box1_icon' )); ?>"><?php echo esc_attr($instance['feature3_box1_icon']); ?></textarea>
                
			
		</p>
        
      <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'feature3_box1_text' )); ?>"><?php _e('Box 1 Text:', 'match') ?></label>
			<textarea style="height:120px;width:100%;" id="<?php echo esc_attr($this->get_field_id( 'feature3_box1_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feature3_box1_text' )); ?>"><?php echo esc_attr($instance['feature3_box1_text']); ?></textarea>
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'feature3_box2_title' )); ?>"><?php _e('Box 2 Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'feature3_box2_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feature3_box2_title' )); ?>" value="<?php echo esc_attr($instance['feature3_box2_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'feature3_box2_icon' )); ?>"><?php _e('Box 2 Icon (for more info visit http://fortawesome.github.io/Font-Awesome/icons/ ):', 'match') ?></label>
			<textarea style="height:25px;width:100%;" id="<?php echo esc_attr($this->get_field_id( 'feature3_box2_icon' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feature3_box2_icon' )); ?>"><?php echo esc_attr($instance['feature3_box2_icon']); ?></textarea>
		</p>
        
      <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'feature3_box2_text' )); ?>"><?php _e('Box 2 Text:', 'match') ?></label>
			<textarea style="height:120px;width:100%;" id="<?php echo esc_attr($this->get_field_id( 'feature3_box2_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feature3_box2_text' )); ?>"><?php echo esc_attr($instance['feature3_box2_text']); ?></textarea>
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'feature3_box3_title' )); ?>"><?php _e('Box 3 Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'feature3_box3_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feature3_box3_title' )); ?>" value="<?php echo esc_attr($instance['feature3_box3_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'feature3_box3_icon' )); ?>"><?php _e('Box 3 Icon (for more info visit http://fortawesome.github.io/Font-Awesome/icons/ ):', 'match') ?></label>
			<textarea style="height:25px;width:100%;" id="<?php echo esc_attr($this->get_field_id( 'feature3_box3_icon' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feature3_box3_icon' )); ?>"><?php echo esc_attr($instance['feature3_box3_icon']); ?></textarea>
		</p>
        
      <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'feature3_box3_text' )); ?>"><?php _e('Box 3 Text:', 'match') ?></label>
			<textarea style="height:120px;width:100%;" id="<?php echo esc_attr($this->get_field_id( 'feature3_box3_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feature3_box3_text' )); ?>"><?php echo esc_attr($instance['feature3_box3_text']); ?></textarea>
		</p>
		
	<?php
	}
}
?>