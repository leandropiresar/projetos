<?php
/*
Template Name: Testimonials

*/
?>
<?php get_header(); ?>

<?php

$mt_page_title = get_post_meta($post->ID, "mt_page_title", true);
$mt_page_tagline = get_post_meta($post->ID, "mt_page_tagline", true);
$mt_page_bkg_img = get_post_meta($post->ID, "mt_page_bkg_img", true);
   
  ?>

<div class="page-head" style="background-image:url(<?php echo esc_url($mt_page_bkg_img); ?>);">
<div class="vertical">

<div class="container">

<?php if (!empty($mt_page_title)) :?>

<h1 class="page-title"><?php echo esc_html($mt_page_title) ;?></h1>

<?php else: ?>

<h1 class="page-title"><?php the_title();?></h1>

<?php endif; ?>

<p><?php echo esc_html($mt_page_tagline) ;?></p>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->

<section class="page-content">

<div class="container">

<div class="row">
<div class="col-sm-12 col-md-12 testimonials-container">

<?php 
			$mt_testimonial_items_nr = ot_get_option('mt_testimonial_items_nr', '10');
			global $wp_query;
			wp_reset_postdata();

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	
	$query = array('post_type' => 'mt_testimonials','posts_per_page'	=> $mt_testimonial_items_nr, 'paged'=> $paged);
	$wp_query = new WP_Query($query);
	
	$count_testimonials = 0;
		
			?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 

			$mt_testimonial_client_name = get_post_meta($post->ID, "mt_testimonial_client_name", true);
			$mt_testimonial_client_company = get_post_meta($post->ID, "mt_testimonial_client_company", true);
			$mt_testimonial_client_img = get_post_meta($post->ID, "mt_testimonial_client_img", true);
			
		if ($count_testimonials % 2 == 0): ?> <div class="row testimonials-holder"> <?php endif; ?>

<div class="col-sm-6 col-md-6">

<div class="testimonial-single">

<div class="testimonial-desc">
                      <h5><i class="fa fa-quote-left fa-2x pull-left"></i><?php the_content();?></h5>
                    </div><!--.testimonial-desc-->

<div class="testimonial-client-single clearfix">
<div class="client-float">
<img src="<?php echo esc_url($mt_testimonial_client_img); ?>" alt=""/>
</div>
<div class="client-float client-title">
                      <p><strong><?php echo esc_html($mt_testimonial_client_name); ?></strong></p>
                      <p><?php echo esc_html($mt_testimonial_client_company); ?></p>
</div>                      
                    </div><!--.testimonial-client-->

</div><!--.testimonial-single-->
</div><!--.col-md-6-->

<?php $count_testimonials++; if(($count_testimonials % 2) == 0) {?> </div><!--end row--> <?php }?>

<?php endwhile; endif; if(($count_testimonials % 2) == 1 ) {?> </div><!--end row--><?php } ?> 
 
</div><!--.testimonials-container-->
</div><!--.row-->

<?php $count_posts = wp_count_posts('mt_testimonials'); ?>

<?php if(function_exists('mt_pagenavi') && ($mt_testimonial_items_nr < $count_posts->publish ) ) : ?>

	<div class="margin72">

	<?php mt_pagenavi();  ?>
        
	</div><!--.margin72-->
        
	<?php else : ?>

  <ul class="other-entries">
			<li class="newer-entries"><span><?php previous_posts_link(__('Previous', 'match')); ?></span></li>
            <li class="older-entries"><span><?php next_posts_link(__('Next', 'match')); ?></span></li>
          </ul>
      
<?php endif; ?>

</div><!--.container-->

</section><!--.page-content-->


</div><!--end main-->
<?php get_footer(); ?>