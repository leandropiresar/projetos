<?php
/**
 * Contact Form Shortcode Class
 *
 * @since 4bzCore 1.0.0
 *
 * @package 4bzCore
 * @subpackage class-4bzcore-shortcode-contact-form.php
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

if ( ! class_exists( 'FourBzCore_Shortcode_Contact_Form' ) ) {  
	class FourBzCore_Shortcode_Contact_Form {
		// Class Variables
		/**
		 * Index used to construct the id for an instance of the class.
		 *
		 * @since 1.0.0
		 * @access private
		 * @var int $index
		 */
		private static $index = 0;
		
		/**
		 * Id base used to construct the id for an instance of the class.
		 *
		 * @since 1.0.0
		 * @access private
		 * @var string $id_base
		 */
		private $id_base;

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			$this->id_base = 'fourbzcore-contact-form-';
		}
		
		/**
		 * Construct id for a shortcode instance.
		 *
		 * @since 1.0.0
		 * @return string id.
		 */
		public function get_id() {
			// On every access, increment the index for use in the shortcode id.
			++self::$index;
			
			return $this->id_base . self::$index;
		}
		
		/**
		 * Output the shortcode.
		 *
		 * Calls the template function to output the shortcode and passes it a global variable that holds all of the
		 * information needed to output the shortcode.
		 *
		 * @since 1.0.0
		 *
		 * @param array $atts Required. Options for display.
		 */
		public function display( $atts ) {
			extract( $atts );
			
			// Get the template
			$template = locate_template( 'templates/contact-form.php', false, false );
			
			// If theme does not provide a template, then will use the one provided by the plugin.
			if ( empty( $template ) ) {
				$template = dirname( dirname ( dirname(__FILE__) ) ) . '/templates/contact-form.php';
			}
			
			include( $template );
		}
	}
}