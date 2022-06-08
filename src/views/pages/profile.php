<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css">
    <link rel="stylesheet" href="<?=$base?>/assets/css/perfil.css">

    <title>Perfil</title>
</head>
<body>

    <?php $render('header', ['loggedUser' => $loggedUser]);?>
    <div class="body-area">
        <?php $render('aside', ['loggedUser' => $loggedUser, 'rank' => $rank]);?>
    
        <section class="body-section--profile">
            <div class="section-body--profile">
                <div class="perfil-body">
                    <div class="perfil-content">
                        <div class="perfil-rl">
                            <div class="perfil-avatar"><img src="<?=$base?>/assets/avatars/<?=$user->avatar ?>"></div>
                            <div class="perfil-data">
                                <div class="perfil-name">Nome: <?= $user->name ?> </div>
                                <div class="perfil-email"> Email: <?=$user->email ?></div>
                                <div class="perfil-frequence">Frequência: <?php echo $avarage ?></div>
                            </div>
                        </div>
                        <div class="perfil-footer">
                            <a href="<?=$base?>/historico/<?=$user->id ?>">
                                <div class="button-profile">HISTÓRICO</div>
                            </a>
                            <a href="">
                                <div class="button-profile">SALVAS</div>
                            </a>

                            <?php if($loggedUser->id === $user->id):?>
                                <a href="<?=$base?>/config">
                                    <div class="button-profile"><i class="fa-solid fa-gear"></i></div>
                                </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

   <?php $render('footer');?>
    
</body>
</html>