<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\BaseAsset;

BaseAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div id="mySidenav" class="sidenav">
        <a id="closeNav" href="#" class="closebtn">&times;</a>
        <a href="<?= Url::to(['post/index']) ?>">Home</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
        <a href="<?= Url::to(['post/about']) ?>">About</a>
    </div>

    <div id="main">
        <button id="openNav" class="btn"><i class="fa fa-bars"> Menu</i></button>
    <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
