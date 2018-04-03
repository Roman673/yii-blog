<?php
use Yii;
use yii\helpers\Url;

$this->title = 'Create';
?>
<form action="<?= Url::to(['post/store']) ?>" method="post">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken() ?>">

    <label for="title">Title</label>
    <input class="field" id="title" type="text" name="title" placeholder="Title">
    
    <label for="Body">Body</label>
    <textarea class="field" id="body" name="body" cols="30" rows="10" placeholder="Write something.."></textarea>

    <input class="btn btn-success" type="submit" value="Submit">
</form>
