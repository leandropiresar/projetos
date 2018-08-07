<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */
 
 

get_header(); ?>

<?php if( get_option('show_on_front') == 'page') :


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

<?php else : ?>
<div class="margin72"></div>

<?php endif; ?>

<section class="page-content">
<div class="container">

<div class="row">

<?php if ( $mt_sidebar_page == 'mt_sidebar_page_left' ) get_sidebar(); ?>

<div class="col-md-8 <?php if ( $mt_sidebar_page == 'mt_sidebar_page_no' ){?> col-md-offset-2 <?php } ?>">
<div class="blog-articles">

<?php 
		
	if (have_posts()) : while (have_posts()) : the_post(); 
    
    $classes_post = array('blog-post');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes_post); ?> >

<?php if ( has_post_thumbnail($post->ID) ){ ?>

<?php the_post_thumbnail('blog-image', array('class'=> 'img-responsive', 'alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>

<?php } ?>

<h4 class="blog-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>

<ul class="blog-date">
<li><i class="fa fa-calendar"></i> <?php echo get_the_date(get_option('date_format')); ?></li>
<li><i class="fa fa-user"></i> <?php the_author(); ?> </li>
<li><i class="fa fa-comments"></i> <?php comments_popup_link(__('No comments', 'match'), __('1 Comment', 'match'), __('% Comments', 'match')); ?></li>
</ul>

<?php the_excerpt(); ?>

<div class="blog-button"><a href="<?php the_permalink() ?>"><?php _e('Continue Reading', 'match')?></a></div>

</article>

<?php endwhile; endif; ?>

</div><!--.blog-articles-->

<?php $count_posts = wp_count_posts('post'); ?>

<?php if(function_exists('mt_pagenavi') && ( get_option('posts_per_page') < $count_posts->publish ) ) : ?>

	<div class="margin72">

	<?php mt_pagenavi();  ?>
        
	</div><!--.margin72-->
        
	<?php else : ?>

  <ul class="other-entries">
			<li class="newer-entries"><span><?php previous_posts_link(__('Previous', 'match')); ?></span></li>
            <li class="older-entries"><span><?php next_posts_link(__('Next', 'match')); ?></span></li>
          </ul>
      
<?php endif; ?>

</div><!--.col-md-8-->

<?php if ( $mt_sidebar_page == 'mt_sidebar_page_right' ) get_sidebar(); ?>

</div><!--.row-->

</div><!--.container-->

</section><!--.page-content-->


</div><!--end main-->
<?php get_footer(); ?>