<?php
use yii\helpers\Url;

/* @var tags app\models\Tag */

$this->title = 'Tag list';
?>
<h1><?= $this->title ?></h1>
<a class="btn btn-info" href="<?= Url::to(['tag/create'])?>">ADD NEW</a>
<br><br>
<?php foreach($tags as $tag): ?>
<span class="tag tag-<?= $tag->status ?>"><?= $tag->title ?></span>
<?php endforeach; ?>
