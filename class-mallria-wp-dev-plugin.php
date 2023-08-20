<?php

namespace Mallria\Dev;

use Mallria\Dev\Admin\Admin_Menus;
use Mallria\Dev\Hooks\Curl_Hook;
use Mallria\Dev\Hooks\Host_External_hook;

class Mallria_WP_Dev_Plugin
{

    public function __construct()
    {
        $this->requireResource();
    }

    protected function requireResource()
    {
        require_once 'includes/admin/class-admin-menus.php';
        require_once 'includes/db/class-setting-options.php';
        require_once 'includes/hooks/class-curl-hook.php';
        require_once 'includes/hooks/class-host-external-hook.php';
    }

    function boot()
    {
        add_action('init', array($this, 'initHooks'), 10);
    }

    function initHooks()
    {

        $curl_hooks = new Curl_Hook();
        add_action('http_api_curl', [$curl_hooks, 'verify']);

        $host_external_hook = new Host_External_hook();
        add_filter("http_request_host_is_external", [$host_external_hook, 'index'], 10, 3);

        if (is_admin()) {
            (new Admin_Menus())->boot();
        }
    }

}