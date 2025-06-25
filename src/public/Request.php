<?php 

namespace os\Test\public;

class Request{
    public function QueryString(){
        return $_SERVER['QUERY_STRING'];
    }

        public static function redirect($page){
        header('location:'.base_url.$page);
    }
}