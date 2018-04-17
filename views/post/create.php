<?php
use Yii;
use yii\helpers\Url;

$this->title = 'Create';
?>
<form action="<?= Url::to(['post/store']) ?>" method="post">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken() ?>">

    <label for="title">Title</label>
    <input class="field" id="title" type="text" name="post[title]" tabindex="1" placeholder="Title">
    
    <label for="body">Body</label>
    <textarea class="field" id="body" name="post[body]" tabindex="2" cols="30" rows="10" placeholder="Write something.."></textarea>

    <label for="tags">Tags</label>
    <select id="tags" name="tags[]" class="field" tabindex="3" multiple="">
        <?php foreach($tags as $tag): ?>
        <option value="<?= $tag->id ?>"><?= $tag->title ?></option>
        <?php endforeach; ?>
    </select>

    <button class="btn btn-success" type="submit" tabindex="4">Create</button>
</form>
