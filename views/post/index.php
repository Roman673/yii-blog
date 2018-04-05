<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $posts app\models\Post */

$this->title = 'Home';
?>
<?php foreach ($posts as $post): ?>
    <article>
        <h1><?= Html::encode($post->title) ?></h1>
        <p><?= Html::encode($post->body) ?></p>
        <p>
            <i class="fa fa-eye"> <?= Count($post->views) ?></i>&nbsp;&nbsp;
            <i class="fa fa-comments-o"> <?= Count($post->comments) ?></i>&nbsp;&nbsp;
            <i class="fa fa-clock-o"> <?= $post->created_at ?></i>
        </p>
        <a class="btn btn-outline-default" href="<?= Url::to(['post/view', 'id' => $post->id]) ?>">Read more
            <i class="fa fa-angle-double-right"></i></a>
    </article>
<?php endforeach; ?>
