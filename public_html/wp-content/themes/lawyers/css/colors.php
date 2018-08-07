<?php 
header("Content-type: text/css");

if(file_exists('../../../../wp-load.php')) :
	include '../../../../wp-load.php';
else:
	include '../../../../../wp-load.php';
endif; 

?>

/*==========================================================================================
	
This file contains styles related to the colour scheme of the theme

==========================================================================================*/


<?php

$mt_headers_family = ot_get_option('mt_headers_family');
$mt_body_size2 = ot_get_option('mt_body_size2','16');
$mt_body_text_color = ot_get_option('mt_body_text_color');
$mt_body_bkg_color = ot_get_option('mt_body_bkg_color');
$mt_h1_size = ot_get_option('mt_h1_size','72');
$mt_h2_size = ot_get_option('mt_h2_size','54');
$mt_h3_size = ot_get_option('mt_h3_size','48');
$mt_h4_size = ot_get_option('mt_h4_size','32');
$mt_h5_size = ot_get_option('mt_h5_size','24');
$mt_h6_size = ot_get_option('mt_h6_size','16');
$mt_link_primary = ot_get_option('mt_link_primary');
$mt_link_hover_primary = ot_get_option('mt_link_hover_primary');
$mt_pages_title_color = ot_get_option('mt_pages_title_color');
$mt_header_txt_color = ot_get_option('mt_header_txt_color');
$mt_header_bkg_color = ot_get_option('mt_header_bkg_color');
$mt_menu_item_normal_color = ot_get_option('mt_menu_item_normal_color');
$mt_menu_item_hover_color = ot_get_option('mt_menu_item_hover_color');
$mt_slider_caption_color = ot_get_option('mt_slider_caption_color');
$mt_heavy_color = ot_get_option('mt_heavy_color');
$mt_modal_bkg_color = ot_get_option('mt_modal_bkg_color');
$mt_modal_title_color = ot_get_option('mt_modal_title_color');
$mt_modal_text_color = ot_get_option('mt_modal_text_color');
$mt_footer_bkg_color = ot_get_option('mt_footer_bkg_color');
$mt_footer_text_color = ot_get_option('mt_footer_text_color');
$mt_footer_widget_title_color = ot_get_option('mt_footer_widget_title_color');
$mt_footer_social_normal_color = ot_get_option('mt_footer_social_normal_color');

$mt_custom_css = ot_get_option('mt_custom_css');

?>

body{ font-size:<?php echo esc_attr($mt_body_size2);?>px;
font-family: "<?php echo esc_attr($mt_headers_family);?>", "Times New Roman", serif;
color:<?php echo esc_attr($mt_body_text_color);?>;
background:<?php echo esc_attr($mt_body_bkg_color);?>;
}

#main{background:<?php echo esc_attr($mt_body_bkg_color);?>;}

a{color:<?php echo esc_attr($mt_link_primary);?>;text-decoration:none;}
a:hover{color:<?php echo esc_attr($mt_link_hover_primary);?>;
text-decoration:underline;
}

h1,h2,h3,h4,h5{font-family: "<?php echo esc_attr($mt_headers_family);?>", "Times New Roman", serif;
	line-height:1.2;}
	p {font-size:<?php echo esc_attr($mt_body_size2);?>px;
		line-height:1.5;
		margin: 0 0 24px 0;}

	h1 {font-size:<?php echo esc_attr($mt_h1_size);?>px;}
	h2 {font-size:<?php echo esc_attr($mt_h2_size);?>px;}
	h3 {font-size:<?php echo esc_attr($mt_h3_size);?>px;}
	h4 {font-size:<?php echo esc_attr($mt_h4_size);?>px;}
	h5 {font-size:<?php echo esc_attr($mt_h5_size);?>px;}
	h6{font-size:<?php echo esc_attr($mt_h6_size);?>px;}

