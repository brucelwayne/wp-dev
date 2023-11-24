<?php

namespace Mallria\Dev\ShortCodes;

class Polylang_Lang_Switcher
{

    function index()
    {
        $output = '';
        if (function_exists('pll_the_languages')) {
            $args = [
                'show_flags' => 0,
                'show_names' => 1,
                'echo' => 0,
            ];
            $output = '<ul class="polylang_langswitcher">' . pll_the_languages($args) . '</ul>';
        }

        return $output;
    }
}