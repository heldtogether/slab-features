<?php
/*
Plugin Name: Slab &mdash; Features
Plugin URI: http://www.wp-slab.com/components/features
Description: The Slab Command Line component. Create and execute commands against your site.
Version: 1.0.0
Author: Slab
Author URI: http://www.wp-slab.com
Created: 2015-08-25
Updated: 2015-08-25
Repo URI: github.com/wp-slab/slab-features
Requires: slab-core
*/


// Define
define('SLAB_FEATURES_INIT', true);
define('SLAB_FEATURES_DIR', plugin_dir_path(__FILE__));
define('SLAB_FEATURES_URL', plugin_dir_url(__FILE__));


// Hooks
add_action('slab_init', 'slab_features_init');


// Init
function slab_features_init($slab) {

	$slab->autoloader->registerNamespace('Slab\\Features', SLAB_FEATURES_DIR . 'src');

}
