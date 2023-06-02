<?php

/**
 * Template Name: Update Page
 */

get_header();

$product_id = $_GET['product_id'];

var_dump($product_id);

$endpoint = "http://localhost/rest-api/wp-json/ra/v1/products/$product_id";

$response = wp_remote_get($endpoint);

$products = json_decode(wp_remote_retrieve_body($response));
if (!is_wp_error($response) && $response['response']['code'] === 200) {
  $products = json_decode($response['body']);
}

?>

<section style="background-color: #DBDFEA; overflow-y:hidden;height:88vh; ">
  <div class="container py-3 h-auto">
    <div class="row d-flex justify-content-center align-items-center h-auto">
      <div class="col col-xl-10" style="width:40vw;">
        <div class="card" style="border-radius: 1rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
          <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 " style="width:40vw;">
            <div class="row g-0 w-100 d-flex justify-content-center align-items-center w-50 " style="width:40vw;">
              <div class="col-md-6 col-lg-7 d-flex justify-content-center align-items-center  ms-8"
                style="height:80vh; width:40vw; ">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="" method="POST">

                    <h2 class="fw-bold d-flex align-items-end d-flex justify-content-center align-items-center">
                      Update Product</h2>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form2Example17 " style="font-weight:600;">Product ID:</label>
                      <input type="text" id="form2Example17" class="form-control form-control-md"
                        placeholder="Enter product Id" value="<?php  echo $products->product_id ?>" name="product_id" required />
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form2Example17 " style="font-weight:600;">Product name:</label>
                      <input type="text" id="form2Example17" class="form-control form-control-md"
                        placeholder="Enter product " value="<?php  echo $products->product ?>" name="product_id" required />
                    </div>




                    <div class="form-outline mb-3">
                      <label class="form-label" for="form2Example27" style="font-weight:600;">Product Details:</label>
                      <input type="text" id="form2Example27" value="<?php  echo $products->type ?>" class="form-control form-control-md" name="type"
                        required />
                    </div>


                    <div class="pt-1 mb-4 w-100 d-flex justify-content-center align-items-center">
                      <button class="btn btn-dark btn-lg btn-block w-50 " type="submit" name="createbtn">Create</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<?php

if (isset($_POST['updatebtn'])) {
  $product_id = $_POST['product_id'];
  $product = $_POST['product'];
  $type = $_POST['type'];

  global $wpdb;
  $table_name = $wpdb->prefix . 'products';

  $updated_products = array(
    'product_id ' => $product_id ,
    'product' => $product,
    'type' => $type,
  );

  $response = wp_remote_post("http://localhost/rest-api/wp-json/ra/v1/project", array(
    'method' => 'POST',
    'headers' => array('Content-Type' => 'application/json'),
    'body' => wp_json_encode($updated_products),
  )
  );

  $products = $updated_project;
}

?>



<?php get_footer(); ?>