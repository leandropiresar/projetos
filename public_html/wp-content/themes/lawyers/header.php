<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
    <![endif]-->
<!-- Favicon -->
<?php $mt_favicon = ot_get_option('mt_favicon'); ?>
<link rel="shortcut icon" href="<?php echo esc_url($mt_favicon); ?>">

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>     
</head>

<body <?php body_class(); ?> >

<div id="main">

<header id="header-bar">
    <div class="container">
    
<?php	$mt_top_header_display = ot_get_option( 'mt_top_header_display', 'mt_top_header_display_1'); 

    switch ($mt_top_header_display) {
    case 'mt_top_header_display_1':
	  get_template_part('include/assets/section', 'header1');
	
        break;
    case 'mt_top_header_display_2':
	
	get_template_part('include/assets/section', 'header2');
	   
        break;
}

?>
    
</div><!-- container-->
</header><!-- header-bar-->

