<?php
namespace src\handlers;

use src\models\Notice;
use src\models\User;
use src\Models\Historic;

class ProfileHandler {
    
   public static function getUser($id) {

        $data = User::select()->where('id', $id)->one();

        if($data) {
            $user = new User();
            $user->id = $data['id'];
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->avatar = $data['avatar'];

            return $user;
        }
   }

}