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

//require __DIR__ . '/vendor/autoload.php';
require_once dirname(__FILE__) . '/vendor/autoload.php';

use Automattic\Woocommerce\Client;

$woocommerce = new Client(

    'http://plugin.blu/',
    'ck_d6610f99aa925f4e17b4de4928d41922c221bd89',
    'cs_de5ed05763b598f485b9496913ccb9a5fff9aa61',
    [
        'wp_api'  => true,
        'version' => 'wc/v3'
    ]

);