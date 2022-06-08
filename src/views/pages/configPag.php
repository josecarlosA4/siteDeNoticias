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
    
        <section class="body-section">
            <div class="form-config-title"><h1>Configurações do usuario:</h1></div>
           <form class="config-form" method="POST" enctype="multipart/form-data" action="<?=$base?>/config">
                <?php if(!empty($flash)):?>
                    <div class="flash" style="background-color: red; width:100%; height: 30px; border-radius: 3px; display:flex; align-items: center; margin-bottom: 10px;">
                        <div class="flash-area" style=" margin-left: 10px;">
                            <?php echo $flash;?>
                        </div>   
                    </div>
                <?php endif;?>

                Escolha uma novo avatar:<br>
                <input type="file" id='avatar' class="file-input-config" name="avatar"><br><br>
                
                Nome:<br>
                <input type="text" placeholder="<?=$loggedUser->name ?>" class="text-input" name="name"><br><br>
                Email:<br>
                <input type="text" placeholder="<?=$loggedUser->email ?>" class="text-input" name="email"><br><br>
                Senha:
                <input type="password" placeholder="Insira uma senha..." class="text-input" name="password"><br><br>
                <input type="submit" class="submit-config" value="Salvar">
           </form>
        </section>
    </div>

   <?php $render('footer');?>
    
</body>
</html>