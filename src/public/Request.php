<?php 

namespace os\Test\public;

class Request{
    public function QueryString(){
        return $_SERVER['QUERY_STRING'];
    }

}