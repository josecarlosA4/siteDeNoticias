<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\HomeHandler;
use \src\handlers\LoginHandler;
use \src\handlers\NoticeHandler;
use \src\handlers\HistoricHandler;
        

class HistoricController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();  
    }

    public function historic($atts = []) {
        if(!empty($atts['id'])) {
            $id = $atts['id'];
        } else if(empty($atts['id'])) {
            $id = $this->loggedUser->id;
        }


        $dataHistoric = HistoricHandler::getHistoric($id);
        $noticeRank = NoticeHandler::getRank();  

    
        $this->render('historicPag', [
            'notices' => $dataHistoric,
            'loggedUser' => $this->loggedUser ,
            'rank' => $noticeRank           
        ]);
    }

}