.page-head{color: <?php echo esc_attr($mt_pages_title_color);?>;background-color:<?php echo esc_attr($mt_link_primary);?>;}
.page-title:after{ background-color: <?php echo esc_attr($mt_pages_title_color);?>;
    bottom: 0px;
    content: "";
    height: 1px;
    left: 50%;
	margin-left:-50px;
    position: absolute;
    width: 100px;}

#header-bar{background:<?php echo esc_attr($mt_header_bkg_color);?>;
color:<?php echo esc_attr($mt_header_txt_color);?>;}

.header-phone .fa-circle, .header-email .fa-circle{color:<?php echo esc_attr($mt_link_primary);?>;}
.header-phone .fa-phone, .header-email .fa-envelope{color:<?php echo esc_attr($mt_header_bkg_color);?>;}

.menu-nav li a{color:<?php echo esc_attr($mt_menu_item_normal_color);?>;}
.menu-nav li a:hover, .menu-nav li a:focus, .menu-nav li.current_page_item .sub-menu li a:hover{color:<?php echo esc_attr($mt_menu_item_hover_color);?>;}
.menu-nav li.current_page_item > a, .menu-nav li.current_page_item a:focus, .menu-nav li.current_page_ancestor > a{color:<?php echo esc_attr($mt_menu_item_hover_color);?>;
border:1px solid <?php echo esc_attr($mt_menu_item_hover_color);?>;}

.menu-nav ul {background:<?php echo esc_attr($mt_header_bkg_color);?>;
border-top:5px solid <?php echo esc_attr($mt_menu_item_hover_color);?>;}

.sub-menu li.current_page_item > a{color:<?php echo esc_attr($mt_menu_item_hover_color);?>;
border:none;}

.navbar-toggle{border:2px solid <?php echo esc_attr($mt_menu_item_hover_color);?>;}
.navbar-toggle .icon-bar{background:<?php echo esc_attr($mt_menu_item_hover_color);?>;}

.flex-caption{color:<?php echo esc_attr($mt_slider_caption_color);?>;}

.flex-caption h4:before{ background-color: <?php echo esc_attr($mt_slider_caption_color);?>;
    top: 0px;
    content: "";
    height: 1px;
    left: 50%;
	margin-left:-50px;
    position: absolute;
    width: 100px;}
    
.flex-control-nav li a {background:none;
	border:1px solid <?php echo esc_attr($mt_link_primary);?>;
    }    
    
.flex-control-nav li a.flex-active,
.flex-control-nav li a:hover {
	background: <?php echo esc_attr($mt_link_primary);?>;
}
    
.intro-msg{color:<?php echo esc_attr($mt_heavy_color);?>;}
.intro-big-italic{color:<?php echo esc_attr($mt_link_primary);?>;}

.section-title{border-bottom:1px solid #c5c5c5;
color:<?php echo esc_attr($mt_link_primary);?>;}
.section-title:before, .blog-post:before{ background-color: <?php echo esc_attr($mt_link_primary);?>;
    bottom: -3px;
    content: "";
    height: 5px;
    left: 50%;
	margin-left:-50px;
    position: absolute;
    width: 100px;}

.single-subtitle{color:<?php echo esc_attr($mt_link_primary);?>;}

.practice-item{border:5px solid <?php echo esc_attr($mt_link_primary);?>;}
.practice-icon, .circle-icon{color:<?php echo esc_attr($mt_link_primary);?>;}

