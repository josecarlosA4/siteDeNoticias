<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\HomeHandler;
use \src\handlers\LoginHandler;
use \src\handlers\NoticeHandler;
use \src\handlers\ProfileHandler;
use \src\handlers\HistoricHandler;
 

class ProfileController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();  
    }

    public function userProfile($atts = []) {
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        } else {
            $id = $this->loggedUser->id;
        }

        $noticeRank = NoticeHandler::getRank();  


        $avarage = HistoricHandler::getAvarage($id);

        $user = ProfileHandler::getUser($id);
        $this->render('profile', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'avarage' => $avarage,
            'rank' => $noticeRank
        ]);
    }
}