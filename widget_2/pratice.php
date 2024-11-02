<?php
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
        $title = isset($instance['title']) ? $instance['title']:__('Demo_widgets','widgets');
        ?>
        <p>
            <lable><?php _e('Demo','widgets')?></lable>
            <input class="widefat" type="text">
            <!-- echo $instance; -->
             
        </p>
            <?php

    }
public function widget($args, $instance){
    echo $args['before_widget'];
    if(isset($instance['title']) && $instance['title'] !=''){
        echo $args['before_title'];
        // echo apply_filter('widget_title',$instance['title']);
        echo $args['after_title'];
    }
    echo $args['after_widget'];

}
public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
}

    // public function widget(){
    //     echo $args['before_widget'];
    //     if(isset($instance['title']))
    //     echo $args['after_widget'];
    // }
    // public function widget($args, $instance) { // Output data
    //     echo $args['before_widget'];
    //     $title = isset($instance['title']) ? $instance['title'] : '';
    //     if (!empty($title)) {
    //         echo $args['before_title'] . apply_filters('widget_title', $title) . $args['after_title'];
    //     }
    //     echo $args['after_widget'];
    // }

    // public function update($new_instance, $old_instance) { // Save data
    //     $instance = array();
    //     $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    //     return $instance;
    // }




    
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

?>