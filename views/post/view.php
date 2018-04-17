<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $post->title;
?>
<a class="btn btn-info" href="<?= Url::to(['post/edit', 'id' => $post->id]) ?>">
    <i class="fa fa-edit"> Edit</i>
</a>
<button id="myBtn" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"> Delete</i></button>
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="closeModal close">&times;</span>
            <h2>Deleting Post</h2>
        </div>
        <div class="modal-body">
            You are sure want deleting <?= $post->title ?>?
        </div>
        <div class="modal-footer">
            <br>
            <button class="btn btn-danger" type="submit" onclick="document.getElementById('deleteForm').submit();"><i class="fa fa-trash-o"> Confirm</i></button>
            <button class="closeModal btn" type="button">Close</button>
        </div>
    </div>
</div>
<form id="deleteForm" style="display:inline-block" action="<?= Url::to(['post/delete', 'id' => $post->id]) ?>" method="post">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken() ?>">
</form>
<div>
    <h1 style="margin-bottom:0"><?= Html::encode($post->title) ?></h1>
    <h3 style="margin:0;color:grey"><?= $post->number_views ?> views</h3>
    <p><i class="fa fa-clock-o"> <?= $post->publicationDate ?></i></p>
    <hr>
    <p><?= Html::encode($post->body) ?></p>
    <p>    
    <?php foreach($post->tags as $tag): ?>
        <span class="tag tag-<?= $tag->status ?>"><?= $tag->title ?></span>
    <?php endforeach; ?>
    </p>
</div>
<form action="<?= Url::to(['comment/store', 'post_id' => $post->id]) ?>" method="post">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken() ?>">
    <textarea id="" class="field" name="Comment[body]" placeholder="Enter your comments" rows="5"></textarea>
    <button class="btn btn-success" type="submit">Send</button>
</form>
<br>
<?= $post->number_comments ?> Comments
<?php foreach($post->comments as $comment): ?>
  <div class="comment">
    <p><?= Html::encode($comment->body) ?></p>
    <span class="comment-time"><?= $comment->created_at ?></span>
  </div>
<?php endforeach; ?>
