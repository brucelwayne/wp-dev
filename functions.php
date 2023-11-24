<?php

/**
 * Plugin Name: Mallria Wordpress Dev
 * Version: 0.1
 * Plugin URI: http://www.mallria.com/
 * Description: 帮助开发者在Wordpress上开发的一些设置
 * Author: Bruce
 * Author URI: http://www.mallria.com/
 * Requires at least: 6.2
 * Tested up to: 6.2
 *
 * Text Domain: mallria-wp-dev
 * Domain Path: /langs/
 *
 * @package WordPress
 * @author Bruce
 * @since 0.1
 */

namespace Mallria\Dev;

if (!defined('ABSPATH')) {
    exit;
}

require_once 'includes/admin/class-admin-menus.php';
require_once 'includes/db/class-setting-options.php';
require_once 'includes/hooks/class-curl-hook.php';
require_once 'includes/hooks/class-host-external-hook.php';
require_once 'includes/hooks/class-remove-comment-url-hook.php';

require_once 'includes/shortcodes/polylang_langswitcher.php';

require_once('class-mallria-wp-dev-plugin.php');
(new Mallria_WP_Dev_Plugin())->boot();

//function custom_polylang_langswitcher() {
//    $output = '';
//    if ( function_exists( 'pll_the_languages' ) ) {
//        $args   = [
//            'show_flags' => 0,
//            'show_names' => 1,
//            'echo'       => 0,
//        ];
//        $output = '<ul class="polylang_langswitcher">'.pll_the_languages( $args ). '</ul>';
//    }
//
//    return $output;
//}
//add_shortcode( 'polylang_langswitcher', 'custom_polylang_langswitcher' );

// add_filter('comment_form_default_fields', 'website_remove');
// function website_remove($fields)
// {
//     if (isset($fields['url']))
//         unset($fields['url']);
//     return $fields;
// }
