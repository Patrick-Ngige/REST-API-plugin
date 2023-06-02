<?php
/**
 * @package rest-api
 */

namespace Inc\Pages;



class ShortCode
{
    public function register()
    {
        add_shortcode('ra', [$this, 'ViewProductsPage']);
    }

    public function ViewProductsPage($props)
    {
        $default = [
            'name' => 'name'
        ];

        $props = shortcode_atts($default, $props, 'ra');

        global $wpdb;
        $projects_table = $wpdb->prefix . 'products';


        $html = '';

        $response = wp_remote_get('http://localhost/rest-api/wp-json/ra/v1/products/');

        if (!is_wp_error($response) && $response['response']['code'] === 200) {
            $projects = json_decode($response['body']);

            $html .= '<div style="background-color:#DCDFEA;width:98.7vw;overflow-x:hidden;height:90vh;">';
            $html .= '<div style="padding:1rem;">';
            $html .= '<table class="table align-middle mb-0 bg-white table-hover" style="width:90%;margin-left:5%;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;margin-top:3%;">';
            $html .= '<thead class="bg-light">';
            $html .= '<tr style="font-size:large">';
            $html .= '<th>Product ID</th>';
            $html .= '<th>Product</th>';
            $html .= '<th>Type</th>';
            $html .= '<th>Actions</th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';

            global $wpdb;
            $table_name = $wpdb->prefix . 'products';
            $products = $wpdb->get_results("SELECT * FROM $table_name ");

            foreach ($products as $product) {
                $html .= '<tr>';
                $html .= '<td>';
                $html .= '<p class="fw-normal mb-1">' . $product->product_id . '</p>';
                $html .= '</td>';
                $html .= '<td>';
                $html .= '<p class="fw-normal mb-1">' . $product->product . '</p>';
                $html .= '</td>';
                $html .= '<td>';
                $html .= '<span class="text-dark">' . $product->type . '</span>';
                $html .= '</td>';
                $html .= '<td>';
                $html .= '<form method="POST">';
                $html .= '<a href="' . esc_url(add_query_arg("product_id", $product->product_id, "/rest-api/update-product/")) . '" style="background-color: #006b0c;color:white; border-radius:3px;text-decoration:none;padding:6px;border: #006b0c;border-radius:3px;">Update</a>';
                $html .= '<input type="hidden" name="employee_id" value="' . $product->product_id . '" />  ';
                $html .= '<button type="submit" name="delete" value="' . $product->product_id . '" style="background-color: #fd434c;color:white; border-radius:3px;padding:5px;border:none;" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</button>';
                $html .= '</form>';
                $html .= '</td>';
                $html .= '</tr>';
            }

            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</div>';
            $html .= '</div>';
        } else {
            $html .= '<p>Failed to retrieve products data.</p>';
        }

        return $html;
    }
}

$response = wp_remote_get('http://localhost/rest-api/wp-json/ra/v1/products/');
global $wpdb;

$table_name = $wpdb->prefix . 'projects';


if (isset($_POST['delete'])) {
    $product_id = $_POST['delete'];
    $data = ['deleted' => 1];
    $condition = ['product_id' => $_POST['product_id']];
    
    $deleted = $wpdb->update($table_name, $data, $condition);
  
    if ($deleted) {
        $success_msg = "Ticked deleted successfully";
    } else {
        $error_msg = "Error deleting ticket";
    }
}