<?php 

namespace os\Test\Controller ;
use os\Test\Model\Kitchen as ModelKitchen ;
use os\Test\View;

class Kitchen {

    private $kitchen ; 

    public function __construct(){
        $this->kitchen=new ModelKitchen ;
    }
    public function index(){
        View::Render('Kitchen.php') ;
    }

    public function getOrder(){
        $listed = isset($_POST['listed']) ? $_POST['listed'] : [] ;
     echo $this->kitchen->getOrders($listed);
    }

    public function  serveOrder($id){
       echo $this->kitchen->serve($id) ;
    }

}