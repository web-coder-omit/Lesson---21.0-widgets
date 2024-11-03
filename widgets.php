<?php
/**
 * Plugin Name: widgets
 * Plugin URI:  Plugin URL Link
 * Author:      Plugin Author Name
 * Author URI:  Plugin Author Link
 * Description: This plugin make for pratice wich is "widgets".
 * Version:     0.1.0
 * License:     GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain:widgets
 */
function plugin_file_function(){
    load_plugin_textdomain('widgets', false, dirname(__FILE__) . "/lan");
}
add_action('plugins_loaded', 'plugin_file_function');
require_once plugin_dir_path(__FILE__)."widget_2/class.widget.php";


function these__wetget_register(){
    register_widget('DemoWidget');
}
add_action('widgets_init','these__wetget_register');





function demowidget_admin_enqueue_scripts($screen){
    if($screen=="widgets.php"){
    wp_enqueue_style("demowidget-admin-ui-css",plugin_dir_url(__FILE__)."asset/css/style.css");
        }
    }
    add_action("admin_enqueue_scripts","demowidget_admin_enqueue_scripts");


?>