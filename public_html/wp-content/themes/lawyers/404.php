<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */

get_header(); ?>

<?php

$mt_page_bkg_img = get_post_meta(get_option('page_for_posts'), "mt_page_bkg_img", true);
   
  ?>

<div class="page-head" style="background-image:url(<?php echo esc_url($mt_page_bkg_img); ?>);">
<div class="vertical">

<div class="container">

<h1 class="page-title"><?php _e("Error 404 - Page Not Found", "match")?></h1>
<p><?php _e("Check the menu sections above", "match")?></p>

</div><!--.container-->
</div><!--.vertical-->
</div><!--.page-head-->

<section class="page-content">
<div class="container">

<div class="row">
<div class="col-md-12 no-page-title alignc">

<h2><?php _e("404", "match")?></h2>
<h5><?php _e("The page you're looking for can't be found.", "match")?></h5>

</div>

</div><!--.row-->

</div><!--.container-->

</section><!--.page-content-->


</div><!--end main-->
<?php get_footer(); ?>