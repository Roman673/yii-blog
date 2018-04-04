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
<div>
    <h1><?= $post->title ?></h1>
    <hr>
    <p><?= $post->body ?></p>
</div>
<form action="<?= Url::to(['comment/store', 'post_id' => $post->id]) ?>" method="post">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken() ?>">
    <textarea id="" class="field" name="body" placeholder="Enter your comments" rows="5"></textarea>
    <button class="btn btn-success" type="submit">Send</button>
</form>
<br>
<?php foreach($post->comments as $comment): ?>
  <div class="comment">
    <p><?= $comment->body ?></p>
    <span class="comment-time"><?= $comment->created_at ?></span>
  </div>
<?php endforeach; ?>
