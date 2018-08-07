<?php
/*
Template Name: About

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

<?php $mt_about_awards_title = ot_get_option('mt_about_awards_title');

		if(!empty($mt_about_awards_title)) :

?>

<div class="row">

<div class="col-md-12">

<h3 class="section-title"><?php echo esc_html($mt_about_awards_title); ?></h3>

</div><!--.col-md-12-->

</div><!--.row-->

<?php endif; ?>

<div class="row">

 <?php
	    $mt_about_awards_items = ot_get_option( 'mt_about_awards_items', array() ); 
		
		if(!empty($mt_about_awards_items)) :
                                                
		foreach( $mt_about_awards_items as $mt_about_awards_item ) :      
		
		?>

        <div class="col-sm-6 col-md-3">
			<div class="inside-col-circle">
         <div class="circle-icon"><?php echo '<i class="fa '.esc_attr($mt_about_awards_item['mt_about_awards_item_icon']).'"></i>';?></div>
         <h5 class="circle-title"><?php echo esc_html($mt_about_awards_item['title']); ?></h5>
         </div><!--.inside-col-circle-->
        </div><!--.col-md-3-->
    
    <?php  endforeach;
			
			endif;
	
	 ?>	    

</div><!--.row-->

<?php

 $mt_about_text_title_l = ot_get_option('mt_about_text_title_l');
 $mt_about_text_desc_l = ot_get_option('mt_about_text_desc_l');
 $mt_about_text_title_r = ot_get_option('mt_about_text_title_r');
 $mt_about_text_desc_r = ot_get_option('mt_about_text_desc_r');

 ?>

<div class="row">

        <div class="col-sm-6 col-md-6">

          <div class="about-description margin72">
          
          <?php if(!empty($mt_about_text_title_l)) : ?>

<h5 class="single-subtitle"><?php echo esc_html($mt_about_text_title_l) ;?></h5>

<?php endif; ?>

<?php echo $mt_about_text_desc_l;?>

</div><!--.about-description-->

</div><!--.col-md-6-->

 <div class="col-sm-6 col-md-6">

          <div class="about-description margin72">

<?php if(!empty($mt_about_text_title_r)) : ?>

<h5 class="single-subtitle"><?php echo esc_html($mt_about_text_title_r) ;?></h5>

<?php endif; ?>

<?php echo $mt_about_text_desc_r;?>

</div><!--.about-description-->

</div><!--.col-md-6-->

</div><!--.row-->

<?php $mt_about_process_title = ot_get_option('mt_about_process_title');

		if(!empty($mt_about_process_title)) :

?>

<div class="row">

<div class="col-md-12">
<h3 class="section-title margin-t"><?php echo esc_html($mt_about_process_title); ?></h3>
</div><!--.col-md-12-->

</div><!--.row-->

<?php endif; ?>


<div class="row">

 <?php
	    $mt_about_process_items = ot_get_option( 'mt_about_process_items', array() ); 
		
		if(!empty($mt_about_process_items)) :
                                                
		foreach( $mt_about_process_items as $mt_about_process_item ) :      
		
		?>

<div class="col-md-4">
<div class="inside-process">
         <div class="circle-icon"><?php echo '<i class="fa '.esc_attr($mt_about_process_item['mt_about_process_item_icon']).'"></i>';?></div>
         <h5 class="circle-title margin-b32"><?php echo esc_html($mt_about_process_item['title']);?></h5>
         
         <p><?php echo esc_html($mt_about_process_item['mt_about_process_item_desc']);?></p>
         </div><!--.inside-process-->

</div><!--.col-md-4-->

<?php 	endforeach;
	endif;	
?>

</div><!--.row-->

<?php $mt_about_office_title = ot_get_option('mt_about_office_title');

		if(!empty($mt_about_office_title)) :

?>

<div class="row">

<div class="col-md-12">
<h3 class="section-title margin-t"><?php echo esc_html($mt_about_office_title);?></h3>
</div><!--.col-md-12-->

</div><!--.row-->

<?php endif; ?>

<div class="row">

<?php
	    $mt_about_office_items = ot_get_option( 'mt_about_office_items', array() ); 
		
		if(!empty($mt_about_office_items)) :
                                                
		foreach( $mt_about_office_items as $mt_about_office_item ) :      
		
		?>

<div class="col-sm-6 col-md-3">
<div class="gal-img">

<img class="img-responsive" src="<?php echo esc_url($mt_about_office_item['mt_about_office_item_img']);?>" alt="" />

<a class="lightbox" href="<?php echo esc_url($mt_about_office_item['mt_about_office_item_img']);?>" rel="prettyPhoto[gallery]" title="<?php echo esc_attr($mt_about_office_item['title']);?>">
<div class="gal-more">
<div class="mask-elem">
<span class="gal-btn"><i class="fa fa-external-link"></i></span></div>
</div>
<!--end gal-more-->
</a>
</div><!--end gal-img-->

</div><!--.col-md-3-->

<?php 	endforeach;
		endif;	
?>

</div><!--.row-->

<?php  $mt_about_testimonials_onoff = ot_get_option( 'mt_about_testimonials_onoff', 'on');
		$mt_about_testimonials_title = ot_get_option( 'mt_about_testimonials_title');

		if($mt_about_testimonials_onoff == 'on') :

  ?>

<div class="row">
        <div class="col-md-12">
          <h3 class="section-title margin-t"><?php echo esc_html($mt_about_testimonials_title); ?></h3>
          
          <div class="flex-container">
          <div class="flexslider flexslider-testimonials">
            <ul class="slides">
            
            <?php 
	$defaults_testimonials = array('post_type' => 'mt_testimonials', 'showposts' => 3);
	$testimonials_query = new WP_Query($defaults_testimonials);

	 if ($testimonials_query -> have_posts()) : while ($testimonials_query -> have_posts()) : $testimonials_query -> the_post();

			$get_item_ID = get_the_ID();

			$mt_testimonial_client_name = get_post_meta($get_item_ID, "mt_testimonial_client_name", true);
			$mt_testimonial_client_company = get_post_meta($get_item_ID, "mt_testimonial_client_company", true);
			$mt_testimonial_client_img = get_post_meta($get_item_ID, "mt_testimonial_client_img", true);
			
	    ?>
              <li>
                <div class="row">
                  <div class="col-sm-8 col-md-8">
                    <div class="testimonial-desc">
                      <h5><i class="fa fa-quote-left fa-2x pull-left"></i><?php the_content(); ?></h5>
                    </div><!--.testimonial-desc-->
                  </div><!--.col-md-8-->
                  <div class="col-sm-4 col-md-4">
                    <div class="testimonial-client alignc"> <img src="<?php echo esc_url($mt_testimonial_client_img); ?>" alt=""/>
                      <p><strong><?php echo esc_html($mt_testimonial_client_name); ?></strong> <?php echo esc_html($mt_testimonial_client_company); ?></p>
                    </div><!--.testimonial-client-->
                  </div><!--.col-md-4-->
                </div><!--.row-->
              </li>
              
             <?php endwhile;endif; ?> 
         
            </ul>
          </div><!--flexslider-->
          </div><!--flex-container-->
        </div><!--.col-md-12-->
      </div><!--.row-->

<?php endif; ?>

</div><!--.container-->

</section><!--.page-content-->


</div><!--end main-->
<?php get_footer(); ?>