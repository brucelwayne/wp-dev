<?php

namespace Mallria\Dev\Hooks;

use Mallria\Dev\DB\Setting_Options;

class Host_External_hook
{
    function index($is, $host, $url)
    {
        $mallria_dev_setting_options = Setting_Options::getSettingOptions();
        if (isset($mallria_dev_setting_options['http_request_host_is_external'])) {
            $http_request_host_is_external = $this->filter($mallria_dev_setting_options['http_request_host_is_external']);
            $hosts = explode(',',$http_request_host_is_external);
            if (in_array($host, $hosts)) {
                $is = TRUE;
            }
        }
        return $is;
    }

    protected function filter($string)
    {
        // Replace multiple spaces with one
        $string = preg_replace('!\s+!', '', $string);
        // Create an array with the values you want to replace
        $searches = array("\r", "\n", "\r\n");
        // Replace the line breaks with a space
        return str_replace($searches, "", $string);
    }

}