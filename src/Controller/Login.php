<?php 

namespace os\Test\Controller;
use os\Test\View;
use os\Test\Model\User;
use os\Test\public\Request;
use os\Test\public\Session;


class Login {

  private $userModel;
  private $session ;

  public function __construct() {
    $this->userModel=new User ;
    $this->session= new Session() ;
  }
  public function showLogin(){
    View::Render('login.php');
  }
   
  public function handelLogin(){
    $userData=filter_input_array(INPUT_POST);
    // var_dump($userData);
    $loginUser =  $this->userModel->Login($userData['username'],$userData['password']);

      if($loginUser){
        $this->createUserSession($loginUser);
        Request::redirect('home/index');
      }else{

         Request::redirect('login/showLogin');
         
      } 
    
  }
  public function createUserSession($user){
    $this->session->setSession('user_id',$user->id);
    $this->session->setSession('username',$user->username);
  }

}
