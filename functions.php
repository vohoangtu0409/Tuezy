<?php
if (! function_exists('compiled')) {
    /**
     * @param $str
     * @return string
     */
    function compiled($str) : string
    {
        return preg_replace('/({+[^\/]+})/', '[a-zA-Z0-9]', $str);
    }
}

if (! function_exists('container')) {
    /**
     * @param $str
     * @return string
     */
    function container() : \Illuminate\Container\Container
    {
        return \Illuminate\Container\Container::getInstance();
    }
}
