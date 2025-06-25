<?php

namespace os\Test\Controller;

use os\Test\View;

class Home{
    public function index(){
        View::Render('home.php');
    }
}