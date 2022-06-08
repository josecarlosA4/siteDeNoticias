
    <header>
        <div class="header-content">
            <div class="right-header">
                <div class="bars-menu">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <a href="<?=$base?>/">
                    <div class="logo-icon">NÓTICIAS</div>
                </a>
            </div>
            <div class="input-header">
                <form method="GET" action="<?=$base?>/pesquisa">
                    <input class="input-header--search" type="search" name="s" placeholder="Pesquise por algo...">
                    <input class="input-header--submit" type="submit" value="Ir">
                </form>
            </div>
            <div class="login-header--icon">

                <?php if($loggedUser == false):?>
                    <a href="<?=$base?>/login">
                        <div class="login-header--button"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>
                    </a>
                <?php endif;?>
                
                <?php if($loggedUser):?>
                    <a  href="<?=$base;?>/perfil">
                        <div class="logged-icons">
                            <img class="user-icon" src="<?=$base?>/assets/avatars/<?= $loggedUser->avatar?>">
                        </div>
                    </a>
                <?php endif;?>

            </div>
        </div>
    </header>


    