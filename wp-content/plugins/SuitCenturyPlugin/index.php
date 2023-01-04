<?php

/**
 * Plugin Name:  Suitcentury Custom API
 * Description:  Wordpress veritabanı ile Suitcentury uygulaması arasındaki katmandır.
 * Author:  @omrcnkpln
 * Author URI:  test.com
 * Version:  1.0.0
 * License: GNU
 */

require "vendor/autoload.php";
require plugin_dir_path(__FILE__) . "app/Libraries/SCPluginInit.php";

//styles and scripts for bootstrap
wp_enqueue_style("bootstrap-css", plugin_dir_url(__FILE__) . 'public/bootstrap-5.1.3/dist/css/bootstrap.min.css');
wp_enqueue_script("bootstrap-js", plugin_dir_url(__FILE__) . 'public/bootstrap-5.1.3/dist/js/bootstrap.bundle.js');

$SCMigration = new SC_Migration();
$SCPluginInit = new SCPluginInit();
?>
