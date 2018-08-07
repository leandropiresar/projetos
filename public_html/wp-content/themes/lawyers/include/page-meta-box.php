<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'mt_custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function mt_custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
   
   $mt_page_meta_box = array(
    'id'          => 'mt_page_meta_box',
    'title'       => 'Page Customization',
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      
	 array(
        'label'       => 'Custom Title',
        'id'          => 'mt_page_title',
        'type'        => 'text',
        'desc'        => 'Change page custom title',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''       
      ),
	  
	  array(
        'label'       => 'Tagline text',
        'id'          => 'mt_page_tagline',
        'type'        => 'text',
        'desc'        => 'Change page tagline text',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

	  array(
        'label'       => 'Top Background Image',
        'id'          => 'mt_page_bkg_img',
        'type'        => 'upload',
        'desc'        => 'Upload top background image. For better view image size 1600x300px',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )	  
      
  	)
  );
   
   
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  ot_register_meta_box( $mt_page_meta_box); 
 

}