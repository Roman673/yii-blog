<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\BaseAsset;

BaseAsset::register($this);

$this->registerLinkTag([
    'rel' => 'stylesheet',   
    'href' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
]);
$session = Yii::$app->session;
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
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="grid-container">
    <?php if($session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <span class="closebtn">&times;</span>
            <strong>Success!</strong> <?= $session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    <?php if($session->hasFlash('danger')): ?>
        <?php foreach($session->getFlash('danger') as $danger): ?>
            <div class="alert alert-danger">
                <span class="closebtn">&times;</span>
                <strong>Danger!</strong> <?= $danger[0] ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <header>
        <h1>My Blog</h1>
        <p>Consectetur hic inventore nesciunt minima?</p>
    </header>

    <nav>
        <?php
            $url = \Yii::$app->request->url;
            $home = Url::to(['post/index']);
            $about = Url::to(['post/about']);
            $create = Url::to(['post/create']);
            $tags = Url::to(['tag/index']);
        ?>
        <a href="<?= $home ?>" <? if($url == $home): ?>class="active"<? endif; ?>>Home</a>
        <a href="<?= $tags ?>" <?php if($url == $tags): ?>class="active"<?php endif; ?>>Tags</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
        <a href="<?= $about ?>" <? if($url == $about): ?>class="active"<? endif; ?>>About</a>
        <a href="#" class="right">Log In</a>
        <a href="<?= $create ?>" <? if($url == $create): ?>class="right active"<? else: ?>class="right"<? endif; ?>>Create</a>
    </nav>

<?php if($url !== $home): ?>
    <ul class="breadcrumb">
        <li><a href="<?= $home ?>">Home</a></li>
        <? if(isset($this->params['breadcrumbs'])): ?>
            <? foreach($this->params['breadcrumbs'] as $key => $value): ?>
                <li><a href="<?= $value['url'] ?>"><?= $value['label'] ?></a></li>
            <? endforeach; ?>
        <? endif; ?>
        <li><?= $this->title ?></li>
    </ul>
<?php endif; ?>

    <aside>
        <h2>Aside</h2>
        <ul>
            <li>item1</li>
            <li>item2</li>
            <li>item3</li>
            <li>item4</li>
            <li>item5</li>
            <li>item6</li>
            <li>item7</li>
            <li>item8</li>
            <li>item9</li>
        </ul>
    </aside>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <h2>Footer</h2>
        <p>Adipisicing possimus corporis impedit illo.</p>
    </footer>
</div><!-- /.grid-container -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
