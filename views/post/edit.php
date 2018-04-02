<?php
use yii\helpers\Url;

$this->title = 'Edit';
?>
<ul class="breadcrumb">
    <li><a href="<?= Url::to(['post/index']) ?>">Home</a></li>
    <li><a href="<?= Url::to(['post/view', 'id' => $post->id]) ?>"><?= $post->title ?></a></li>
    <li><?= $this->title ?></li>
</ul>

<form action="<?= Url::to(['post/update', 'id' => $post->id]) ?>" method="post">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken() ?>">

    <label for="title">Title</label>
    <input class="field" id="title" type="text" name="title" placeholder="Title" value="<?= $post->title ?>">
    
    <label for="Body">Body</label>
    <textarea class="field" id="body" name="body" cols="30" rows="10" placeholder="Write something.."><?= $post->body ?></textarea>

    <input class="btn btn-success" type="submit" value="Submit">
</form>

