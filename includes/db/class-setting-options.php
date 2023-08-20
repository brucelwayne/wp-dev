<?php

namespace Mallria\Dev\DB;

defined('MALLRIA_DEV_SETTING_OPTIONS')
or define('MALLRIA_DEV_SETTING_OPTIONS', 'mallria-dev-setting-options');

class Setting_Options
{
    static function getSettingOptions()
    {
        return json_decode(get_option(MALLRIA_DEV_SETTING_OPTIONS), true);
    }
}