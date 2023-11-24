<?php

namespace Mallria\Dev;

use Mallria\Dev\Admin\Admin_Menus;
use Mallria\Dev\Hooks\Curl_Hook;
use Mallria\Dev\Hooks\Host_External_hook;
use Mallria\Dev\Hooks\Remove_Comment_Fields_Hook;
use Mallria\Dev\ShortCodes\Polylang_Lang_Switcher;

class Mallria_WP_Dev_Plugin
{

    public function __construct()
    {
    }

    function boot()
    {
        add_action('init', array($this, 'initHooks'), 10);
        add_action('init', array($this,'initShortcodes'),10);
    }

    function initShortcodes(){
        $polylang_switcher = new Polylang_Lang_Switcher();
        add_shortcode( 'polylang_langswitcher', [$polylang_switcher,'index']);
    }

    function initHooks()
    {

        $curl_hooks = new Curl_Hook();
        add_action('http_api_curl', [$curl_hooks, 'verify']);

        $host_external_hook = new Host_External_hook();
        add_filter("http_request_host_is_external", [$host_external_hook, 'index'], 10, 3);

        $remove_comment_fields_hook = new Remove_Comment_Fields_Hook();
        add_action('comment_form_default_fields', [$remove_comment_fields_hook, 'removeUrl']);

        if (is_admin()) {
            (new Admin_Menus())->boot();
        }
    }
}
