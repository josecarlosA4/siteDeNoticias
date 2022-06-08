<?php
namespace src\handlers;

use src\models\Notice;
use src\models\Historic;

class HistoricHandler {

    public static function addHistoricUser($idUser, $id) {
        Historic::insert([
            'id_user' => $idUser,
            'id_notice' => $id
        ])->execute();
    }


    public static function getHistoric($id) {
        $datasArray = [];
        $historicArray = [];
        $datas = Historic::select()->where('id_user', $id)->get();

        foreach($datas as $data) {
            $datasArray[] = $data['id_notice'];
        }
        $notices = Notice::select()->where('id', 'in', $datasArray)->get();

        foreach($notices as $notice) {
            $historicItem = new Notice();
            $historicItem->id = $notice['id'];
            $historicItem->title = $notice['title'];
            $historicItem->category = $notice['category'];
            $historicItem->description = $notice['description'];
            $historicItem->image = $notice['image'];

            $historicArray[] = $historicItem;
        }

        return $historicArray; 
    }

    public static function getAvarage($id) {

        $datasArray = [];
        $datas = Historic::select()->where('id_user', $id)->get();

        foreach($datas as $data) {
            $datasArray[] = $data['id_notice'];
        }

        $avarage = '';

        switch(count($datasArray)) {

            case count($datasArray) <= 3:
                $avarage = 'Leitura abaixo da média';
                break;
            
            case count($datasArray) >= 4 && count($datasArray) <= 8:
                $avarage = 'Leitor médio';
                break;
            
            case count($datasArray) >= 9:
                $avarage = 'Leitura acima da média';
                break;

        }

        return $avarage;

    }
}