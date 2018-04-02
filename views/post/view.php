<?php
use yii\helpers\Url;

$this->title = $post->title;
?>
<ul class="breadcrumb">
    <li><a href="<?= Url::to(['post/index']) ?>">Home</a></li>
    <li><?= $this->title ?></li>
</ul>
<a class="btn btn-info" href="<?= Url::to(['post/edit', 'id' => $post->id]) ?>">
    <i class="fa fa-edit"> Edit</i>
</a>
<a class="btn btn-danger" href="<?= Url::to(['post/destroy', 'id' => $post->id]) ?>">
    <i class="fa fa-trash-o"> Delete</i>
</a>
<h1><?= $post->title ?></h1>
<hr>
<p><?= $post->body ?></p>
