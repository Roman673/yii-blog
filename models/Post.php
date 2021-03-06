<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Post extends ActiveRecord
{
    public static function tableName()
    {
        return 'posts';
    }
    
    public function getPublicationDate()
    {
        return date('F d, Y \i\n H:i', strtotime($this->created_at));
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']); 
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('post_tag', ['post_id' => 'id']);
    }

    public function getViews()
    {
        return $this->hasMany(View::className(), ['post_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }
}
