<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
    <link rel="stylesheet" href="<?=$base?>/assets/css/notice.css">

    <title><?=$bodyNotice->title?></title>
</head>
<body>

    <?php  $render('header', ['loggedUser' => $loggedUser]);?>
    <div class="body-area">
        
        <?php $render('aside', ['loggedUser' => $loggedUser, 'rank' => $rank]) ?>

        <?php
            $dateExplode = $bodyNotice->created_at;
            $date = explode("-",  $dateExplode );
            $date = $date[2]."/".$date[1]."/".$date[0];    
        ?>
    
        <section class="body-section--notice">
            <div class="section-body--notice">
                <div class="notice-comments-body feed-item" data-id="<?=$bodyNotice->id?>">
                    <div class="notice-content">
                        <div class="notice-header">
                            <div class="notice-header--photo"><img src="<?=$base?>/assets/avatars/user.png"></div>
                            <div class="notice-data">
                                <div class="notice-data-autor"> escrita por <?=$bodyNotice->created_by?></div>
                                <div class="notice-data--date">em <?=$date?></div>
                            </div>
                        </div>

                        <div class="notice-body">
                            <div class="notice-title"><h1><?=$bodyNotice->title?></h1></div>
                           <div class="notice-text">
                           <?=$bodyNotice->body?>
                           </div>
                        </div>
                    </div>

                    <?php if($loggedUser): ?>
                        <div class="notice-comment-area">
                            <h1>Comentários</h1>
                            <div class="coments-edition">
                                <div class="comment-post">
                                    <div class="user-avatar--comment"><img src="<?=$base?>/assets/avatars/<?=$loggedUser->avatar ?>"></div>
                                </div>
                                
                                
                                    <input type="text" class="body-comment"  placeholder="Escreva um comentario" name="body">
                                
                            </div>
                        </div>
                    <?php endif;?>
                
                    <div class="comments-area">
                        <div class="comments-body">
                            <?php foreach($comments as $comment): ?>

                            <?php
                                $commentDate = $comment['created_at'];
                                $dateComment = explode("-",  $commentDate );
                                $dateComment = $dateComment[2]."/".$dateComment[1]."/".$dateComment[0];    
                            ?>

                                <div class="comments-content">
                                    <div class="comment-avatar"><a href="<?=$base?>/perfil/<?=$comment['userId']?>"><img src="<?=$base?>/assets/avatars/<?=$comment['userAvatar']?>"></a></div>
                                    <div class="comment-text-name">
                                        <div class="comment-name">
                                            <a href="">
                                                <?=$comment['userName']?>
                                            </a>
                                            <div class="comment-date">
                                                <?php echo $dateComment?>
                                            </div>
                                        </div>
                                        <div class="comment-text">
                                            <?=$comment['commentBody']?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>     
                        </div>
                    </div> 

                </div>
            </div>
        </section>
    </div>

    <?php $render('footer' ,['loggedUser' => $loggedUser])?>
    
</body>
</html>