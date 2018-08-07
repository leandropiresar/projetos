<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */
?>

<?php $mt_practice_items_display = ot_get_option( 'mt_practice_items_display'); 

switch ($mt_practice_items_display) {
    case 'mt_practice_items_display_modal':
    
	?>
    
   <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
   </div>
      
   <div class="modal-body">
   
   <h3 class="practice-single-title"><?php the_title(); ?></h3>
   
 
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php the_content();?>

	<?php endwhile; else: ?>
    
    <p><?php _e('Sorry, no posts matched your criteria.', 'match')?></p>
  
    <?php endif; ?>
  
  </div><!-- /.modal-body -->
      

		<?php
        break;
    case 'mt_practice_items_display_page':
	
	?>
    
   <?php get_header(); ?>
   
   <?php
   
   $mt_practice_items_top_image = ot_get_option( 'mt_practice_items_top_image');

$mt_page_title = get_post_meta($mt_practice_items_top_image, "mt_page_title", true);
$mt_page_tagline = get_post_meta($mt_practice_items_top_image, "mt_page_tagline", true);
$mt_page_bkg_img = get_post_meta($mt_practice_items_top_image, "mt_page_bkg_img", true);
   
  ?>

<div class="page-head" style="background-image:url(<?php echo esc_url($mt_page_bkg_img); ?>);">
<div class="vertical">

<div class="container">

<?php if (!empty($mt_page_title)) :?>

<h1 class="page-title"><?php echo esc_html($mt_page_title) ;?></h1>

<?php else: ?>

<h1 class="page-title"><?php echo get_the_title($mt_practice_items_top_image); ?></h1>

<?php endif; ?>

<p><?php echo esc_html($mt_page_tagline) ;?></p>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->


<section class="page-content">
<div class="container">

<div class="row">
<div class="col-md-8">

<?php 
		
	if (have_posts()) : while (have_posts()) : the_post();
	
	$classes_post = array('blog-post-single');
	
	?>


<article id="post-<?php the_ID(); ?>" <?php post_class($classes_post); ?> >

<h4 class="practice-single-page-title"><?php the_title(); ?></h4>

<div class="content-holder">
<?php the_content(); ?>
</div>


</article>

<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.', 'match')?></p>
    <?php endif; ?>

</div><!--.col-md-8-->


<div class="col-md-4">
		<aside>
       
       <?php
		  wp_reset_query();
		  	  
global $post;
$do_not_duplicate = $post->ID;

$mt_practice_items_nr = ot_get_option('mt_practice_items_nr', '12');

$query = array('post_type' => 'mt_practice_areas', 'posts_per_page' => $mt_practice_items_nr);
$wp_query = new WP_Query($query);

?>

<?php if (have_posts()) : ?>

   <h5 class="widgettitle"><?php echo get_the_title($mt_practice_items_top_image); ?></h5> 
   
   <div class="widget_recent_entries">
   <ul>

	<?php  while(have_posts()) : the_post();
	
   
		if ($do_not_duplicate != $post->ID):  ?>
        
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        
        
        <?php endif; endwhile; endif;?>
	</ul>
  </div>
    

</aside><!-- end sidebar -->
</div><!--.col-md-4-->
</div><!--.row-->
</div><!--.container-->

</section><!--.page-content-->


</div><!--end main-->
<?php get_footer(); ?>
    
   
    <?php
        
        break;
}

?>