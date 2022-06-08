<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\HomeHandler;
use \src\handlers\LoginHandler;
use \src\handlers\NoticeHandler;
use \src\handlers\HistoricHandler;
        

class SearchController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();  
    }

    public function results($atts = []) {

        $searchTerm = filter_input(INPUT_GET, 's');

        $notices = NoticeHandler::search($searchTerm);
        
        $this->render('search', [
            'loggedUser' => $this->loggedUser,
            'term' => $searchTerm,
            'notices' => $notices
        ]);
    }


}