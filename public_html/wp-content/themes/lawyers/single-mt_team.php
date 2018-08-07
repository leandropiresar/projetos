<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */

get_header();
?>

<?php

$mt_team_member_top_image = ot_get_option( 'mt_team_member_top_image');

$mt_page_title = get_post_meta($mt_team_member_top_image, "mt_page_title", true);
$mt_page_tagline = get_post_meta($mt_team_member_top_image, "mt_page_tagline", true);
$mt_page_bkg_img = get_post_meta($mt_team_member_top_image, "mt_page_bkg_img", true);
   
  ?>

<div class="page-head" style="background-image:url(<?php echo esc_url($mt_page_bkg_img); ?>);">
<div class="vertical">

<div class="container">

<?php if (!empty($mt_page_title)) :?>

<h1 class="page-title"><?php echo esc_html($mt_page_title) ;?></h1>

<?php else: ?>

<h1 class="page-title"><?php echo get_the_title($mt_team_member_top_image); ?></h1>

<?php endif; ?>

<p><?php echo esc_html($mt_page_tagline) ;?></p>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->


<section class="page-content">

<div class="container">
<div class="row">

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

<div class="col-md-12">

  <ul class="other-entries clearfix">
			<li class="newer-entries"><div class="view-more"><?php echo previous_post_link('%link','&laquo;'.__(' Prev Member: ', 'match').'%title'); ?></div></li>
            <li class="older-entries"><div class="view-more"><?php echo next_post_link('%link',__('Next Member: ', 'match').'%title &raquo;'); ?></div></li>
          </ul>
          
 	</div><!--.col-md-12--> 

<?php endwhile; endif; ?> 

</div><!--.row-->

</div><!--.container-->

</section><!--.page-content-->


</div><!--end main-->
<?php get_footer(); ?>