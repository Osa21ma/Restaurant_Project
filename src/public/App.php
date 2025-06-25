<?php

namespace os\Test\public;

class App
{
    private $url;
    private $controller;
    private $method;
    private $params;
    public function __construct($request)
    {
        $this->url = $request->QueryString();
        $this->bootURL();
        $this->callMethod();
    }

    public function bootURL()
    {
        $urlArray = explode('/', $this->url);
        $this->controller = $urlArray[0]; //users os\Week17\Controller/usersss
        $this->method = $urlArray[1];
        if (isset($urlArray[2])) {
            $this->params = $urlArray[2]; // This would be the 'id', e.g., '12345'
        }
    }

    public function callMethod()
    {
        $this->controller = "os\Test\Controller\\" . $this->controller;
        if (class_exists($this->controller)) {
            $objectController = new $this->controller;
            if(method_exists($this->controller,$this->method)){
                if (isset($this->params)) {
                    call_user_func_array([$objectController, $this->method], [$this->params]);
                } else {
                    call_user_func([$objectController, $this->method]);
                }
            }else {
                echo "method not found";
            }
        }else {
            echo "class not found";
        }
    }
}
