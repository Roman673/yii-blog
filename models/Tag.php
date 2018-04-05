<?php

namespace app\models;

use yii\db\ActiveRecord;

class Tag extends ActiveRecord
{
    public static function tableName()
    {
        return 'tags';
    }

    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])
            ->viaTable('post_tag', ['tag_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            ['title', 'string', 'length' => [3, 20]],
            ['status', 'in', 'range' => ['default', 'success', 'info', 'warning', 'danger']]
        ];
    }
}
