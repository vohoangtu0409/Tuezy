<?php
function compiled($str){
    return preg_replace('/({+[^\/]+})/', '[a-zA-Z0-9]', $str);
}
