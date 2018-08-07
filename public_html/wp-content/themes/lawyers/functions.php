<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */
 
load_theme_textdomain('match', get_template_directory() . '/language');
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */

load_template( trailingslashit( get_template_directory() ) . 'include/admin/ot-loader.php' );
locate_template( 'include/theme-options.php', true );

/* TGM Plugin Activation */
load_template( trailingslashit( get_template_directory() ) . 'include/tgm-plugin/plugin-install.php' );

// Add Page Meta Box
load_template( trailingslashit( get_template_directory() ) . 'include/page-meta-box.php' );

// Add Home Intro widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-intro.php' );

// Add Home Practice Areas 3 Columns widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-practice-areas-3col.php' );

// Add Home Practice Areas 4 Columns widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-practice-areas-4col.php' );

// Add Home Team 4 Columns Simple widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-team-4col-simple.php' );

// Add Home Team 4 Columns with Profile Button widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-team-4col-profile-btn.php' );

// Add Home Team 3 Columns with Profile Button widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-team-3col-profile-btn.php' );

// Add Home Team 2 Columns with Profile Button widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-team-2col-profile-btn.php' );

// Add Home Single Team Member widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-one-team-member.php' );

// Add Home Case Studies 2 Columns widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-case-studies-2col.php' );

// Add Home Testimonials widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-testimonials.php' );

// Add Home 3 Feature Boxes widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-3-feature-boxes.php' );

// Add Home Recent Articles widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-recent-articles.php' );

// Add Home Video widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-one-video.php' );

// Add Home Google Maps widget
load_template( trailingslashit( get_template_directory() ) . 'include/widgets/widget-home-gmaps.php' );

// Slider options
load_template( trailingslashit( get_template_directory() ) . 'include/slider.php' );


// Enqueue Google Fonts

function mt_fonts() {

$mt_headers_family = ot_get_option( 'mt_headers_family');

$protocol = is_ssl() ? 'https' : 'http';
wp_enqueue_style( 'mt-theme-font', $protocol.'://fonts.googleapis.com/css?family='.str_replace(' ', '+', $mt_headers_family).':300,400,400italic,700,700italic,900' );}

add_action( 'wp_enqueue_scripts', 'mt_fonts' );

//	Register and load front end JS and CSS files

if( !function_exists( 'mt_scripts_init' ) ) {
    function mt_scripts_init() {
	
	$protocol = is_ssl() ? 'https' : 'http';
	
		wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap/css/bootstrap.min.css');
		wp_register_style('font-awesome', $protocol.'://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
		wp_register_style('style-css', get_stylesheet_directory_uri() . '/style.css');
		wp_register_style('colors-css', get_template_directory_uri() . '/css/colors.php');
		wp_register_style('pretty-css', get_template_directory_uri() . '/js/prettyphoto/css/prettyPhoto.css');
				
		wp_enqueue_style('bootstrap-css');
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('style-css');
		wp_enqueue_style('colors-css');
		wp_enqueue_style('pretty-css');  
		
		wp_register_script('bootstrap', get_template_directory_uri() . '/css/bootstrap/js/bootstrap.min.js','','',true);
        wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js','','',true);
        wp_register_script('easing', get_template_directory_uri() . '/js/jquery.easing.min.js','','',true);
        wp_register_script('pretty-photo', get_template_directory_uri() . '/js/prettyphoto/js/jquery.prettyPhoto.js','','',true);
		wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js','','',true);
        wp_register_script('contactform', get_template_directory_uri() . '/js/contactform.js','','',true);
		wp_register_script('evaluationform', get_template_directory_uri() . '/js/evaluationform.js','','',true);
		wp_register_script('init', get_template_directory_uri() . '/js/init.js','','',true);
		
		wp_enqueue_script('jquery');
		
        wp_enqueue_script('bootstrap');
        wp_enqueue_script('flexslider');
        wp_enqueue_script('easing');
		wp_enqueue_script('pretty-photo');
		wp_enqueue_script('fitvids');
		wp_enqueue_script('jquery-form');
        
		wp_enqueue_script('evaluationform');
		$translation_array = array( 'name_error' => __( 'Please fill the Name field!', 'match' ),
									'email_error' => __( 'Please fill the Email field!', 'match' ),
									'emailvalid_error' => __( 'Please provide a valid Email address!', 'match' ),
									'subject_error' => __( 'Please fill the Subject field!', 'match' ),
									'message_error' => __( 'Please fill the Message field!', 'match' ),
									'spam_error' => __( 'Please fill the Antispam field!', 'match' ),
									'spamvalid_error' => __( 'You must answer correctly the antispam question!', 'match' ),
									'send_msg' => __( 'Sending message...!', 'match' ),
									'msg_sent' => __( 'Message sent', 'match' ),
									'msg_sent2' => __( 'Thanks for contacting us! We will get to your message as soon as we can.', 'match' ),		
									
									 );
									 
		wp_localize_script( 'evaluationform', 'eFobject', $translation_array );

		wp_enqueue_script('init');
		
		if(is_page_template('my-templates/template-contact.php') ){
  	
			wp_enqueue_script('contactform');
			$translation_array2 = array( 'name_error' => __( 'Please fill the Name field!', 'match' ),
									'email_error' => __( 'Please fill the Email field!', 'match' ),
									'emailvalid_error' => __( 'Please provide a valid Email address!', 'match' ),
									'subject_error' => __( 'Please fill the Subject field!', 'match' ),
									'message_error' => __( 'Please fill the Message field!', 'match' ),
									'spam_error' => __( 'Please fill the Antispam field!', 'match' ),
									'spamvalid_error' => __( 'You must answer correctly the antispam question!', 'match' ),
									'send_msg' => __( 'Sending message...!', 'match' ),
									'msg_sent' => __( 'Message sent', 'match' ),
									'msg_sent2' => __( 'Thanks for contacting us! We will get to your message as soon as we can.', 'match' ),		
									
									 );
									 
		wp_localize_script( 'contactform', 'cFobject', $translation_array2 );
			
		}

    }
    
    add_action('wp_enqueue_scripts', 'mt_scripts_init');
}

function mt_comments_reply() {
	if( get_option( 'thread_comments' ) )  {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'comment_form_before', 'mt_comments_reply' );

if ( ! isset( $content_width ) ) $content_width = 1170;

// Register Custom Menus
add_action( 'init', 'mt_register_my_menus' );
function mt_register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu', 'match')
		)
	);
}

