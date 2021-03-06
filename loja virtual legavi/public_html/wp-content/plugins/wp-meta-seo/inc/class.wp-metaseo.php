<?php
//Main plugin functions here
class WpMetaSeo {
    
    private static $initiated = false;
    
	public function __construct(){
		add_action('admin_notices', array($this, 'plugin_activation_notices'));
	}
	
    public static function init() {
		ob_start();
		if ( ! self::$initiated ) {
			self::init_hooks(); 
		}
    }
        
    /**
	 * Initializes WordPress hooks
	 */
	private static function init_hooks() {
		self::$initiated = true;
	}
	
	public static function  new_title($title){
		global $wp_query;
		return $title;
	}
        
         /**
     * Attached to activate_{ plugin_basename( __FILES__ ) } by register_activation_hook()
     * @static
     */
    public static function plugin_activation() {
        if (version_compare($GLOBALS['wp_version'], WPMETASEO_MINIMUM_WP_VERSION, '<')) {
            deactivate_plugins(basename(__FILE__));
            wp_die('<p>The <strong>WP Meta SEO</strong> plugin requires WordPress ' . WPMETASEO_MINIMUM_WP_VERSION . ' or higher.</p>', 'Plugin Activation Error', array('response' => 200, 'back_link' => TRUE));
        }
        
        
        global $wpdb;
		//Set two param as flags that determine whether show import meta data from other SEO plugin button or not to 0
		update_option('_aio_import_notice_flag', 0);
		update_option('_yoast_import_notice_flag', 0);
		update_option('plugin_to_sync_with', 0);
		
        self::install_db();
    }
	
    /**
     * Removes all connection options
     * @static
     */
    public static function plugin_deactivation() {
        //tidy up
    }

        
	public static function install_db(){
		global $wpdb;
		$table_name = $wpdb->prefix . 'metaseo_images';
		
		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `post_id` int(11) NOT NULL,
			  `posts_optimized_id` text COLLATE utf8_unicode_ci NOT NULL,
			  `posts_need_to_optimize_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
			  `posts_prepare_to_optimize` text COLLATE utf8_unicode_ci NOT NULL,
			  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			  `alt_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			  `legend` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
			  `link` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";

	    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		
	    dbDelta( $sql );
	}
}