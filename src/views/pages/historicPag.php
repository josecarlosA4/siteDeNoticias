<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=0">
    <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
    <title>Historico</title>
</head>
<body>

    
    <?=$render('header', ['loggedUser' => $loggedUser]) ?>
    <div class="body-area">
        <?= $render('aside', ['loggedUser' => $loggedUser, 'rank' => $rank])?>
    
        <section class="body-section">
            <div class="section-body">
                
                    <?= $render('notice-item', ['notices' => $notices])?>
            </div>
        </section>
    </div>
    <?= $render('footer', ['loggedUser' => $loggedUser])?>
</body>
</html>