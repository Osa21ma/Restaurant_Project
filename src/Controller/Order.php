<?php 

namespace os\Test\Controller;

use os\Test\Model\Order as ModelOrder;
use os\Test\View;

class Order {
    private $order ;

    public function __construct(){
        $this->order =new ModelOrder ;
    }
    public function allOrders(){
        $orders=$this->order->getOrders();
        View::Render('orders.php',['orders'=>$orders]) ;
    }


}