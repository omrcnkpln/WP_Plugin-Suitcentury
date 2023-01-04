<?php

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;

class SCWoocommerceApi
{
    public $SC_woocommerce;

    public function __construct()
    {
//local
//        'http://denemeler:81/wpKur/WooPlugin/', // Your store URL
//         'ck_d2d3def168293738225ac0eaa9f36a152d0d52c9', // Your consumer key
//         'cs_41dc23fbe46f49946fea0ed8c7385ff745542028', // Your consumer secret

        try {
            //online
            if ($_SERVER["SERVER_NAME"] == "www.blissful-austin.185-86-12-93.plesk.page") {
                $this->SC_woocommerce = new Client(
                    'https://www.blissful-austin.185-86-12-93.plesk.page', // Your store URL
                    'ck_79a01d0d6c90a6fd7fa6508cb92d2c2e934cb466', // Your consumer key
                    'cs_523e19fc5908cce8409b01916769bfa160ca09ce', // Your consumer secret
                    [
                        'wp_api' => true, // Enable the WP REST API integration
                        'version' => 'wc/v3', // WooCommerce WP REST API version
                    ]
                );
            }
            //local
            else {
                $this->SC_woocommerce = new Client(
                    'http://phpprojects:8064/wordpress-5.8.2/SuitCenturyWP/', // Your store URL
                    'ck_9ab8c78d1b8cb347288b9cd1f0853c9aa2c977a0', // Your consumer key
                    'cs_72dbafe830295b63e0429afabb11037afd6c5141', // Your consumer secret
                    [
                        'wp_api' => true, // Enable the WP REST API integration
                        'version' => 'wc/v3', // WooCommerce WP REST API version
                    ]
                );
            }

        } catch (HttpClientException $e) {
            pr($e->getResponse()->getBody());
        }
    }

    public function SCgetValues($prm = false)
    {
        $values = $this->SC_woocommerce->get($prm);
//        $values = $this->SC_woocommerce->get('products');
//
//            $response = json_encode($customers);
//            $response = json_encode($products);
//
//            IndexPr($customers);
//            IndexPr($products);
//        return get_option($values);
        return $values;
//        return " | data döndür";
    }
}
