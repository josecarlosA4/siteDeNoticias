<?php
namespace src\handlers;

use src\models\Notice;

class HomeHandler {

    public static function getNotice() {
        $datas = Notice::select()->get();

        $noticeArray = [];

        foreach($datas as $data) {
            $notice = new Notice();
            $notice->id = $data['id'];
            $notice->created_by = $data['created_by'];
            $notice->body = $data['body'];
            $notice->created_at = $data['created_at'];
            $notice->category = $data['category'];
            $notice->description = $data['description'];
            $notice->title = $data['title'];
            $notice->image = $data['image'];

            $noticeArray[] = $notice;
        }
        
        return $noticeArray;
    }
}