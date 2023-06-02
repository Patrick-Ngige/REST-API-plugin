<?php

/**
 * @package rest-api 
 */


class CustomEndpoints
{
    function ra_register_custom_endpoints()
    {

        register_rest_route(
            'ra/v1',
            '/products',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'ra_fetch_products'),

            )
        );

        register_rest_route(
            'ra/v1',
            '/products',
            array(
                'methods' => 'POST',
                'callback' => array($this, 'ra_create_product'),

            )
        );

        register_rest_route(
            'ra/v1',
            '/products',
            array(
                'methods' => 'POST',
                'callback' => array($this, 'ra_update_products'),

            )
        );

        register_rest_route(
            'ra/v1',
            '/products',
            array(
                'methods' => 'GET',
                'callback' => array($this, 'ra_view_products'),
            )
        );


    }


    function ra_fetch_products($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'products';
    
        $result = "SELECT * FROM $table_name";
    
        $data = $wpdb->get_results($result);
    
        return $data;
    }



    function ra_create_product($request)
{
    $data = $request->get_json_params();

    $product_id = $data['product_id'];
    $product = $data['product'];
    $type = $data['type'];

    global $wpdb;
    $table_name = $wpdb->prefix . 'products';

    $wpdb->insert($table_name, array(
        'product_id' => $product_id,
        'product' => $product,
        'type' => $type,
    ));
}

    function ra_update_products($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'products';
        $product_id = $request['product_id'];
        
        $data = $request->get_json_params();

        $product_id = $data['product_id'];
        $product = $data['product'];
        $type = $data['type'];


        $data = array(

            'product_id' => $product_id,
            'product' => $product,
            'type' => $type
        );
        $condition = array('product_id' => $product_id);

        $wpdb->update($table_name, $data, $condition);
    }

    function ra_delete_projects($request)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'products';
    
        $product_id = $request->get_param('product_id');
    
        $product = $wpdb->get_row($wpdb->prepare(
            "SELECT product_id, product, type FROM $table_name WHERE product_id = %d",
            $product_id
        ));
    
        if (!$product) {
            return new WP_Error('product_not_found', 'Product not found.', array('status' => 404));
        }

        $deleted = $wpdb->delete($table_name, array('product_id' => $product_id));
    
        if (!$deleted) {
            return new WP_Error('product_not_deleted', 'Failed to delete the product.', array('status' => 500));
        }
    
        return rest_ensure_response(array('message' => 'Product deleted successfully'));
     
    }


}