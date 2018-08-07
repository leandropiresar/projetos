<?php
/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );

  $my_fonts = mt_get_google_fonts();
  
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'sections'        => array(
	 array(
        'title'       => __( 'General Settings', 'match' ),
        'id'          => 'general'
      ),
	  
	   array(
        'title'       => __( 'Colors', 'match' ),
        'id'          => 'colors'
      ),
	  
	  array(
        'title'       => __( 'Typography', 'match' ),
        'id'          => 'typography'
      ),
	  	
     array(
        'title'       => __( 'Home Top Slideshow', 'match' ),
        'id'          => 'home_slideshow'
      ),
	  
	  array(
        'title'       => __( 'About Page', 'match' ),
        'id'          => 'about_page'
      ),
		  
	  array(
        'title'       => __( 'Contact Page', 'match' ),
        'id'          => 'contact'
      ),
	  
	 array(
        'title'       => __( 'Footer', 'match' ),
        'id'          => 'footer'
      ),
	  
	  array(
        'title'       => __( 'Social Media', 'match' ),
        'id'          => 'social_media'
      )
	  
	  
    ),
    'settings'        => array(
	
	array(
        'label'       => __( 'Logo Image', 'match' ),
        'id'          => 'mt_logo',
        'type'        => 'upload',
        'desc'        => __( 'Upload logo image.', 'match' ),
        'std'         => get_stylesheet_directory_uri() . '/images/logo.png',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  
	  array(
        'label'       => __( 'Logo Text', 'match' ),
        'id'          => 'mt_logo_text',
        'type'        => 'text',
        'desc'        => __( 'Add text logo.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  
	    array(
        'label'       => __( 'Favicon Image', 'match' ),
        'id'          => 'mt_favicon',
        'type'        => 'upload',
        'desc'        => __( 'Upload favicon image.', 'match' ),
        'std'         => get_stylesheet_directory_uri() . '/images/favicon.ico',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  
	  array(
        'label'       => __( 'Custom CSS', 'match' ),
        'id'          => 'mt_custom_css',
        'type'        => 'textarea-simple',
        'desc'        => __( 'Add custom CSS code.', 'match' ),
        'std'         => '',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  
	  array(
        'label'       => __( 'Top Header - Choose Top Header Display', 'match' ),
        'id'          => 'mt_top_header_display',
        'type'        => 'radio',
        'desc'        => __( 'Choose how you want to display the top header.', 'match' ),
        'choices'     => array(
          array(
            'label'       => __( 'Custom Top Header 1', 'match' ),
            'value'       => 'mt_top_header_display_1'
          ),
          array(
            'label'       => __( 'Custom Top Header 2', 'match' ),
            'value'       => 'mt_top_header_display_2'
          )
        ),
        'std'         => 'mt_top_header_display_1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  
	  array(
        'label'       => __( 'Practice Areas - Number of items per page', 'match' ),
        'id'          => 'mt_practice_items_nr',
        'type'        => 'text',
        'desc'        => __( 'Change the number of practice area items per page', 'match' ),
        'std'         => '12',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  
	  array(
        'label'       => __( 'Practice Areas - Choose Single Item Display', 'match' ),
        'id'          => 'mt_practice_items_display',
        'type'        => 'radio',
        'desc'        => __( 'Choose how you want to display single practice area item.', 'match' ),
        'choices'     => array(
          array(
            'label'       => __( 'via Modal Window', 'match' ),
            'value'       => 'mt_practice_items_display_modal'
          ),
          array(
            'label'       => __( 'via Normal Page', 'match' ),
            'value'       => 'mt_practice_items_display_page'
          )
        ),
        'std'         => 'mt_practice_items_display_modal',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  
	  array(
        'id'          => 'mt_practice_items_top_image',
        'label'       => __( 'Practice Areas - Single Item - Parent Page Select', 'match' ),
        'desc'        => __( 'Select a parent page for single item practice area page. It will be used for diplaying the top image, title and tagline. ', 'match' ),
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'label'       => __( 'Team - Number of items per page', 'match' ),
        'id'          => 'mt_team_items_nr',
        'type'        => 'text',
        'desc'        => __( 'Change the number of team items per page', 'match' ),
        'std'         => '4',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  
	  array(
        'id'          => 'mt_team_member_top_image',
        'label'       => __( 'Team - Single Item - Parent Page Select', 'match' ),
        'desc'        => __( 'Select a parent page for single team member page. It will be used for diplaying the top image, title and tagline. ', 'match' ),
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  array(
        'label'       => __( 'Testimonials - Number of items per page', 'match' ),
        'id'          => 'mt_testimonial_items_nr',
        'type'        => 'text',
        'desc'        => __( 'Change the number of testimonial items per page', 'match' ),
        'std'         => '10',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  
	  array(
        'label'       => __( 'Case Results - Number of items per page', 'match' ),
        'id'          => 'mt_case_results_items_nr',
        'type'        => 'text',
        'desc'        => __( 'Change the number of case results items per page', 'match' ),
        'std'         => '10',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  
	  array(
        'label'       => __( 'Sidebar Display', 'match' ),
        'id'          => 'mt_sidebar_page',
        'type'        => 'radio-image',
        'desc'        => __( 'Choose how do you want to display the page sidebar for single page article, blog or page ( right / left / none )', 'match' ),
        'choices'     => array(
         array(
        'value'   => 'mt_sidebar_page_right',
        'label'   => __( 'Right Sidebar', 'match' ),
        'src'     => OT_URL . '/assets/images/layout/right-sidebar.png'
      ),
		   array(
        'value'   => 'mt_sidebar_page_left',
        'label'   => __( 'Style 3', 'match' ),
        'src'     => OT_URL . '/assets/images/layout/left-sidebar.png'
      ),
	  array(
        'value'   => 'mt_sidebar_page_no',
        'label'   => __( 'Style 1', 'match' ),
        'src'     => OT_URL . '/assets/images/layout/full-width.png'
      )
        ),
        'std'         => 'mt_sidebar_page_right',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	  
	  array(
        'label'       => __( 'Scroll Top Button', 'match' ),
        'id'          => 'mt_scroll_top',
        'type'        => 'on-off',
        'desc'        => __( 'Check this box if you want the scroll to top button to be available.', 'match' ),
        'std'         => 'on',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
	   
	    array(
        'label'       => __( 'Body Text Color', 'match' ),
        'id'          => 'mt_body_text_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose body text color.', 'match' ),
        'std'         => '#707070',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	   array(
        'label'       => __( 'Body Background Color', 'match' ),
        'id'          => 'mt_body_bkg_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose body background color.', 'match' ),
        'std'         => '#ffffff',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Link Color', 'match' ),
        'id'          => 'mt_link_primary',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose link color.', 'match' ),
        'std'         => '#ff6666',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	   array(
        'label'       => __( 'Link Hover Color', 'match' ),
        'id'          => 'mt_link_hover_primary',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose link hover color.', 'match' ),
        'std'         => '#ff6666',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Heavy Color for titles / subtitles', 'match' ),
        'id'          => 'mt_heavy_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose heavy color for titles / subtitles.', 'match' ),
        'std'         => '#404040',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Pages Title Color', 'match' ),
        'id'          => 'mt_pages_title_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose pages title color.', 'match' ),
        'std'         => '#ffffff',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Header Text Color', 'match' ),
        'id'          => 'mt_header_txt_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose header text color.', 'match' ),
        'std'         => '#999999',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Header Background Color', 'match' ),
        'id'          => 'mt_header_bkg_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose header background color.', 'match' ),
        'std'         => '#272D34',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Menu Item Normal State Color', 'match' ),
        'id'          => 'mt_menu_item_normal_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose menu item normal state color.', 'match' ),
        'std'         => '#999999',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Menu Item Hover State Color', 'match' ),
        'id'          => 'mt_menu_item_hover_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose menu item hover state color.', 'match' ),
        'std'         => '#ff6666',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Home Slider Caption Color', 'match' ),
        'id'          => 'mt_slider_caption_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose home slider caption color.', 'match' ),
        'std'         => '#ffffff',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Modal Window Background Color', 'match' ),
        'id'          => 'mt_modal_bkg_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose modal window background color.', 'match' ),
        'std'         => '#ff6666',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Modal Window Title Color', 'match' ),
        'id'          => 'mt_modal_title_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose modal window title color.', 'match' ),
        'std'         => '#ffffff',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Modal Window Text Color', 'match' ),
        'id'          => 'mt_modal_text_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose modal window text color.', 'match' ),
        'std'         => '#404040',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Footer Background Color', 'match' ),
        'id'          => 'mt_footer_bkg_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose footer background color.', 'match' ),
        'std'         => '#272D34',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Footer Text Color', 'match' ),
        'id'          => 'mt_footer_text_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose footer text color.', 'match' ),
        'std'         => '#ffffff',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Footer Widget Title Color', 'match' ),
        'id'          => 'mt_footer_widget_title_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose footer widget title color.', 'match' ),
        'std'         => '#ffffff',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	  array(
        'label'       => __( 'Footer Social Icons Normal Color', 'match' ),
        'id'          => 'mt_footer_social_normal_color',
        'type'        => 'colorpicker',
        'desc'        => __( 'Choose footer social icons normal color.', 'match' ),
        'std'         => '#ffffff',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'colors'
      ),
	  
	   
	array(
        'label'       => __( 'Show / Hide Home Slider', 'match' ),
        'id'          => 'mt_slider_on_off',
        'type'        => 'on-off',
        'desc'        => __( 'Show / Hide home slider', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'home_slideshow'
      ),
     
      array(
        'label'       => __( 'Slideshow Items', 'match' ),
        'id'          => 'mt_slides',
        'type'        => 'list-item',
        'desc'        => __( 'Create home top slideshow. Add as much items as you want.', 'match' ),
        'settings'    => array(
		
		  array(
            'label'       => __( 'Upload', 'match' ),
            'id'          => 'mt_slide_image',
            'type'        => 'upload',
            'desc'        => __( 'Upload image file. Make sure your image is at least 1600x700px for a better view.', 'match' ),
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
		  
		  array(
            'label'       => __( 'Caption title', 'match' ),
            'id'          => 'mt_caption_title',
            'type'        => 'text',
            'desc'        => __( 'Add caption title', 'match' ),
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
		  
		  array(
            'label'       => __( 'Caption sub-title', 'match' ),
            'id'          => 'mt_caption_subtitle',
            'type'        => 'text',
            'desc'        => __( 'Add caption sub-title', 'match' ),
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
		  array(
            'label'       => __( 'Slide URL', 'match' ),
            'id'          => 'mt_slide_url',
            'type'        => 'text',
            'desc'        => __( 'Optional add URL to slider', 'match' ),
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
		  
         	     ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'home_slideshow'
      ),
	
	   array(
        'label'       => __( 'Slider Autoplay', 'match' ),
        'id'          => 'mt_slides_autoplay',
        'type'        => 'on-off',
        'desc'        => __( 'Check this box if you want the slider to play automatically.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'home_slideshow'
      ),
	  
	  array(
        'label'       => __( 'Slides Speed', 'match' ),
        'id'          => 'mt_slides_speed',
        'type'        => 'text',
        'desc'        => __( 'Length between transitions in milliseconds. Make sure autoplay is checked.', 'match' ),
        'std'         => '4000',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'home_slideshow'
      ),

	   array(
        'label'       => __( 'Slides Transition', 'match' ),
        'id'          => 'mt_slide_transition',
        'type'        => 'select',
        'desc'        => __( 'Select your slides transition effect. Default is "fade".', 'match' ),
        'choices'     => array(
          array(
            'label'       => 'Fade',
            'value'       => 'fade'
          ),
          array(
            'label'       => 'Slide',
            'value'       => 'slide'
          )
		  
        ),
        'std'         => 'fade',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'home_slideshow'
      ),
	  
	  array(
        'label'       => __( 'Testimonials Speed', 'match' ),
        'id'          => 'mt_testim_speed',
        'type'        => 'text',
        'desc'        => __( 'Length between transitions in milliseconds.', 'match' ),
        'std'         => '4000',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'home_slideshow'
      ),

	   array(
        'label'       => __( 'Testimonials Transition', 'match' ),
        'id'          => 'mt_testim_transition',
        'type'        => 'select',
        'desc'        => __( 'Select transition effect. Default is "slide".', 'match' ),
        'choices'     => array(
          array(
            'label'       => 'Fade',
            'value'       => 'fade'
          ),
          array(
            'label'       => 'Slide',
            'value'       => 'slide'
          )
		  
        ),
        'std'         => 'fade',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'home_slideshow'
      ),
	  
	  array(
        'label'       => __( 'Company Awards Title Section', 'match' ),
        'id'          => 'mt_about_awards_title',
        'type'        => 'text',
        'desc'        => __( 'Add company awards title section.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	   
		 array(
        'label'       => __( 'Company Awards Items', 'match' ),
        'id'          => 'mt_about_awards_items',
        'type'        => 'list-item',
        'desc'        => __( 'Create company awards items. Add as much items as you want.', 'match' ),
        'settings'    => array(
		
		  array(
            'label'       => __( 'Item Icon', 'match' ),
            'id'          => 'mt_about_awards_item_icon',
            'type'        => 'text',
            'desc'        => __( 'Add item icon code. Please choose the icon from the Font Awesome website ( http://fortawesome.github.io/Font-Awesome/icons/ ).', 'match' ),
            'std'         => 'fa-trophy',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
		  
		      ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	  
	  array(
        'label'       => __( 'Text Title Left', 'match' ),
        'id'          => 'mt_about_text_title_l',
        'type'        => 'text',
        'desc'        => __( 'Add text title left.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	  
	  array(
        'label'       => __( 'Text Description Left', 'match' ),
        'id'          => 'mt_about_text_desc_l',
        'type'        => 'textarea-simple',
        'desc'        => __( 'Add text description left.', 'match' ),
        'std'         => '<p>Integer imperdiet purus urna, a volutpat turpis feugiat vitae. Proin molestie in metus eu volutpat. Vestibulum vitae orci sit amet nisi sollicitudin laoreet a ac augue. Nullam facilisis nisi quis dignissim vestibulum. Cras egestas, nunc id imperdiet tristique.</p>

<p>Donec porttitor tincidunt lorem id semper. Praesent consequat volutpat molestie. Suspendisse sagittis velit et lacus lacinia, vitae dignissim urna feugiat. Nam suscipit sagittis risus, vel luctus erat lobortis non. Ut placerat lacus dui. Sed velit dui, sagittis et venenatis faucibus, imperdiet.</p>',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	  
	  array(
        'label'       => __( 'Text Title Right', 'match' ),
        'id'          => 'mt_about_text_title_r',
        'type'        => 'text',
        'desc'        => __( 'Add text title right.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	  
	  array(
        'label'       => __( 'Text Description Right', 'match' ),
        'id'          => 'mt_about_text_desc_r',
        'type'        => 'textarea-simple',
        'desc'        => __( 'Add text description right.', 'match' ),
        'std'         => '<p>Integer imperdiet purus urna, a volutpat turpis feugiat vitae. Proin molestie in metus eu volutpat. Vestibulum vitae orci sit amet nisi sollicitudin laoreet a ac augue. Nullam facilisis nisi quis dignissim vestibulum. Cras egestas, nunc id imperdiet tristique.</p>

<p>Donec porttitor tincidunt lorem id semper. Praesent consequat volutpat molestie. Suspendisse sagittis velit et lacus lacinia, vitae dignissim urna feugiat. Nam suscipit sagittis risus, vel luctus erat lobortis non. Ut placerat lacus dui. Sed velit dui, sagittis et venenatis faucibus, imperdiet.</p>',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	  
	  array(
        'label'       => __( 'Process Title Section', 'match' ),
        'id'          => 'mt_about_process_title',
        'type'        => 'text',
        'desc'        => __( 'Add company process title section.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	   
		 array(
        'label'       => __( 'Proces Section Items', 'match' ),
        'id'          => 'mt_about_process_items',
        'type'        => 'list-item',
        'desc'        => __( 'Create company process items. Add as much items as you want.', 'match' ),
        'settings'    => array(
		
		  array(
            'label'       => __( 'Item Icon', 'match' ),
            'id'          => 'mt_about_process_item_icon',
            'type'        => 'text',
            'desc'        => __( 'Add item icon code. Please choose the icon from the Font Awesome website ( http://fortawesome.github.io/Font-Awesome/icons/ ).', 'match' ),
            'std'         => 'fa-comments',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
		  
		  array(
            'label'       => __( 'Item Description', 'match' ),
            'id'          => 'mt_about_process_item_desc',
            'type'        => 'textarea-simple',
            'desc'        => __( 'Add item description.', 'match' ),
            'std'         => '',
            'rows'        => '5',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
		      ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	  
	  array(
        'label'       => __( 'Office Images Title Section', 'match' ),
        'id'          => 'mt_about_office_title',
        'type'        => 'text',
        'desc'        => __( 'Office Images Title Section', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	  
	   array(
        'label'       => __( 'Office Images', 'match' ),
        'id'          => 'mt_about_office_items',
        'type'        => 'list-item',
        'desc'        => __( 'Create office image gallery. Add as much items as you want.', 'match' ),
        'settings'    => array(
		
		  array(
            'label'       => __( 'Image', 'match' ),
            'id'          => 'mt_about_office_item_img',
            'type'        => 'upload',
            'desc'        => __( 'Upload office image. To look like my demo use image size of 540x300px.', 'match' ),
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
		  
		      ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	  
	  array(
        'label'       => __( 'Testimonials Title Section', 'match' ),
        'id'          => 'mt_about_testimonials_title',
        'type'        => 'text',
        'desc'        => __( 'Add testimonials title section.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	
	   array(
        'label'       => __( 'Show / Hide Testimonials', 'match' ),
        'id'          => 'mt_about_testimonials_onoff',
        'type'        => 'on-off',
        'desc'        => __( 'Check this box if you want the testimonials show / hide on about page.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'about_page'
      ),
	  
	  array(
        'label'       => __( 'Your Email Address', 'match' ),
        'id'          => 'mt_email_contact',
        'type'        => 'text',
        'desc'        => __( 'Add your email address where you want to receive messages.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'contact'
      ),
	  
	  array(
        'label'       => __( 'Title Right', 'match' ),
        'id'          => 'mt_tright_contact_title',
        'type'        => 'text',
        'desc'        => __( 'Change the right title', 'match' ),
        'std'         => 'Find Us',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'contact'
      ),
	  
	  array(
        'label'       => __( 'Text Right Side', 'match' ),
        'id'          => 'mt_tright_contact_text',
        'type'        => 'textarea-simple',
        'desc'        => __( 'Change the right side text', 'match' ),
        'std'         => 'Phasellus porttitor posuere tempor. Aenean facilisis, neque a varius porttitor, risus dui tempus libero, dictum aliquet justo enim vitae lorem. Aliquam lacinia lacinia mi ac convallis. Nulla et lacus et risus laoreet consectetur sed non magna.',
        'rows'        => '7',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'contact'
      ),
	  
	  array(
        'label'       => __( 'Address Right Side', 'match' ),
        'id'          => 'mt_tright_contact_address',
        'type'        => 'text',
        'desc'        => __( 'Change contact address', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'contact'
      ),
	  
	  array(
        'label'       => __( 'Phone Right Side', 'match' ),
        'id'          => 'mt_tright_contact_phone',
        'type'        => 'text',
        'desc'        => __( 'Change contact phone. It is also displayed in top right header.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'contact'
      ),
	  
	  array(
        'label'       => __( 'Fax Right Side', 'match' ),
        'id'          => 'mt_tright_contact_fax',
        'type'        => 'text',
        'desc'        => __( 'Change contact fax.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'contact'
      ),
	  
	  array(
        'label'       => __( 'Email Right Side', 'match' ),
        'id'          => 'mt_tright_contact_email',
        'type'        => 'text',
        'desc'        => __( 'Change contact email. It is also displayed in top right header.', 'match' ),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'contact'
      ),
	  
	  array(
        'label'       => __( 'Enable Google Maps Right Side', 'match' ),
        'id'          => 'mt_gmap_contact',
        'type'        => 'on-off',
        'desc'        => __( 'Make sure the Address Right Side above is filled with your address.', 'match' ),
        'std'         => 'on',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'contact'
      ),
	  
	  array(
        'label'       => __( 'Choose Footer Display', 'match' ),
        'id'          => 'mt_footer_radio',
        'type'        => 'radio',
        'desc'        => __( 'Choose if you want to display contact form footer or widgetized footer.', 'match' ),
        'choices'     => array(
          array(
            'label'       => __( 'Contact Form Footer', 'match' ),
            'value'       => 'footer_contact'
          ),
          array(
            'label'       => __( 'Normal 3 Widgets Footer', 'match' ),
            'value'       => 'footer_widgets'
          )
        ),
        'std'         => 'footer_contact',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'footer'
      ),
	  
	  array(
        'label'       => __( 'Contact Form Title', 'match' ),
        'id'          => 'mt_footer_title',
        'type'        => 'text',
        'desc'        => __( 'Change contact form title.', 'match' ),
        'std'         => 'Free Case Evaluation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'footer'
      ),
	  
	  array(
        'label'       => __( 'Contact Form Second Title', 'match' ),
        'id'          => 'mt_footer_subtitle',
        'type'        => 'text',
        'desc'        => __( 'Change contact form second title.', 'match' ),
        'std'         => 'Fill out the form to receive a free confidential consultation',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'footer'
      ),
	  
	  array(
        'label'       => __( 'Copyright Text', 'match' ),
        'id'          => 'mt_footer_copy',
        'type'        => 'text',
        'desc'        => __( 'Change copyright text.', 'match' ),
        'std'         => '&copy; 2014 Lawyers. All rights reserved. Theme by matchthemes.',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'footer'
      ),
	  
	  array(
        'label'       => __('Facebook URL', 'match'),
        'id'          => 'mt_social_facebook_url',
        'type'        => 'text',
        'desc'        => __('Add Facebook URL. If the field is empty the icon will not be displayed.', 'match'),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'social_media'
      ),
	  
	  array(
        'label'       => __('Twitter URL', 'match'),
        'id'          => 'mt_social_twitter_url',
        'type'        => 'text',
        'desc'        => __('Add Twitter URL. If the field is empty the icon will not be displayed.', 'match'),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'social_media'
      ),
	  
	  array(
        'label'       => __('Google Plus URL', 'match'),
        'id'          => 'mt_social_gplus_url',
        'type'        => 'text',
        'desc'        => __('Add Google Plus URL. If the field is empty the icon will not be displayed.', 'match'),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'social_media'
      ),
	  
	  array(
        'label'       => __('Linkedin URL', 'match'),
        'id'          => 'mt_social_linkedin_url',
        'type'        => 'text',
        'desc'        => __('Add Linkedin URL. If the field is empty the icon will not be displayed.', 'match'),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'social_media'
      ),
	  
	  array(
        'label'       => __('YouTube URL', 'match'),
        'id'          => 'mt_social_youtube_url',
        'type'        => 'text',
        'desc'        => __('Add YouTube URL. If the field is empty the icon will not be displayed.', 'match'),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'social_media'
      ),
	  
	  array(
        'label'       => __('Vimeo URL', 'match'),
        'id'          => 'mt_social_vimeo_url',
        'type'        => 'text',
        'desc'        => __('Add Vimeo URL. If the field is empty the icon will not be displayed.', 'match'),
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'social_media'
      ),

	 
	  array(
        'label'       => __('Font Family', 'match'),
        'id'          => 'mt_headers_family',
        'type'        => 'select',
        'desc'        => __('Select a font family from the Google Web Fonts.', 'match'),
        'choices'     => $my_fonts,
        'std'         => 'Droid Serif',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'typography'
      ),
	  
	  array(
        'id'          => 'mt_body_size2',
        'label'       => __( 'Body Font Size', 'match' ),
        'desc'        => __( 'Select text font page size', 'match' ),
        'std'         => '16',
        'type'        => 'numeric-slider',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '8,120,2',
        'class'       => '',
      ),
	  
	  
	  array(
        'id'          => 'mt_h1_size',
        'label'       => __( 'H1 Font Size', 'match' ),
        'desc'        => __( 'Select H1 heading font size', 'match' ),
        'std'         => '72',
        'type'        => 'numeric-slider',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '8,120,2',
        'class'       => '',
      ),
	  
	  array(
        'id'          => 'mt_h2_size',
        'label'       => __( 'H2 Font Size', 'match' ),
        'desc'        => __( 'Select H2 heading font size', 'match' ),
        'std'         => '54',
        'type'        => 'numeric-slider',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '8,120,2',
        'class'       => '',
      ),
	  
	  array(
        'id'          => 'mt_h3_size',
        'label'       => __( 'H3 Font Size', 'match' ),
        'desc'        => __( 'Select H3 heading font size', 'match' ),
        'std'         => '48',
        'type'        => 'numeric-slider',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '8,120,2',
        'class'       => '',
      ),
	  
	  array(
        'id'          => 'mt_h4_size',
        'label'       => __( 'H4 Font Size', 'match' ),
        'desc'        => __( 'Select H4 heading font size', 'match' ),
        'std'         => '32',
        'type'        => 'numeric-slider',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '8,120,2',
        'class'       => '',
      ),
	  
	  array(
        'id'          => 'mt_h5_size',
        'label'       => __( 'H5 Font Size', 'match' ),
        'desc'        => __( 'Select H5 heading font size', 'match' ),
        'std'         => '24',
        'type'        => 'numeric-slider',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '8,120,2',
        'class'       => '',
      ),
	  
	  array(
        'id'          => 'mt_h6_size',
        'label'       => __( 'H6 Font Size', 'match' ),
        'desc'        => __( 'Select H6 heading font size', 'match' ),
        'std'         => '16',
        'type'        => 'numeric-slider',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '8,120,2',
        'class'       => '',
      ),
	 
	
	)
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}

if ( ! function_exists( 'mt_get_google_fonts' ) ) :

function mt_get_google_fonts(){

$xfonts = array(
          array(
            'label'       => 'ABeeZee',
            'value'       => 'ABeeZee'
          ),
          array(
            'label'       => 'Abel',
            'value'       => 'Abel'
          ),
          array(
            'label'       => 'Acme',
            'value'       => 'Acme'
          ),
          array(
            'label'       => 'Actor',
            'value'       => 'Actor'
          ),
          array(
            'label'       => 'Adamina',
            'value'       => 'Adamina'
          ),
          array(
            'label'       => 'Aldrich',
            'value'       => 'Aldrich'
          ),
          array(
            'label'       => 'Alice',
            'value'       => 'Alice'
          ),
          array(
            'label'       => 'Allerta',
            'value'       => 'Allerta'
          ),
          array(
            'label'       => 'Almendra',
            'value'       => 'Almendra'
          ),
          array(
            'label'       => 'Amaranth',
            'value'       => 'Amaranth'
          ),
          array(
            'label'       => 'Anonymous Pro',
            'value'       => 'Anonymous Pro'
          ),
          array(
            'label'       => 'Anton',
            'value'       => 'Anton'
          ),
          array(
            'label'       => 'Arapey',
            'value'       => 'Arapey'
          ),
          array(
            'label'       => 'Archivo Narrow',
            'value'       => 'Archivo Narrow'
          ),
          array(
            'label'       => 'Arvo',
            'value'       => 'Arvo'
          ),
          array(
            'label'       => 'Asul',
            'value'       => 'Asul'
          ),
          array(
            'label'       => 'Belgrano',
            'value'       => 'Belgrano'
          ),
          array(
            'label'       => 'Belleza',
            'value'       => 'Belleza'
          ),
          array(
            'label'       => 'BenchNine',
            'value'       => 'BenchNine'
          ),
          array(
            'label'       => 'Bentham',
            'value'       => 'Bentham'
          ),
          array(
            'label'       => 'Bitter',
            'value'       => 'Bitter'
          ),
          array(
            'label'       => 'Brawler',
            'value'       => 'Brawler'
          ),
          array(
            'label'       => 'Bree Serif',
            'value'       => 'Bree Serif'
          ),
          array(
            'label'       => 'Buenard',
            'value'       => 'Buenard'
          ),
          array(
            'label'       => 'Cabin',
            'value'       => 'Cabin'
          ),
          array(
            'label'       => 'Cagliostro',
            'value'       => 'Cagliostro'
          ),
          array(
            'label'       => 'Cambo',
            'value'       => 'Cambo'
          ),
          array(
            'label'       => 'Candal',
            'value'       => 'Candal'
          ),
          array(
            'label'       => 'Cantarell',
            'value'       => 'Cantarell'
          ),
          array(
            'label'       => 'Cantora One',
            'value'       => 'Cantora One'
          ),
          array(
            'label'       => 'Capriola',
            'value'       => 'Capriola'
          ),
          array(
            'label'       => 'Cardo',
            'value'       => 'Cardo'
          ),
          array(
            'label'       => 'Carme',
            'value'       => 'Carme'
          ),
          array(
            'label'       => 'Caudex',
            'value'       => 'Caudex'
          ),
          array(
            'label'       => 'Chivo',
            'value'       => 'Chivo'
          ),
          array(
            'label'       => 'Cinzel',
            'value'       => 'Cinzel'
          ),
          array(
            'label'       => 'Convergence',
            'value'       => 'Convergence'
          ),
          array(
            'label'       => 'Copse',
            'value'       => 'Copse'
          ),
          array(
            'label'       => 'Cousine',
            'value'       => 'Cousine'
          ),
          array(
            'label'       => 'Coustard',
            'value'       => 'Coustard'
          ),
          array(
            'label'       => 'Crete Round',
            'value'       => 'Crete Round'
          ),
          array(
            'label'       => 'Crimson Text',
            'value'       => 'Crimson Text'
          ),
          array(
            'label'       => 'Cuprum',
            'value'       => 'Cuprum'
          ),
          array(
            'label'       => 'Cutive',
            'value'       => 'Cutive'
          ),
          array(
            'label'       => 'Cutive Mono',
            'value'       => 'Cutive Mono'
          ),
          array(
            'label'       => 'Days One',
            'value'       => 'Days One'
          ),
          array(
            'label'       => 'Della Respira',
            'value'       => 'Della Respira'
          ),
          array(
            'label'       => 'Didact Gothic',
            'value'       => 'Didact Gothic'
          ),
          array(
            'label'       => 'Doppio One',
            'value'       => 'Doppio One'
          ),
          array(
            'label'       => 'Dorsa',
            'value'       => 'Dorsa'
          ),
          array(
            'label'       => 'Dosis',
            'value'       => 'Dosis'
          ),
          array(
            'label'       => 'Droid Sans',
            'value'       => 'Droid Sans'
          ),
          array(
            'label'       => 'Droid Sans Mono',
            'value'       => 'Droid Sans Mono'
          ),
          array(
            'label'       => 'Droid Serif',
            'value'       => 'Droid Serif'
          ),
          array(
            'label'       => 'Duru Sans',
            'value'       => 'Duru Sans'
          ),
          array(
            'label'       => 'EB Garamond',
            'value'       => 'EB Garamond'
          ),
          array(
            'label'       => 'Economica',
            'value'       => 'Economica'
          ),
          array(
            'label'       => 'Electrolize',
            'value'       => 'Electrolize'
          ),
          array(
            'label'       => 'Englebert',
            'value'       => 'Englebert'
          ),
          array(
            'label'       => 'Enriqueta',
            'value'       => 'Enriqueta'
          ),
          array(
            'label'       => 'Esteban',
            'value'       => 'Esteban'
          ),
          array(
            'label'       => 'Exo',
            'value'       => 'Exo'
          ),
          array(
            'label'       => 'Fanwood Text',
            'value'       => 'Fanwood Text'
          ),
          array(
            'label'       => 'Federo',
            'value'       => 'Federo'
          ),
          array(
            'label'       => 'Fenix',
            'value'       => 'Fenix'
          ),
          array(
            'label'       => 'Fjord One',
            'value'       => 'Fjord One'
          ),
          array(
            'label'       => 'Francois One',
            'value'       => 'Francois One'
          ),
          array(
            'label'       => 'Fresca',
            'value'       => 'Fresca'
          ),
          array(
            'label'       => 'Gafata',
            'value'       => 'Gafata'
          ),
          array(
            'label'       => 'Galdeano',
            'value'       => 'Galdeano'
          ),
          array(
            'label'       => 'Gentium Basic',
            'value'       => 'Gentium Basic'
          ),
          array(
            'label'       => 'Gentium Book Basic',
            'value'       => 'Gentium Book Basic'
          ),
          array(
            'label'       => 'Geo',
            'value'       => 'Geo'
          ),
          array(
            'label'       => 'Gilda Display',
            'value'       => 'Gilda Display'
          ),
          array(
            'label'       => 'Glegoo',
            'value'       => 'Glegoo'
          ),
          array(
            'label'       => 'Gudea',
            'value'       => 'Gudea'
          ),
          array(
            'label'       => 'Habibi',
            'value'       => 'Habibi'
          ),
          array(
            'label'       => 'Hammersmith One',
            'value'       => 'Hammersmith One'
          ),
          array(
            'label'       => 'Headland One',
            'value'       => 'Headland One'
          ),
          array(
            'label'       => 'Holtwood One SC',
            'value'       => 'Holtwood One SC'
          ),
          array(
            'label'       => 'Homenaje',
            'value'       => 'Homenaje'
          ),
          array(
            'label'       => 'Imprima',
            'value'       => 'Imprima'
          ),
          array(
            'label'       => 'Inconsolata',
            'value'       => 'Inconsolata'
          ),
          array(
            'label'       => 'Inder',
            'value'       => 'Inder'
          ),
          array(
            'label'       => 'Inika',
            'value'       => 'Inika'
          ),
          array(
            'label'       => 'Istok Web',
            'value'       => 'Istok Web'
          ),
          array(
            'label'       => 'Italiana',
            'value'       => 'Italiana'
          ),
          array(
            'label'       => 'Jacques Francois',
            'value'       => 'Jacques Francois'
          ),
          array(
            'label'       => 'Jockey One',
            'value'       => 'Jockey One'
          ),
          array(
            'label'       => 'Josefin Sans',
            'value'       => 'Josefin Sans'
          ),
          array(
            'label'       => 'Josefin Slab',
            'value'       => 'Josefin Slab'
          ),
          array(
            'label'       => 'Judson',
            'value'       => 'Judson'
          ),
          array(
            'label'       => 'Junge',
            'value'       => 'Junge'
          ),
          array(
            'label'       => 'Kameron',
            'value'       => 'Kameron'
          ),
          array(
            'label'       => 'Karla',
            'value'       => 'Karla'
          ),
          array(
            'label'       => 'Kite One',
            'value'       => 'Kite One'
          ),
          array(
            'label'       => 'Kotta One',
            'value'       => 'Kotta One'
          ),
          array(
            'label'       => 'Kreon',
            'value'       => 'Kreon'
          ),
          array(
            'label'       => 'Lato',
            'value'       => 'Lato'
          ),
          array(
            'label'       => 'Ledger',
            'value'       => 'Ledger'
          ),
          array(
            'label'       => 'Lekton',
            'value'       => 'Lekton'
          ),
          array(
            'label'       => 'Lora',
            'value'       => 'Lora'
          ),
          array(
            'label'       => 'Lusitana',
            'value'       => 'Lusitana'
          ),
          array(
            'label'       => 'Lustria',
            'value'       => 'Lustria'
          ),
          array(
            'label'       => 'Magra',
            'value'       => 'Magra'
          ),
          array(
            'label'       => 'Mako',
            'value'       => 'Mako'
          ),
          array(
            'label'       => 'Marcellus',
            'value'       => 'Marcellus'
          ),
          array(
            'label'       => 'Marko One',
            'value'       => 'Marko One'
          ),
          array(
            'label'       => 'Marmelad',
            'value'       => 'Marmelad'
          ),
          array(
            'label'       => 'Marvel',
            'value'       => 'Marvel'
          ),
          array(
            'label'       => 'Mate',
            'value'       => 'Mate'
          ),
          array(
            'label'       => 'Maven Pro',
            'value'       => 'Maven Pro'
          ),
          array(
            'label'       => 'Merriweather',
            'value'       => 'Merriweather'
          ),
          array(
            'label'       => 'Metrophobic',
            'value'       => 'Metrophobic'
          ),
          array(
            'label'       => 'Michroma',
            'value'       => 'Michroma'
          ),
          array(
            'label'       => 'Molengo',
            'value'       => 'Molengo'
          ),
          array(
            'label'       => 'Montaga',
            'value'       => 'Montaga'
          ),
          array(
            'label'       => 'Montserrat',
            'value'       => 'Montserrat'
          ),
          array(
            'label'       => 'Mouse Memoirs',
            'value'       => 'Mouse Memoirs'
          ),
          array(
            'label'       => 'Muli',
            'value'       => 'Muli'
          ),
          array(
            'label'       => 'Neuton',
            'value'       => 'Neuton'
          ),
          array(
            'label'       => 'News Cycle',
            'value'       => 'News Cycle'
          ),
          array(
            'label'       => 'Nobile',
            'value'       => 'Nobile'
          ),
          array(
            'label'       => 'Noticia Text',
            'value'       => 'Noticia Text'
          ),
		   array(
            'label'       => 'Noto Sans',
            'value'       => 'Noto Sans'
          ),
		   array(
            'label'       => 'Noto Serif',
            'value'       => 'Noto Serif'
          ),		  
          array(
            'label'       => 'Numans',
            'value'       => 'Numans'
          ),
          array(
            'label'       => 'Nunito',
            'value'       => 'Nunito'
          ),
          array(
            'label'       => 'Old Standard TT',
            'value'       => 'Old Standard TT'
          ),
          array(
            'label'       => 'Open Sans',
            'value'       => 'Open Sans'
          ),
          array(
            'label'       => 'Open Sans Condensed',
            'value'       => 'Open Sans Condensed'
          ),
          array(
            'label'       => 'Oranienbaum',
            'value'       => 'Oranienbaum'
          ),
          array(
            'label'       => 'Orbitron',
            'value'       => 'Orbitron'
          ),
          array(
            'label'       => 'Orienta',
            'value'       => 'Orienta'
          ),
          array(
            'label'       => 'Oswald',
            'value'       => 'Oswald'
          ),
          array(
            'label'       => 'Ovo',
            'value'       => 'Ovo'
          ),
          array(
            'label'       => 'Oxygen',
            'value'       => 'Oxygen'
          ),
          array(
            'label'       => 'Oxygen Mono',
            'value'       => 'Oxygen Mono'
          ),
          array(
            'label'       => 'PT Mono',
            'value'       => 'PT Mono'
          ),
          array(
            'label'       => 'PT Sans',
            'value'       => 'PT Sans'
          ),
          array(
            'label'       => 'PT Sans Caption',
            'value'       => 'PT Sans Caption'
          ),
          array(

            'label'       => 'PT Sans Narrow',
            'value'       => 'PT Sans Narrow'
          ),
          array(
            'label'       => 'PT Serif',
            'value'       => 'PT Serif'
          ),
          array(
            'label'       => 'PT Serif Caption',
            'value'       => 'PT Serif Caption'
          ),
          array(
            'label'       => 'Paytone One',
            'value'       => 'Paytone One'
          ),
          array(
            'label'       => 'Petrona',
            'value'       => 'Petrona'
          ),
          array(
            'label'       => 'Philosopher',
            'value'       => 'Philosopher'
          ),
          array(
            'label'       => 'Play',
            'value'       => 'Play'
          ),
          array(
            'label'       => 'Playfair Display',
            'value'       => 'Playfair Display'
          ),
          array(
            'label'       => 'Podkova',
            'value'       => 'Podkova'
          ),
          array(
            'label'       => 'Poly',
            'value'       => 'Poly'
          ),
          array(
            'label'       => 'Pontano Sans',
            'value'       => 'Pontano Sans'
          ),
          array(
            'label'       => 'Port Lligat Sans',
            'value'       => 'Port Lligat Sans'
          ),
          array(
            'label'       => 'Port Lligat Slab',
            'value'       => 'Port Lligat Slab'
          ),
          array(
            'label'       => 'Prata',
            'value'       => 'Prata'
          ),
          array(
            'label'       => 'Prociono',
            'value'       => 'Prociono'
          ),
          array(
            'label'       => 'Puritan',
            'value'       => 'Puritan'
          ),
          array(
            'label'       => 'Quando',
            'value'       => 'Quando'
          ),
          array(
            'label'       => 'Quantico',
            'value'       => 'Quantico'
          ),
          array(
            'label'       => 'Quattrocento',
            'value'       => 'Quattrocento'
          ),
          array(
            'label'       => 'Quattrocento Sans',
            'value'       => 'Quattrocento Sans'
          ),
          array(
            'label'       => 'Questrial',
            'value'       => 'Questrial'
          ),
          array(
            'label'       => 'Quicksand',
            'value'       => 'Quicksand'
          ),
          array(
            'label'       => 'Radley',
            'value'       => 'Radley'
          ),
          array(
            'label'       => 'Raleway',
            'value'       => 'Raleway'
          ),
          array(
            'label'       => 'Rambla',
            'value'       => 'Rambla'
          ),
          array(
            'label'       => 'Rationale',
            'value'       => 'Rationale'
          ),
          array(
            'label'       => 'Rokkitt',
            'value'       => 'Rokkitt'
          ),
          array(
            'label'       => 'Ropa Sans',
            'value'       => 'Ropa Sans'
          ),
          array(
            'label'       => 'Rosario',
            'value'       => 'Rosario'
          ),
          array(
            'label'       => 'Rufina',
            'value'       => 'Rufina'
          ),
          array(
            'label'       => 'Ruluko',
            'value'       => 'Ruluko'
          ),
          array(
            'label'       => 'Rum Raisin',
            'value'       => 'Rum Raisin'
          ),
          array(
            'label'       => 'Russo One',
            'value'       => 'Russo One'
          ),
          array(
            'label'       => 'Sanchez',
            'value'       => 'Sanchez'
          ),
          array(
            'label'       => 'Scada',
            'value'       => 'Scada'
          ),
          array(
            'label'       => 'Seymour One',
            'value'       => 'Seymour One'
          ),
          array(
            'label'       => 'Shanti',
            'value'       => 'Shanti'
          ),
          array(
            'label'       => 'Share Tech',
            'value'       => 'Share Tech'
          ),
          array(
            'label'       => 'Share Tech Mono',
            'value'       => 'Share Tech Mono'
          ),
          array(
            'label'       => 'Signika',
            'value'       => 'Signika'
          ),
          array(
            'label'       => 'Signika Negative',
            'value'       => 'Signika Negative'
          ),
          array(
            'label'       => 'Snippet',
            'value'       => 'Snippet'
          ),
          array(
            'label'       => 'Sorts Mill Goudy',
            'value'       => 'Sorts Mill Goudy'
          ),
          array(
            'label'       => 'Source Code Pro',
            'value'       => 'Source Code Pro'
          ),
          array(
            'label'       => 'Source Sans Pro',
            'value'       => 'Source Sans Pro'
          ),
          array(
            'label'       => 'Spinnaker',
            'value'       => 'Spinnaker'
          ),
          array(
            'label'       => 'Stoke',
            'value'       => 'Stoke'
          ),
          array(
            'label'       => 'Strait',
            'value'       => 'Strait'
          ),
          array(
            'label'       => 'Telex',
            'value'       => 'Telex'
          ),
          array(
            'label'       => 'Tenor Sans',
            'value'       => 'Tenor Sans'
          ),
          array(
            'label'       => 'Text Me One',
            'value'       => 'Text Me One'
          ),
          array(
            'label'       => 'Tienne',
            'value'       => 'Tienne'
          ),
          array(
            'label'       => 'Tinos',
            'value'       => 'Tinos'
          ),
          array(
            'label'       => 'Trocchi',
            'value'       => 'Trocchi'
          ),
          array(
            'label'       => 'Ubuntu',
            'value'       => 'Ubuntu'
          ),
          array(
            'label'       => 'Ubuntu Condensed',
            'value'       => 'Ubuntu Condensed'
          ),
          array(
            'label'       => 'Ubuntu Mono',
            'value'       => 'Ubuntu Mono'
          ),
          array(
            'label'       => 'Ultra',
            'value'       => 'Ultra'
          ),
          array(
            'label'       => 'Unna',
            'value'       => 'Unna'
          ),
          array(
            'label'       => 'Varela',
            'value'       => 'Varela'
          ),
          array(
            'label'       => 'Varela Round',
            'value'       => 'Varela Round'
          ),
          array(
            'label'       => 'Vidaloka',
            'value'       => 'Vidaloka'
          ),
          array(
            'label'       => 'Viga',
            'value'       => 'Viga'
          ),
          array(
            'label'       => 'Volkhov',
            'value'       => 'Volkhov'
          ),
          array(
            'label'       => 'Vollkorn',
            'value'       => 'Vollkorn'
          ),
          array(
            'label'       => 'Voltaire',
            'value'       => 'Voltaire'
          ),
          array(
            'label'       => 'Wire One',
            'value'       => 'Wire One'
          ),
          array(
            'label'       => 'Yanone Kaffeesatz',
            'value'       => 'Yanone Kaffeesatz'
          )
          
        );
	
	return apply_filters( 'mt_get_google_fonts', $xfonts );
	
	}
	
endif;