<?php 

use os\Test\public\Request;
use os\Test\public\App;
require_once '../../vendor/autoload.php';
require_once 'Session.php';
$request = new Request;
define('base_app', str_replace('\\','/',__DIR__).'/' );
define('base_url','http://localhost:80/C43/lec/Restaurant_Project/src/public/index.php?');
$app = new App($request);

