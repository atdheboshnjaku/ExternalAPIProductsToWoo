<?php

/**
 * Plugin Name: External API Products To Woocommerce
 * Description: Simple plugin that automatically downloads FakeStoreapi products from their API and adds them to woocommerce.
 * Plugin URI: https://wordpress.org
 * Author: Atdhe Boshnjaku
 * Version: 1.0
 * Author URI: https://wordpress.org
 *
 * Text Domain: bb-external-api-to-woo
 *
 * Simple plugin that automatically downloads FakeStoreapi products from their API and adds them to woocommerce.
 */

if(!defined('ABSPATH')) { exit; }

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;

//use Automattic\WooCommerce\HttpClient\HttpClientException;

// $woocommerce = new Client(
//     'https://atoutdesign2.hostpapadesign.com/', 
//     'ck_d6610f99aa925f4e17b4de4928d41922c221bd89', 
//     'cs_de5ed05763b598f485b9496913ccb9a5fff9aa61',
//     [
//         'wp_api' => true, 
//         'version' => 'wc/v3',
//         'timeout' => 300,
//         'verify_ssl', false
//     ]
// );

// $woocommerce = new Client(
//     'https://atoutdesign2.hostpapadesign.com/', 
//     'ck_b6079618442fdd8501a14eabd9cc4fccb92197ba', 
//     'cs_5dd4ea9d1c3079dc8a33798d6c47b20fc58c5d32',
//     [
//         'wp_api' => true, 
//         'version' => 'wc/v3',
//         'timeout' => 300,
//         'verify_ssl', false
//     ]
// );

//echo '<pre>' . print_r($woocommerce->get('products')) . '</pre>';

// try { 
//     print_r($woocommerce->get('system_status'));
// } catch(HttpClientException $e) {
//     echo '<pre>' . print_r($e->getMessage()) . '</pre>';
//     echo '<pre>' . print_r($e->getRequest()) . '</pre>';
//     echo '<pre>' . print_r($e->getResponse()) . '</pre>';
// }

//$api_url = 'http://s2.bilanc.com:8094/BilancWebServerWOS/rest/public/items/itemsV3/{id=70}';
// $api_url = 'http://s2.bilanc.com:8094/BilancWebServerWOS/rest/public/items/inventories/{id=69,serviceUnitID=3}';
// $response = wp_remote_retrieve_body( wp_remote_get
//             ( $api_url ,
//                 array( 
//                     'timeout' => 10,
//                     'headers' => array(
//                         'Authorization' => 'VnUc3tR4jclodL+cr8VWbwKKLHEb88HhDRJT6ZRMIy4=') 
//                 )
//             ));
// $result = json_decode($response, true);

// echo '<pre><code>';
// print_r($result);
// echo '</code></pre>';

// $product_name = $result[0]['code'];
// $pid = $result[0]['productID'];
// $price = $result[0]['salesPriceDefault'];
// echo $product_name . '<br>';
// echo $pid . ' <-ID <br>';
// echo $price . ' <- Çmimi <br>';

// function set_subscription_at_remote_api( $user_id, $course_slug ) { 

//     $user_email = get_userdata( $user_id )->user_email ;
    
    // $data = wp_json_encode( array(  
    //   'email' => $user_email, 
    //   'bundleSlugs' => array( $course_slug ), 
    //   )
    //  ); 

   // $data = wp_json_encode( array(

        // {

        //     "header":{
        //     "id":-1,
        //     "documentNumber":"<Auto>",
        //     "description":"Pershkrimi Test FS 123",
        //     "documentDate":"28/02/2022",
        //     "declarationDate":"28/02/2022",
        //     "dueDate":"28/02/2022",
        //     "withVAT":true,
        //     "serialNumber":"",
        //     "rate":1,
        //     "currencyID":9,
        //     "serviceUnitID":3,
        //     "salesAgentID":-1,
        //     "agentCommission":0,
        //     "transporterID":-1,
        //     "clientID":1
        //     },
        //     "body":[
        //     {"id":-1,
        //     "price":2,
        //     "quantity":1,
        //     "VATCoeficient":0.18,
        //     "discountPercentage":10,
        //     "itemID":70,
        //     "vatTypeClassifierID":1001
        //     }
        //     ]
            
        // }

        // "id" => -1,
        // "price" => 2,
        // "quantity" => 1,
        // "VATCoeficient" => 0.18,
        // "discountPercentage" => 10,
        // "itemID" => 70,
        // "vatTypeClassifierID" => 1001

    //));
    
    //$id = 70;
    // $args = array( 
    //   'method' => 'PUT',
    //   'headers' => array( 
    //     'Authorization' => 'VnUc3tR4jclodL+cr8VWbwKKLHEb88HhDRJT6ZRMIy4=',  
    //     'Content-Type' => 'application/json',  //JSON is default but no harm in specifying
    //     "documentNumber" => "<Auto>",
    //     "description" => "Pershkrimi Test FS 123",
    //     "documentDate" => "28/02/2022",
    //     "declarationDate" => "28/02/2022",
    //     "dueDate" => "28/02/2022",
    //     "withVAT" => true,
    //     "serialNumber" => "",
    //     "rate" => 1,
    //     "currencyID" => 9,
    //     "serviceUnitID" => 3,
    //     "salesAgentID" => -1,
    //     "agentCommission" => 0,
    //     "transporterID" => -1,
    //     "clientID" => 1,
    //   ),	
    //   'body' => $data,
    // ) ; 
      
      
    //make request and return response to check results
    // $response = wp_remote_request( 'http://s2.bilanc.com:8094/BilancWebServerWOS/rest/public/documents/sales' .  $args  ) ; 
    // $body = wp_remote_retrieve_body( $response ) ;
    // $data = json_decode( $body, true ) ;

    // echo '<pre><code>';
    // print_r($data);
    // echo '</code></pre>';
    
    // $subscription_id = $data[purchasedBundles][0]['bundleId'] ;
    // $subscription_slug = get_sub_slug_by_bundle_id( $subscription_id ) ;
    
    // return $subscription_slug ; 
    
  //}

