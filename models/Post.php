<?php

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']); 
    }

    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }
}
