<?php
/**
 * @package pms plugin
 */

namespace Inc\Pages;



class CreateTable {
    public function register() {
       $this->create_table_to_db();
    }


    public function create_table_to_db() {
        global $wpdb;

        $table_name = $wpdb->prefix . 'products';

        $project_details = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
            product_id varchar(200) NOT NULL,
            product text NOT NULL,
            type text NOT NULL,
            PRIMARY KEY (product_id)
        );";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $project_details );

    
    }
}
