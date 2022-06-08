<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=0">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <title>NÓTICIAS com PHP - MVC</title>
</head>
<body>
    <?php $render('header', ['loggedUser' => $loggedUser]); ?>
    <div class="body-area">
        <?php $render('aside', ['loggedUser' => $loggedUser, 'rank' => $rank]); ?>
        
        <section class="body-section">
            <div class="section-body">
                    
                   <?php $render('notice-item', ['notices' => $notices])?>
            </div>
        </section>
    </div>
    <?php $render('footer'); ?>
</body>
</html>







