<?php 

// ADDING MENUS - HEADER AND FOOTER

function rest_api_setup(){
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header');
    register_nav_menu('secondary', 'Footer Navigation');
}
// // ADDING NAVWALKER CLASS
// if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
//     return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
// } else {
//     require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
// }
// add_action('init','rest_api_setup');


