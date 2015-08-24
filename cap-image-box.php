<?php
/*
Plugin Name: CAP Image Box
Plugin URI: https://github.com/amprog/cap-image-box
Description: Rewrites the WP image box and caption box, also provides misc image utilities.
Version: 1.0
Author: Seth Rubenstein for Center for American Progress
Author URI: https://github.com/amprog
*/
$plugin_dir = plugin_dir_path( __FILE__ );
include $plugin_dir.'/display.php';
include $plugin_dir.'/editor.php';
