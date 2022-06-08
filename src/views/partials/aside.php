<aside class="body-aside inative">
            <div class="aside-content">
                <div class="close-menu">
                    <div class="close-icon"><i class="fa-regular fa-circle-xmark"></i></div>
                </div>
                <div class="user-area--menu">
            
                    <div class="user-header--menu">
                        
                        <?php if($loggedUser == false): ?>
                            <a href="<?=$base ?>/login">
                                <div class="login-button--menu">    
                                    <div class="login-icon-button first-icon"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>
                                    <div class="login-button--txt">Login</div>
                                </div>
                            </a>
                        <?php endif; ?>    
                       
                    
                        <?php if($loggedUser): ?>
                            <a href="<?=$base;?>/perfil">
                                <div class="logged-case--menu">
                                    <div class="user-icon--menu "><img src="<?=$base?>/assets/avatars/<?= $loggedUser->avatar?>"></div>
                                    <div class="user-name--menu "><?= $loggedUser->name?></div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                     
                    <?php if($loggedUser): ?>
                        <div class="user-body--menu">
                            <a href="<?=$base?>/historico">
                                <div class="user-historic--menu hover-menu">
                                        <div class="user-historic--icon first-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                                        <div class="user-historic--text">Histórico</div>
                                </div>
                            </a>
                            <a href="">
                                <div class="user-favorite--menu hover-menu">
                                        <div class="user-historic--icon first-icon"><i class="fa-regular fa-bookmark"></i></div>
                                        <div class="user-historic--text">Salvas</div>
                                </div>
                            </a>
                            
                            <a href="<?=$base?>/config">
                                <div class="user-config--menu hover-menu">
                                        <div class="user-config--icon first-icon"><i class="fa-solid fa-gear"></i></div>
                                        <div class="user-config--text">Configurações</div>
                                </div>
                            </a>
                            <a href="<?= $base?>/sair">
                                <div class="go_out--menu hover-menu">
                                    <div class="go_out--icon first-icon"><i class="fa-solid fa-power-off"></i></div>
                                    <div class="go_out--txt">Sair</div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="favorites--menu">
                    <div class="favorites--header">
                        <div class="favorites--txt">Mais acessados</div>
                    </div>
                    <div class="favorites--area">

                        <?php for($i = 0;$i<=5;$i++):?>
                            <?php if(isset($rank[$i])):?>
                                <a href="<?= $base ?>/notice/<?= $rank[$i]->id?>">
                                    <div class="favorite hover-menu">
                                        <div class="favorite-position"><?=$i + 1?>.</div>
                                        <div class="favorite-name"><?=$rank[$i]->title?></div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endfor;?>
                    </div>
                </div>
            </div>
        </aside>