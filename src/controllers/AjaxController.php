<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\HomeHandler;
use \src\handlers\LoginHandler;
use \src\handlers\NoticeHandler;
use \src\handlers\ProfileHandler;
use \src\handlers\HistoricHandler;
 

class AjaxController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            header("Content-type: application/json");
            echo json_encode(['error' => 'Usuario não logado']);
            exit;
        }  
    }

    public function comment() {
        $array = ['error' => ''];

        $id = filter_input(INPUT_POST, 'id');
        $txt = filter_input(INPUT_POST, 'txt');

        if($id && $txt) {
            NoticeHandler::addComment($id, $txt, $this->loggedUser->id);
        }

        $array['link'] = '/perfil/'.$this->loggedUser->id;
        $array['avatar'] = '/assets/avatars/'.$this->loggedUser->avatar;
        $array['name'] = $this->loggedUser->name;
        $array['body'] = $txt;
        $array['date'] = date('d/m/Y');

        header("Content-type: application/json");
        echo json_encode($array);
        exit;

        
    }
}