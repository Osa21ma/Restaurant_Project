<?php 

namespace os\Test\Controller;
use os\Test\Model\User;
use os\Test\public\Request;
use os\Test\View;

class Register {

  private $userModel;

  public function __construct(){
    $this->userModel = new User();
  }

  public function showRegister(){
    View::Render('register.php');
  }
   
  public function handelRegister(){
  
    $userData = filter_input_array(INPUT_POST);

    if( $this->userModel->findByUserName($userData['username'])){
      throw new \Exception("Username Already Exists");
      
    }

            $passwordHash= password_hash($userData['password'], PASSWORD_BCRYPT);

        $user =[
                'firstname'=>$userData['firstname'],
                'lastname'=>$userData['lastname'],
                'middlename'=>$userData['middlename'],
                'username'=>$userData['username'],
                'password'=>$passwordHash,


        ];

      if($this->userModel->Register($user)){
        Request::redirect('login/showLogin');
      }else{

        Request::redirect('register/showRegister');
          
      } 
  }

}
