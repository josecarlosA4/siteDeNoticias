<?php
namespace src\handlers;

use src\models\Notice;
use src\models\User;
use src\models\Comment;

class NoticeHandler {
    
    public static function getNotice($id) {

        $data = Notice::select()->where('id', $id)->one();

        if($data) {
            $body = new Notice();
            $body->id = $data['id'];
            $body->created_by = $data['created_by'];
            $body->body = $data['body'];
            $body->created_at = $data['created_at'];
            $body->title = $data['title'];

            return $body;
        } else {
            return 'Desculpa, eu acho que essa pagina ja saiu do ar :(';
        }
    }

    public static function search($term) {
        $searchArray = [];
        $datas = Notice::select()
        ->where('title', 'like', '%'.$term.'%')
        ->orWhere('category', 'like', '%'.$term.'%')
        ->orWhere('description', 'like', '%'.$term.'%')
        ->orWhere('created_by', 'like', '%'.$term.'%')
        ->get();

        foreach($datas as $data ) {
            $body = new Notice();
            $body->id = $data['id'];
            $body->created_by = $data['created_by'];
            $body->created_at = $data['created_at'];
            $body->title = $data['title'];
            $body->category = $data['category'];
            $body->description = $data['description'];
            $body->image = $data['image'];

            $searchArray[] = $body;
        }

        return $searchArray;
    }

    public static function click($id) {
        $data = Notice::select()->where('id', $id)->one();
        $add = $data['clickcount'] + 1;
        Notice::update()->set('clickcount', $add)->where('id', $id)->execute();

    }

    public static function getRank() {

        $rankArray = [];
        $datas = Notice::select()->orderby('clickcount', 'desc')->get();

        foreach($datas as $data) {
            $position = new Notice();
            $position->id = $data['id'];
            $position->title = $data['title'];

            $rankArray[] = $position;
        }
        
        return $rankArray;
    }

    public static function getComment($id) {

        $commentArray = [];
        $datas = Comment::select()->where('id_notice', $id)->get();

            foreach($datas as  $data) {
               $comment = new Comment();
               $comment->id = $data['id'];
               $comment->body = $data['body'];
               $comment->id_notice = $data['id_notice'];
               $comment->id_user = $data['id_user'];
               $comment->created_at = $data['created_at'];

               $dataUsers = User::select()->where('id', $data['id_user'])->get();

               foreach($dataUsers as $dataUser) {
                    $user = new User();
                    $user->id = $dataUser['id'];
                    $user->name = $dataUser['name'];
                    $user->avatar = $dataUser['avatar'];
               }
               
               $commentArrayPrimary = [
                   'userName' => $user->name, 
                   'commentBody' => $comment->body, 
                   'userId' => $user->id, 
                   'userAvatar' => $user->avatar,
                   'created_at' => $comment->created_at
                ];

               $commentArray[] = $commentArrayPrimary;

               
            }

            return $commentArray ;   
    }


    public static function addComment($idNotice, $txt, $idUser) {

        Comment::insert([
            'id_user' => $idUser,
            'id_notice' => $idNotice,
            'created_at' => date('Y-m-d'),
            'body' => $txt
        ])
        ->execute();
    }

}