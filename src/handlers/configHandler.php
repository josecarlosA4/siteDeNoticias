<?php
namespace src\handlers;

use ClanCats\Hydrahon\Query\Sql\Select;
use src\models\Notice;
use src\models\User;

class ConfigHandler {
    
    public static function updateName($id, $name) {
        User::update()->set('name', $name)->where('id', $id)->execute();   
    }

    public static function updateEmail($id, $email) {
        User::update()->set('email', $email)->where('id', $id)->execute();   
    }

    public static function udaptePassword($id, $password) {
        
        $hash = password_hash($password, PASSWORD_DEFAULT);

        User::update()->set('password', $hash)->where('id', $id)->execute();
    }

    public static function updateAvatar($id, $avatar) {

        User::update()->set('avatar', $avatar)->where('id', $id)->execute();
    }

}