// Register Post Thumbnail
add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size(540,300,true);
add_image_size( 'gal-img', 540, 300, true );
add_image_size( 'team-img', 540, 600, true );
add_image_size( 'blog-image', 800, 360, true );

// Register Sidebar

if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
		'id' => 'sidebar-1',
		'name' => 'Sidebar',
		'description' => __( 'Main sidebar that appears on the left.','match' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>'
	));
	
	register_sidebar(array(
		'name' =>  __( 'Homepage','match'),
		'id' => 'homepage',
		'description' => __( 'Use widgets with "Home" prefix for Homepage layout','match' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
	
	register_sidebar(array(
		'name' => __( 'Footer 1','match'),
		'id' => 'footer-one',
		'description' => __( 'Widgets in this area are used in the first footer column','match' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>'
	));
	//footer 2
	register_sidebar(array(
		'name' => __( 'Footer 2','match'),
		'id' => 'footer-two',
		'description' => __( 'Widgets in this area are used in the second footer column','match' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>'
	));
	//footer 3
	register_sidebar(array(
		'name' => __( 'Footer 3','match'),
		'id' => 'footer-three',
		'description' => __( 'Widgets in this area are used in the third footer column','match' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>'
	));
	
}

// Excerpt Content
function mt_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'mt_custom_excerpt_length');

function mt_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'mt_new_excerpt_more');

//Limit number of tags inside widget
function mt_tag_widget_limit($args){
 
 //Check if taxonomy option inside widget is set to tags
 if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
  $args['number'] = 20; //Limit number of tags
  $args['smallest'] = 15;
  $args['largest'] = 15;
  $args['unit'] = 'px';
 }
 
 return $args;
}

//Register tag cloud filter callback
add_filter('widget_tag_cloud_args', 'mt_tag_widget_limit');


//create new comments output
function mt_my_custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body <?php if ($comment->comment_approved == '0') echo 'pending-comment'; ?> clearfix">
                <div class="comment-details">
                    <div class="comment-avatar">
                        <?php echo get_avatar($comment, $size = '45'); ?>
                    </div><!-- /comment-avatar -->
                    
                    <div class="comment-right">
                    <section class="comment-author vcard">
						<?php printf(__('<cite class="author">%s</cite>','match'), get_comment_author_link()) ?>
						<div class="comment-date"> <?php echo get_comment_date(); ?></div>
                    </section><!-- /comment-meta -->
                    <section class="comment-content">
    	                <div class="comment-text">
    	                    <?php comment_text() ?>
    	                </div><!-- /comment-text -->
    	                <div class="reply">
    	                    <?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply','match'),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    	                </div><!-- /reply -->
                    </section><!-- /comment-content -->
                    
                   </div><!-- /comment-right -->
                    
				</div><!-- /comment-details -->
		</div><!-- /comment -->
<?php
} //end mt_my_custom_comments()

//search only posts

function mt_SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','mt_SearchFilter');


function mt_pagenavi( $p = 2 ) { // pages will be show before and after current page
  if ( is_singular() ) return; // don't show in single page
  global $wp_query, $paged;
  $max_page = $wp_query->max_num_pages;
  
  if ( $max_page == 1 ) return; // don't show when only one page
  if ( empty( $paged ) ) $paged = 1;
  echo '<div class="prev-next"><span class="pages">'.__('Page', 'match').' '. $paged .__('of', 'match'). ' '. $max_page . ': </span>'; // pages
  if ( $paged > $p + 1 ) mt_p_link( 1, __('First', 'match') );
  if ( $paged > $p + 2 ) echo '... ';
  for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { // Middle pages
    if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span> " : mt_p_link( $i );
  }
  if ( $paged < $max_page - $p - 1 ) echo '... ';
  if ( $paged < $max_page - $p ) mt_p_link( $max_page, __('Last', 'match') );
  echo '</div><!--end-->';

}
function mt_p_link( $i, $title = '' ) {
  if ( $title == '' ) $title = "Page {$i}";
  echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$i}</a> ";
}

// Transform HEX color to RGB color
function mt_hex2rgb( $colour ) {
        if ( $colour[0] == '#' ) {
                $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
                return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

add_action('admin_enqueue_scripts', 'mt_admin_widgets_style');

function mt_admin_widgets_style() {
    wp_enqueue_style('themeton-admin-common-style', get_template_directory_uri() . '/include/admin/custom-css.css' );
}
?>