<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */

get_header();
?>

<?php

$mt_page_title = get_post_meta(get_option('page_for_posts'), "mt_page_title", true);
$mt_page_tagline = get_post_meta(get_option('page_for_posts'), "mt_page_tagline", true);
$mt_page_bkg_img = get_post_meta(get_option('page_for_posts'), "mt_page_bkg_img", true);
   
$mt_sidebar_page = ot_get_option( 'mt_sidebar_page', 'mt_sidebar_page_right');  

if(empty($mt_sidebar_page)) { $mt_sidebar_page = 'mt_sidebar_page_right'; } 
  
?>

<div class="page-head" style="background-image:url(<?php echo esc_url($mt_page_bkg_img); ?>);">
<div class="vertical">

<div class="container">

<?php if (!empty($mt_page_title)) :?>

<h1 class="page-title"><?php echo esc_html($mt_page_title) ;?></h1>

<?php else: ?>

<h1 class="page-title"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>

<?php endif; ?>

<p><?php echo esc_html($mt_page_tagline) ;?></p>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->


<section class="page-content">
<div class="container">

<div class="row">

<?php if ( $mt_sidebar_page == 'mt_sidebar_page_left' ) get_sidebar(); ?>

<div class="col-md-8 <?php if ( $mt_sidebar_page == 'mt_sidebar_page_no' ){?> col-md-offset-2 <?php } ?> ">

<?php 
		
	if (have_posts()) : while (have_posts()) : the_post();
	
	$classes_post = array('blog-post-single');
	
	?>


<article id="post-<?php the_ID(); ?>" <?php post_class($classes_post); ?> >

<?php if ( has_post_thumbnail($post->ID) ){ ?>

<?php the_post_thumbnail('blog-image', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

<?php } ?>

<h4 class="blog-title"><?php the_title(); ?></h4>

<ul class="blog-date">
<li><i class="fa fa-calendar"></i> <?php echo get_the_date(get_option('date_format')); ?></li>
<li><i class="fa fa-user"></i> <?php the_author(); ?> </li>
<li><i class="fa fa-comments"></i> <?php comments_popup_link(__('No comments', 'match'), __('1 Comment', 'match'), __('% Comments', 'match')); ?></li>
</ul>

<div class="content-holder">
<?php the_content(); ?>
</div>

<?php
        wp_link_pages(array(
            'before' => '<div class="page-links">',
            'after' => '</div>',
            'nextpagelink' => '<span class="next-page">'.__('Next Page', 'match').'</span>',
            'previouspagelink' => '<span class="previous-page">'.__('Previous Page', 'match').'</span>',
            'next_or_number' => 'next'
        ));
?>

<?php the_tags('<h5 class="single-page-tags">'.__('Tags', 'match').': ',' , ', '</h5>'); ?>

</article>

<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.', 'match')?></p>
    <?php endif; ?>

<?php // If comments are open or we have at least one comment, load up the comment template.
	  if ( comments_open() || get_comments_number() ) :
	
			comments_template();
	
	 endif; ?>

</div><!--.col-md-8-->

<?php if ( $mt_sidebar_page == 'mt_sidebar_page_right' ) get_sidebar(); ?>

</div><!--.row-->

</div><!--.container-->

</section><!--.page-content-->




</div><!--end main-->
<?php get_footer(); ?>