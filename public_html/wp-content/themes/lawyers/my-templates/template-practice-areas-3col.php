<?php
/*
Template Name: Practice Areas 3 Col

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

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if($post->post_content!="") : ?>

<div class="row">
<div class="col-md-12 margin40 content-holder">
<?php the_content(); ?>
</div><!--.col-md-12-->

</div><!--.row-->

<?php  endif; endwhile; endif; ?>

<?php 
			$mt_practice_items_nr = ot_get_option('mt_practice_items_nr', '12');
			global $wp_query;
			wp_reset_postdata();

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	
	$query = array('post_type' => 'mt_practice_areas','posts_per_page'	=> $mt_practice_items_nr, 'paged'=> $paged);
	$wp_query = new WP_Query($query);
	
	$count = 0;
		
$mt_practice_items_display = ot_get_option( 'mt_practice_items_display');
		
			?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 

			$mt_practice_icon = get_post_meta($post->ID, "mt_practice_icon", true);
			$mt_practice_on_off = get_post_meta($post->ID, "mt_practice_on_off", true);
			$mt_practice_url = get_post_meta($post->ID, "mt_practice_url", true);
			
			if(empty($mt_practice_on_off)) $mt_practice_on_off = 'off';	
			
		if ($count % 3 == 0): ?> <div class="row"> <?php endif; ?>

        <div class="col-md-4">
          <div class="practice-item"><a href="<?php if( $mt_practice_on_off == 'on'): echo esc_url($mt_practice_url); else: the_permalink(); endif; ?>" <?php if( ($mt_practice_items_display == 'mt_practice_items_display_modal') && ( $mt_practice_on_off == 'off' ) ): ?> data-toggle="modal" data-target="#myModal" <?php endif; ?> >
            <div class="practice-icon"><?php echo '<i class="fa '.esc_attr($mt_practice_icon).'"></i>';?></div>
            <h5 class="practice-title"><?php the_title();?></h5>
            </a></div><!--.practice-item-->
        </div><!--.col-md-3-->
        
    <?php $count++; if(($count % 3) == 0) {?> </div><!--end row--> <?php }?>

<?php endwhile; endif; if(($count % 3) == 1 || ($count % 3) == 2 ) {?> </div><!--end row--> <?php } ?> 

<?php $count_posts = wp_count_posts('mt_practice_areas'); ?>

<?php if(function_exists('mt_pagenavi') && ($mt_practice_items_nr < $count_posts->publish ) ) : ?>

	<div class="margin72">

	<?php mt_pagenavi();  ?>
        
	</div><!--.margin72-->
                  
       <?php else : ?>

  <ul class="other-entries">
			<li class="newer-entries"><span><?php previous_posts_link('&laquo; Previous') ?></span></li>
            <li class="older-entries"><span><?php next_posts_link('Next &raquo;') ?></span></li>
          </ul>
      
<?php endif; ?>

</div><!--.container-->

</section><!--.page-content-->

</div><!--end main-->

<?php 

if($mt_practice_items_display == 'mt_practice_items_display_modal'):

 ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">
   <div class="modal-content">
   
   </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

</div><!-- /.modal -->

<?php endif; ?>

<?php get_footer(); ?>