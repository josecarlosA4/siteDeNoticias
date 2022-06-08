<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\HomeHandler;
use \src\handlers\LoginHandler;
use \src\handlers\NoticeHandler;
use \src\handlers\HistoricHandler;
        

class HomeController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
       
    }

   
    

    public function index() {

        $noticeArray = HomeHandler::getNotice();
        $noticeRank = NoticeHandler::getRank();  

        $this->render('home', [
            'notices' => $noticeArray,
            'loggedUser' => $this->loggedUser,
            'rank' => $noticeRank
        ]);
    }

    
}