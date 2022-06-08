<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base;?>/assets/css/login-cadastro.css">
    <title>Cadastra-se</title>
</head>
<body>
    <header>
         <a href="<?=$base?>/"><h1>NÓTICIAS</h1></a>
    </header>

    <section class="section-form">
        <div class="form-register">
            <h1>Crie uma conta</h1>
            <form method="POST" action="<?= $base?>/cadastro">
                <?php if(!empty($flash)):?>
                    <div class="flash" style="background-color: red; width:100%; height: 30px; border-radius: 3px; display:flex; align-items: center; margin-bottom: 10px;">
                        <div class="flash-area" style=" margin-left: 10px;">
                            <?php echo $flash;?>
                        </div>   
                    </div>
                <?php endif;?>
                Nome:<br>
                <input type="text" name="name" placeholder="Digite seu nome..."><br>
                Email:<br>
                <input type="email" name="email" placeholder="Digite seu email..."><br>
                Senha:<br>
                <input type="password" name="password" placeholder="Digite uma senha..."><br>
                <input id="button" type="submit" value="Registra-se">
            </form>
            <div class="login-option">
                Ja tem contar ? <a href="<?= $base?>/login">Fazer Login</a>
            </div>
        </div>
       
    </section>
</body>
</html>