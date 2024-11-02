<?php
class DemoWidget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'demowidget', // Widget ID
            __('Demo Widget','widgets'), // Widget Name
          __('Description of widget','widgets') // Description as an array
        );
    }

    public function form($instance) { // Input form in the admin
        $title = isset($instance['title']) ? $instance['title'] : __('Demo_widgets', 'widgets');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Demo', 'widgets'); ?></label>
            <input class="widefat" 
                   id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" 
                   type="text" 
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    public function widget($args, $instance) { // Display widget content on the front end
        echo $args['before_widget'];

        if (isset($instance['title']) && $instance['title'] != '') {
            echo $args['before_title'];
            echo apply_filters('widget_title', $instance['title']); // Corrected `apply_filters`
            echo $args['after_title'];
        }

        // Any additional widget content goes here

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}


?>