<?php
class DemoWidget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'demowidget', // Widget ID
            __('Demo Widget','widgets'), // Widget Name
         array(__('Description of widget','widgets')) // Description as an array
        );
    }

    public function form($instance) { // Input form in the admin
        // print_r($instance);
        $title = isset($instance['title']) ? $instance['title'] : __('Insurt your name', 'widgets');
        $email = isset($instance['email']) ? $instance['email'] : __('Insurt your Email', 'widgets');

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Insurt your Name:','widgets')?></label>
            <input type="text" class="title_class"
             id="<?php echo esc_attr($this->get_field_id('title')); ?>"
             name="<?php echo esc_attr($this->get_field_name('title')); ?>"
             value="<?php echo esc_attr($title) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_for')); ?>"><?php _e('Insurt your Email:','widgets')?></label>
            <input type="email"
             id="<?php echo esc_attr($this->get_field_id('email_for')); ?>"
             name="<?php echo esc_attr($this->get_field_name('email')); ?>"
             value="<?php echo esc_attr($email) ?>">
        </p>
        <?php
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        if (isset($instance['title']) && $instance['title'] != '') {
            echo $args['before_title'];
            echo apply_filters('widget_title', $instance['title']); // Corrected `apply_filters`
            echo $args['after_title'];
        }
        if (isset($instance['email']) && $instance['email'] != '') {
            echo $args['before_title'];
            echo apply_filters('widget_title', $instance['email']); // Corrected `apply_filters`
            echo $args['after_title'];
        }

        // Any additional widget content goes here

        echo $args['after_widget'];
    }
    public function update($new_instance,$old_instance){
        $instance = array();
        $instance['title'] = isset($new_instance['title'])? strip_tags($new_instance['title']) : '';
        $instance['email'] = isset($new_instance['email'])? sanitize_email($new_instance['email']) : '';
        return $instance;
    }


}


?>