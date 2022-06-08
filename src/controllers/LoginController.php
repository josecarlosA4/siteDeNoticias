<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;

class LoginController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();  
    }

   public function signin() {

          $flash = '';
          if(!empty($_SESSION['flash'])) {
               $flash = $_SESSION['flash'];
               $_SESSION['flash'] = '';
          }
        $this->render('signin', ['flash' => $flash]);
   }

   public function signinAction() {
     
     $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
     $password = filter_input(INPUT_POST, 'password'); 


     if($email && $password) {
          $token = LoginHandler::verifyLogin($email, $password);
          if($token) {
               $_SESSION['token'] = $token;
               $this->redirect('/');
          } else {
               $_SESSION['flash'] = 'Email e/ou senha não conferem';
               $this->redirect('/login');
          }
     } else {
          $_SESSION['flash'] = 'Preencha todos os campos';
          $this->redirect('/login');
     }
   }

   public function signup() {
     $flash = '';
     if(!empty($_SESSION['flash'])) {
          $flash = $_SESSION['flash'];
          $_SESSION['flash'] = '';
     }  

        $this->render('signup', ['flash' => $flash]);
   }

   public function signupAction() {

     $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
     $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
     $password = filter_input(INPUT_POST, 'password');

     if($name && $email && $password) {

          if(LoginHandler::emailExists($email) === false) {
               $token = LoginHandler::addUser($name, $email, $password);
               $_SESSION['token'] = $token;
               $this->redirect('/');
          } else {
               $_SESSION['flash'] = 'Email já cadastrado!';
               $this->redirect('/cadastro');
          }

     } else {
          $_SESSION['flash'] = 'Preencha todos os campos!';
          $this->redirect('/cadastro');

     }
}

public function logout() {
     $_SESSION['token'] = '';
     $this->redirect('/');
}

}


