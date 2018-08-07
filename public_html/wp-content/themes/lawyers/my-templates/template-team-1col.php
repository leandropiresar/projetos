<?php
/*
Template Name: Team - 1 Column

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

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if($post->post_content!="") : ?>

<div class="col-md-12 margin40 content-holder">
<?php the_content(); ?>
</div><!--.col-md-12-->

<?php  endif; endwhile; endif; ?>

<?php 
			$mt_team_items_nr = ot_get_option('mt_team_items_nr', '4');
			global $wp_query;
			wp_reset_postdata();

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	
	$query = array('post_type' => 'mt_team','posts_per_page' => $mt_team_items_nr, 'paged'=> $paged);
	
	$wp_query = new WP_Query($query);
			
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 

			$mt_team_twitter_url = get_post_meta($post->ID, "mt_team_twitter_url", true);
			$mt_team_facebook_url = get_post_meta($post->ID, "mt_team_facebook_url", true);
			$mt_team_gplus_url = get_post_meta($post->ID, "mt_team_gplus_url", true);
			$mt_team_linkedin_url = get_post_meta($post->ID, "mt_team_linkedin_url", true);
			$mt_team_mail = get_post_meta($post->ID, "mt_team_mail", true);
			
		
?>

<div class="col-md-12 lawyer-content">

<div class="lawyer">

<div class="row">

<div class=" col-sm-6 col-md-6">

<div class="lawyer-img">
<?php if ( has_post_thumbnail($post->ID) ){ ?>

<?php the_post_thumbnail('team-img', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

<?php } ?>
          
</div>
</div><!--.col-md-6-->

<div class=" col-sm-6 col-md-6">

<div class="lawyer-bio">

<h3><?php the_title();?></h3>

<ul class="lawyer-social">
<?php if (!empty($mt_team_twitter_url) ): ?>
              		  <li><a href="<?php echo esc_url($mt_team_twitter_url);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
             <?php endif; ?>
             
             <?php if (!empty($mt_team_facebook_url) ): ?>
                       <li><a href="<?php echo esc_url($mt_team_facebook_url);?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <?php endif; ?>
              
				<?php if (!empty($mt_team_gplus_url) ): ?>
	              <li><a href="<?php echo esc_url($mt_team_gplus_url);?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
    	          <?php endif; ?>
              
              <?php if (!empty($mt_team_linkedin_url) ): ?>
                       <li><a href="<?php echo esc_url($mt_team_linkedin_url);?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              <?php endif; ?>

              
              <?php if (!empty($mt_team_mail) ): ?>
             		 <li><a href="mailto:<?php echo esc_html($mt_team_mail);?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
              <?php endif; ?></ul>

<div class="lawyer-desc">
<?php the_content(); ?>
</div><!--.lawyer-desc-->

</div><!--.lawyer-bio-->

</div><!--.col-md-6-->

</div><!--.row-->

</div><!--.lawyer-->

</div><!--.col-md-12-->

<?php endwhile; endif; ?> 

</div><!--.row-->

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