<?php 

namespace os\Test\Model ;

use os\Test\public\Model;

class Kitchen extends Model {

    // public function getOrders($listed){

    //     $where='';
    //     if(isset($listed)&& count($listed)>0){

    //         $where ="AND id NOT IN (".implode(',' ,$listed).")";

    //     }
    //     $query ="SELECT * from order_list WHERE status =0 $where order by date_created ASC";
    //     $this->query($query);
    //     $orders =   $this->resultSet();
    //     $data =[];
    //     foreach($orders as $order){
    //         $itemQuery ="SELECT oi.*,concat(ml.code,ml.name) item from order_items oi join menu_list ml
    //         on oi.menu_id = ml.id where oi.order_id = $order->id" ;
    //         $this->query($itemQuery) ;
    //         $items =$this->resultSet();
    //         $order->item_arr = $items ;
    //         $data [] =$order ;
    //     }

    //     return json_encode([
    //         'status'=>'success',
    //         'data'=>$data
    //     ]);
      
    }
    

    public function serve($id) {
        $query = "UPDATE order_list SET status = 1 WHERE id = :id";
        $this->query($query);
        $this->bind(':id', $id);
    
        if ($this->execute()) {
            return json_encode([
                'status' => 'success',
                'msg' => 'Order has been served'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'msg' => 'Failed to serve the order'
            ]);
        }
    }
    


}