// $body = array(
//     "id" => -1,
//     "price" => 2,
//     "quantity" => 1,
//     "VATCoeficient" => 0.18,
//     "discountPercentage" => 10,
//     "itemID" => 69,
//     "vatTypeClassifierID" => 1001
// );

// $args = array(
// 'headers' => array(
//     'Authorization' => 'VnUc3tR4jclodL+cr8VWbwKKLHEb88HhDRJT6ZRMIy4=',  
//     'Content-Type' => 'application/json',  //JSON is default but no harm in specifying
//     "documentNumber" => "<Auto>",
//     "description" => "Pershkrimi Test FS 123",
//     "documentDate" => "28/02/2022",
//     "declarationDate" => "28/02/2022",
//     "dueDate" => "28/02/2022",
//     "withVAT" => true,
//     "serialNumber" => "",
//     "rate" => 1,
//     "currencyID" => 9,
//     "serviceUnitID" => 3,
//     "salesAgentID" => -1,
//     "agentCommission" => 0,
//     "transporterID" => -1,
//     "clientID" => 1
// ),
// 'body'      => json_encode($body, true),
// 'method'    => 'PUT'
// );

// $args = array(

//     'method' => 'PUT',
//     'timeout' => 10,
//     'headers' => array(
//         'Authorization' => 'VnUc3tR4jclodL+cr8VWbwKKLHEb88HhDRJT6ZRMIy4=',
        
//     ),
//     'body' => array(
//         "header" => array(
//             "id" => -1,
//             "documentNumber" => "<Auto>",
//             "description" => "Pershkrimi Test FS",
//             "documentDate" => "28/02/2022",
//             "declarationDate" => "28/02/2022",
//             "dueDate" => "28/02/2022",
//             "withVAT" => true,
//             "serialNumber" => "",
//             "rate" => 1,
//             "currencyID" => 9,
//             "serviceUnitID" => 3,
//             "salesAgentID" => -1,
//             "agentCommission" => 0,
//             "transporterID" => -1,
//             "clientID" => 1
//             ),
//             "body" => array(

//                 "id" => -1,
//                 "price" => 2,
//                 "quantity" => 1,
//                 "VATCoeficient" => 0.18,
//                 "discountPercentage" => 10,
//                 "itemID" => 70,
//                 "vatTypeClassifierID" => 1001
                
//             )
//     )

// );

$url = 'https://fakestoreapi.com/products';

$products = wp_remote_retrieve_body( wp_remote_get( $url ) );

$products = json_decode($products, true);
$user_id = get_current_user();

foreach($products as $product) {

    $post_id = wp_insert_post( array(

        'post_author' => '',
        'post_title' => $product['title'],
        'post_content' => $product['description'],
        'post_status' => 'publish',
        'post_type' => "product",        

    ));
    	
    wp_set_object_terms( $post_id, 'simple', 'product_type' );
    update_post_meta( $post_id, '_visibility', 'visible' );
    update_post_meta( $post_id, '_stock_status', 'instock');
    update_post_meta( $post_id, 'total_sales', '0' );
    update_post_meta( $post_id, '_downloadable', 'no' );
    update_post_meta( $post_id, '_virtual', 'yes' );
    update_post_meta( $post_id, '_regular_price', '' );
    update_post_meta( $post_id, '_sale_price', '' );
    update_post_meta( $post_id, '_purchase_note', '' );
    update_post_meta( $post_id, '_featured', 'no' );
    update_post_meta( $post_id, '_weight', '' );
    update_post_meta( $post_id, '_length', '' );
    update_post_meta( $post_id, '_width', '' );
    update_post_meta( $post_id, '_height', '' );
    update_post_meta( $post_id, '_sku', $item['SKU'] );
    update_post_meta( $post_id, '_product_attributes', array() );
    update_post_meta( $post_id, '_sale_price_dates_from', '' );
    update_post_meta( $post_id, '_sale_price_dates_to', '' );
    update_post_meta( $post_id, '_price', '' );
    update_post_meta( $post_id, '_sold_individually', '' );
    update_post_meta( $post_id, '_manage_stock', 'no' );
    update_post_meta( $post_id, '_backorders', 'no' );
    update_post_meta( $post_id, '_stock', '' );

}
