<?php
define('REQUEST_METHOD' , $_SERVER['REQUEST_METHOD']);
define('RAW_REQUEST_URI' , $_SERVER['REQUEST_URI']);
define('PHP_SELF', $_SERVER['PHP_SELF']);

define('_GET', $_GET);
define('_POST', $_POST);
define('_REQUEST', $_REQUEST);

const INDEX_DOT_PHP = '/index.php';

$plain_request_uri = RAW_REQUEST_URI;

if(strpos(RAW_REQUEST_URI, '?') > 0){
    $plain_request_uri = substr(RAW_REQUEST_URI, 0, strpos(RAW_REQUEST_URI, '?'));
}

if(strpos(PHP_SELF, INDEX_DOT_PHP) > 0){
    $plain_request_uri = substr($plain_request_uri,
        strpos(PHP_SELF, INDEX_DOT_PHP),
        strlen($plain_request_uri));
}
if(empty($plain_request_uri)){
    $plain_request_uri = '/';
}
define('REQUEST_URI' , $plain_request_uri);

$_SERVER = null;
$_REQUEST = null;
$_GET= null;
$_POST = null;

// ##################################################
$explodedURI = explode('/', REQUEST_URI);

if(REQUEST_URI === '/'){
    define('PREFIX', 'index');
}else{
    if($explodedURI[1]) define('PREFIX', $explodedURI[1]);
}

if(config('debug')){
    dump('REQUEST_METHOD: '. REQUEST_METHOD, 'REQUEST_URI: '. REQUEST_URI, 'PREFIX: '. PREFIX);
}