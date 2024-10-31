<?php
class DemoWidget extends WP_Widget{
    public function __construct(){
        parent::__construct(
            'demowidget',
            __('Demo Widget','widgets'),
            __('Description of widget','widgets')
        );
    }



    public function form($instance){ //Input data
        $title = isset($instance['title'])? $instance['title']:__('Demo widget','widget');
        ?>
        <p>

            <label for="<?php echo esc_attr($this->get_field_id('title'));?>"><?php _e('Title','widget') ?> </label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title'));?>"name="<?php echo esc_attr($this->get_field_name('title'));?>" value="<?php echo esc_attr($title);?>">
            </p>
            <?php
    }



    public function widget(){
        echo $args['before_widget'];
        if(isset($instance['title']))
        echo $args['after_widget'];
    }
    // public function widget($args, $instance) { // Output data
    //     echo $args['before_widget'];
    //     $title = isset($instance['title']) ? $instance['title'] : '';
    //     if (!empty($title)) {
    //         echo $args['before_title'] . apply_filters('widget_title', $title) . $args['after_title'];
    //     }
    //     echo $args['after_widget'];
    // }

    public function update($new_instance, $old_instance) { // Save data
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
    // public function widget(){ // out data
        
    // }
    // public function update(){ // save data
        
    // }
    // function these__wetget_register(){
    //     regkj
    // }
    // add_action('widgets_init','these__wetget_register');
        
    }



    // function these__wetget_register(){
    //     register_widget('DemoWidget');
    // }
    // add_action('widgets_init','these__wetget_register');
    

?>