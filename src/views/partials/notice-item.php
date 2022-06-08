<?php foreach($notices as $notice):?>
    <div class="notice-item--body" data-id="<?= $notice->id?>">
        <div class="notice">
            <a href="<?=$base?>/notice/<?= $notice->id?>">
                <div class="notice-photo"><img src="<?= $base ?>/assets/imagens/<?= $notice->image?>"></div>
            </a>
                <div class="mid-body">
                    <div class="category-notice--name"><?=$notice->category?></div>
                   <a href=""> <div class="favorite-notice--icon"><i class="fa-regular fa-bookmark"></i></div></a>
                </div>
        <a href="<?=$base?>/notice/<?= $notice->id?>">
                <div class="bottom-body">
                    <div class="notice-item--title"><h1><?= $notice->title ?></h1></div>
                    <div class="notice-description">
                    <?= $notice->description?>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php endforeach;?>