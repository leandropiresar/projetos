<?php
/*
 * Plugin Name: MT - Home: Case Results 2 Cols
 * Plugin URI: http://www.matchthemes.com
 * Description: Homepage: Display case results in 2 columns
 * Version: 1.0
 * Author: MatchThemes
 * Author URI: http://www.matchthemes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'mt_home_case_results_2col' );

/*
 * Register widget.
 */
function mt_home_case_results_2col() {
	register_widget( 'mt_home_case_results_2col_w' );
}

/*
 * Widget class.
 */
class mt_home_case_results_2col_w extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function mt_home_case_results_2col_w() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mt_home_case_results_2col_w', 'description' => __('Homepage: Display case results in 2 columns', 'match') );

		/* Create the widget. */
		parent::__construct( false, __('MT - Home: Case Results 2 Cols', 'match'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$case_results_title = apply_filters('widget_case_results_title', $instance['case_results_title']);
		$case_results_nr_items = $instance['case_results_nr_items'];
		$case_results_btn_title = apply_filters('widget_case_results_btn_title', $instance['case_results_btn_title']);
		$case_results_btn_url = apply_filters('widget_case_results_btn_url', $instance['case_results_btn_url']);
				
		 //If the function icl_translate exist, forces the string to register for translation in String Translation.
     if ( function_exists( 'icl_translate' ) ) {
          $case_results_title = icl_translate( 'wpml_custom', 'wpml_custom_case_results_title_'. $widget_id, $case_results_title );
		   $case_results_btn_title = icl_translate( 'wpml_custom', 'wpml_custom_case_results_btn_title_'. $widget_id, $case_results_btn_title );
		  $case_results_btn_url = icl_translate( 'wpml_custom', 'wpml_custom_case_results_btn_url_'. $widget_id, $case_results_btn_url );
		           
		  }
				
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display Widget */
		?>
        
     <section id="case-studies-2col" class="home-widget margin-t">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?php echo esc_html($case_results_title); ?></h3>
        </div><!--.col-md-12-->
      </div><!--.row-->
        
        <?php 
	$defaults_case_results = array('post_type' => 'mt_case_results', 'showposts' => $case_results_nr_items);
	$case_results_query = new WP_Query($defaults_case_results);
	$count_case_results = 0;
?>
        
<?php if ($case_results_query -> have_posts()) : while ($case_results_query -> have_posts()) : $case_results_query -> the_post();

			$get_item_ID = get_the_ID();
			
			$mt_case_money = get_post_meta($get_item_ID, "mt_case_money", true);
			$mt_case_charges_title = get_post_meta($get_item_ID, "mt_case_charges_title", true);
			$mt_case_charges_text = get_post_meta($get_item_ID, "mt_case_charges_text", true);
			$mt_case_result_title = get_post_meta($get_item_ID, "mt_case_result_title", true);
			$mt_case_result_text = get_post_meta($get_item_ID, "mt_case_result_text", true);
						
if ($count_case_results % 2 == 0): ?> <div class="row"> <?php endif; ?>

<div class="col-sm-6 col-md-6">

<div class="case-2col">

<div class="case-2col-img">

<?php if ( has_post_thumbnail($get_item_ID) ){ ?>

<?php the_post_thumbnail('gal-img', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

<?php } ?>

<div class="case-2col-more">

<div class="mask-elem">
<div class="case-verdict"><?php echo esc_html($mt_case_money);?></div>
</div><!--.mask-elem-->

</div><!--.case-2col-more-->

</div><!--.case-2col-img-->

<h4 class="case-2col-title"><?php the_title();?></h4>

<div class="row">

<div class="col-sm-6 col-md-6">

<div class="case-description">

<h5 class="single-subtitle"><?php echo esc_html($mt_case_charges_title);?></h5>

<p><?php echo $mt_case_charges_text;?></p>

</div><!--.case-description-->

</div><!--.col-md-6-->

<div class="col-sm-6 col-md-6">

<div class="case-description">

<h5 class="single-subtitle"><?php echo esc_html($mt_case_result_title);?></h5>

<p><?php echo $mt_case_result_text;?></p>


</div><!--.case-description-->

</div><!--.col-md-6-->

</div><!--.row-->


</div><!--.case-2col-->

</div><!--.col-md-6-->

<?php $count_case_results++; if(($count_case_results % 2) == 0) {?> </div><!--end row--> <?php }?>

<?php endwhile; endif; if(($count_case_results % 2) == 1 ) {?> </div><!--end row--><?php } ?> 

 </div><!--.container-->
 
 <?php if(!empty($case_results_btn_url)):?> 

      <div class="view-more-holder">
        <div class="view-more"><a href="<?php echo esc_url($case_results_btn_url); ?>"><?php echo esc_html($case_results_btn_title); ?></a></div>
      </div>
      
  <?php endif; ?> 
  
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
		'case_results_title' => 'Case Results',
		'case_results_nr_items' => '2',
		'case_results_btn_title' => 'View More',
		'case_results_btn_url' => '',
			);
			
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
       <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'case_results_title' )); ?>"><?php _e('Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'case_results_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'case_results_title' )); ?>" value="<?php echo esc_attr($instance['case_results_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'case_results_nr_items' )); ?>"><?php _e('Number of case results:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'case_results_nr_items' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'case_results_nr_items' )); ?>" value="<?php echo esc_attr($instance['case_results_nr_items']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'case_results_btn_title' )); ?>"><?php _e('Button Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'case_results_btn_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'case_results_btn_title' )); ?>" value="<?php echo esc_attr($instance['case_results_btn_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'case_results_btn_url' )); ?>"><?php _e('Button URL:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'case_results_btn_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'case_results_btn_url' )); ?>" value="<?php echo esc_attr($instance['case_results_btn_url']); ?>" style="width:100%;" />
		</p>
        
	<?php
	}
}
?>