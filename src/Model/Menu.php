<?php 

namespace os\Test\Model;

use os\Test\public\Model;

class Menu extends Model {
    protected $tableName = 'menu_list';

    public function getAllMenues() {
        $query = "SELECT * FROM $this->tableName ORDER BY name ASC";
        $this->query($query);
        return $this->resultSet();
    }

    // public function getMenuDetail($id) {
    //     $query = "SELECT * FROM $this->tableName WHERE id = :id";
    //     $this->query($query);
    //     $this->bind(':id', $id);
    //     return $this->single();
    // }

    // public function create($menuData) {
    //     // تحقق من الحقول المطلوبة
    //     if (
    //         empty($menuData['category_id']) || 
    //         empty($menuData['code']) || 
    //         empty($menuData['name']) || 
    //         empty($menuData['description']) || 
    //         !isset($menuData['price']) ||
    //         !isset($menuData['status'])
    //     ) {
    //         return json_encode([
    //             'status' => 'fail',
    //             'msg' => 'All fields are required'
    //         ]);
    //     }

    //     $query = "INSERT INTO $this->tableName 
    //         (category_id, code, name, description, price, status, delete_flag, date_created, date_updated)
    //         VALUES (:category_id, :code, :name, :description, :price, :status, 0, NOW(), NOW())";

    //     $this->query($query);
    //     $this->bind(':category_id', $menuData['category_id']);
    //     $this->bind(':code', $menuData['code']);
    //     $this->bind(':name', $menuData['name']);
    //     $this->bind(':description', $menuData['description']);
    //     $this->bind(':price', $menuData['price']);
    //     $this->bind(':status', $menuData['status']);

    //     if ($this->execute()) {
    //         return json_encode([
    //             'status' => 'success',
    //             'msg' => 'Menu item has been created'
    //         ]);
    //     } else {
    //         return json_encode([
    //             'status' => 'fail',
    //             'msg' => 'Failed to create menu item'
    //         ]);
    //     }
    // }

    // public function update($menuData, $id) {
    //     if (
    //         empty($menuData['category_id']) || 
    //         empty($menuData['code']) || 
    //         empty($menuData['name']) || 
    //         empty($menuData['description']) || 
    //         !isset($menuData['price']) ||
    //         !isset($menuData['status'])
    //     ) {
    //         return json_encode([
    //             'status' => 'fail',
    //             'msg' => 'All fields are required'
    //         ]);
    //     }

    //     $query = "UPDATE $this->tableName SET 
    //         category_id = :category_id,
    //         code = :code,
    //         name = :name,
    //         description = :description,
    //         price = :price,
    //         status = :status,
    //         date_updated = NOW()
    //         WHERE id = :id";

    //     $this->query($query);
    //     $this->bind(':category_id', $menuData['category_id']);
    //     $this->bind(':code', $menuData['code']);
    //     $this->bind(':name', $menuData['name']);
    //     $this->bind(':description', $menuData['description']);
    //     $this->bind(':price', $menuData['price']);
    //     $this->bind(':status', $menuData['status']);
    //     $this->bind(':id', $id);

    //     if ($this->execute()) {
    //         return json_encode([
    //             'status' => 'success',
    //             'msg' => 'Menu item has been updated'
    //         ]);
    //     } else {
    //         return json_encode([
    //             'status' => 'fail',
    //             'msg' => 'Failed to update menu item'
    //         ]);
    //     }
    // }

    // public function delete($id) {
    //     $query = "DELETE FROM $this->tableName WHERE id = :id";
    //     $this->query($query);
    //     $this->bind(':id', $id);
    //     return $this->execute();
    // }
}
