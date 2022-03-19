<?php 

// Setting the type declarations and methods return type to strict
//declare(strict_types = 1);

namespace Inc;

class Product 
{

    public function __construct()
    {

        add_action( 'activated_plugin', array($this, 'bb_add_products_from_api') );

    }

    public function bb_add_products_from_api()
    {

        // FakestoreAPI products url
        $url = 'https://fakestoreapi.com/products';

        // Retreiving the products body from fakestoreapi and decoding the json
        $external_products = wp_remote_retrieve_body( wp_remote_get( $url ) );
        $products = json_decode($external_products, true);

        // Solution 2:
        if(!empty($products)) {

            foreach($products as $product) {

                //
                $product_id = wc_get_product_id_by_sku($product['id']);

                if( !$product_id ) {

                    $post = [
                        'post_author' => '',
                        'post_content' => $product['description'],
                        'post_status' => "publish",
                        'post_title' => wp_strip_all_tags( $product['title'] ),
                        'post_name' => $product['title'],
                        'post_parent' => '',
                        'post_type' => "product",
                    ];

                    // Create product
                    $product_id = wp_insert_post( $post );

                    // Set product type
                    wp_set_object_terms($product_id, 'simple', 'product_type');

                    update_post_meta($product_id, '_sku', $product['id']);
                    update_post_meta($product_id, '_price', $product['price']);
                    update_post_meta($product_id, '_manage_stock', "yes");
                    update_post_meta($product_id, '_stock', $product['rating']['count']);

                } else {

                    // Product already exists
                    $post = [
                        'ID' => $product_id,
                        'post_title' => $product['title'],
                        'post_content' => $product['description'],
                    ];

                    $post_id = wp_update_post($post, true);
                    if(is_wp_error($post_id)) {
                        $errors = $post_id->get_error_messages();
                        foreach($errors as $error) {
                            echo $error;
                        }
                    }

                }

                update_post_meta($product_id, '_stock', $product['rating']['count']);
                update_post_meta($product_id, '_price', $product['price']);                

            }

            // Solution 1 (adds products automatically but no meta data can be added):
            // $product_array = []; 

            // foreach($products as $product) {
            //     $product_array[] = [
            //         'post_title' => $product['title'],
            //         'post_content' => $product['description'],
            //         'post_status' => 'pending',
            //         'post_type' => "product",
            //     ];
            // }

            // for ($i=0; $i < count($product_array); $i++) { 
                
            //     $post_id = wp_insert_post( $product_array[$i] ); 
            
            //     wp_set_object_terms( $post_id, 'simple', 'product_type' ); 
                
            // }

            // $post_id = wp_insert_post( array(

            //     'post_title' => $product['title'],
            //     'post_content' => $product['description'],
            //     'post_status' => 'pending',
            //     'post_type' => "product",

            // ));            

        }


    }

}