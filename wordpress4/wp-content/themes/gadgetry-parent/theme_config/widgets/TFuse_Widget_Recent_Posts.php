<?php
// =============================== Recent Posts Widget ======================================

class TFuse_Recent_Posts extends WP_Widget {

    function __construct() {
        $widget_ops = array('description' => '' );
        parent::__construct(false, __('TFuse - Recent Posts', 'tfuse'),$widget_ops);
    }

    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts','tfuse') : $instance['title'], $instance, $this->id_base);
        $number = esc_attr($instance['number']);
        if ($number>0) {} else $number = 8;

        $template_directory = get_template_directory_uri();
    ?>

    <div class="widget-container widget_recent_entries">
        <h3 class="widget-title"><?php echo tfuse_qtranslate($title); ?></h3>
        <ul>
            <?php
            $pop_posts =  tfuse_shortcode_posts(array(
                                'sort' => 'recent',
                                'items' => $number,
                                'image_post' => true,
                                'image_width' => 60,
                                'image_height' => 60,
                                'image_class' => 'thumbnail',
                                'date_post' => true,
                                'date_format' => 'jS F Y'
                            ));

            foreach($pop_posts as $post_val): ?>
                <li>
                    <a href="<?php echo $post_val['post_link']; ?>"><?php echo $post_val['post_img']; ?></a>
                    <div class="post-title">
                        <a href="<?php echo $post_val['post_link']; ?>"><?php echo $post_val['post_title']; ?></a>
                    </div>
					<?php if(!tfuse_options('date_time')):?>
                    <div class="post-date"><?php echo $post_val['post_date_post']; ?></div>
					<?php endif;?>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>

    <?php
    }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {
        $instance = wp_parse_args( (array) $instance, array(  'title' => '', 'number' => '') );
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = esc_attr($instance['number']);
        ?>
       <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','tfuse'); ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts','tfuse'); ?>:</label>
            <input type="text" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $number; ?>" class="widefat" id="<?php echo $this->get_field_id('number'); ?>" />
        </p>

    <?php
    }
}
    function TFuse_Unregister_WP_Widget_Recent_Posts() {
            unregister_widget('WP_Widget_Recent_Posts');
    }
add_action('widgets_init','TFuse_Unregister_WP_Widget_Recent_Posts');

register_widget('TFuse_Recent_Posts');