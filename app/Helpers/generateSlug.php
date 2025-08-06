<?php

if (!function_exists('generateSlug')) {
    function generateSlug()
    {
        $microtime = str_replace('.', '', microtime());
        $arr = explode(' ', $microtime);
        $random = $arr[1] . $arr[0];
        $random = substr($random, 1, 16);
        return $random;
    }
}
?>