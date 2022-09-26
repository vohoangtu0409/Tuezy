<?php

namespace Tuezy;

class Request{

    const INDEX_DOT_PHP = '/index.php';

    protected $appRequestURI;
    protected $appRequestMethod;
    protected $appSelfScript;

    protected $rawRequestURI;

    protected $server;

    protected $get;

    protected $post;

    protected $request;

    protected $destination;

    protected $appPrefix;

    protected function getRequestURI(){
        if(isset($this->server['REQUEST_URI'])){
            $this->rawRequestURI = $this->server['REQUEST_URI'];
        }
        return $this->rawRequestURI;
    }

    protected function getRequestMethod(){
        if(isset($this->server['REQUEST_METHOD']))
            $this->appRequestMethod = $this->server['REQUEST_METHOD'];
        return $this->appRequestMethod;
    }

    protected function getSelfScript(){
        if($this->appSelfScript){
            return $this->appSelfScript;
        }
        if(isset($this->server['PHP_SELF']))
            $this->appSelfScript = $this->server['PHP_SELF'];
        return $this->appSelfScript;
    }

    private function posQuestionMark(){
        return strpos($this->getRequestURI(), '?');
    }

    private function hasQuestionMark(){
         return $this->posQuestionMark() >= 0;
    }

    private function hasQueryString(){
        return $this->hasQuestionMark() &&
            (strlen($this->getRequestURI()) - $this->posQuestionMark()) > 1;
    }

    private function getPlainRequestURI(){
        if($this->hasQueryString()){
            return substr($this->getRequestURI(), 0, $this->posQuestionMark());
        }
        return $this->getRequestURI();
    }

    private function init(){
        $this->server = $_SERVER;
        $this->get = $_GET;
        $this->post = $_POST;
        $this->request = $_REQUEST;
        [$_GET, $_POST, $_REQUEST, $_SERVER] = [[], [], [] ,[]];
    }

    public function capture(){
        $this->init();

        $this->appRequestURI = $this->getPlainRequestURI();
        dump($this->appRequestURI);
        if(strpos($this->getSelfScript(), self::INDEX_DOT_PHP) > 0){
            $this->appRequestURI = substr($this->appRequestURI,
                                        strpos($this->getSelfScript(), self::INDEX_DOT_PHP),
                                        strlen($this->appRequestURI));
        }
        if(empty($this->appRequestURI)){
            $this->appRequestURI = '/';
        }

        $explodedURI = explode('/', $this->appRequestURI);

        if($this->appRequestURI === '/'){
            $this->appPrefix = 'index';
        }else{
            $this->appPrefix =  $explodedURI[1];
        }

        $this->destination = $this->getRequestMethod() . '/' . $this->appPrefix . $this->appRequestURI;
    }


}