<?php 

namespace os\Test\Controller ;
use os\Test\Model\Category as modelCategory ;
use os\Test\View;

class Category {
     
    private $category ;

    public function __construct(){
        $this->category =new modelCategory ;
    }
    public function getCategory(){
        $categories = $this->category->getcategories();

        View::Render('category.php',['categories'=>$categories]) ;
    }

    public function makeCategory(){
        View::Render('manage_category.php') ;
    }
  
    public function createCategory(){
        $categoryData =filter_input_array(INPUT_POST) ;
        echo  $this->category->create($categoryData);

    }

    // public function viewCategory($id){

    //    $category= $this->category->getCategoryDetail($id);
    //     View::Render('viewCategory.php',['category'=>$category]);
    // }
    // public function editCategory($id){

    //    $category= $this->category->getCategoryDetail($id);
    //     View::Render('editCategory.php',['category'=>$category]);
    // }
    // public function updateCategory($id){
    //     $categoryData =filter_input_array(INPUT_POST) ;
    //     echo $category= $this->category->update($categoryData,$id);
      
    // }

    // public function deleteCategory($id){
    //   echo $this->category->delete($id);
    // }
}