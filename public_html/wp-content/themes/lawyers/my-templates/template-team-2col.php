<?php
/*
Template Name: Team - 2 Column

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
</div>

<?php  endif; endwhile; endif; ?>

<?php 
			$mt_team_items_nr = ot_get_option('mt_team_items_nr', '10');
			global $wp_query;
			wp_reset_postdata();

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	
	$query = array('post_type' => 'mt_team','posts_per_page' => $mt_team_items_nr, 'paged'=> $paged);
	$wp_query = new WP_Query($query);
	
	$count_team = 0;
			
?>
        
<?php if (have_posts()) : while (have_posts()) : the_post();

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


<?php $count_posts = wp_count_posts('mt_team'); ?>

<?php if(function_exists('mt_pagenavi') && ($mt_team_items_nr < $count_posts->publish ) ) : ?>

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