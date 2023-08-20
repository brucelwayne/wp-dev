<?php

namespace Mallria\Dev\Hooks;

use Mallria\Dev\DB\Setting_Options;

class Curl_Hook
{

    function verify($handle)
    {
        $mallria_dev_setting_options = Setting_Options::getSettingOptions();

        $disable_verify_peer = isset($mallria_dev_setting_options['CURLOPT_SSL_VERIFYPEER'])
            && $mallria_dev_setting_options['CURLOPT_SSL_VERIFYPEER'] === true;
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, !$disable_verify_peer);
        
        $disable_verify_host = isset($mallria_dev_setting_options['CURLOPT_SSL_VERIFYHOST'])
            && $mallria_dev_setting_options['CURLOPT_SSL_VERIFYHOST'] === true;
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, !$disable_verify_host);
    }

}