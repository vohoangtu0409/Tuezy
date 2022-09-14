<?php
namespace Tuezy;

use Illuminate\Http\Response;

abstract class Controller{

    protected $response;

    protected $view;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    protected function response($content, $code, $header): Response{
        $this->response->setContent($content);
        $this->response->setStatusCode($code);
        $this->response->withHeaders($header);
        return $this->response;
    }
}