<?php
define('REQUEST_METHOD' , $_SERVER['REQUEST_METHOD']);
define('RAW_REQUEST_URI' , $_SERVER['REQUEST_URI']);
define('PHP_SELF', $_SERVER['PHP_SELF']);

define('_GET', $_GET);
define('_POST', $_POST);
define('_REQUEST', $_REQUEST);

$whiteList = config('whiteList');

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
    if($explodedURI[1] && in_array($explodedURI[1], $whiteList)) define('PREFIX', $explodedURI[1]);
    else define('PREFIX', 'index');
}



if(config('debug')){
    dump('REQUEST_METHOD: '. REQUEST_METHOD, 'REQUEST_URI: '. REQUEST_URI, 'PREFIX: '. PREFIX);
    dump(compiled(REQUEST_METHOD . '/' . PREFIX . REQUEST_URI));
}



$explodedURI = explode('/', REQUEST_URI);

foreach ($explodedURI as $index => $uri){
    if(!empty($uri) && !in_array($uri, $whiteList))
        $explodedURI[$index] = '[a-zA-Z0-9]';
}

$userRequestURI = REQUEST_METHOD . '/' . PREFIX . implode('/', $explodedURI);

container()->bind('hashURI', $userRequestURI);
