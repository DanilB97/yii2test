<?php

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function getByCategory($id)
    {
        return self::find()->where(['category_id' => $id])->asArray()->all();
    }
}