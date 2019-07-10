<?php

namespace app\models;


use yii\db\ActiveRecord;
use yii\db\Query;

class Category extends ActiveRecord
{
    public static function getAll()
    {
        return self::find()->asArray()->all();
    }

    public static function getCategoryNameById($id)
    {
        return self::find()->select('name')->from('category')->where(['id' => $id])->asArray()->one();
    }
}