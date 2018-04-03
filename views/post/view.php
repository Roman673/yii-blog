<?php
use yii\helpers\Url;

$this->title = $post->title;
?>
<a class="btn btn-info" href="<?= Url::to(['post/edit', 'id' => $post->id]) ?>">
    <i class="fa fa-edit"> Edit</i>
</a>
<form style="display:inline-block" action="<?= Url::to(['post/delete', 'id' => $post->id]) ?>" method="post">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken() ?>">
    <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o"> Delete</i></button>
</form>
<section>
    <h1><?= $post->title ?></h1>
    <hr>
    <p><?= $post->body ?></p>
</section>
