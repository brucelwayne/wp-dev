<?php

namespace Mallria\Dev\Hooks;

class Remove_Comment_Fields_Hook
{
    function removeUrl($fields)
    {
        if (isset($fields['url']))
            unset($fields['url']);
        return $fields;
    }
}
