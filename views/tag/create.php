<?php
use yii\helpers\Url;

$this->title = 'Create';
$this->params['breadcrumbs'][] = [
    'label' => 'Tag list',
    'url' => Url::to(['tag/index']),
];
?>
<h1>Create tag</h1>
<form action="<?= Url::to(['tag/store']) ?>" method="post">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken() ?>">

    <label for="title">Title</label>
    <input class="field" id="title" type="text" name="title" placeholder="Title">
    
    <label for="status">Status</label>
    <select id="status" class="field" name="status">
        <option value="default">Default</option>
        <option value="success">Success</option>
        <option value="info">Info</option>
        <option value="warning">Warning</option>
        <option value="danger">Danger</option>
    </select>
    
    <input class="btn btn-success" type="submit" value="Submit">
</form>
