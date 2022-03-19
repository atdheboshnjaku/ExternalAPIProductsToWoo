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

require dirname(__FILE__) . '/vendor/autoload.php';

use Inc\Product;
use Inc\Test;

function Api_init()
{

    $run = new Product();

}
Api_init();