<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\HomeHandler;
use \src\handlers\LoginHandler;
use \src\handlers\NoticeHandler;
use \src\handlers\ProfileHandler;
use \src\handlers\HistoricHandler;
 

class NoticeController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();  
    }

    public function noticeBody($args = []) {
        if(!empty($args['id'])) {
            $id = $args['id'];
        }

        

        if($this->loggedUser != false) {
            $idUser = $this->loggedUser->id;
            HistoricHandler::addHistoricUser($idUser, $id);
        }

       
        
        $noticeRank = NoticeHandler::getRank();  
        $add = NoticeHandler::click($id);
        $bodyNotice = NoticeHandler::getNotice($id);
        $comment = NoticeHandler::getComment($id);

        $this->render('noticePag', 
        [
            'idNotice' => $id,
            'loggedUser' => $this->loggedUser,
            'bodyNotice' => $bodyNotice,
            'comments' => $comment,
            'rank' => $noticeRank
            
        ]
    );
    }
}