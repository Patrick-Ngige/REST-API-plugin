<?php

/**
 * @package rest-api plugin
 */

/*
Plugin Name: rest-api plugin
Plugin URI: http://...
Description: A E-commerce plugin for adding, deleting updating and fetching products
Version: 1.0.0
Author: PK
Author URI: http://...
License: GPLv2 or Later
Text Domain: pms plugin
*/

//Security Check 

defined('ABSPATH') or die("Caught you hacker");

//Require once the Composer Autoload
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

use Inc\Base;
function activate_pms_plugin(){
    Base\Activate::activate();
  
}
register_activation_hook(__FILE__, 'activate_pms_plugin');

function deactivate_pms_plugin(){
    Base\Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_pms_plugin');

if(class_exists('Inc\\Init')){
    Inc\Init::register_services();
}


require_once plugin_dir_path(__FILE__) . 'custom-endpoints.php';


add_action( 'rest_api_init', 'pms_register_custom_endpoints' );

function pms_register_custom_endpoints(){

    $endpoints = new CustomEndpoints();
    $endpoints->ra_register_custom_endpoints();
}
