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
        $e_title = isset($instance['e_title']) ? $instance['e_title'] : __('Insurt your Images title:', 'widgets');
        $email = isset($instance['email']) ? $instance['email'] : __('Insurt your Email', 'widgets');
        $image_url = isset($instance['image_url']) ? $instance['image_url'] : __('Images URL:', 'widgets');
        $img_t = isset($instance['img_t']) ? $instance['img_t'] : __('Images:', 'widgets');

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



            <p>
                <label for="<?php echo esc_attr($this->get_field_id('for_e_title')); ?>"><?php _e('Insurt your images title:','widgets')?></label>
                <input type="text" class="title_class"
                id="<?php echo esc_attr($this->get_field_id('for_e_title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('e_title')); ?>"
                value="<?php echo esc_attr($e_title) ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('img_url')); ?>"><?php _e('Images URL:','widgets')?></label>
                <input type="text" class="title_class"
                id="<?php echo esc_attr($this->get_field_id('img_url')); ?>"
                name="<?php echo esc_attr($this->get_field_name('image_url')); ?>"
                value="<?php echo esc_attr($image_url) ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('img_t_for')); ?>"><?php _e('Images:','widgets')?></label>
                <input type="text"
                id="<?php echo esc_attr($this->get_field_id('img_t_for')); ?>"
                name="<?php echo esc_attr($this->get_field_name('img_t')); ?>"
                value="<?php echo esc_attr($img_t) ?>">
            </p>
            
            <p>
            <label for="<?php echo esc_attr($this->get_field_id('img_box')); ?>"><?php _e('Image:','widgets')?></label>
          <button id="upload_img_btn">Upload img</button>

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
        if (isset($instance['e_title']) && $instance['e_title'] != '') {
            echo $args['before_title'];
            echo apply_filters('widget_title', $instance['e_title']); // Corrected `apply_filters`
            echo $args['after_title'];
        }
        if (isset($instance['image_url']) && $instance['image_url'] != '') {
            echo $args['before_title'];
            echo apply_filters('widget_title', $instance['image_url']); // Corrected `apply_filters`
            echo $args['after_title'];
        }
        if (isset($instance['img_t']) && $instance['img_t'] != '') {
            echo $args['before_title'];
            echo apply_filters('widget_title', $instance['img_t']); // Corrected `apply_filters`
            echo $args['after_title'];
        }

        // Any additional widget content goes here

        echo $args['after_widget'];
    }
    public function update($new_instance,$old_instance){
        $instance = array();
        $instance['title'] = isset($new_instance['title'])? strip_tags($new_instance['title']) : '';
        $instance['email'] = isset($new_instance['email'])? sanitize_email($new_instance['email']) : '';
        $instance['e_title'] = isset($new_instance['e_title'])? strip_tags($new_instance['e_title']) : '';
        $instance['image_url'] = isset($new_instance['image_url'])? strip_tags($new_instance['image_url']) : '';
        $instance['img_t'] = isset($new_instance['img_t'])? strip_tags($new_instance['img_t']) : '';
        return $instance;
    }


}


?>