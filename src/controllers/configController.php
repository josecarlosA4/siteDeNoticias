<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\ConfigHandler;
use \src\handlers\LoginHandler;
use \src\handlers\NoticeHandler;

class ConfigController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();  
    }

    public function config() {
        $flash = '';

        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $noticeRank = NoticeHandler::getRank();  

        $this->render('configPag', [
            'loggedUser' => $this->loggedUser,
            'flash' => $flash,
            'rank' => $noticeRank
        ]);
    }

    public function configAction() {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $id = $this->loggedUser->id;

        if($name != '') {
            ConfigHandler::updateName($id, $name);
        }

        if($email != '') {
            if(LoginHandler::emailExists($email) == false) {
                ConfigHandler::updateEmail($id, $email);
            } else {
                $_SESSION['flash'] = 'Email já está em uso';
                $this->redirect('/config');
            }
        }

        if($password != '' ) {
            ConfigHandler::udaptePassword($id, $password);
        }

        if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])) {
            $newAvatar = $_FILES['avatar'];

            if(in_array($newAvatar['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
                $avatarName = $this->cutImage($newAvatar, 150, 150, 'assets/avatars');
                $updateFields['avatar'] = $avatarName;
                ConfigHandler::updateAvatar($id, $avatarName);
            } else {
                $_SESSION['flash'] = 'Formato de foto não permitido';
                $this->redirect('/config');
            }
        } else {
            $_SESSION['flash'] = 'Não encontrado';
            $this->redirect('/config');
        }

        $this->redirect('/config');
    }

    private function cutImage($file, $w, $h, $folder) {
        list($widthOrig, $heightOrig) = getimagesize($file['tmp_name']);
        $ratio = $widthOrig / $heightOrig;

        $newWidth = $w;
        $newHeight = $newWidth / $ratio;

        if($newHeight < $h) {
            $newHeight = $h;
            $newWidth = $newHeight * $ratio;
        }

        $x = $w - $newWidth;
        $y = $h - $newHeight;
        $x = $x < 0 ? $x / 2 : $x;
        $y = $y < 0 ? $y / 2 : $y;


        $finalImage = imagecreatetruecolor($w, $h);
        switch($file['type']) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($file['tmp_name']);
            break;

            case 'image/png':
                $image = imagecreatefrompng($file['tmp_name']);
            break;
        }


        imagecopyresampled(
            $finalImage, $image,
            $x, $y, 0, 0,
            $newWidth, $newHeight, $widthOrig, $heightOrig
        );

        $fileName = md5(time().rand(0, 9999)).'.jpg';

        imagejpeg($finalImage, $folder.'/'.$fileName);

        return $fileName;
    }
}