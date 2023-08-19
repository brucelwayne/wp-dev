<?php
/**
 * Plugin Name: Wordpress Dev
 * Version: 0.1
 * Plugin URI: http://www.mallria.com/
 * Description: 帮助开发者在Wordpress上开发的一些设置
 * Author: Bruce
 * Author URI: http://www.mallria.com/
 * Requires at least: 6.2
 * Tested up to: 6.2
 *
 * Text Domain: wp-dev
 * Domain Path: /langs/
 *
 * @package WordPress
 * @author Bruce
 * @since 0.1
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('http_api_curl', function ($handle) {
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
});

add_filter("http_request_host_is_external", function ($is, $host, $url) {
    //将此处的xxx.test.localhost更改为你本地需要return的host
    if ("xxx.test.localhost" === $host) {
        $is = TRUE;
    }
    return $is;
}, 10, 3);