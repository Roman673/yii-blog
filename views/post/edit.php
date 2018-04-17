<?php
use yii\helpers\Url;

$this->title = 'Edit';
$this->params['breadcrumbs'][] = [
    'label' => $post->title,
    'url' => Url::to(['post/view', 'id' => $post->id]),
    ];
?>
<form action="<?= Url::to(['post/update', 'id' => $post->id]) ?>" method="post">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken() ?>">

    <label for="title">Title</label>
    <input class="field" id="title" type="text" name="post[title]" tabindex="1" placeholder="Title" value="<?= $post->title ?>">
    
    <label for="Body">Body</label>
    <textarea class="field" id="body" name="post[body]" tabindex="2" cols="30" rows="10" placeholder="Write something.."><?= $post->body ?></textarea>

    <label for="tags">Tags</label>
    <select id="tags" name="tags[]" class="field" tabindex="3" multiple="">
        <?php foreach($tags as $tag): ?>
        <option value="<?= $tag->id ?>"
        <?php foreach($post->tags as $selected_tag): ?>
            <?php if($tag == $selected_tag): ?>selected<?php endif; ?>
        <?php endforeach; ?>
        ><?= $tag->title ?></option>
        <?php endforeach; ?>
    </select>

    <button class="btn btn-info" type="submit" tabindex="4">Update</button>
</form>

