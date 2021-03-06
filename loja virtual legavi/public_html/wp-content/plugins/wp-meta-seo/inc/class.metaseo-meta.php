<?php
/* Based on some work of Yoast SEO plugin */
class WPMSEO_Meta {

    public static $meta_prefix = '_metaseo_meta';
    public static $form_prefix = 'metaseo_wpmseo_';
    public static $meta_length = 156;
    public static $meta_title_length = 69;
    public static $meta_keywords_length = 256;
    public static $meta_length_reason = '';
    
    public static $meta_fields = array(
        'general' => array(
            'snippetpreview' => array(
                'type' => 'snippetpreview',
                'title' => '',
                'help' => '',
            ),
            'title' => array(
                'type' => 'textarea',
                'title' => '',
                'default_value' => '',
                'description' => '',
                'help' => '',
                'rows' => 2
            ),
            'keywords' => array(
                'type' => 'textarea',
                'title' => '',
                'default_value' => '',
                'description' => '',
                'help' => '',
                'rows' => 2
            ),
            'desc' => array(
                'type' => 'textarea',
                'title' => '',
                'default_value' => '',
                'class' => 'desc',
                'rows' => 3,
                'description' => '',
                'help' => '',
            ),
            'metaseo_chart' => array(
                'type' => 'metaseo_chart',
                'title' => '',
                'default_value' => '',
                'class' => 'metaseo_chart',
                'rows' => 2,
                'description' => '',
                'help' => '',
            ),
        ),
        'social' => array(
            'opengraph-title' => array(
                'type' => 'text',
                'title' => '',
                'default_value' => '',
                'description' => '',
                'help' => '',
            ),
            'opengraph-desc' => array(
                'type' => 'textarea',
                'title' => '',
                'default_value' => '',
                'class' => 'desc',
                'rows' => 3,
                'description' => '',
                'help' => '',
            ),
            'opengraph-image' => array(
                'type' => 'upload',
                'title' => '',
                'default_value' => '',
                'class' => 'desc',
                'description' => '',
                'help' => '',
            ),
            
            'twitter-title' => array(
                'type' => 'text',
                'title' => '',
                'default_value' => '',
                'description' => '',
                'help' => '',
            ),
            'twitter-desc' => array(
                'type' => 'textarea',
                'title' => '',
                'default_value' => '',
                'class' => 'desc',
                'rows' => 3,
                'description' => '',
                'help' => '',
            ),
            'twitter-image' => array(
                'type' => 'upload',
                'title' => '',
                'default_value' => '',
                'class' => 'desc',
                'description' => '',
                'help' => '',
            ),
            
        ),
        
        'non_form' => array(
            'linkdex' => array(
                'type' => null,
                'default_value' => '0',
            ),
        ),
    );
    public static $fields_index = array();
    public static $defaults = array();
    private static $social_networks = array(
        'opengraph' => 'opengraph',
        'twitter' => 'twitter',
        'googleplus' => 'google-plus',
    );
    private static $social_fields = array(
        'title' => 'text',
        'description' => 'textarea',
        'image' => 'upload',
    );

    public static function init() {
        add_filter('update_post_metadata', array(__CLASS__, 'remove_meta_if_default'), 10, 5);
        add_filter('add_post_metadata', array(__CLASS__, 'dont_save_meta_if_default'), 10, 4);
    }
    
    public static function get_meta_field_defs($tab, $post_type = 'post') {
        if (!isset(self::$meta_fields[$tab])) {
            return array();
        }

        $field_defs = self::$meta_fields[$tab];
        switch ($tab) {
            case 'non-form':
                $field_defs = array();
                break;


            case 'general':
                $options = get_option('wpmseo_titles');
                if ($options['usemetakeywords'] === true) {
                    $field_defs['metakeywords']['description'] = sprintf($field_defs['metakeywords']['description'], '<a target="_blank" href="' . esc_url(admin_url('admin.php?page=wpmseo_titles#top#post_types')) . '">', '</a>');
                } else {
                    unset($field_defs['metakeywords']);
                }
                
                $field_defs = apply_filters('wpmseo_metabox_entries', $field_defs);
                break;


            case 'advanced':
                break;
        }

        return apply_filters('wpmseo_metabox_entries_' . $tab, $field_defs, $post_type);
    }

    public static function get_value($key, $postid = 0) {
        global $post;

        $postid = absint($postid);
        if ($postid === 0) {
            if (( isset($post) && is_object($post) ) && ( isset($post->post_status) && $post->post_status !== 'auto-draft' )) {
                $postid = $post->ID;
            } else {
                return '';
            }
        }

        $custom = get_post_custom($postid);

        if (isset($custom[self::$meta_prefix . $key][0])) {
            $unserialized = maybe_unserialize($custom[self::$meta_prefix . $key][0]);
            if ($custom[self::$meta_prefix . $key][0] === $unserialized) {
                return $custom[self::$meta_prefix . $key][0];
            } else {
                return '';
            }
        }

        if (isset(self::$defaults[self::$meta_prefix . $key])) {
            return self::$defaults[self::$meta_prefix . $key];
        } else {
            return '';
        }
    }

    public static function set_value($key, $meta_value, $post_id) {
        return update_post_meta($post_id, self::$meta_prefix . $key, $meta_value);
    }
}

/* End of class */
