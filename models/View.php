<?php

namespace app\models;

use yii\db\ActiveRecord;

class View extends ActiveRecord
{
    public static function tableName()
    {
        return 'views';
    }
}
