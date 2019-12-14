<?php

use backend\dGomUtils\RulesMenu;
use yii\helpers\Url;

?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="<?= Url::base() ?>/"><?= Yii::$app->name ?></a>
    <!--a class="navbar-brand" href="#">
        <img class="nav-bar-system-logo" src="<?= Url::base(true) ?>/webAssets/images/logos/logo-conti-header-black@2x.png" srcset="<?= Url::base(true) ?>/webAssets/images/logos/logo-conti-header-black@2x.png 2x" alt="">
    </a-->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?= RulesMenu::getNavBar() ?>
    </ul>
    </div>

    <!-- -->
    <div class="user-menu">
        <?
        if (\Yii::$app->user->isGuest) {
            echo '<a class="" href="' . Url::base(true) . '/site/login"><i class="fas fa-sign-in-alt"></i> Entrar</a>';
        } else {
            ?>
            <a class="" href="<?= Url::base(true) ?>/site/logout">
                <?//= Yii::$app->user->identity->txt_email ?><i class="toolbar-icon-logout ion-log-out"></i>
            </a>
        <?
        }
        ?>
    </div>
</nav>



