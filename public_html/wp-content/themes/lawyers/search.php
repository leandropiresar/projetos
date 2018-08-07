<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */

get_header(); ?>

<?php

$mt_page_bkg_img = get_post_meta(get_option('page_for_posts'), "mt_page_bkg_img", true);

$mt_sidebar_page = ot_get_option( 'mt_sidebar_page', 'mt_sidebar_page_right');  
   
  ?>

<div class="page-head" style="background-image:url(<?php echo esc_url($mt_page_bkg_img); ?>);">
<div class="vertical">

<div class="container">

<h1 class="page-title"><?php _e('Search Results', 'match');?></h1>
<p><?php _e('for', 'match');?> "<?php the_search_query(); ?>"</p>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->

<section class="page-content">
<div class="container">

<div class="row">

<?php if ( $mt_sidebar_page == 'mt_sidebar_page_left' ) get_sidebar(); ?>

<div class="col-md-8 <?php if ( $mt_sidebar_page == 'mt_sidebar_page_no' ){?> col-md-offset-2 <?php } ?> ">

<?php				
	if (have_posts()) :
	
	?>
    
<div class="blog-articles">
    
    <?php
	
	while (have_posts()) : the_post(); ?>

  <article class="blog-post">

<?php if ( has_post_thumbnail($post->ID) ){ ?>

<?php the_post_thumbnail('blog-image', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

<?php } ?>

<h4 class="blog-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>

<ul class="blog-date">
<li><i class="fa fa-calendar"></i> <?php the_time('F jS, Y') ?></li>
<li><i class="fa fa-user"></i> <?php the_author(); ?> </li>
<li><i class="fa fa-comments"></i> <?php comments_popup_link(__('No comments', 'match'), __('1 Comment', 'match'), __('% Comments', 'match')); ?></li>
</ul>

<?php the_excerpt(); ?>

<div class="blog-button"><a href="<?php the_permalink() ?>"><?php _e('Continue Reading', 'match')?></a></div>

</article>

<?php endwhile; ?>

</div><!--.blog-articles-->

<?php if(function_exists('mt_pagenavi') ) : ?>

	<div class="margin72">

	<?php mt_pagenavi();  ?>
        
	</div><!--.margin72-->
      
<?php endif; ?>

<?php else : ?>

<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'match' ); ?></p>


<?php endif; ?>


</div><!--.col-md-8-->

<?php if ( $mt_sidebar_page == 'mt_sidebar_page_right' ) get_sidebar(); ?>

</div><!--.row-->

</div><!--.container-->

</section><!--.page-content-->


</div><!--end main-->
<?php get_footer(); ?>