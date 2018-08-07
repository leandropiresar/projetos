<?php
/*
 * Plugin Name: MT - Home: Recent Articles
 * Plugin URI: http://www.matchthemes.com
 * Description: Homepage: Display Recent Articles
 * Version: 1.0
 * Author: MatchThemes
 * Author URI: http://www.matchthemes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'mt_home_recent_articles' );

/*
 * Register widget.
 */
function mt_home_recent_articles() {
	register_widget( 'mt_home_recent_articles_w' );
}

/*
 * Widget class.
 */
class mt_home_recent_articles_w extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function mt_home_recent_articles_w() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mt_home_recent_articles_w', 'description' => __('Homepage: Display Recent Articles', 'match') );

		/* Create the widget. */
		parent::__construct( false, __('MT - Home: Recent Articles', 'match'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$articles_title = apply_filters('widget_articles_title', $instance['articles_title']);
		$articles_nr_items = $instance['articles_nr_items'];
		
		 //If the function icl_translate exist, forces the string to register for translation in String Translation.
     if ( function_exists( 'icl_translate' ) ) {
          $articles_title = icl_translate( 'wpml_custom', 'wpml_custom_articles_title_'. $widget_id, $articles_title );
		  		           
		  }
						
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
	//	if ( $title )
		//	echo $before_title . $title . $after_title;

		/* Display Widget */
		?>
        
     <section id="recent-articles" class="home-widget margin-t">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?php echo esc_html($articles_title); ?></h3>
        </div><!--.col-md-12-->
      </div><!--.row-->
        
        <?php 
	$defaults_articles = array('post_type' => 'post', 'showposts' => $articles_nr_items);
	$articles_query = new WP_Query($defaults_articles);
	$count_articles = 0;
?>
        
<?php if ($articles_query -> have_posts()) : while ($articles_query -> have_posts()) : $articles_query -> the_post();

			$get_ID = get_the_ID();

			if ($count_articles % 3 == 0):
	   
	    ?>
             
      <div class="row">
         <div class="col-md-4">
          <div class="articles-holder">
          
          <?php if ( has_post_thumbnail($get_ID) ){ ?>

<?php the_post_thumbnail('gal-img', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

<?php } ?>
          
            <h5 class="articles-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
            
            <ul class="blog-date"><li><i class="fa fa-calendar"></i> <?php echo get_the_date(get_option('date_format')); ?></li></ul>
            
            <?php the_excerpt();?>
            
            <div class="read-more-button"><a href="<?php the_permalink() ?>"><?php _e('Read More', 'match')?></a></div>
            
          </div><!--.articles-holder-->
        </div><!--.col-md-4-->
        
      <?php	else : ?>  
        
        <div class="col-md-4">
          <div class="articles-holder">
          
           <?php if ( has_post_thumbnail($get_ID) ){ ?>

<?php the_post_thumbnail('gal-img', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

<?php } ?>
          
            <h5 class="articles-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
            
            <ul class="blog-date"><li><i class="fa fa-calendar"></i> <?php echo get_the_date(get_option('date_format')); ?></li></ul>
            
            <?php the_excerpt();?>
            
            <div class="read-more-button"><a href="<?php the_permalink() ?>"><?php _e('Read More', 'match')?></a></div>
            
          </div><!--.articles-holder-->
        </div><!--.col-md-4-->
        
     
      <?php endif; $count_articles++; if(($count_articles % 3) == 0) {?> </div><!--end row--> <?php }?>

<?php endwhile; endif; if(($count_articles % 3) == 1 || ($count_articles % 3) == 2) {?> </div><!--end row--> <?php } ?> 
     
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
		'articles_title' => 'Recent Articles',
		'articles_nr_items' => '3'
	
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
       <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'articles_title' )); ?>"><?php _e('Title:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'articles_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'articles_title' )); ?>" value="<?php echo esc_attr($instance['articles_title']); ?>" style="width:100%;" />
		</p>
        
        <p>
			<label for="<?php echo esc_attr($this->get_field_id( 'articles_nr_items' )); ?>"><?php _e('Number of articles:', 'match') ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'articles_nr_items' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'articles_nr_items' )); ?>" value="<?php echo esc_attr($instance['articles_nr_items']); ?>" style="width:100%;" />
		</p>
        
	<?php
	}
}
?>