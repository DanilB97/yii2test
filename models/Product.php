<?php

namespace app\models;


use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $img
 * @property int $price
 */
class Product extends ActiveRecord
{
    public static function getByCategory($id)
    {
        return self::find()->where(['category_id' => $id])->asArray()->all();
    }
}