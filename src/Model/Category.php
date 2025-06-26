<?php 

namespace os\Test\Model;

use os\Test\public\Model;

class Category extends Model{
    protected $tableName ='category_list';
      

    public function getAllcategories(){
        $query= " SELECT * FROM $this->tableName  WHERE status =1  AND  delete_flag =0  ORDER BY name ASC  " ;
        $this-> query($query);
        return $this->resultSet();
    }

    public function getcategories(){
        $query= " SELECT * FROM $this->tableName   ORDER BY name ASC  " ;
        $this-> query($query);
        return $this->resultSet();
    }

    public function create($categoryData){
        if (empty($categoryData['name']) || empty($categoryData['description']) || !isset($categoryData['status'])) {
            return json_encode([
                'status' => 'fail',
                'msg' => 'All fields are required'
            ]);
        }
        $query = "INSERT into $this->tableName (name , description , status )
        values (:name , :description ,:status)" ;
        $this->query($query);
        $this->bind(':name' , $categoryData['name']);
        $this->bind(':description' , $categoryData['description']);
        $this->bind(':status' , $categoryData['status']);
     
        if($this->execute()){
            return json_encode([
                'status'=>'success',
                'msg'=>'category has been created',
            ]);

        }else{
            return json_encode([
                'status'=>'fail',
                'msg'=>'category has not been created',
            ]);


        }
    }
  

    public function getCategoryDetail($id){
        $query = "SELECT * from $this->tableName where id= $id" ;
        $this->query($query);
        return $this->single();
    }

    public function update($categoryData,$id){
        if (empty($categoryData['name']) || empty($categoryData['description']) || !isset($categoryData['status'])) {
            return json_encode([
                'status' => 'fail',
                'msg' => 'All fields are required'
            ]);
        }
        $query = "UPDATE  $this->tableName SET name= :name , description= :description , status =:status WHERE id =$id" ;
        $this->query($query);
        $this->bind(':name' , $categoryData['name']);
        $this->bind(':description' , $categoryData['description']);
        $this->bind(':status' , $categoryData['status']);
     
        if($this->execute()){
            return json_encode([
                'status'=>'success',
                'msg'=>'category has been UPDATE',
            ]);

        }else{
            return json_encode([
                'status'=>'fail',
                'msg'=>'category has not been UPDATE',
            ]);


        }
    }

    public function delete($id){
        $query = "DELETE FROM $this->tableName where id =$id";
      $this->query($query);
      return $this->execute();
    }

}