.practice-title, .circle-title, .small-title, .lawyer-title, .testimonial-client strong{color:<?php echo esc_attr($mt_heavy_color);?>;}
.practice-item:hover, .circle-icon:hover{background:<?php echo esc_attr($mt_link_primary);?>;}
.practice-item:hover .practice-icon, .practice-item:hover .practice-title, .circle-icon:hover{color:#ffffff;}


.modal-header{border:none;min-height:0px;}
.modal-body{padding-top:0;}

.modal-content{background:<?php echo esc_attr($mt_modal_bkg_color);?>;
color:<?php echo esc_attr($mt_modal_text_color);?>;}

.practice-single-title{color:<?php echo esc_attr($mt_modal_title_color);?>;
border-bottom: 1px solid <?php echo esc_attr($mt_modal_title_color);?>;
margin-bottom:24px;}

.practice-single-subtitle{color:<?php echo esc_attr($mt_modal_title_color);?>}

.view-more a{border:3px solid <?php echo esc_attr($mt_link_primary);?>;
background:<?php echo esc_attr($mt_link_primary);?>;
color:#ffffff;}

.view-more a:hover{color:<?php echo esc_attr($mt_link_primary);?>;}

.lawyer-title:before{background-color: #c5c5c5;
    bottom: 0px;
    content: "";
    height: 1px;
    left: 50%;
	margin-left:-25px;
    position: absolute;
    width: 50px;}
.lawyer-social li a{border:3px solid <?php echo esc_attr($mt_link_primary);?>;
color:<?php echo esc_attr($mt_link_primary);?>;}
.lawyer-social li a:hover{background:<?php echo esc_attr($mt_link_primary);?>;
color:#ffffff;}

.lawyer{border-bottom:1px solid #c5c5c5;}
.lawyer:after{background-color: <?php echo esc_attr($mt_link_primary);?>;
    bottom: -3px;
    content: "";
    height: 5px;
    left: 50%;
	margin-left:-50px;
    position: absolute;
    width: 100px;}
.lawyer-bio h3{color:<?php echo esc_attr($mt_heavy_color);?>;}

.about-section{border-bottom:1px solid #c5c5c5;}
.about-section:after{background-color: <?php echo esc_attr($mt_link_primary);?>;
    bottom: -3px;
    content: "";
    height: 5px;
    left: 50%;
	margin-left:-50px;
    position: absolute;
    width: 100px;}
.about-title h3{color:<?php echo esc_attr($mt_heavy_color);?>;}
.circle-icon{border:5px solid <?php echo esc_attr($mt_link_primary);?>;}

.gal-btn{border:3px solid #ffffff;
color:#ffffff;}

.faq-title{border-bottom:1px solid #c5c5c5;}
.faq-title a{color:<?php echo esc_attr($mt_heavy_color);?>;}
.faq-title a:hover, .active a{color:<?php echo esc_attr($mt_link_primary);?>;}


.case{border-bottom:1px solid #c5c5c5;}
.case:after{background-color: <?php echo esc_attr($mt_link_primary);?>;
    bottom: -3px;
    content: "";
    height: 5px;
    left: 50%;
	margin-left:-50px;
    position: absolute;
    width: 100px;}
.case-2col-title, .case-1col-title{color:<?php echo esc_attr($mt_heavy_color);?>;}
.case-verdict{color:#ffffff;
border:3px solid #ffffff;}

.blog-post{border-bottom:1px solid #c5c5c5;}
.blog-title, .practice-single-page-title{color:<?php echo esc_attr($mt_heavy_color);?>;}
.blog-title a, .articles-title a{color:<?php echo esc_attr($mt_heavy_color);?>;}
.blog-title a:hover, .articles-title a:hover{color:<?php echo esc_attr($mt_link_primary);?>;}
.blog-date li i{color:<?php echo esc_attr($mt_link_primary);?>;}
.blog-date li, .blog-date li a{color:#c5c5c5;}
.blog-date li a:hover{color:<?php echo esc_attr($mt_link_primary);?>;}
.blog-button a{border:3px solid <?php echo esc_attr($mt_link_primary);?>;
color:<?php echo esc_attr($mt_link_primary);?>;}
.blog-button a:hover{background:<?php echo esc_attr($mt_link_primary);?>;
color:#ffffff;}

.widgettitle, .single-page-tags{color:<?php echo esc_attr($mt_heavy_color);?>;}
.widget_categories ul li a, .widget_archive ul li a, .widget_recent_entries ul li a{color:<?php echo esc_attr($mt_body_text_color);?>;}
.widget_categories ul li a:hover, .widget_archive ul li a:hover, .widget_recent_entries ul li a:hover{color:<?php echo esc_attr($mt_link_primary);?>;}
.widget_categories ul li:before, .widget_archive ul li:before, .widget_recent_entries ul li:before{font-family: FontAwesome;
	content: "\f105";
    display: inline-block;
    padding-right: 8px;
	color:<?php echo esc_attr($mt_link_primary);?>;}
.widget_tag_cloud a, .tagcloud a{border:3px solid <?php echo esc_attr($mt_link_primary);?>;
background:<?php echo esc_attr($mt_link_primary);?>;
color:#ffffff;}
.widget_tag_cloud a:hover, .tagcloud a:hover{color:<?php echo esc_attr($mt_link_primary);?>;
background:none;
text-decoration:none;}

#search-string{border:3px solid #c5c5c5;}

.comm-title{border-top:1px solid #c5c5c5;}
.comment-right{border:1px solid #c5c5c5;}
.comment-author cite, .comment-author .author a:link{color:<?php echo esc_attr($mt_heavy_color);?>;}
.comment-date {color:#c5c5c5;}
.comment-avatar img{border:3px solid <?php echo esc_attr($mt_link_primary);?>;}
.comment-reply-link:before{font-family: FontAwesome;
	content: "\f112";
    display: inline-block;
    padding-right: 8px;
	color:<?php echo esc_attr($mt_link_primary);?>;}



.contact-right ul li span{color:<?php echo esc_attr($mt_link_primary);?>;}

#footer-var1, #footer-var2{background:<?php echo esc_attr($mt_footer_bkg_color);?>;
color:<?php echo esc_attr($mt_footer_text_color);?>;}

.foo-block .widgettitle{color:<?php echo esc_attr($mt_footer_widget_title_color);?>}

.contact-field, #msg-evaluation{color: #ffffff;
background:#404a55;}

.comm-field, #msg-contact{border:1px solid #e5e5e5;
background:#f2f2f2;
color:#707070;}

#contact-form-holder label{color:<?php echo esc_attr($mt_heavy_color);?>;}

#submit-evaluation, #submit-contact, #submit{border:3px solid <?php echo esc_attr($mt_link_primary);?>;
color:<?php echo esc_attr($mt_link_primary);?>;}

#submit-evaluation:hover, #submit-contact:hover, #submit:hover{background:<?php echo esc_attr($mt_link_primary);?>;
color:#ffffff;}

.footer-social li a{color:<?php echo esc_attr($mt_footer_social_normal_color);?>;}
.footer-social li a:hover{color:<?php echo esc_attr($mt_link_primary);?>;}

.foo-copyright{color:<?php echo esc_attr($mt_body_text_color);?>;}

.output2{border:1px solid <?php echo esc_attr($mt_link_primary);?>;
color:<?php echo esc_attr($mt_link_primary);?>;}

.page-numbers, .page-numbers:hover{ border: 3px solid <?php echo esc_attr($mt_link_primary);?>;
color:<?php echo esc_attr($mt_link_primary);?>;} 
.page-numbers:hover, .current, .current:hover{color:#ffffff;
background:<?php echo esc_attr($mt_link_primary);?>;
border: 3px solid <?php echo esc_attr($mt_link_primary);?>;}

.no-page-title h1{color: #c5c5c5;margin-bottom:32px;
font-size:180px;}

.scrollup i {color: <?php echo esc_attr($mt_link_primary);?>;
background:<?php echo esc_attr($mt_header_bkg_color);?>;}

::-webkit-input-placeholder { /* WebKit browsers */

    opacity: 0.7;
}

:-moz-placeholder { /* Mozilla Firefox 4 to 18 */

    opacity: 0.7;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */

    opacity: 0.7;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */

    opacity: 0.7;
}

<?php echo  esc_attr($mt_custom_css);?>

@media (max-width: 767px) {

.menu-nav ul {border:none;}
.navbar-collapse{background:<?php echo esc_attr($mt_header_bkg_color);?>;}

}