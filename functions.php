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
require_once('class-mallria-wp-dev-plugin.php');
(new Mallria_WP_Dev_Plugin())->boot();

