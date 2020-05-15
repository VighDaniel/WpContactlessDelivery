<?php

/**
 * Plugin Name:       WooCommerce Delivery Without Contact
 * Description:       This plugin adds a new functionality to the famous WooCommerce plugin. If you donwload this plugin you will be able to set contactless delivery to your webshop.
 * Version:           1.0.0
 * Requires at least: 7
 * Requires PHP:      7
 * Author:            Vigh Dániel
 */

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

// Define when the plugin was started.
define("PLUGIN_START", microtime(true));
// Just a directory separator variable because 
// I am too lazy to write it out every time :(
define("DS", DIRECTORY_SEPARATOR);

// Require autoload from composer.
require __DIR__ . '/vendor/autoload.php';

// Start bootstrapping the plugin.
$plugin = require_once __DIR__ . '/bootstrap/plugin.php';