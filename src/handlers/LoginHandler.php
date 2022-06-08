<?php
namespace src\handlers;

use src\models\Notice;
use src\models\User;

class LoginHandler {

   public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();

            if($data > 0) {
                $user = new User();
                $user->id = $data['id'];
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = $data['password'];
                $user->avatar = $data['avatar'];


                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
   }

   public static function addUser($name, $email, $password) {
       $hash = password_hash($password, PASSWORD_DEFAULT);

       $token = md5(time().rand(0, 9999).time());

       User::insert([
           'name' => $name,
           'email' => $email,
           'password' => $hash,
           'token' => $token
       ])->execute();

       return $token;
   }

   public static function verifyLogin($email ,$password) {
        $user = User::select()->where('email', $email)->one();

        if($user) {
            if(password_verify($password, $user['password'])) {
                $token = md5(time().rand(0, 9999).time());

                User::update()
                ->set('token', $token)
                ->where('email', $email)
                ->execute();

                return $token;
            }
        }

        return false;
   }

   public static function emailExists($email) {
       $user = User::select()->where('email', $email)->one();

       if($user) {
           return true;
       } else {
           return false;
       }
   }
        
}