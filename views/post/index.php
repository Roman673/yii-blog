<?php
use yii\helpers\Url;

$this->title = 'Home';
?>
<ul class="breadcrumb">
    <li><?= $this->title ?></li>
</ul>
<a class="btn btn-info" href="<?= Url::to(['post/create']) ?>"><i class="fa fa-pencil-square-o"> Create</i></a>
<?php foreach ($posts as $post): ?>
    <h1><?= $post->title ?></h1>
    <p><?= $post->body ?></p>
    <a class="btn btn-outline-default" href="<?= Url::to(['post/view', 'id' => $post->id]) ?>">Read more
        <i class="fa fa-angle-double-right"></i></a>
    <hr>
<?php endforeach; ?>
