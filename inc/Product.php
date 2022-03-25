<?php 

// Setting the type declarations and methods return type to strict
declare(strict_types = 1);

namespace Inc;

class Product 
{

    public function __construct()
    {
        // Calling the bb_add_products_from_api method as soon as the plugin is activated
        add_action( 'activated_plugin', array($this, 'bb_add_products_from_api') );

    }

    public function bb_add_products_from_api(): void 
    {

        // FakestoreAPI products url
        $url = 'https://fakestoreapi.com/products';

        // Retreiving the products body from fakestoreapi and decoding the json
        $external_products = wp_remote_retrieve_body( wp_remote_get( $url ) );
        $products = json_decode($external_products, true);

        if( !empty($products) ) {

            foreach($products as $product) {

                // Checking the SKU 
                $product_id = wc_get_product_id_by_sku( $product['id'] );

                // Product does not exist so we create it
                if( empty($product_id) ) {

                    $product_id = $this->createOrUpdateProduct( $product );

                // Product exists so we update it
                } else {

                    $product_id = $this->createOrUpdateProduct( $product, $product_id );

                }

            }

        }

    }

    protected function createOrUpdateProduct(array $product, int $product_id = 0 ): void 
    {

        // Creating new WooCommerce Product Object
        $objProduct = new \WC_Product($product_id);
        $objProduct->set_sku($product['id']);
        $objProduct->set_name($product['title']);
        $objProduct->set_description($product['description']);
        $objProduct->set_regular_price($product['price']);

        // Getting and Setting product category
        $product_category_id = $this->getProductCategoryID($product['category']);
        $objProduct->set_category_ids([$product_category_id]);
        $objProduct->set_manage_stock(true);
        $objProduct->set_stock_quantity($product['rating']['count']);
        $objProduct->set_status('publish');

        // Uploading external product image from url to WooCommerce and assigning it as a featured image
        $image_id = $this->upload_image_to_woo($product['image'], $product_id);
        $objProduct->set_image_id($image_id);

        // Saving Created/Updated Product
        $product_id = $objProduct->save();
        

    }

    protected function getProductCategoryID(string|int $category_name): int
    {

        // Creating the category and inserting it as a term 
        $product_category_details = wp_insert_term($category_name, 'product_cat');
        if( is_wp_error($product_category_details) ) {

            if( $product_category_details->get_error_code() == 'term_exists' ) {
                $product_category_id = $product_category_details->get_error_data();
            }

        } else {

            $product_category_id = $product_category_details['term_id'];

        }

        return $product_category_id;

    }

    public function upload_image_to_woo(string $url, int $post_id): int
    {

        $image = '';
        if($url != '') {

            $file = [];
            $file['name'] = $url; // Setting image name based on its URL
            $file['tmp_name'] = download_url($url);

            if(is_wp_error($file['tmp_name'])) {

                @unlink($file['tmp_name']);
                var_dump( $file['tmp_name']->get_error_messages( ) );

            } else {

                $attachmentId = media_handle_sideload($file, $post_id);

                if( is_wp_error($attachmentId) ) {
                    
                    @unlink($file['tmp_name']);
                    var_dump( $attachmentId->get_error_messages( ) );

                } else {

                    $image = wp_get_attachment_url( $attachmentId );

                }

            }

        }  
        
        return $attachmentId;

    }

}