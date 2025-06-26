<?php 






namespace os\Test\Model;

use os\Test\public\Model;
use os\Test\public\Session;

class Order extends Model {
    protected $tableName = 'order_list';
    private $session;

    public function __construct() {
        parent::__construct();
        $this->session = new Session();
    }

    public function placeOrder($orderData) {
      
        if ($orderData['tendered_amount'] < $orderData['total_amount']) {
            return json_encode([
                'status' => 'fail',
                'msg' => 'Tendered amount cannot be less than total amount'
            ]);
        }

        $orderData['user_id'] = $this->session->getSession('user_id');
        $orderData['code'] = $this->generateCode();
        $orderData['queue'] = $this->extractQueue($orderData['code']);
        
       
        $orderListResult = $this->insertOrderList($orderData);
        
        if ($orderListResult['success']) {
            $orderid = $orderListResult['order_id'];
          
            $orderItemResult = $this->insertOrderItem($orderData, $orderid);
            if ($orderItemResult['success']) {
                return json_encode([
                    'status' => 'success',
                    'msg' => 'Order has been placed',
                    'order_id' => $orderid
                ]);
            } else {
                return json_encode([
                    'status' => 'fail',
                    'msg' => 'Order has not been placed',
                    'error' => $orderItemResult['error']
                ]);
            }
        } else {
            return json_encode([
                'status' => 'fail',
                'msg' => 'Order has not been placed',
                'error' => $orderListResult['error']
            ]);
        }
    }

    private function insertOrderItem($orderData, $orderid) {
        $data = '';
        foreach ($orderData['menu_id'] as $key => $value) {
            if (!empty($data)) $data .= ",";
            $data .= "('{$orderid}', '{$orderData['menu_id'][$key]}', '{$orderData['quantity'][$key]}', '{$orderData['price'][$key]}')";
        }

        $query = "INSERT INTO order_items (`order_id`, `menu_id`, `quantity`, `price`) VALUES $data";
        $this->query($query);
        $success = $this->execute();
        
        if ($success) {
            return ['success' => true];
        } else {
            echo $this->rollback($orderid);
            return ['success' => false, 'error' => $this->connection->errorInfo()];
        }
    }

    public function rollback($orderid) {
        $query = "DELETE FROM $this->tableName WHERE id = $orderid";
        $this->query($query);
        return $this->execute();
    }

    private function insertOrderList($orderData) {
        $orderFields = ['code', 'queue', 'total_amount', 'tendered_amount', 'user_id'];
        $fields = [];
        $placeHolders = [];
        
        foreach ($orderData as $key => $value) {
            if (in_array($key, $orderFields) && !is_array($value)) {
                $fields[] = "$key";
                $placeHolders[] = ":$key";
            }
        }

        $query = "INSERT INTO $this->tableName (" . implode(", ", $fields) . ")
                  VALUES (" . implode(", ", $placeHolders) . ")";
        $this->query($query);
        
        foreach ($orderData as $key => $value) {
            if (in_array($key, $orderFields) && !is_array($value)) {
                $this->bind(":$key", $value);
            }
        }
        
        $success = $this->execute();
        if ($success) {
            return ['success' => true, 'order_id' => $this->connection->lastInsertId()];
        } else {
            return ['success' => false, 'error' => $this->connection->errorInfo()];
        }
    }

    private function generateCode() {
        $prefix = date('Ymd');
        $code = sprintf("%05d", 1);
        
        while (true) {
            $query = "SELECT * FROM $this->tableName WHERE code = '${prefix}${code}'";
            $this->query($query);
            $row = $this->single();
            if ($row) {
                $code = sprintf("%05d", $code + 1);
            } else {
                return $prefix . $code;
            }
        }
    }

    private function extractQueue($code) {
        return substr($code, -5);
    }

    public function getOrders(){
        $query = "SELECT * FROM $this->tableName order by date_created desc" ;
        $this->query( $query) ;
        return $this->resultSet();
    }
    public function getOrderList($id){
        $query = "SELECT * FROM $this->tableName where id = $id" ;
        $this->query($query) ;
        return $this->single();
    }
    public function getOrderItem($id){
        $query = "SELECT oi.*, CONCAT(ml.code, '-', ml.name) AS item 
        FROM order_items oi 
        JOIN menu_list ml ON ml.id = oi.menu_id 
        WHERE oi.order_id = :id";
        $this->query($query);
       $this->bind(':id', $id); // SQL Injection
       return $this->single();
    }
}

